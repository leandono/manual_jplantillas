

index.php
---------

Al ser uno de los archivos más importantes, es fundamental entender las etiquetas que conforman al `index.php`. A continuación se mostrará el archivo completo para luego ir viendo en detalle cada sección que lo conforma.


~~~~~~~~~{.php .numberLines}
<?php
/**
 * @version    $Id: index.php 20196 2011-01-09 02:40:25Z ian $
 * @package    Joomla.Site
 * @copyright  Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/* The following line loads the MooTools JavaScript Library */
JHTML::_('behavior.framework', true);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
  <head>
    <!-- The following JDOC Head tag loads all the header and meta information from your site config and content. -->
    <jdoc:include type="head" />

    <!-- The following five lines load the Blueprint CSS Framework (http://blueprintcss.org). If you don't want to use this framework, delete these lines. -->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/screen.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/print.css" type="text/css" media="print" />
    <!--[if lt IE 8]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection" />
      <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/joomla-nav/screen.css" type="text/css" media="screen" />
      

    <!-- The following line loads the template CSS file located in the template folder. -->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />

    <!-- The following four lines load the Blueprint CSS Framework and the template CSS file for right-to-left languages. If you don't want to use these, delete these lines. -->
    <?php if($this->direction == 'rtl') : ?>
      <!--link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/rtl/screen.css" type="text/css" />
      <!--link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template_rtl.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <!-- The following line loads the template JavaScript file located in the template folder. It's blank by default. -->
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
  </head>
  <body>
    <div class="container">
      <hr class="space" />
      <div class="joomla-header span-16 append-1">
        <h1><?php echo $app->getCfg('sitename'); ?></h1>
      </div>
      <?php if($this->countModules('atomic-search')) : ?>
        <div class="joomla-search span-7 last">
             <jdoc:include type="modules" name="atomic-search" style="none" />
        </div>
      <?php endif; ?>
    </div>
    <?php if($this->countModules('atomic-topmenu')) : ?>
      <jdoc:include type="modules" name="atomic-topmenu" style="container" />
    <?php endif; ?>
        
    <div class="container">
      <div class="span-16 append-1">
      <?php if($this->countModules('atomic-topquote')) : ?>
        <jdoc:include type="modules" name="atomic-topquote" style="none" />
      <?php endif; ?>
        <jdoc:include type="message" />
        <jdoc:include type="component" />
        <hr />
      <?php if($this->countModules('atomic-bottomleft')) : ?>
         <div class="span-7 colborder">
          <jdoc:include type="modules" name="atomic-bottomleft" style="bottommodule" />
            </div>
          <?php endif; ?>
         
          <?php if($this->countModules('atomic-bottommiddle')) : ?>
        <div class="span-7 last">
              <jdoc:include type="modules" name="atomic-bottommiddle" style="bottommodule" />
        </div>
      <?php endif; ?>
      </div>
      <?php if($this->countModules('atomic-sidebar')) : ?>
        <div class="span-7 last">
              <jdoc:include type="modules" name="atomic-sidebar" style="sidebar" />
        </div>
      <?php endif; ?>
      
      <div class="joomla-footer span-16 append-1">
        <hr />
        &copy;<?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?>
      </div>
    </div>
  </body>
</html>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


**Sección 1**


~~~~~~~~~{.php .numberLines}
defined('_JEXEC') or die;
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


La línea indicada podrá encontrarla en muchos archivos fuente de Joomla. Se incorpora por motivos de seguridad, su objetivo es asegurar que el archivo PHP está siendo ejecutado dentro de la sesión y contexto del CMS (de forma tal que si un usuario quiere vulnerar el sitio ejecutando un archivo en particular, le sea difícil realizarlo).


>Más información sobre `JEXEC`: <http://docs.joomla.org/JEXEC>


**Sección 2**


~~~~~~~~~{.php .numberLines}
JHTML::_('behavior.framework', true);
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
	
Para crear varias funcionalidades JavaScript, Joomla utiliza el *framework* *[Mootools](http://mootools.net/)*. Dicho framework está compuesto por varios archivos `.js` que se cargan de forma predeterminada en la cabecera de la plantilla (`<head />`).
Al incorporar la línea mostrada con el argumento `true`, se especifica que también se cargue en la plantilla el archivo `mootools-more.js`, el cual posee diversas funciones que potencian aún más al framework JavaScript.


>Note que si quita la línea de código en `index.php`, Mootools seguirá cargandose en la plantilla.


>Más información sobre Mootools y Mootools More: <http://mootools.net/> y <http://mootools.net/more/>


**Sección 3**


~~~~~~~~~{.php .numberLines}
$app = JFactory::getApplication();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	
Esta línea guarda en la variable `$app` una referencia al objeto PHP de Joomla `JApplication`. Sin entrar en detalles técnicos, utilizando esta línea es posible obtener información del sitio para mostrar dentro de la plantilla (por ejemplo: nombre del sitio, título de la página, nombre del *template*, etc).


>Puede consultar la información relacionada con JApplication en <http://api.joomla.org/Joomla-Framework/Application/JApplication.html>


**Sección 4**


~~~~~~~~~{.php .numberLines}
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


El siguiente bloque de código declara el [tipo de documento](http://es.wikipedia.org/wiki/Declaraci%C3%B3n_de_tipo_de_documento) (`Doctype`) de la plantilla, así como también la codificación, idioma y [dirección de escritura](http://www.w3.org/International/tutorials/bidi-xhtml/Overview.es.php) (de izquierda a derecha o viceversa). `$this` es una referencia al objeto PHP de Joomla `JDocumentHTML`, el cual posee información necesaria para crear el documento HTML (archivos cargados, información de etiquetas meta, idioma, etc).


>Puede consultar la información relacionada a `JDocumentHTML` en <http://docs.joomla.org/JDocumentHTML>


**Sección 5**


~~~~~~~~~{.php .numberLines}
<jdoc:include type="head" />
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	
El código mostrado crea e incorpora las etiquetas necesarias para rellenar la cabecera de la plantilla:


* Etiqueta `<base />`;

* Etiquetas `<meta />`:

	* `content-type`;
	
	* `robots`;
	
	* `keywords`;
	
	* `rights`;
	
	* `language`;
	
	* `generator`;
	
* Etiqueta `<title />`;

* Etiquetas `<link />` para cargar estilos CSS predeterminados, *favicon* y *RSS*;

* Etiquetas `<script />` para cargar archivos y funciones JavaScript predeterminados.


A algunas etiquetas meta, Joomla permite desactivarlas o editarlas, mientras que a otras no. Por otro lado, dependiendo si se está utilizando una extensión, Joomla puede cargar más archivos CSS y JavaScript dentro de la cabecera.


**Sección 6**


~~~~~~~~~{.php .numberLines}
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/screen.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/print.css" type="text/css" media="print" />
<!--[if lt IE 8]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/joomla-nav/screen.css" type="text/css" media="screen" />
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


A continuación se incorporan los archivos pertenecientes al framework CSS *[Blueprint](http://www.blueprintcss.org/)*:


* **screen.css**: Posee estilos de reseteo, tipográficos, para formularios y para crear maquetaciones a través de grillas. Más adelante se explicará el funcionamiento de las grillas utilizando *Blueprint*;

* **print.css**: Estilos que mejoran el formateo del sitio al momento de imprimir;

* **ie.css**: Estilos específicos para *Internet Explorer*. La etiqueta `[if lt IE 8]` significa que el estilo se cargará únicamente para versiones anteriores a *Internet Explorer 8*;

* **/plugins/fancy-type/screen.css**: Incorpora algunos estilos extras para la manipulación de tipografías en textos;

* **/plugins/joomla-nav/screen.css**: Estilos específicos para el menú de navegación horizontal del sitio.


>Más adelante se explicará la utilización de *BluePrint*


En esta parte del código, `$this` se utiliza para completar el valor del atributo `href` hacia los archivos CSS: primero obteniendo la URL del sitio (`$this->baseurl`) y luego el nombre de la plantilla configurada para utilizar (`$this->template`).


**Sección 7**


~~~~~~~~~{.php .numberLines}
<?php if($this->direction == 'rtl') : ?>
	  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/rtl/screen.css" type="text/css" />
	  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template_rtl.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


El siguiente trozo de código tiene un solo objetivo: Leer la configuración del CMS y determinar la dirección de lectura. En caso que el valor sea `rtl` (de derecha a izquierda  ó *right to left* en inglés) se cargan los estilos apropiados.
Si el sitio tendrá un sentido de lectura de izquierda a derecha, este trozo de código se puede eliminar.

>Note que el bloque condicional `if` no tiene la sintaxis clásica que se suele utilizar:
>
>
~~~~~~~~~{.php .numberLines}
if () {
...
} else {
...
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
>
>
>Esto es porque se utiliza una sintaxis alternativa que permite mejorar la lectura del código y su funcionamiento es exactamente el mismo que la manera clásica. 
Más información: <http://www.php.net/manual/es/control-structures.alternative-syntax.php>


**Sección 8**


~~~~~~~~~{.php .numberLines}
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


La última línea de código incorporada dentro de la cabecera del sitio es la llamada hacia el archivo `template.js`. Si se revisa el archivo es posible notar que el mismo está vacio. La idea es que todas las funciones JavaScript que se quieran incorporar dentro de la plantilla sean incorporas allí dentro.

Al igual que con las llamadas a los archivos CSS, se utiliza `$this` para completar el atributo `src`, primero obteniendo la URL del sitio y luego el nombre de la plantilla utilizada.


**Sección 9**


~~~~~~~~~{.php .numberLines}
<div class="joomla-header span-16 append-1">
	  <h1><?php echo $app->getCfg('sitename'); ?></h1>
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Ya dentro del cuerpo del documento, entre etiquetas H1 se utiliza `$app` para mostrar el nombre del sitio. Dicho nombre es obtenido de la configuración del CMS.


**Sección 10**


~~~~~~~~~{.php .numberLines}
<?php if($this->countModules('atomic-search')) : ?>
	  <div class="joomla-search span-7 last">
			 <jdoc:include type="modules" name="atomic-search" style="none" />
	  </div>
<?php endif; ?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


El siguiente trozo de código se repite varias veces en el cuerpo del documento, por lo tanto es importante entender su funcionamiento:


* `$this->countModules()`: Esta función lo que hace es contar la cantidad de módulos publicados en una determinada posición de la plantilla. En el ejemplo mostrado, se pregunta cuantos módulos estan publicados en la posición `atomic-search`, en caso de ser igual o mayor a 1, se ejecuta el código siguiente. Esto se suele hacer para que no se muestre código HTML vacío en caso que un módulo no esté publicado (como es el caso de las etiquetas `<div />` en el código que se muestra.


>Más información sobre `countModules()`: <http://docs.joomla.org/JDocumentHTML/countModules>


* `<jdoc:include type="modules" name="" style="" />`: Representa una de las partes más importantes de la plantilla. Con esta directiva se indica la carga de un módulo en particular y de una manera especifica. Esto se establecerá a partir de dos atributos:

	* *name*: En este atributo se debe especificar el nombre de una posición determinada de la plantilla. Estas posiciones son especificadas en el archivo `templateDetails.xml` y su nombre debe ser único, sin espacios y lo suficiente descriptivo para entender que tipo de módulo debería ir en esa zona. Por ejemplo, el `atomic-search` indica que esa zona de la plantilla es adecuada para mostrar el buscador del sitio (sin embargo, esto no es obligatorio, es posible poner el módulo que se desee en dicha posición).
	
	* *style*:  En este atributo de especifica el estilo con que se quiere mostrar un módulo determinado. Dicho estilo no se refiere a CSS, sino a qué tipos de etiquetas HTML encerrarán al módulo y de qué manera. De forma predeterminada, Joomla! cuenta con seis estilos para mostrar un módulo:
	
		* xhtml: El módulo estará encerrado por solo una etiqueta `<div />` la cual tendrá como atributo la clase `moduletable+sufijo_del_modulo`.  El sufijo es un parametro que se puede especificar en cada módulo dentro del panel de administración y sirve basicamente para diferenciar en estilos CSS a los diferentes módulos.
		* rounded: El módulo estará encerrado dentro de 4 etiquetas `<div />`, las cuales permiten (añadiendo luego estilos CSS) un diseño con bordes redondeados al módulo; El primer `<div />` padre tendrá como atributo la clase `module+sufijo_del_modulo`.
		* table y horz: Utilizando cualquiera de estas dos formas, el módulo estará encerrado dentro de una tabla HTML.
		* none: El módulo aparecerá "en crudo", es decir, sin ningún tipo de etiquetas encerrándolo, solo el HTML que compone al mismo;
		* outline: Este estilo se suele utilizar para funciones de depuración. El mismo permite mostrar una linea punteada delimitando el tamaño del módulo para notar su tamaño y espacio ocupado en la plantilla.
		

>Puede encontrar más información sobre los diferentes estilos de presentación de módulos en <http://docs.joomla.org/What_is_module_chrome%3F>


A su vez, Joomla! permite incorporar estilos personalizados para mostrar módulos. Estos estilos deben ir especificados en el archivo `modules.php` dentro de la carpeta `html` de la plantilla.


>Más adelante se explicará como añadir diferentes estilos de presentación de módulos.


Los módulos no suelen ocupar posiciones principales de la plantilla, sino más bien son elementos funcionales al sitio: Menús de navegación, cajas de encuestas, formularios de ingreso, etc. La posición principal de la plantilla, por lo general, es ocupada por el contenido de los distintos componentes del CMS (artículos de noticias, seccciones y categorías, etc).

Otros trozos de código que incorporan posiciones de módulos en `index.php`:


~~~~~~~~~{.php .numberLines}
<?php if($this->countModules('atomic-topmenu')) : ?>
	<jdoc:include type="modules" name="atomic-topmenu" style="container" />
<?php endif; ?>
<?php if($this->countModules('atomic-topquote')) : ?>
	<jdoc:include type="modules" name="atomic-topquote" style="none" />
<?php endif; ?>
<?php if($this->countModules('atomic-bottomleft')) : ?>
	<div class="span-7 colborder">
		<jdoc:include type="modules" name="atomic-bottomleft" style="bottommodule" />
	</div>
<?php endif; ?>
<?php if($this->countModules('atomic-bottommiddle')) : ?>
	<div class="span-7 last">
		<jdoc:include type="modules" name="atomic-bottommiddle" style="bottommodule" />
	</div>
<?php endif; ?>
<?php if($this->countModules('atomic-sidebar')) : ?>
	<div class="span-7 last">
		<jdoc:include type="modules" name="atomic-sidebar" style="sidebar" />
	</div>
<?php endif; ?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Note que varios trozos de código utilizan estilos personalizados: container, bottommodule y sidebar. Más adelante se explicará la creación de estilos personalizados de módulos.


**Sección 11**


~~~~~~~~~{.php .numberLines}
<jdoc:include type="message" />
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Esta directiva debe aparecer sólo una vez en la plantilla. Se utiliza para mostrar diferentes mensajes del CMS (por ejemplo: cuando un usuario se registra en el sitio, el CMS le informa que el registro fué satisfactorio o erroneo). Dichos mensajes aparecen en la zona en donde se incorpore la directiva.


**Sección 12**


~~~~~~~~~{.php .numberLines}
<jdoc:include type="component" />
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Como se comentó anteriormente, el contenido de los componentes del CMS suelen ocupar la zona principal de la plantilla. Esta línea justamente tiene esa finalidad: permite mostrar el contenido del componente en que se este situado (artículos, categorías, formulario de registro, etc).

**Sección 13**


~~~~~~~~~{.php .numberLines}
<div class="joomla-footer span-16 append-1">
	<hr />
	&copy;<?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?>
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Finalmente, llegando al final del archivo, se incorporan una serie de etiquetas para mostrar el año presente y el nombre del sitio, formando un texto similar a: **® 2011 Mi Sitio Web**.

Lo siguiente a realizar es la modificación de `index.php` para crear una maquetación en base a las necesidades requeridas. Como se utilizará a `BluePrint` como herramienta, es necesario primero entender su funcionamiento.



********************************
