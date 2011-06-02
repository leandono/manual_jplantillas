

Temas avanzados
---------------

### Estilos de plantillas, parámetros de configuración y maquetaciones diferentes por secciones

Como se comentó la principio del manual, Joomla! 1.6 posee una nueva funcionalidad llamada estilos de plantillas. Dichos estilos permiten, a través de parámetros de configuración, variar el diseño de la plantilla en varios aspectos: colores, imágenes, maquetación, tamaños, etc. A su vez cada estilo puede ser asignado a una o varias secciones especificas.

![](incluir/figuras/image44.png)


>Recuerde que el listado de estilos de plantillas se puede encontrar yendo, en la administración, a Extensiones → Gestor de plantillas. Al ingresar a alguno de los items enlistados se pueden visualizar los parámetros disponibles para configurar y a que secciones aplicarlos.


En el caso de la plantilla creada de ejemplo, se le añadirán varios parámetros de configuración para poder:


* Cambiar la imagen del logotipo;

* Cambiar el texto del eslogan;

* Aplicar una maquetación diferente.


#### Cambiar la imagen del logo

**Modificación de templateDetails.xml**

Los parámetros de configuración de la plantilla se agregan en el archivo `templateDetails.xml` añadiendo las etiquetas que se muestran a continuación:


~~~~~~~~~{.xml .numberLines}
<config>
   <fields name="params">
		   <fieldset name="advanced">
				   <field name="logo" type="media"
						   label="TPL_INTERPOINT_LOGO_LABEL" description="TPL_INTERPOINT_LOGO_DESC" />
		   </fieldset>
   </fields>
</config>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
Como se muestra, la etiqueta más importante es `<field />`. Dicha etiqueta posee los siguientes atributos:


* `name`: Debe ser un nombre único, a través del cual se hará referencia al parámetro para obtener su valor;

* `type`: El tipo de campo, el cual puede ser de varios tipos: `text` (campo de texto), `list` (lista de opciones), `media` (campo con selección de archivo);

* `label`: Será el nombre resumido que acompaña al campo cuando sea mostrado desde la administración;

* `description`: La descripción será la explicación del campo.


>Note que para los atributos `label` y `description` se utiliza `TPL_INTERPOINT_LOGO_LABEL` y `TPL_INTERPOINT_LOGO_DESC`. Estas dos referencias se deben agregar en el archivo `es-ES.tpl_interpoint.ini` junto a los textos correspondientes.


![](incluir/figuras/image49.png)


Por lo tanto, `templateDetails.xml` quedará de la siguiente manera:


~~~~~~~~~{.xml .numberLines}
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE install PUBLIC "-//Joomla! 1.6//DTD template 1.0//EN" "http://www.joomla.org/xml/dtd/1.6/template-install.dtd">
<extension
  version="1.6"
  type="template"
  client="site">
  <name>InterPoint</name>
  <creationDate>2011</creationDate>
  <author>Comunidad Joomla</author>
  <authorEmail>contacto@comunidadjoomla.org</authorEmail>
  <authorUrl>http://www.comunidadjoomla.org/</authorUrl>
  <copyright>Comunidad Joomla 2011</copyright>
  <license>GNU General Public License version 2</license>
  <version>1.0</version>
  <description>TPL_INTERPOINT_XML_DESCRIPTION</description>
  <files>
		  <folder>html</folder>
		  <folder>css</folder>
		  <folder>images</folder>
		  <folder>language</folder>
		  <folder>js</folder>
		  <filename>index.php</filename>
		  <filename>index.html</filename>
		  <filename>favicon.ico</filename>
		  <filename>templateDetails.xml</filename>
		  <filename>template_preview.png</filename>
		  <filename>template_thumbnail.png</filename>
		  <filename>component.php</filename>
		  <filename>error.php</filename>
  </files>
  <positions>
		  <position>interpoint-menu_ingresar</position>
		  <position>interpoint-menu_superior</position>
		  <position>interpoint-destacado_superior</position>
		  <position>interpoint-video</position>
		  <position>interpoint-caja_medio</position>
		  <position>interpoint-destacado_inferior</position>
		  <position>interpoint-slideshow_inferior</position>
		  <position>interpoint-menu_inferior</position>
  </positions>
  <languages folder="language">
		  <language tag="es-ES">es-ES/es-ES.tpl_interpoint.ini</language>
		  <language tag="es-ES">es-ES/es-ES.tpl_interpoint.sys.ini</language>
  </languages>
  
   <config>
		   <fields name="params">
				   <fieldset name="advanced">
						   <field name="logo" type="media"
								   label="TPL_INTERPOINT_LOGO_LABEL" description="TPL_INTERPOINT_LOGO_DESC" />
				   </fieldset>
		   </fields>
   </config>
