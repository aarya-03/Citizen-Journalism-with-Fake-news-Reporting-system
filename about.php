<?php include 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen Journalism</title>
    <link rel="stylesheet" href="css/about.css" />
</head>
<section id="section-1">
  <h3 class="heading">CITIZEN JOURNALISM: Power to the People</h3>
  <br>
  <div class="about-container">
    Imagine what happens when a news medium fails to cover or report an important incident due to critical situations? The medium tends to lose its credibility and trust. To avoid this, the concept of citizen journalism was brought in. Earlier, when the news media came into existence, it was the leaders and businessmen who played a major role in news making. With high-quality cameras and the fastest internet facilities, citizen journalism has become easier today. Citizen journalism is based upon public citizens "playing an active role in the process of collecting, reporting, analyzing, adisseminating news and information." Citizen journalism was made more feasible by the development of various online internet platform, new media technology, such as social networking and media-sharing websites, in addition to the increasing prevalence of cellultelephones, have made citizen journalism more accessible to people worldwide.   
    <br>
    </div>
</section>


<section class="carousel">
  <div class="carousel-container">
    <div class="carousel-item active">
      <img src="images/about1.png">
    </div>
    <div class="carousel-item">
      <img src="images/about2.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/about3.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/about4.jpg">
    </div>
  </div>
  <button class="carousel-prev">&#8249;</button>
  <button class="carousel-next">&#8250;</button>
</section>


<section id="section-2">
  Recent advances in new media have started to have profound political impact. Due to this increasing news stories, it is often observed that the news publishers & authors neglect the news story which is small and more priority is given to the big news stories. Due to this, the people are deprived of some news which can prove to be important for them. Due to the availability of technology, citizens often can report breaking news more quickly than traditional media reporters. 
  <br><br>
  <div class="styled-list">In simple terms, Citizen Journalists:
    <li>Are not professionals, but they produce and publish news</li>
    <li>Are people outside the mainstream media organizations</li>
    <li>Are people who were “audience” yesterday</li>
    <li>They simply write the news from their perspective</li>
  </div>
</section>

<script>
const carouselContainer = document.querySelector('.carousel-container');
const prevButton = document.querySelector('.carousel-prev');
const nextButton = document.querySelector('.carousel-next');
const items = document.querySelectorAll('.carousel-item');
let currentIndex = 0;
let loadedImages = 0;

prevButton.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + items.length) % items.length;
  updateCarousel();
});

nextButton.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % items.length;
  updateCarousel();
});

items.forEach(item => {
  const img = item.querySelector('img');
  img.addEventListener('load', () => {
    loadedImages++;
    if (loadedImages === items.length) {
      updateCarousel();
    }
  });
});

function updateCarousel() {
  items.forEach((item, index) => {
    if (index === currentIndex) {
      item.classList.add('active');
    } else {
      item.classList.remove('active');
    }
  });
  carouselContainer.style.transform = `translateX(0%)`;
}

</script>
</html>
<?php include 'footer.php'?>