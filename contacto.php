<!-- 
        Técnico online y servicios web
        www.tecnicoonlineweb.es
		info@tecnicoonlineweb.es
        JRinconS   2021

-->
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Rafa Garrones Fotografía">
        <meta name="keywords" content="Rafa Garrones | Contacto">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="shortcut icon" href="img/camara.ico"/>
        <title>RGARRONES | Contacto</title>

		<!-- GOOGLE CAPTCHA-->

		<script src="https://www.google.com/recaptcha/api.js?render=6LfuBrsaAAAAAJU-dhhoLEnseO1oVNYGwyVOdVrx"></script>
		<script integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <!-- GOOGLE FONT-->

        <link href="https://fonts.googleapis.com/css?family=Quantico:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">


        <!-- CSS -->

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>

    <body>
        <!-- PRECARGA -->

        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- HEADER NAV MENU-->

        <div class="inner">
            <ul>
				<?php
				include ('header.php');
				?>
            </ul>
        </div>

        <!-- FIN HEADER -->
        <!-- SECCIÓN CONTACTO -->

		<!--
        <div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d770.9936374159678!2d3.2315433292615006!3d39.37945283534059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x129650c20aa35ecb%3A0x1ff0f72dde755681!2sCalle%20de%20Ignasi%20Rotger%20Villalonga%2C%2039-38%2C%2007660%20Santa%C3%B1y%2C%20Islas%20Baleares!5e0!3m2!1ses!2ses!4v1614991000150!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                height="635" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 
        </div>
		-->

        <section class="contact-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-text">
                            <h3>CONTACTO</h3>
                            <p>Gracias por contactar con nosotros, atenderemos vuestras peticiones con la mayor brevedad posible.</p>
                            <div class="ct-item">
                                <div class="ct-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="ct-text">
                                    <h5>Email</h5>
                                    <p><a style="text-decoration: none; color: black;" href="mailto:info@rgarrones.com">info@rgarrones.com</a></p>
                                </div>
                            </div>
                            <div class="ct-item">
                                <div class="ct-icon">
                                    <i class="fa fa-mobile"></i>
                                </div>
                                <div class="ct-text">
                                    <h5>Teléfono</h5>
                                    <ul>
                                        <li>+34 636 77 59 14</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-form">							
                            <h3>Formulario contacto</h3>
                            <form id="formulario" action="formulario-contacto.php" method="post">
                                <input type="text" name="nombre" placeholder="Nombre" required="">
                                <input type="text" name="email" placeholder="Email" required>
								<input type="text" name="telefono" placeholder="Teléfono" required>
                                <textarea name="mensaje" placeholder="Mensaje" required></textarea>
                                <button type="submit" class="site-btn">Enviar</button>
                            </form>							
                        </div>
                    </div>
                </div>
            </div>
        </section>



		<!-- CTA SECCIÓN -->

        <section class="cta-section spad set-bg" data-setbg="img/contacto/banner_contacto_4.webp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA SECCIÓN END -->

        <!-- FIN SECCIÓN CONTACTO -->



        <!-- FOOTER -->

        <footer>
            <div class="inner">
                <ul>
					<?php
					include ('footer.php');
					?>
                </ul>
            </div>
        </footer>

        <!-- FIN FOOTER -->
        <!-- SCRIPTS -->

		<!-- CAPTCHA -->

		<script>
			$('#formulario').submit(function (event) {
				event.preventDefault();
				var email = $('#email').val();

				grecaptcha.ready(function () {
					grecaptcha.execute('6LfuBrsaAAAAAJU-dhhoLEnseO1oVNYGwyVOdVrx', {action: 'formulario-contacto'}).then(function (token) {
						$('#formulario').prepend('<input type="hidden" name="token" value="' + token + '">');
						$('#formulario').prepend('<input type="hidden" name="action" value="formulario-contacto">');
						$('#formulario').unbind('submit').submit();
					});
					;
				});
			});
		</script>


		<!-- CAPTCHA -->


    </body>
</html>