</extension>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


**Modificación del index.php**

En `index.php` lo primero que se hará es declarar una variable para guardar el valor del parámetro que queremos obtener. Esto es posible realizarlo dentro de las etiquetas PHP que se encuentran al principio del documento:


~~~~~~~~~{.php .numberLines}
<?php

defined('_JEXEC') or die;

JHTML::_('behavior.framework', true);

$app = JFactory::getApplication();

//Parametros de la plantilla
$imagenLogo = $this->params->get('logo');

?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Como puede ver, los parámetros se obtienen a través de `$this->params->get()` pasando como argumento el nombre del parámetro a obtener (en este caso el parámetro `logo`).
Luego, antes del cierre de la etiqueta `<head />`  se incorpora:


~~~~~~~~~{.php .numberLines}
<?php if($imagenLogo) : ?>
 
    <style type="text/css">
    
            #logo h1{
                    background: transparent url(<?php echo $imagenLogo; ?>) no-repeat left top;
            }
    
    </style>
    
<?php endif; ?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


De modo que, si se configuró el parámetro, se añada un estilo que sobrescriba el establecido en `template.css` y agregue la nueva imagen del logo en el diseño:

![](incluir/figuras/image41.png)

La cabecera del archivo `index.php` queda de la siguiente forma:


~~~~~~~~~{.php .numberLines}
<?php

defined('_JEXEC') or die;

JHTML::_('behavior.framework', true);

$app = JFactory::getApplication();

//Parametros de la plantilla
$imagenLogo = $this->params->get('logo');

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

~~~~~~~~~~~~~~~~~~~~~~~~~~~~


#### Cambiar el texto del eslogan

Siguiendo los mismos pasos anteriores, se modifica `templateDetails.xml` añadiendo un nuevo parámetro:


~~~~~~~~~{.xml .numberLines}
<config>
   <fields name="params">
           <fieldset name="advanced">
                   <field name="logo" type="media"
                           label="TPL_INTERPOINT_LOGO_LABEL" description="TPL_INTERPOINT_LOGO_DESC" />
                           
                   <field name="eslogan"  type="text" default=""
                           label="TPL_INTERPOINT_ESLOGAN_LABEL"
                           description="TPL_INTERPOINT_ESLOGAN_DESC"
                           filter="string" />
           </fieldset>
   </fields>
</config>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Notae que se añadieron dos nuevos atributos: 
>* `default`: Será el valor predeterminado en caso que el campo esté imcompleto;
>* `filter`: Este permite especificar el tipo de información que se espera en el campo (`string`, `word`, `integer`);


![](incluir/figuras/image24.png)

Luego, en `index.php`, se agrega una nueva llamada para obtener el parámetro `eslogan`:


~~~~~~~~~{.php .numberLines}
<?php

defined('_JEXEC') or die;

JHTML::_('behavior.framework', true);

$app = JFactory::getApplication();

//Parametros de la plantilla
$imagenLogo = $this->params->get('logo');
$eslogan = $this->params->get('eslogan');

?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Y se modifica la maquetación correspondiente a la zona del logotipo con lo siguiente:


