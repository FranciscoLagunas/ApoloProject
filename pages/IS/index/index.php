<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Apolo</title>

      <!-- stylesheet -->
      <link rel="stylesheet" href="style/style.css">

      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

      <!-- bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <!-- icons -->
      <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

      <!-- for on scroll animations -->
      <link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css">
      <script src="https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js"></script>

<body>
      
      <a name="home"></a>
      <div class="wrapper">

            <!--------------- hero section starts here --------------->

            <div class="video-container">
                  <video playsinline autoplay muted loop id="bgvid">
                        <source src="video/videobg.mp4" type="video/mp4">
                  </video>
            </div>

            <div class="header">
                  <h1>Bienvenido a <strong>APOLO</strong>,disfruta de tu visita</h1>
            </div>


            <nav class="nav">
                  <span id="brand">
                        <a href="index.php">APOLO</a>
                  </span>

                  <ul id="menu">
                       
                        <li><a href="#about">Nosotros</a></li>
                        <li><a href="#services">Servicio</a></li>
                        <li><a href="#team">Equipo</a></li>
                          <li><a href="login.php">Iniciar Sesión</a></li>
                         <li><a href="HRegistro.php" <?php session_start(); $_SESSION['Existente'] = False; ?> >Registrate</a></li>
                        <!-- <li><a href="login.php">Iniciar Sesión</a></li> -->
                  </ul>

                  <div id="toggle">
                        <div class="span">menu</div>
                  </div>

            </nav>

            <div id="resize">
                  <div class="close-btn">close</div>

                  <ul id="menu">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About us</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#team">Our team</a></li>
                        <li><a href="#contact">Contact</a></li>
                  </ul>
            </div>

            <!--------------- navbar ends here --------------->

            <div class="content">

            <!--------------- about section starts here --------------->

            <a name="about"></a>

           <section class="story">
      

                  <div class="container-fluid">

                        <div class="section-data">

                              <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 section-index wow fadeInUp" data-wow-delay="0.3s">01</div>
                                  
                              </div>

                              <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6 section-subheading wow fadeInUp" data-wow-delay="0.5s"><h1>¿Que es Apolo?</h1></div>
                              </div>

                              <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6 section-info wow fadeInUp" data-wow-delay="0.6s">Promover en estudiantes de la universidad el desarrollo de ideas y/o proyectos por medio de la pagina, APOLO es una herramienta para llevar a cabo sus proyectos de una manera colaborativa y con el uso de la tecnología. </div>
                              </div>

                              <div class="row">
                                    <div class="col-md-4"></div>
                                   
                              </div>

                        </div>

                  </div>

           </section>

            <!--------------- about section ends here --------------->

            <!--------------- services section starts here --------------->

            <a name="services"></a>

           <section class="services">

            <div class="container-fluid">

                  <div class="section-data">

                        <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-md-2 section-index wow fadeInUp" data-wow-delay="0.3s">02</div>
                              <div class="col-md-8 section-heading wow fadeInUp" data-wow-delay="0.4s">Función de Apolo</div>
                        </div>

                        <div class="row service">
                              <div class="col-md-4"></div>
                              <div class="col-md-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="icon">
                                          <ion-icon name="finger-print"></ion-icon>
                                    </div>
                                    <div class="icon-title">
                                          Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    </div>
                              </div>

                              <div class="col-md-3 wow fadeInUp" data-wow-delay="0.6s">
                                          <div class="icon">
                                                <ion-icon name="link"></ion-icon>
                                          </div>
                                          <div class="icon-title">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                          </div>
                              </div>
                        </div>

                        <div class="row service">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-3 wow fadeInUp" data-wow-delay="0.7s">
                                          <div class="icon">
                                                <ion-icon name="cloud-upload"></ion-icon>
                                          </div>
                                          <div class="icon-title">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                          </div>
                                    </div>
      
                                    <div class="col-md-3 wow fadeInUp" data-wow-delay="0.8s">
                                                <div class="icon">
                                                      <ion-icon name="share"></ion-icon>
                                                </div>
                                                <div class="icon-title">
                                                      Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                                </div>
                                    </div>
                              </div>
                  </div>

            </div>

           </section>

            <!--------------- services section ends here --------------->

            <!--------------- team section starts here --------------->

            <a name="team"></a>

            <section class="team">

                  <div class="container-fluid">

                        <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-md-2 section-index wow fadeInUp" data-wow-delay="0.3s">03</div>
                              <div class="col-md-8 section-heading wow fadeInUp" data-wow-delay="0.4s">Equipo</div>
                        </div>

                        <div class="row members">

                              <div class="col-md-4"></div>

                              <div class="col-md-3 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="team-member">
                                          <div class="team-img team-one"></div>
                                    </div>
                                    <div class="team-title">
                                          <h5>Francisco Lagunas</h5>
                                          <span>CEO</span>
                                    </div>
                              </div>

                              <div class="col-md-3 wow fadeInUp" data-wow-delay="0.6s">
                                          <div class="team-member">
                                                <div class="team-img team-two"></div>
                                          </div>
                                          <div class="team-title">
                                                <h5>Luis Almaraz</h5>
                                                <span>Co-foundador</span>
                                          </div>
                                    </div>

                        </div>

                  </div>

            </section>
            
            <!--------------- team section ends here --------------->

            <!--------------- newsletter section starts here --------------->

            <!--  <section class="newsletter">

                    <div class="container">

                          <div class="row">
                                <div class="col-md-12">
                                      <div class="news-data">
                                      <div class="section-subheading">
                                            <h1 class="wow fadeInUp" data-wow-delay="0.3s">Registarte  en Apolo</h1>
                                      </div>

                                      
                                      </div>
                                </div>
                          </div>

                    </div>

             </section> -->

            <!--------------- newsletter section ends here --------------->

            <!--------------- contact section starts here --------------->

            <a name="contact"></a>

           
            <!--------------- footer starts here --------------->

            <div class="footer">

                  <div class="container">

                        <div class="info">

                              <div class="row">
                                   

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s" id="media">
                                          <ul>
                                                <li><ion-icon name="logo-facebook"></ion-icon></li>

                                                <li><ion-icon name="logo-instagram"></ion-icon></li>

                                                <li><ion-icon name="logo-twitter"></ion-icon></li>

                                                <li><ion-icon name="logo-youtube"></ion-icon></li>
                                          </ul>

                                          <br><br>
                                    </div>
                                    

                                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s" id="mail">
                                          <p>Hola</p>
                                          <h4>APOLO@project.com</h4>

                                          <br><br>
                                    </div>
                                    
                              </div>

                        </div>

                  </div>

            </div>

            <!--------------- footer ends here --------------->

            </div>

      </div>


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>

// navigation starts here
$("#toggle").click(function() {
            $(this).toggleClass('on');
            $("#resize").toggleClass("active");
      });
      $("#resize ul li a").click(function() {
            $(this).toggleClass('on');
            $("#resize").toggleClass("active");
      });
      $(".close-btn").click(function() {
            $(this).toggleClass('on');
            $("#resize").toggleClass("active");
      });

$(function () {
  $(document).scroll(function () {
    var $nav = $(".nav");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});

new WOW().init();

// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });


</script>

</body>
</html>