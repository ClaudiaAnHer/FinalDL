<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php get_template_part('_includes/iOS', 'icons') ?>


	<title><?php bloginfo('name') ?></title>

		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107989807-1"></script>
	<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-107989807-1');
	</script>


	<?php wp_head() ?>

</head>

<body>


<nav class="navbar_ss navbar navbar-fixed-top">
	<div class="container-fluid">

		<div class="navbar-header">
	        <button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar"data-toggle="collapse" type="button">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>

			<a href="#"> <img src="http://localhost:8888/wp-content/uploads/2017/10/logo160.png"></a> 
	    </div>

			<ul class="nav navbar-nav navbar-right" id="navbar">
				<li>

			<?php 
			
			$args = array(
				'theme_location' => 'menu-ppal',
				'menu_id' => 'menu-ppal',
				'menu_class' => 'nav navbar-nav',
				);
				wp_nav_menu ( $args );
			?>

			 </li>
		</ul>
	</div> 
</nav>

<!-- FIN BARRA DE NAVEGACION -->




