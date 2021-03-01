<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">

  <title>Affluence - {{$title}}</title>

  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <link href="/css/landing-page.css" rel="stylesheet">

<script>

  function initMap() {
    const louvre = { lat: 48.8606111, lng: 2.337644 };

    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 16,
      center: louvre,
    });

    const marker = new google.maps.Marker({
      position: louvre,
      map: map,
    });
  }
</script>
  

</head>

<body>
  <nav class="navbar navbar-light bg-light static-top p-4">
    <div class="container">
      <a class="navbar-brand" href="/">Affluence - {{$title}} ⚜️ </a>
    </div>
  </nav>
  @yield('content')
  <section class="p-5">
    <div id="map" style="height:400px; width: 100%;"></div>
  </section>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXxiZMV2zn36NfN9lJyGfG__KbqIR4VcY&callback=initMap&libraries=&v=weekly"
        async
    ></script>
    
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">Made with ❤️ <br> &copy; Affluence {{$title}} - Jessim Heddadi 2020. All Rights Reserved.</p>
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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
