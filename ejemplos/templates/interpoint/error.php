<?php

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$params = JFactory::getApplication()->getTemplate(true)->params;

//Parametros de la plantilla
$imagenLogo = $params->get('logo');
$eslogan = $params->get('eslogan');

?>

<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >

<head>
	 <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
	 
     <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/screen.css" type="text/css" media="screen, projection" />
     <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/print.css" type="text/css" media="print" />
     <!--[if lt IE 8]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
   
     <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
     
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
		<div id="logo" class="span-9 prepend-8">
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
		
	</div>
	<!-- Fin Header -->
	
	<!-- Comienzo Error -->
	<div id="error" class="span-18 push-3">
	
		<!-- Error 404 -->
		<?php if ($this->error->getCode() == 404) : 	?>
		
			<p><?php echo JText::_('TPL_INTERPOINT_ERROR404_TEXTO1'); ?></p>
			<p><?php echo JText::_('TPL_INTERPOINT_ERROR404_TEXTO2'); ?></p>
			
				<?php 
					$module = JModuleHelper::getModule( 'search' );
					echo JModuleHelper::renderModule( $module);	
				?>
			
			<p><?php echo JText::_('TPL_INTERPOINT_ERROR404_TEXTO3'); ?> <a href="<?php echo $this->baseurl ?>" title="<?php echo $app->getCfg('sitename'); ?>"><?php echo JText::_('TPL_INTERPOINT_ERROR404_TEXTO4'); ?></a>.</p>
		
		<!-- Error 500 -->
		<?php elseif ($this->error->getCode() == 500) : 	?>
		
			<p><?php echo JText::_('TPL_INTERPOINT_ERROR500_TEXTO1'); ?></p>
			<p><?php echo JText::_('TPL_INTERPOINT_ERROR500_TEXTO2'); ?> <a href="<?php echo $this->baseurl ?>" title="<?php echo $app->getCfg('sitename'); ?>"><?php echo JText::_('TPL_INTERPOINT_ERROR500_TEXTO3'); ?></a>.</p>
			
			<div id="error_descripcion">
				<p><?php echo JText::_('TPL_INTERPOINT_ERROR500_TEXTO4'); ?>:</p>
				<p><?php echo $this->error->getMessage(); ?></p>
			</div>
		
		<?php endif; ?>
		
	</div>
  	<!-- Fin Error -->
  	
  	<!-- Comienzo Footer -->
  	<div id="footer" class="span-24">
  		<div id="legal" class="prepend-3 span-9">
  			&copy;<?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?>
  		</div>
  	</div>
  	<!-- Fin Footer -->
  	
  </div>
</body>

</html>