~~~~~~~~~{.php .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Si se configuró el parámetro `eslogan`, se muestra el texto correspondiente, caso contrario se muestra el predeterminado.
  
![](incluir/figuras/image18.png)
  
  
  
#### Aplicar una maquetación diferente
  
La idea de esta configuración es poder predisponer de dos presentaciones distintas para mostrar en la parte central de la plantilla:
  
  	
* Una columna, como es actualmente (recordar que en apariencia son tres columnas debido a que se configuró a Joomla para que muestre los artículos de esa forma, pero la maquetación sigue siendo de una sola columna);

* Dos columnas, para poder mostrar los contenidos en un formato del tipo blog: una columna central con los artículos y otra complementaria para mostrar módulos adicionales.


Por lo tanto, al igual que antes, se modifica `templateDetails.xml`:


~~~~~~~~~{.xml .numberLines}
<config>
	<fields name="params">
	       <fieldset name="advanced">
	               <field name="logo" type="media"
	                       label="TPL_INTERPOINT_LOGO_LABEL" description="TPL_INTERPOINT_LOGO_DESC" />
	                       
	               <field name="eslogan"  type="text" default=""
	                       label="TPL_INTERPOINT_ESLOGAN_LABEL"
	                       description="TPL_INTERPOINT_ESLOGAN_DESC"
	                       filter="string" />
	               <field name="maquetacion" type="list" default="1"
	                       label="TPL_INTERPOINT_MAQUETACION_LABEL"
	                       description="TPL_INTERPOINT_MAQUETACION_DESC"
	                       filter="integer"
	               >
	                       <option value="1">TPL_INTERPOINT_OPCION_1COLUMNA</option>
	                       <option value="2">TPL_INTERPOINT_OPCION_2COLUMNAS</option>
	               
	               </field>
	       </fieldset>
	</fields>
</config>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Note que el parámetro, al ser del tipo lista, necesita tener definidas las opciones que se podrán seleccionar.


![](incluir/figuras/image03.png)

En `index.php` se agrega nuevamente una variable que obtenga el valor del parámetro `maquetacion`:


~~~~~~~~~{.php .numberLines}
<?php

defined('_JEXEC') or die;

JHTML::_('behavior.framework', true);

$app = JFactory::getApplication();

//Parametros de la plantilla
$imagenLogo = $this->params->get('logo');
$eslogan = $this->params->get('eslogan');
$maquetacion = $this->params->get('maquetacion');

?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Luego, dentro del cuerpo del documento se agrega una nueva maquetación y posición de módulos:


~~~~~~~~~{.php .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


En caso que se haya seleccionado la opción “1 columna”, se muestra el contenido en una maquetación de una sola columna. Caso contrario, se muestra una maquetación de dos columnas.


>Note que se agregó una nueva posición de módulo: `interpoint-columna_derecha`. Esta deber ser agregada además en `templateDetails.xml` y la referencia de su descripción en `es-ES.tpl_interpoint.sys.ini`.


Para poder aplicar la nueva maquetación en el sitio utilizando los estilos de plantillas, se debe:


* En la administración, ir al gestor de estilos de plantillas;
* Duplicar el estilo predeterminado para el sitio;
* Acceder a esta copia, cambiar la opción de maquetación y decidir a que items del menú desea ver el nuevo diseño.


Por ejemplo, si se selecciona asignar el nuevo diseño a una categoría dada, al ingresar a un articulo de esa categoría se visualizará:

![](incluir/figuras/image10.png)

Si se despublican los módulos superiores e inferiores y se asignan algunos en la columna derecha:

![](incluir/figuras/image23.png)

Agregando algunos estilos en `template.css` es posible mejorar el diseño:


~~~~~~~~~{.css .numberLines}
/* Columna izquierda
---------------------------------------------------------*/
#columna_izquierda{
   margin: 50px 0 0 0;
}

#columna_izquierda h2 a {
   color: #035F88;
   font-family: "Myriad Pro",Arial,Helvetica,sans-serif;
   font-size: 35px;
   font-weight: 600;
   text-decoration: none;
}

#columna_izquierda h2 a:hover{
   text-decoration: underline;
}

#columna_izquierda .article-info{
   background: #D9EEF7;
   color: #181818;
   font-size: 13px;
   margin: 0 0 20px 0;
   padding: 10px;
}


/* Columna derecha
---------------------------------------------------------*/
#columna_derecha{
   margin: 50px 0 0 0;
}


/* Modulos derechos
---------------------------------------------------------*/
#columna_derecha .moduletable{
   margin: 0 0 30px 0;
}

#columna_derecha h3{
   color: #035F88;
   font-family: "Myriad Pro",Arial,Helvetica,sans-serif;
   font-size: 20px;
   font-weight: 600;
   margin: 0 0 10px 0;
}

#columna_derecha .moduletable ul{
   list-style: none;
   padding: 0;
}

#columna_derecha .search .inputbox{
   font-size: 14px;
   padding: 5px;
}

#columna_derecha .mostread a{
   display: block;
   text-decoration: none;
   border-bottom: 1px solid #CCC;
   padding: 0 0 5px 0;
   color: #3C8203;
}

#columna_derecha .mostread a:hover{
   text-decoration: underline;
}

#columna_derecha #modlgn_username, #columna_derecha #modlgn_passwd{
   width: 100%;
}


/* Paginacion
---------------------------------------------------------*/
.pagenav, .pagination{
   list-style: none;
   text-align: center;
   margin: 20px 0;
}

.pagenav li, .pagination li{
   display: inline-block;
   margin: 0 10px;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Quedando finalmente:

![](incluir/figuras/image40.png)

Como se puede ver, los estilos en plantillas son una opción interesante que le otorgan flexibilidad a la plantilla, permitiendo cambiar su diseño ante distintas situaciones.



********************************
