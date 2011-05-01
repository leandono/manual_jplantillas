

Temas avanzados
---------------

### Estilos de plantillas, parámetros de configuración y maquetaciones diferentes por secciones

Como hablamos anteriormente, Joomla! posee una nueva funcionalidad llamada estilos de plantillas. Los estilos permiten, a través de parámetros de configuración, variar el diseño de la plantilla en varios aspectos: colores, imagenes, maquetación, tamaños, etc. A su vez cada estilo puede ser asignado a una o varias secciones especificas.

![](../incluir/figuras/image44.png)


>Recordemos que el listado de estilos de plantillas se puede encontrar llendo, en la administración, a Extensiones → Gestor de plantillas. Al ingresar a alguno de los items enlistados se puede visualizar los paramétros disponibles para configurar y a que secciones aplicarlos.


En el caso de nuestra plantilla que hemos creado de ejemplo, vamos a añadirle varios parámetros e configuración para poder:


* Cambiar la imagen del logo;

* Cambiar el texto del eslogan;

* Aplicar una maquetación diferente.


#### Cambiar la imagen del logo

**Modificación de templateDetails.xml**

Los parámetros de configuración de la plantilla se agregan en el archivo templateDetails.xml añadiendo las etiquetas que se muestran a continuación:


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
	
Como se muestra, la etiqueta más importante `<field />`. Dicha etiqueta posee los siguientes atributos:


* `name`: Debe ser un nombre único, a través el cual se hará referencia al parámetro para obtener su valor;

* `type`: El tipo de campo, el cual puede ser de varios tipos: text (campo de texto), list (lista de opciones), media (campo con selección de archivo);

* `label`: Será el nombre resumido que acompaña al campo cuando sea mostrado desde la administración;

* `description`: La descripción será la explicación para que sirve dicho campo.


>Notemos que para los atributos `label` y `description` se utiliza `TPL_INTERPOINT_LOGO_LABEL` y `TPL_INTERPOINT_LOGO_DESC`. Estas dos referencias se deben agregar en el archivo `es-ES.tpl_interpoint.ini` junto a los textos correspondientes.


![](../incluir/figuras/image49.png)


Por lo tanto, templateDetails.xml quedará de la siguiente forma:


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


**Modificación de index.php**

En `index.php` lo primero que haremos será declarar una variable y guardar el valor del parámetro que queremos obtener en dicha variable. Esto lo podemos hacer dentro de las etiquetas PHP que se encuentran al principio del documento:


~~~~~~~~~{.php .numberLines}
<?php
defined('_JEXEC') or die;
JHTML::_('behavior.framework', true);
$app = JFactory::getApplication();
//Parametros de la plantilla
$imagenLogo = $this->params->get('logo');
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Como podemos ver, los parámetros se obtienen a través de `$this->params->get()` pasando como argumento el nombre del parámetro que queremos obtener (en este caso el parámetro logo).
Luego, antes del cierre de la etiqueta `<head />`  incorporamos:


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

![](../incluir/figuras/image41.png)

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

Podemos seguir los mismos pasos anteriores, primero modificamos `templateDetails.xml` añadiendo un nuevo parámetro:


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


>Notemos que se añadieron dos nuevos atributos: 
>* `default`: Será el valor predeterminado en caso que el campo esté imcompleto;
>* `filter`: Este permite especificar el tipo de información que se espera en el campo (`string`, `word`, `integer`);


![](../incluir/figuras/image24.png)

Luego, en `index.php`, agregamos una nueva llamada para obtener el parámetro eslogan:


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


Y en la maquetación correspondiente a la zona del logo cambiamos lo siguiente:


~~~~~~~~~{.php .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


* Una columna, como es ahora (recordemos que en apariencia son tres columnas debido a que se configuró a Joomla para que muestre los artículos de esa forma, pero la maquetación sigue siendo de una sola columna);

* Dos columnas, para poder mostrar los contenidos en un formato del tipo blog: una columna central con los artículos y otra complementaria para mostrar módulos adicionales.

Lo que se hiso fue: si se configuró el parámetro eslogan, se muestra el texto correspondiente, caso contrario se muestre el predeterminado.
  
![](../incluir/figuras/image18.png)
  
  
  
#### Aplicar una maquetación diferente
  
La idea de esta configuración es poder tener dos presentaciones distintas para mostrar en la parte central de la plantilla:
  
  	
* Una columna, como es ahora (recordemos que en apariencia son tres columnas debido a que se configuró a Joomla para que muestre los artículos de esa forma, pero la maquetación sigue siendo de una sola columna);

* Dos columnas, para poder mostrar los contenidos en un formato del tipo blog: una columna central con los artículos y otra complementaria para mostrar módulos adicionales.


Por lo tanto, al igual que antes, modificamos nuevamente `templateDetails.xml`:


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


>Notemos que el parámetro, al ser del tipo lista, necesita tener definidas las opciones que se podran seleccionar.


![](../incluir/figuras/image03.png)

En `index.php` vamos a tener que agregar nuevamente una variable que obtenga el valor del parámetro:


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


Luego, dentro del cuerpo del documento agregamos una nueva maquetación y posición de módulos:


~~~~~~~~~{.php .numberLines}
<?php if($maquetacion == 1) : ?>

	<div id="contenido" class="span-24">
		<jdoc:include type="component" />
	</div>
	
<?php else : ?>    
	
	<div id="columna_izquierda" class="span-17 append-1">
		<jdoc:include type="component" />
	</div>
	
	<div id="columna_derecha" class="span-6 last">
		<jdoc:include type="modules" name="interpoint-columna_derecha" style="xhtml" />
	</div>

<?php endif; ?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


La lógica es: En caso que se haya seleccionado la opción “1 columna”, se muestra el contenido en una maquetación de una sola columna. Caso contrario, mostramos una maquetación de dos columnas.


>Notemos que se agregó una nueva posición de módulo: `interpoint-columna_derecha`. Esta deber ser agregada además en `templateDetails.xml` y la referencia de su descripción en `es-ES.tpl_interpoint.sys.ini`.


Para poder aplicar la nueva maquetación en nuestro sitio, deberemos:


* En la administración, ir al gestor de estilos de plantillas;
* Duplicar el estilo predeterminado para el sitio;
* Acceder a esta copia, cambiar la opción de maquetación y decidir a que items del menú se desea ver el nuevo diseño.


Por ejemplo, si seleccionamos que queremos asignar el nuevo diseño a una categoría dada, al ingresar a un articulo de esa categoría veremos:

![](../incluir/figuras/image10.png)

Si despublicamos los módulos superiores e inferiores y asignamos algunos en la columna derecha tendremos:

![](../incluir/figuras/image23.png)

Lo cual no esta mal, pero podemos mejorar el diseño agregando algunos estilos en `template.css`:


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

![](../incluir/figuras/image40.png)

Como podemos ver, los estilos en plantillas son una opción interesante que le otorgan flexibilidad a la plantilla, permitiendo cambiar su diseño ante distintas situaciones.

