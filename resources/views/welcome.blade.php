@extends('layout')

@section('content')
<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Musée du louvre</h1>
            <a class="btn btn-lg btn-primary" href="/reservation">Réserver</a>
        </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-mouse-pointer m-auto text-primary"></i>
            </div>
            <h3>Click</h3>
            <p class="lead mb-0">Cliquez sur réserver</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-hourglass-half m-auto text-primary"></i>
            </div>
            <h3>Réserves</h3>
            <p class="lead mb-0">Choisissez l'heure et la date de votre visite</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-graduation-cap m-auto text-primary"></i>
            </div>
            <h3>Apprends</h3>
            <p class="lead mb-0">Venez découvrir l'Histoire avec un grand H</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://i.f1g.fr/media/figaro/805x453_crop/2017/06/14/XVM3d04900c-50d9-11e7-9aa8-d9123e1e563e.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Renouez avec votre Histoire</h2>
          <p class="lead mb-0">Le musée du Louvre présente des œuvres de l'art occidental du Moyen Âge à 1848, des civilisations antiques qui l'ont précédé et influencé et des arts d'Islam.</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('https://cdn.radiofrance.fr/s3/cruiser-production/2019/07/a3c1ba77-5f20-4963-97b2-31eb1d979747/838_080_hl_dhimbert_748973.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>L'Histoire ne se lit pas, elle se VIT</h2>
          <p class="lead mb-0">Venez découvrir ou redécouvrir les oeuvres qui on marqué notre culture et civilisation a tout jamais.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="features-icons bg-light text-center">
  <div class="container">
    <div class="table-responsive">
    <h1 class="text-center p-3">Horaires</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Lundi</th>
                    <th scope="col">Mardi</th>
                    <th scope="col">Mercredi</th>
                    <th scope="col">Jeudi</th>
                    <th scope="col">Vendredi</th>
                    <th scope="col">Samedi</th>
                    <th scope="col">Dimanche</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>9h - 18h</td>
                    <td>9h - 18h</td>
                    <td>9h - 18h</td>
                    <td>9h - 18h</td>
                    <td>9h - 18h</td>
                    <td class="text-muted"><em>Fermé</em></td>
                    <td class="text-muted"><em>Fermé</em></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
  </section>

  <!-- Testimonials -->
  

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Prêt à visiter le musée? Réservez!</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <a class="btn btn-lg btn-primary" href="/reservation">Réserver</a>
        </div>
      </div>
    </div>
  </section>
@endsection