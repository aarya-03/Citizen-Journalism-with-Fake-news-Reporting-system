# Citizen-Journalism-with-Fake-news-Reporting-system
This is a CMS (Content management system) based project to encourage Citizen Journalism with an embedded NLP based chatbot to reduce the Fake news articles. This is helpful in preventing the spread of fake news and ensuring the authenticity of the literature for end readers.

The proposed system includes the implementation of a news blog website along with the NLP based chatbot to ease reporting of fake news. To endorse citizen journalism, we have provided the citizen news reporting feature. Every user will first have to get registered for posting news articles on our website. The username will be unique for every user. After the successful registration, the user is free to publish or post news article on the portal. Both the admin as well as the user can publish the local news articles on the website only after logging in with the appropriate credentials. The news article may contain photos or videos of incidents in support to the article. All the multimedia data will be stored in the database.

This web application relies on a mixture of operating system (Windows), Web server (Apache), database server (MySQL), and programming environment (PHP and JavaScript).
The webapp’s UI is implemented using core HTML with PHP and styling is done using CSS3. 
The app contains admin module along with user and node modules. Different news is categorised according to their domain and different modules have been built for the same. For ease of news searching, the search box is implemented. The conversational chatbot is built using NodeJS, which is an open-source server environment and Google Dialogflow ES. It can analyse multiple types of input from users, including text or audio inputs. During a session, webhooks allows to use the data extracted by Dialogflow's natural language processing to generate dynamic responses, validate collected data, or trigger actions on the backend. The chatbot will begin functioning once the Node Server is established and Dialogflow is configured along with Webhooks.

The user can report a news if it seems false or fake using ‘Report’ button embedded on each news article and the data will get collected by chatbot and stored in the cloud database. If a news article has been reported by many users, it is likely that it contains misinformation and should be removed. The threshold for deleting a news article is determined using ‘fake ratio’ based on user reports. The ratio is calculated as number of users report a news : total number of registered users. Fake ratio is currently limited to 0.6. If a news has a ratio exceeding 0.6, it will be removed. We will monitor user reports and adjust the threshold based on the size of user base, the frequency of user reports, and the importance of accuracy in the news reporting to ensure that the content is accurate and trustworthy.
