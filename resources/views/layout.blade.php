<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">

  <title>Affluence - Heddadi Jessim</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.css" rel="stylesheet">

<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  const louvre = { lat: 48.864824, lng: 2.334595 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 16,
    center: louvre,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: louvre,
    map: map,
  });
}
</script>
  

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top p-4">
    <div class="container">
      <a class="navbar-brand" href="/">Affluence - Musée du Louvre ⚜️ </a>
    </div>
  </nav>
  @include('flash-message')
  @yield('content')
  <section class="p-5">
    <div id="map" style="height:400px; width: 100%;"></div>
  </section>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXxiZMV2zn36NfN9lJyGfG__KbqIR4VcY&callback=initMap&libraries=&v=weekly"
        async
    ></script>
    
  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">Made with ❤️ <br> &copy; Affluence - Jessim Heddadi 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a target="_blank" href="https://github.com/JessimH">
                <i class="fab fa-github fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a target="_blank" href="https://www.instagram.com/jessimheddadi/">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src=""></script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
