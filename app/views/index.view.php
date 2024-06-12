<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <!-- appel du css bootstrap, avec les modifs dans main.css -->
  <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body>
  <!-- Affichage de la navbar -->
  <?php
  include_once ("layouts/navbar.php")
    ?>
  <!-- disposition des cartes : carte 1 Présentation du zoo -->
  <div class="row justify-content-around custom-line">
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <div class="card-body main-content">
          <h3 class="card-title">Le Zoo Arcadia</h3>
          <p class="card-text">Le Zoo Arcadia est situé en France, à Paimpont près de la forêt de Brocéliande, en
            Bretagne depuis 1960. Nous avons le souci permanent du bien-être de nos animaux. Le zoo est entièrement
            indépendant au niveau des énergies, et nous sommes fiers d'agir pour la préservation de la biodiversité et
            des ressources de notre belle planète bleue.</p>
          <a href="#"><img class="card-img-top d-none d-sm-block" src="../../public/images/carte/Carte_Zoo.jpg"
              alt="Carte Zoo Arcadia"></a>
        </div>
        <div class="card-body">
          <h5 class="card-title">Le Zoo Arcadia</h5>
          <p class="card-text">Le parc est ouvert toute l'année. Voici les horaires d'ouverture :</p>
        </div>
      </div>
    </div>

    <!-- disposition des cartes carte 2 Les animaux -->
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <div class="card-body main-content">
          <h3 class="card-title">Les animaux</h3>
          <p class="card-text">Une centaine d’animaux chouchoutés par nos équipes, peuplent le Zoo. Ils vous attendent!
            Voici toutes les races d'animaux que vous allez pouvoir rencontrer tout au long de votre visite :</p>
          <!-- carousel d'images animaux -->
          <div id="carousel_animaux" class="carousel slide d-none d-sm-block" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../../public/images/animaux/FA_Arthur.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../../public/images/animaux/FT_Gilbert.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../../public/images/animaux/PA_Georges.jpg" alt="Third slide">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- disposition des cartes carte 3 Les habitats -->
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100 d-none d-sm-block">
        <div class="card-body main-content">
          <h3 class="card-title">Les habitats</h3>
          <p class="card-text">Les animaux évoluent dans une zone aménagée pour eux, qui réunit les conditions proches
            de leur milieu d’origine, afin de contribuer à leur santé morale et physique. Ces habitats sont :</p>
          <div>
            <img class="d-block w-100" src="../../public/images/habitats/VT_02.jpg" alt="Habitat">
          </div>
        </div>
      </div>
    </div>

    <!-- disposition des cartes carte 4 Les services -->
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100 d-none d-sm-block">
        <div class="card-body main-content">
          <h3 class="card-title">Les services</h3>
          <p class="card-text">Notre Zoo va vous faire vivre une expérience dont vous vous souviendrez très longtemps.
            Pour améliorer encore votre visite, nous proposons plusieurs services :</p>
          <img class="d-block w-100" src="../../public/images/services/visite_guidee/visite_guidee1.jpg" alt="Service">
        </div>
      </div>
    </div>
  </div>

  <!-- Avis des visiteurs -->
  <div class="col-lg-12 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
      <div class="card-body main-content">
        <h2 class="card-title">Les avis de nos visiteurs</h2>
        <p class="card-text">Voici les commentaires sur le zoo</p>
        <!-- menu accordéon - début -->
        <div class="container">
          <h3>Que pensent les visiteurs de notre zoo?</h3>
          <div id="accordion">
            <div class="accordion-item">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                      aria-controls="collapseOne">
                      Les avis des visiteurs
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Pseudo</th>
                          <th>Avis</th>
                        </tr>
                      </thead>
                      <tbody>


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                      aria-expanded="false" aria-controls="collapseTwo">
                      Laissez-nous un avis
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menu accordéon - fin -->
      </div>
    </div>
  </div>

  <!-- Appel du footer -->
  <?php include_once ("layouts/footer.php"); ?>

  <!-- Appel des scripts -->
  <?php include_once ("layouts/scripts.php"); ?>

</body>

</html>