const express = require('express');
const app = express();
const dff = require('dialogflow-fulfillment');
const fs = require('fs');
const mysql = require('mysql');

const news_id = fs.readFileSync('newsID.txt', 'utf8');
const user_name = fs.readFileSync('username.txt', 'utf8');

var admin = require("firebase-admin");

var serviceAccount = require("./config/chatbot-d0cf5-firebase-adminsdk-20vss-b0ca732653.json");
const { platform } = require('os');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'newsblog'
});

try {
    admin.initializeApp({
        credential: admin.credential.cert(serviceAccount)
      });

      console.log("Connected to DB");

} catch (error) {
    console.log("Error here "+error);
}

var db = admin.firestore();
var total_users;

db.settings({ ignoreUndefinedProperties: true })

connection.connect();

connection.query('SELECT COUNT(*) as count FROM user', (error, results, fields) => {
  if (error) throw error;
  total_users = results[0].count;
  console.log('The total count of rows is: ', total_users);
});

app.get('/', (req, res)=>{
    res.send("We are live")
});

app.post('/', express.json(), (req, res)=>{
    const agent = new dff.WebhookClient({
        request : req,
        response : res
    });

    function demo(agent){
        agent.add("Sending response from Webhook server");
    }

    function finalConfirmation(agent){
      var payloadData = {
        "richContent": [
          [
            {
              "type": "info",
              "subtitle": "Check out more news here!",
              "actionLink": "http://localhost/newsblog/home.php",
              "title": "Your response is saved.",
              "image": {
                "src": {
                  "rawUrl": "https://www.citypng.com/public/uploads/preview/free-newspaper-news-icon-png-11639741012iwvboqumq5.png"
                }
              }
            }
          ]
        ]
      }

      agent.add(new dff.Payload(agent.UNSPECIFIED, payloadData, {sendAsMessage: true, rawPayload: true}));

        var subject = agent.context.get("selected_subject").parameters['subject-number'];
        var reason = agent.context.get("selected_reason").parameters.reason;

        console.log("Username: "+user_name);
        console.log("News ID: "+news_id);
        console.log("Subject: "+subject);
        console.log("Reason: "+reason);

        
      db.collection('reported').add({
        user_name: user_name,
        news_id : news_id,
        subject : subject,
        reason : reason
      }).then(ref => {
        fakeRatio();
        console.log("Details added to DB");
      });
    }
    
  var intentMap = new Map();

  intentMap.set('webhookDemo', demo)
  intentMap.set('finalConfirmation', finalConfirmation)

  agent.handleRequest(intentMap);

});

function fakeRatio(){

  db.collection('reported').orderBy('user_name').get().then((querySnapshot) => {
    const groups = {};
    querySnapshot.forEach((doc) => {
      const data = doc.data();
      const news_id = data.news_id;
      const username = data.user_name;
      if (!groups[news_id]) {
        groups[news_id] = [];
      }
      if (!groups[news_id].includes(username)) {  //To select distinct Username
        groups[news_id].push(username);
        // console.log(`News-id: ${news_id}, Username: ${username}`);
      }
      
    });
    Object.keys(groups).forEach((news_id) => {
        var count = groups[news_id].length; // Get the count of rows for the current group
        // console.log(`News-id: ${news_id}\tUsers Reported: ${count}`);
        var total_percent = (count/total_users);
        total_percent = total_percent.toFixed(2);
        db.collection('fake percentage').doc(news_id).set({
          fake_percentage : total_percent
        })
        // Threshold to remove reported news from database
        if(total_percent>0.6){
          connection.query('DELETE * FROM post WHERE post_id = news_id', (error, results, fields) => {
            if (error) throw error;
            console.log("News ID "+news_id+" is reported by 60% users");
          });
        }
    });
    console.log("\n Below list shows 'username' along with news ID in the format => News ID : Username");
    console.log(groups);
}).catch((error) => {
    console.log("Error getting documents: ", error);
});

}

connection.end();

app.listen(8080, ()=>console.log("Server is live at port 8080"));