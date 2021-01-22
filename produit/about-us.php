<?php
require '_header.php'
?>
 <?php
    $nbr = current($con->query("SELECT COUNT(*) FROM `products_site` WHERE id" )->fetch_object());
    for($i = 1; $i <= $nbr;$i++):
      if( isset($_SESSION['panier'][$i])!=null):
        $priceProducts = current($con->query("SELECT price FROM `products_site` WHERE id = '$i'")->fetch_object());
        $total += $priceProducts * $_SESSION['panier'][$i];
      endif;
    endfor;
?>


<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Bionet</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,400,500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container"><span></span><span></span><span></span><span></span>
        </div>
      </div>
    </div>
    <div class="page"><a class="section section-banner d-none d-xl-block" alt="" width="1600" height="310"></a>
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-modern-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="index.php"><h1>Bionet</h1></a></div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Basket-->
                    <div class="rd-navbar-basket-wrap">
                      <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span><?= count($_SESSION['panier']) ?></span></button>
                      <div class="cart-inline">
                        <div class="cart-inline-header">
                          <h5 class="cart-inline-title">Dans le panier:<span> <?= count($_SESSION['panier']) ?></span> Produits</h5>
                          <h6 class="cart-inline-title">Total price:<span> <?= $total ?>€</span></h6>
                        </div>
                        <div class="cart-inline-body">
                        <!-- begin item -->
                        <?php
                        $nbr = current($con->query("SELECT COUNT(*) FROM `products_site` WHERE id" )->fetch_object());
                      for($i = 1; $i <= $nbr;$i++):
                        if( isset($_SESSION['panier'][$i])!=null):
                            $nameProducts = current($con->query("SELECT name FROM `products_site` WHERE id = '$i'")->fetch_object());
                            $priceProducts = current($con->query("SELECT price FROM `products_site` WHERE id = '$i'")->fetch_object());
                            $total += $priceProducts * $_SESSION['panier'][$i];
                      ?>
                          <div class="cart-inline-item">
                            <div class="unit align-items-center">
                              <div class="unit-left"><a class="cart-inline-figure" href="#"><img style="width:108px;" src="images/product-<?= 4+$i ?>-270x280.png" alt="" width="108" height="100"/></a></div>
                              <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="#"><?= $nameProducts ?></a></h6>
                                <div>
                                  <div class="group-xs group-inline-middle">
                                    <div class="table-cart-stepper">
                                      <input class="form-input" type="number" data-zeros="true" value="<?= $_SESSION['panier'][$i] ?>" min="1" max="1000">
                                    </div>
                                    <h6 class="cart-inline-title"><?= number_format($priceProducts,2) ?>€/kg</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <?php 
                              endif;
                              endfor;
                          
                          ?>
                          <?php 
                          $i++;
                          ?>
                          <!-- end -->
                        </div>
                        <div class="cart-inline-footer">
                          <div class="group-sm"><a class="button button-md button-default-outline-2 button-wapasha" href="panier.php">Aller au panier</a><a class="button button-md button-primary button-pipaluk" href="../Login/">Payment</a></div>
                        </div>
                      </div>
                    </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="#"><span>2</span></a>
                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search">
                      <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                      <form class="rd-search" action="#">
                        <div class="form-wrap">
                          <label class="form-label" for="rd-navbar-search-form-input">Rechercher...</label>
                          <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="search">
                          <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                        </div>
                      </form>
                    </div>
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                    <li class="rd-nav-item"><a class="rd-nav-link" href="../index.php">Home</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Shop</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="about-us.php">A propos de nous</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.php">Nous contacter</a>
                      </li>
                    </ul>
                  </div>
                  <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                    <div class="project-hamburger"><span class="project-hamburger-arrow-top"></span><span class="project-hamburger-arrow-center"></span><span class="project-hamburger-arrow-bottom"></span></div>
                    <div class="project-hamburger-2"><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                    </div>
                    <div class="project-close"><span></span><span></span></div>
                  </div>
                </div>
                <div class="rd-navbar-project rd-navbar-modern-project">
                  <div class="rd-navbar-project-modern-header">
                    <h4 class="rd-navbar-project-modern-title">Entrer en contact</h4>
                    <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                      <div class="project-close"><span></span><span></span></div>
                    </div>
                  </div>
                  <div class="rd-navbar-project-content rd-navbar-modern-project-content">
                    <div>
                      <p>Nous sommes toujours prêts à vous fournir des produits biologiques frais pour votre maison ou votre bureau. Contactez-nous pour savoir comment nous pouvons vous aider.</p>
                      <div class="heading-6 subtitle">Nos contacts</div>
                      <div class="row row-10 gutters-10">
                        <div class="col-12"><img src="images/home-sidebar-394x255.jpg" alt="" width="394" height="255"/>
                        </div>
                      </div>
                      <ul class="rd-navbar-modern-contacts">
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                            <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                            <div class="unit-body"><a class="link-location" href="#">La Ferme du Bois, 01370 Treffort-Cuisiat</a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                            <div class="unit-body"><a class="link-email" href="mailto:#">mail@demolink.org</a></div>
                          </div>
                        </li>
                      </ul>
                      <ul class="list-inline rd-navbar-modern-list-social">
                        <li><a class="icon fa fa-facebook" href="#"></a></li>
                        <li><a class="icon fa fa-twitter" href="#"></a></li>
                        <li><a class="icon fa fa-google-plus" href="#"></a></li>
                        <li><a class="icon fa fa-instagram" href="#"></a></li>
                        <li><a class="icon fa fa-pinterest" href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-46">
          <div class="container">
            <h2 class="breadcrumbs-custom-title">A propos de notre ferme</h2>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.php">Home</a></li>
              <li class="active">A propos de nous</li>
            </ul>
          </div>
          <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
        </div>
      </section>
      <!-- Why choose us-->
      <section class="section section-md section-first bg-default text-md-left">
        <div class="container">
          <div class="row row-50 justify-content-center">
            <div class="col-md-10 col-lg-5 col-xl-6"><img src="images/about-1-519x446.jpg" alt="" width="519" height="446"/>
            </div>
            <div class="col-md-10 col-lg-7 col-xl-6">
              <h2>Pourquoi nous choisir</h2>
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-4">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-4-1" data-toggle="tab">Nos Buts</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-2" data-toggle="tab">Nos Valeurs</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-3" data-toggle="tab">Nos Missions</a></li>
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-4-1">
                    <p>Notre et de fournir aux citoyens locaux et aux clients de notre ville des fruits, légumes et autres produits biologiques de qualités</p>
                    <div class="text-center text-sm-left offset-top-30">
                      <ul class="row-16 list-0 list-custom list-marked list-marked-sm list-marked-secondary">
                        <li>du bio</li>
                        <li>une démarche responsable</li>
                        <li>un environnement sain</li>
                        <li>du travail</li>
                        <li>des traditions</li>
                        <li>de la modernité</li>
                      </ul>
                    </div>
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Voir plus</a><a class="button button-width-xl-310 button-default-outline button-wapasha" href="contact-us.php">Nous contacter</a></div>
                  </div>
                  <div class="tab-pane fade" id="tabs-4-2">
                    <p>Nous produisons essentiellent des légumes de saison, avec une agriculture durable et biodynamique</p>
                    <div class="text-center text-sm-left offset-top-30">
                      <ul class="row-16 list-0 list-custom list-marked list-marked-sm list-marked-secondary">
                        <li>dynamisme</li>
                        <li>écologie</li>
                        <li>environnement</li>
                        <li>votre santé</li>
                        <li>du labeur</li>
                        <li>bio</li>
                      </ul>
                    </div>
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Voir plus</a><a class="button button-width-xl-310 button-default-outline button-wapasha" href="contact-us.php">Nous contacter</a></div>
                  </div>
                  <div class="tab-pane fade" id="tabs-4-3">
                    <p>Nous avons pour missions d'animer notre ferme, pour interesser plus de personne, pour cela nous proposons des activités et nous allons sur des marchés</p>
                    <div class="text-center text-sm-left offset-top-30">
                      <ul class="row-16 list-0 list-custom list-marked list-marked-sm list-marked-secondary">
                        <li>activités</li>
                        <li>marché</li>
                        <li>site web</li>
                        <li>conserver notre qualité</li>
                        <li>se développer</li>
                      </ul>
                    </div>
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Voir plus</a><a class="button button-width-xl-310 button-default-outline button-wapasha" href="contact-us.php">Nous contacter</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Latest Projects-->
      <section class="section section-md section-fluid bg-default">
        <div class="container">
          <h2>Notre Histoire</h2>
        </div>
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-classic owl-timeline" data-items="1" data-md-items="2" data-lg-items="3" data-xl-items="4" data-margin="30" data-stage-padding="15" data-xxl-stage-padding="0" data-autoplay="true" data-nav="true" data-dots="true">
          <div class="owl-item">
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary thumbnail-md">
              <div class="thumbnail-mary-figure"><img src="images/project-1-420x308.jpg" alt="" width="420" height="308"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-11-800x1200.jpg" data-lightgallery="item"><img src="images/project-1-420x308.jpg" alt="" width="420" height="308"/></a>
              </div>
            </article>
            <div class="thumbnail-mary-description">
              <h5 class="thumbnail-mary-project"><a href="#">Etablissement</a></h5><span class="thumbnail-mary-decor"></span>
              <h5 class="thumbnail-mary-time">
                <time datetime="1999">1999</time>
              </h5>
            </div>
          </div>
          <div class="owl-item">
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary thumbnail-md">
              <div class="thumbnail-mary-figure"><img src="images/project-2-420x308.jpg" alt="" width="420" height="308"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-5-800x1200.jpg" data-lightgallery="item"><img src="images/project-2-420x308.jpg" alt="" width="420" height="308"/></a>
              </div>
            </article>
            <div class="thumbnail-mary-description">
              <h5 class="thumbnail-mary-project"><a href="#">Nouveaux partenaires</a></h5><span class="thumbnail-mary-decor"></span>
              <h5 class="thumbnail-mary-time">
                <time datetime="2005">2005</time>
              </h5>
            </div>
          </div>
          <div class="owl-item">
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary thumbnail-md">
              <div class="thumbnail-mary-figure"><img src="images/project-3-420x308.jpg" alt="" width="420" height="308"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-4-800x1200.jpg" data-lightgallery="item"><img src="images/project-3-420x308.jpg" alt="" width="420" height="308"/></a>
              </div>
            </article>
            <div class="thumbnail-mary-description">
              <h5 class="thumbnail-mary-project"><a href="#">Ouvrir notre site internet</a></h5><span class="thumbnail-mary-decor"></span>
              <h5 class="thumbnail-mary-time">
                <time datetime="2010">2010</time>
              </h5>
            </div>
          </div>
          <div class="owl-item">
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary thumbnail-md">
              <div class="thumbnail-mary-figure"><img src="images/project-4-420x308.jpg" alt="" width="420" height="308"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-3-800x1200.jpg" data-lightgallery="item"><img src="images/project-4-420x308.jpg" alt="" width="420" height="308"/></a>
              </div>
            </article>
            <div class="thumbnail-mary-description">
              <h5 class="thumbnail-mary-project"><a href="#">Leader de l'industrie agricole</a></h5><span class="thumbnail-mary-decor"></span>
              <h5 class="thumbnail-mary-time">
                <time datetime="2013">2013</time>
              </h5>
            </div>
          </div>
          <div class="owl-item">
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary thumbnail-md">
              <div class="thumbnail-mary-figure"><img src="images/project-5-420x308.jpg" alt="" width="420" height="308"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-1-1200x800.jpg" data-lightgallery="item"><img src="images/project-5-420x308.jpg" alt="" width="420" height="308"/></a>
              </div>
            </article>
            <div class="thumbnail-mary-description">
              <h5 class="thumbnail-mary-project"><a href="#">Innovations agricoles</a></h5><span class="thumbnail-mary-decor"></span>
              <h5 class="thumbnail-mary-time">
                <time datetime="2019">2019</time>
              </h5>
            </div>
          </div>
        </div>
      </section>

      <!-- What people say-->
      <section class="section context-dark">
        <div class="parallax-container" data-parallax-img="images/bg-parallax-2.jpg">
          <div class="parallax-content section-md bg-overlay-2-21">
            <div class="container">
              <div class="oh">
                <h2 class="wow slideInUp" data-wow-delay="0s">Ce que disent les gens</h2>
              </div>
              <!-- Owl Carousel-->
              <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="images/user-16-100x100.jpg" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">J'ai ramassé une tête de votre laitue dans une épicerie locale aujourd'hui. Quelle laitue incroyable et magnifique! Je n’en ai jamais vu un autre aussi plein, vert et tentant.</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">Samantha Peterson</a></h5>
                    <p class="quote-lisa-status">Client régulier</p>
                  </div>
                </article>
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="images/user-17-100x100.jpg" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">Je voulais vous dire à quel point c'était incroyable de voir la ferme et à quel point nous aimons la nourriture. Vos pommes et vos carottes sont tout simplement merveilleuses et leur goût est excellent.</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">John Wilson</a></h5>
                    <p class="quote-lisa-status">Client régulier</p>
                  </div>
                </article>
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="images/user-18-100x100.jpg" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">La nourriture de votre ferme est merveilleuse. Tant de nuits où nous nous asseyons pour dîner, nous pouvons dire que tout dans cette assiette est cultivé localement et délicieux. Je vous remercie!</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">Kate Anderson</a></h5>
                    <p class="quote-lisa-status">Clietn régulier</p>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-md section-last bg-gray-100">
        <div class="container">
          <div class="oh">
            <h2 class="wow slideInUp" data-wow-delay="0s">Nos partenaire</h2>
          </div>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-clients owl-dots-secondary" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut"><a class="clients-modern" href="#"><img src="images/clients-1-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="images/clients-2-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="images/clients-3-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="images/clients-4-270x145.png" alt="" width="270" height="145"/></a></div>
        </div>
      </section>
      <a class="section section-banner" alt="" width="1600" height="310"></a>
            <!-- Page Footer-->
            <footer class="section footer-variant-2 footer-modern context-dark section-top-image section-top-image-dark">
        <div class="footer-variant-2-content">
          <div class="container">
            <div class="row row-40 justify-content-between">
              <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <div class="footer-brand"><a href="index.php"><img src="images/logo-inverse-196x42.png" alt="" width="196" height="42"/></a></div>
                    <p>Herber est une ferme biologique située en France. Nous offrons des aliments et des produits sains à nos clients.</p>
                    <ul class="footer-contacts d-inline-block d-md-block">
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                          <div class="unit-body">
                            <p>Mon-Sat: 07:00AM - 05:00PM</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                          <div class="unit-body"><a class="link-location" href="#">La Ferme du Bois, 01370 Treffort-Cuisiat</a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-4">
                <div class="oh-desktop">
                  <div class="inset-top-18 wow slideInDown" data-wow-delay="0s">
                    <h5>Newsletter</h5>
                    <p>Rejoignez notre newsletter par e-mail pour des nouvelles et des conseils.</p>
                    <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                      <div class="form-wrap">
                        <input class="form-input" id="subscribe-form-5-email" type="email" name="email" data-constraints="@Email @Required">
                        <label class="form-label" for="subscribe-form-5-email">Entrer votre Email</label>
                      </div>
                      <button class="button button-block button-white" type="submit">Souscrire</button>
                    </form>
                    <div class="group-lg group-middle">
                      <p class="text-white">Suivez nous</p>
                      <div>
                        <ul class="list-inline list-inline-sm footer-social-list-2">
                          <li><a class="icon fa fa-facebook" href="#"></a></li>
                          <li><a class="icon fa fa-twitter" href="#"></a></li>
                          <li><a class="icon fa fa-google-plus" href="#"></a></li>
                          <li><a class="icon fa fa-instagram" href="#"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-xl-3">
                <div class="oh-desktop">
                  <div class="inset-top-18 wow slideInLeft" data-wow-delay="0s">
                    <h5>Gallerie</h5>
                    <div class="row row-10 gutters-10" data-lightgallery="group">
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="images/gallery-image-1-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-7-800x1200.jpg" data-lightgallery="item"><img src="images/gallery-image-1-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="images/gallery-image-2-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-8-1200x800.jpg" data-lightgallery="item"><img src="images/gallery-image-2-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="images/gallery-image-3-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-9-800x1200.jpg" data-lightgallery="item"><img src="images/gallery-image-3-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="images/gallery-image-4-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery-original-10-1200x800.jpg" data-lightgallery="item"><img src="images/gallery-image-4-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-variant-2-bottom-panel">
          <div class="container">
            <!-- Rights-->
            <div class="group-sm group-sm-justify">
              <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> <span>Bionet</span>. All rights reserved
              </p>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <!-- coded by Ragnar-->
  </body>
</html>