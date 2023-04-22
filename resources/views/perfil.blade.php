<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Racing Mania</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--CSS-->
  @vite(['resources/css/mycssButton.css', 'resources/css/icon.css'])

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor2/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor2/aos/aos.css" rel="stylesheet">
  <link href="vendor2/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor2/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor2/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor2/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  @vite(['resources/css/style.css', 'resources/css/animation.css'])
  @vite(['resources/css/profile.css'])

</head>

<body>


  <!-- ======= Header ======= -->
  @extends("Partials/header")
  <!-- ======= Alert Section ======= -->
  @extends("Partials/alert")
  
  <section id="detalhes" data-aos-delay="200" class="vh-0 py-25" style="background: rgb(250,2,2);
background: linear-gradient(228deg, rgba(250,2,2,1) 12%, rgba(214,16,31,1) 68%, rgba(57,59,116,1) 70%);">
  <div class="container py-5 h-1" data-aos="fade-up">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-12 mb-4 mb-lg-10">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            
            <div class="col-md-4 gradient-custom text-center" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; padding-top:150px">
            <div id="image-container">
              <img src="" alt="Minha imagem" style="height:350px">
            <form id="profile-image-form" action="PHP/save-profile-image.php" method="post" enctype="multipart/form-data">
              <input type="file" name="image" accept="image/*">
              <input type="submit" value="Enviar">
            </form>
            </div>
              <h2></h2>
              <i class="far fa-edit mb-5"></i>
            </div>
            
            <div class="col-md-8">
              <div class="card-body p-4 section-header">
                <h3>INFORMATION</h3>
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h4>Email</h4>
                    <p class="text-muted">{{$user->email}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h4>Phone</h4>
                    <p class="text-muted">{{$user->userDetails->numero_telemovel}}</p>
                  </div>
                  <div class="mb-3">
                    <h4>username</h4>
                    <p class="text-muted">{{$user->username}}</p>
                  </div>
                </div>
                <div class="row pt-1">
        <div class="container">
        <div class="section-header">
          <h3 class="section-title">Details</h3>
          <p class="section-description"></p>
        </div>
        
        <div class="row counters">
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$user->userDetails->num_moedas}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Coins</p>
          </div>  

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$user->userDetails->nivel}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Level</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ number_format($user->userDetails->tempo_jogado, 1) }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Time played</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$user->userDetails->corridas_realizadas}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Races performed</p>
          </div>

          <div class="col-lg-0 col-0 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$user->userDetails->voltas_realizadas}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Laps performed</p>
          </div>
        </div>

      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>



 
  <!-- Vendor JS Files -->
  <script src="vendor2/purecounter/purecounter_vanilla.js"></script>
  <script src="vendor2/aos/aos.js"></script>
  <script src="vendor2/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor2/glightbox/js/glightbox.min.js"></script>
  <script src="vendor2/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor2/swiper/swiper-bundle.min.js"></script>
  <script src="vendor2/waypoints/noframework.waypoints.js"></script>


  <!-- Main JS File -->
  @vite(['resources/js/main.js', 'resources/js/register.js'])
  @vite([ 'resources/js/validation.js'])
  @vite(['resources/js/toast.js'])
  <script src="https://kit.fontawesome.com/d68abb87c8.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>