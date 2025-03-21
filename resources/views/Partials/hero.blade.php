@if(Auth::user()) 
<section id="hero">

  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
      <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url(img/hero-carousel/image.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"Awaken the pilot inside you."</p>
              <button class="button-48" role="button"><span class="text"><b>Download</b></span></button>
            </div>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(img/hero-carousel/image2.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"There's nothing like feeling the wind in your face."</p>
              <button class="button-48" role="button"><span class="text"><b>Download</b></span></button>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(img/hero-carousel/image3.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"There's nothing like the thrill of speed."</p>
              <button class="button-48" role="button"><span class="text"><b>Download</b></span></button>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(img/hero-carousel/image4.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"Speed ​​is the key to victory."</p>
              <button class="button-48" role="button"><span class="text"><b>Download</b></span></button>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(img/hero-carousel/image5.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"Acceleration without limits, speed without borders."</p>
              <button class="button-48" role="button"><span class="text"><b>Download</b></span></button>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
    
  </div>
</section><!-- End Hero Section -->
@endif

@guest

<section id="hero">

  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
      <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url(img/hero-carousel/image.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"Awaken the pilot inside you."</p>
            </div>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(img/hero-carousel/image2.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"There's nothing like feeling the wind in your face."</p>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(img/hero-carousel/image3.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"There's nothing like the thrill of speed."</p>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(img/hero-carousel/image4.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"Speed ​​is the key to victory."</p>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(img/hero-carousel/image5.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Racing Mania</h2>
              <p class="animate__animated animate__fadeInUp">"Acceleration without limits, speed without borders."</p>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
    
  </div>
</section><!-- End Hero Section -->


@endguest