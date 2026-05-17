<?php
$currentPage = isset($_SERVER['PHP_SELF']) ? basename($_SERVER['PHP_SELF']) : '';
?>

<header class="header-section">
	<div class="container-fluid">
		<div class="header-shell">
			<div class="logo">
				<a class="logo-link" href="index.php">
					<img src="img/logo.png" alt="Rafa Garrones">
				</a>
			</div>

			<nav class="nav-menu mobile-menu">
				<ul>
					<li class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>"><a href="index.php">Inicio</a></li>
					<li class="<?php echo $currentPage === 'servicios.php' ? 'active' : ''; ?>"><a href="servicios.php">Servicios</a></li>
					<li class="<?php echo $currentPage === 'portfolio.php' ? 'active' : ''; ?>"><a href="portfolio.php">Portfolio</a></li>
					<li class="<?php echo $currentPage === 'nosotros.php' ? 'active' : ''; ?>"><a href="nosotros.php">Sobre nosotros</a></li>
					<li class="<?php echo $currentPage === 'contacto.php' ? 'active' : ''; ?>"><a href="contacto.php">Contacto</a></li>
				</ul>
			</nav>

			<div class="header-social">
				<a href="https://m.facebook.com/rgarrones" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/Rgarrones21" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
				<a href="https://youtube.com/user/rafa22rafa2008rafa" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a>
				<a href="https://www.instagram.com/rafagarronesfotografiaa/" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
			</div>
		</div>
		<div id="mobile-menu-wrap"></div>
	</div>
</header>

