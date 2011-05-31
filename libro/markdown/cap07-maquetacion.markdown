

Maquetación del diseño
----------------------

Ya explicado el sistema de grillas de BluePrint, se comenzará la modificación del `index.php` para agregar la maquetación del diseño.


**Modificaciones en `<head />`**

El `<header />` quedará prácticamente igual a como estaba antes, con algunas modificaciones:


* Se eliminan algunos comentarios y se agregan otros;

* Se quitan las llamadas a los estilos `/plugins/fancy-type/screen.css` y `/plugins/joomla-nav/screen.css` ya que no se utilizarán;

* También se eliminan las llamadas a los estilos utilizados para adaptar los textos al sentido de lectura de derecha a izquierda (*RTL*).


~~~~~~~~~{.php .numberLines}
<?php
defined('_JEXEC') or die;
JHTML::_('behavior.framework', true);
$app = JFactory::getApplication();
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
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>  
</head>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


**Maquetación de la parte superior**

![](incluir/figuras/image01.png)

Dentro del cuerpo del documento, la sección superior se dividirá en dos columnas: una dedicada al logo y otra dedicada a los dos menús:


~~~~~~~~~{.php .numberLines}
<body>
	<div class="container">
	  	<!-- Comienzo header -->
		<div id="header" class="span-24">
			
			<!-- Comienzo Logo -->
			<div id="logo" class="span-9">
				<a href="<?php echo $this->baseurl ?>" title="<?php echo $app->getCfg('sitename'); ?>">
					<h1><?php echo $app->getCfg('sitename'); ?></h1>
				</a>
				<h2 id="eslogan">Lorem ipsum dolor sit amet</h2>
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
	</div>
</body>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


**Maquetación del texto superior, video y caja destacada**

![](incluir/figuras/image17.png)

En esta sección se tendrá en primer lugar dos columnas y luego una columna ocupando el total del espacio:


~~~~~~~~~{.php .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	
>Note que se ha agregado `<jdoc:include type="message" />` para que aparezcan los mensajes del sistema debajo de cabecera del diseño.


**Maquetación de las columnas del medio**

![](incluir/figuras/image08.png)

Las columnas del medio cargaran tres artículos publicados en el home del sitio. Para eso se utilizará la etiqueta `<jdoc:include type="component" />`:


~~~~~~~~~{.php .numberLines}
<!-- Comienzo Contenido principal -->
<div id="contenido" class="span-24">
	<jdoc:include type="component" />
</div>
<!-- Fin Contenido principal -->
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Para hacer que cada artículo ocupe una columna, en la administración del CMS, ir a **Menús → Menú principal** y luego acceder al ítem que se tenga marcado como página de Inicio:

![](incluir/figuras/image06.png)

En la columna derecha, en el apartado **Opciones de presentación** establecer los siguientes valores:

![](incluir/figuras/image45.png)

De esta forma se hará que se muestren, como máximo, tres artículos, separados cada uno en columnas. Al mostrar dichos artículos, el HTML generado por el CMS será:


~~~~~~~~~{.php .numberLines}
<div class="span-24" id="contenido">

	<div class="blog-featured">
	
		<div class="items-leading">

			<div class="leading-0">

				<h2>
					<a href="#link">Título del artículo 1</a>
				</h2>

				<p>Texto del artículo 1...</p>

				<p class="readmore">
					<a href="#link">Leer más...</a>
				</p>

				<div class="item-separator"></div>

			</div>


			<div class="leading-1">

				<h2>
					<a href="#link">Título del artículo 2</a>
				</h2>

				<p>Texto del artículo 2...</p>

				<p class="readmore">
					<a href="#link">Leer más...</a>
				</p>

				<div class="item-separator"></div>

			</div>


			<div class="leading-2">

				<h2>
					<a href="#link">Título del artículo 3</a>
				</h2>

				<p>Texto del artículo 3...</p>

				<p class="readmore">
					<a href="#link">Leer más...</a>
				</p>

				<div class="item-separator"></div>

			</div>
		
		</div>
		
	</div>
	
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Por lo tanto, Joomla se encarga de generar el HTML que necesitamos para poder lograr las columnas del medio.


>Otra solución para generar tres columnas sería utilizar tres módulos separados y crear por nuestra cuenta el HTML de cada columna.


**Maquetación del texto destacado inferior y slideshow**

![](incluir/figuras/image27.png)

Para la siguiente parte del diseño, se crearán dos columnas, una para el texto destacado y otra para la zona del slideshow.


~~~~~~~~~{.php .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Dentro del `<div />` que va a contener el slideshow, se han agregado dos etiquetas `<span />` que servirán para construir la navegación entre imágenes.


**Maquetación del footer y zona inferior**

![](incluir/figuras/image16.png)

Finalmente para esta zona también se utilizarán dos columnas, una para el texto legal y otra para el menú inferior:


~~~~~~~~~{.php .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Note que además de las clases span-8 se utilizó prepend-3 para mover el contenido de las columnas hacia la derecha en cada columna.


Si se juntan todas las partes, el archivo `index.php` quedará conformado de la siguiente forma:


~~~~~~~~~{.php .numberLines}
<?php
defined('_JEXEC') or die;
JHTML::_('behavior.framework', true);
$app = JFactory::getApplication();
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
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
		 
</head>
<body>
	<div class="container">
	  	<!-- Comienzo header -->
		<div id="header" class="span-24">
			
			<!-- Comienzo Logo -->
			<div id="logo" class="span-9">
				<a href="<?php echo $this->baseurl ?>" title="<?php echo $app->getCfg('sitename'); ?>">
					<h1><?php echo $app->getCfg('sitename'); ?></h1>
				</a>
				<h2 id="eslogan">Lorem ipsum dolor sit amet</h2>
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
		
		<!-- Comienzo Contenido principal -->
		<div id="contenido" class="span-24">
			<jdoc:include type="component" />
		</div>
		<!-- Fin Contenido principal -->
		
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Si se observa al sitio, se visualizará algo parecido a:

![](incluir/figuras/image33.png)


>En caso de no tener ningún artículo publicado en la página de inicio, la parte del centro aparecerá vacía.



********************************
