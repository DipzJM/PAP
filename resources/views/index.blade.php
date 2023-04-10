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


</head>

<body>


  <!-- ======= Header ======= -->
  @extends("Partials/header")
  <!-- ======= Main Section ======= -->
  @extends("Partials/main")
  <!-- ======= hero Section ======= -->
  @extends("Partials/hero")
  <!-- ======= Alert Section ======= -->
  @extends("Partials/alert")

  


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
  @vite(['resources/js/toast.js'])
  <script src="https://kit.fontawesome.com/d68abb87c8.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>