<?php

defined('_JEXEC') or die;

JHTML::_('behavior.framework', true);

$app = JFactory::getApplication();

//Parametros de la plantilla
$imagenLogo = $this->params->get('logo');
$eslogan = $this->params->get('eslogan');
$maquetacion = $this->params->get('maquetacion');

?>

<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >

<head>

     <jdoc:include type="head" />

     <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/screen.css" type="text/css" media="screen, projection" />
     <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/print.css" type="text/css" media="print" />
     <!--[if lt IE 8]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
   
     <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
	
	 <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.min.js"></script>
	 <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.cycle.all.min.js"></script>
     <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
     
     <?php if($imagenLogo) : ?>
     
	     <style type="text/css">
	     
	     	#logo h1{
	     		background: transparent url(<?php echo $this->baseurl."/".$imagenLogo; ?>) no-repeat left top;
	     	}
	     
	     </style>
	     
	 <?php endif; ?>
     
</head>

<body>
  <div class="container">
  
  	<!-- Comienzo Header -->
	<div id="header" class="span-24">
	
		<!-- Comienzo Logo -->
		<div id="logo" class="span-9">
			<a href="<?php echo $this->baseurl ?>" title="<?php echo $app->getCfg('sitename'); ?>">
				<h1><?php echo $app->getCfg('sitename'); ?></h1>
			</a>
			<h2 id="eslogan">
				<?php if($eslogan) : ?>
					<?php echo $eslogan; ?>
				<?php else : ?>
					Lorem ipsum dolor sit amet
				<?php endif; ?>
			</h2>
		</div>
		<!-- Fin Logo -->
		
		<!-- Comienzo Menús Superiores -->
		<div id="menus_superiores" class="span-15 last">
			
			<?php if($this->countModules('interpoint-menu_ingresar')) : ?>
				<div id="menu_ingresar">
					<jdoc:include type="modules" name="interpoint-menu_ingresar" style="none" />
				</div>
			<?php endif; ?>
			
			<?php if($this->countModules('interpoint-menu_superior')) : ?>
				<div id="menu_superior">
					<jdoc:include type="modules" name="interpoint-menu_superior" style="none" />
				</div>
			<?php endif; ?>
			
		</div>
		<!-- Fin Menús superiores -->
		
	</div>
	<!-- Fin Header -->
	
	<!-- Mensajes del CMS -->
	<jdoc:include type="message" />
	
	<!-- Comienzo Destacado superior -->
	<?php if($this->countModules('interpoint-destacado_superior')) : ?>
		<div id="destacado_superior" class="span-10">
			<jdoc:include type="modules" name="interpoint-destacado_superior" style="xhtml" />
		</div>
	<?php endif; ?>
	<!-- Fin Destacado superior -->
	
	<!-- Comienzo Video -->
	<?php if($this->countModules('interpoint-video')) : ?>
		<div id="video" class="span-14 last">
				<div id="reproductor">
					<jdoc:include type="modules" name="interpoint-video" style="none" />
				</div>
		</div>
	<?php endif; ?>
	<!-- Fin Video -->
	
	<!-- Comienzo Caja medio -->
	<?php if($this->countModules('interpoint-caja_medio')) : ?>
		<div id="caja_medio" class="span-24">
			<jdoc:include type="modules" name="interpoint-caja_medio" style="none" />
		</div>
	<?php endif; ?>
	<!-- Fin Caja medio -->
	
	<!-- Maquetación a una columna -->
	<?php if($maquetacion == 1) : ?>
		
		<!-- Comienzo Contenido principal -->
		<div id="contenido" class="span-24">
			<jdoc:include type="component" />
		</div>
		<!-- Fin Contenido principal -->
	
	<!-- Maquetación a dos columnas -->
	<?php else : ?>	
	
		<!-- Comienzo Contenido principal -->
		<div id="columna_izquierda" class="span-17 append-1">
			<jdoc:include type="component" />
		</div>
		<!-- Fin Contenido principal -->
		
		<!-- Comienzo Columna derecha -->
		<div id="columna_derecha" class="span-6 last">
			<jdoc:include type="modules" name="interpoint-columna_derecha" style="personalizado" headerLevel="3" />
		</div>
		<!-- Fin Columna derecha -->
		
	<?php endif; ?>
	
	<!-- Comienzo Destacado inferior -->
  	<div id="destacado_inferior" class="span-15 append-1">
  		<jdoc:include type="modules" name="interpoint-destacado_inferior" style="xhtml" />
  	</div>
  	<!-- Fin Destacado inferior -->
  	
  	<!-- Comienzo Slideshow inferior -->
  	<div id="slideshow_inferior" class="span-8 last">
  		<?php if($this->countModules('interpoint-slideshow_inferior')) : ?>
  			<div id="slideshow_contenedor">
  				<jdoc:include type="modules" name="interpoint-slideshow_inferior" style="none" />
  			</div>
  			<span id="slideshow_der" class="slideshow_nav"></span>
  			<span id="slideshow_izq" class="slideshow_nav"></span>
  		<?php endif; ?>
  	</div>
  	<!-- Fin Slideshow inferior -->
  	
  	<!-- Comienzo Footer -->
  	<div id="footer" class="span-24">
  		<div id="legal" class="prepend-3 span-9">
  			&copy;<?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?>
  		</div>
  		<div id="menu_inferior" class="prepend-3 span-9 last">
  			<jdoc:include type="modules" name="interpoint-menu_inferior" style="none" />
  		</div>
  	</div>
  	<!-- Fin Footer -->
  
  </div>
</body>

</html>