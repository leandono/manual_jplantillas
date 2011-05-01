

Personalización de las páginas de errores
-----------------------------------------

Una de los aspectos que menos solemos prestar atención al momento de crear un sitio son las páginas de errores. Estas son muy importantes, ya que, en caso de presentarse un error ante el usuario, debemos incentivarlo a que no abandone nuestra página y continue en ella.

Cada error va acompañado por un código de estado HTTP. Los tipos de errores más comunes son:


* **404 - Página no encontrada**: Sucede cuando el usuario quiere acceder a una página que no existe más;
* **500 - Error interno**: Sucede al existir un error interno del servidor web.


>Más información sobre los códigos de estado HTTP: <http://es.wikipedia.org/wiki/Anexo:C%C3%B3digos_de_estado_HTTP>


De forma predeterminada, la página de error 404 en Joomla posee el siguiente diseño:

![](../incluir/figuras/image36.png)

Como vemos, no posee un aspecto "muy amigable".

Lo que haremos es modificarlo para que herede el diseño del sitio. Para esto, debemos modificar el archivo `error.php` que se encuentra en la carpeta raiz de nuestra plantilla. Al abrirlo veremos lo siguiente:


~~~~~~~~~{.php .numberLines}
<?php
/**
* @version                $Id: error.php 20196 2011-01-09 02:40:25Z ian $
* @package                Joomla.Site
* @copyright        Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
* @license                GNU General Public License version 2 or later; see LICENSE.txt
*/
defined('_JEXEC') or die;
if (!isset($this->error)) {
        $this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
        $this->debug = false; 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
        <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
        <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/error.css" type="text/css" />
</head>
<body>
        <div class="error">
                <div id="outline">
                <div id="errorboxoutline">
                        <div id="errorboxheader"><?php echo $this->error->getCode(); ?> - <?php echo $this->error->getMessage(); ?></div>
                        <div id="errorboxbody">
                        <p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
                                <ol>
                                        <li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                                        <li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
                                        <li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
                                        <li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                                        <li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
                                        <li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
                                </ol>
                        <p><strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?>:</strong></p>
                                <ul>
                                        <li><a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></li>
                                </ul>
                        <p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
                        <div id="techinfo">
                        <p><?php echo $this->error->getMessage(); ?></p>
                        <p>
                                <?php if ($this->debug) :
                                        echo $this->renderBacktrace();
                                endif; ?>
                        </p>
                        </div>
                        </div>
                </div>
                </div>
        </div>
</body>
</html>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Vamos a borrar el contenido y cambiarlo por una estructura similar a la que tenemos en `index.php`.


>Es importante entender que `error.php` no funciona de forma exactamente igual a `index.php`. Por ejemplo, los parámetros de la plantilla se acceden de diferente forma, y no es posible insertar módulos y contenidos de la forma anteriormente vista (a través de la directiva `<jdoc:include />`).


~~~~~~~~~{.php .numberLines}
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
 
        <div id="header" class="span-24">
        
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
        
        <div id="error" class="span-18 push-3">
        
                <?php if ($this->error->getCode() ==404) :         ?>
                
                        <p>La página que esta buscando ya no se encuentra disponible.</p>
                        <p>Lo invitamos a realizar un busqueda...</p>
                        
                                <?php 
                                        $buscador = JModuleHelper::getModule( 'search' );
                                        echo JModuleHelper::renderModule( $buscador);        
                                ?>
                        
                        <p>ó ir a la <a href="<?php echo $this->baseurl ?>" title="<?php echo $app->getCfg('sitename'); ?>">página principal del sitio</a>.</p>
                
                <?php elseif ($this->error->getCode() ==500) :         ?>
                
                        <p>Un error desconocido ha ocurrido.</p>
                        <p>Mientras solucionamos el asunto, lo invitamos a continuar por la <a href="<?php echo $this->baseurl ?>" title="<?php echo $app->getCfg('sitename'); ?>">página principal del sitio</a>.</p>
                        
                        <div id="error_descripcion">
                                <p>Descripción del error:</p>
                                <p><?php echo $this->error->getMessage(); ?></p>
                        </div>
                
                <?php endif; ?>
                
        
        </div>
         
         <div id="footer" class="span-24">
                 <div id="legal" class="prepend-3 span-9">
                         &copy;<?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?>
                 </div>
         </div>
 
 </div>
</body>
</html>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Vamos a describir cada sección para entender lo que insertamos.

**Sección 1**


~~~~~~~~~{.php .numberLines}
<?php
defined('_JEXEC') or die;
$app = JFactory::getApplication();
$params = JFactory::getApplication()->getTemplate(true)->params;
//Parametros de la plantilla
$imagenLogo = $params->get('logo');
$eslogan = $params->get('eslogan');
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	

A igual que en `index.php`, vamos a necesitar acceder a las valores de los parámetros de la plantilla. Sin embargo, aquí lo hacemos de forma diferente, utilizando `getApplication()`, el cual posee el objeto PHP global de la aplicación.


>Más información sobre `getApplication`: <http://docs.joomla.org/JFactory::getApplication>


**Sección 2**


~~~~~~~~~{.php .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Luego, creamos el `Doctype` del documento, insertamos el título y los archivos CSS de nuestra plantilla. Los archivos JavaScript no son necesarios, por lo tanto no los incorporamos. 


>Notemos que utilizamos `$this->error->getCode()` para obtener el código del error actual de la página y así mostrarlo en el título de la página.


**Sección 3**


~~~~~~~~~{.php .numberLines}
<body>
<div class="container">
 
        <div id="header" class="span-24">
        
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Para la cabecera, solo mostraremos el logo de nuestro sitio y lo alinearemos en el centro.

**Sección 4**


~~~~~~~~~{.php .numberLines}
<div id="error" class="span-18 push-3">

        <?php if ($this->error->getCode() == 404) :         ?>
        
                <p>La página que esta buscando ya no se encuentra disponible.</p>
                <p>Lo invitamos a realizar una búsqueda...</p>
                
                        <?php 
                                $module = JModuleHelper::getModule( 'search' );
                                echo JModuleHelper::renderModule( $module);        
                        ?>
                
                <p>ó ir a la <a href="<?php echo $this->baseurl ?>" title="<?php echo $app->getCfg('sitename'); ?>">página principal del sitio</a>.</p>
        
        <?php elseif ($this->error->getCode() == 500) :         ?>
        
                <p>Un error desconocido ha ocurrido.</p>
                <p>Mientras solucionamos el asunto, lo invitamos a continuar por la <a href="<?php echo $this->baseurl ?>" title="<?php echo $app->getCfg('sitename'); ?>">página principal del sitio</a>.</p>
                
                <div id="error_descripcion">
                        <p>Descripción del error:</p>
                        <p><?php echo $this->error->getMessage(); ?></p>
                </div>
        
        <?php endif; ?>
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Esta es la parte más importante. Tenemos dos bloques condicionales:


* En caso que la página sea no encontrada (404), mostramos un mensaje conveniente e invitamos al usuario a realizar una búsqueda o continuar por la página principal del sitio. Algo importante es que la caja de búsqueda la insertamos a través de la directiva `JModuleHelper::getModule()` la cual entre parentesis se le indica el tipo de módulo a mostrar (en este caso `search`).


>Más información sobre getModule: <http://docs.joomla.org/JModuleHelper::getModule>


* En caso que la página posea un error interno (500), también mostramos un mensaje conveniente invitando al usuario a continuar por la página principal. Por otro lado, para tener de referencia, mostramos el tipo de error que se produjo a través de la directiva `$this->error->getMessage()`.

**Sección 5**


~~~~~~~~~{.php .numberLines}
	<div id="footer" class="span-24">
	     <div id="legal" class="prepend-3 span-9">
	             &copy;<?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?>
	     </div>
	</div>

</div>
</body>
</html>	
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Una buena práctica sería no incorporar los textos en nuestro idioma dentro del archivo, sino utilizar los archivos de lenguajes de la plantilla. Esto lo podemos realizar una vez que hemos comprobado que los textos son los correctos.


El documento lo terminamos mostrando, en el pie, el nombre del sitio y el año corriente.

Por otro lado, debemos escribir algunos estilos CSS para los elementos de la página de error. En template.css incorporamos:


~~~~~~~~~{.css .numberLines}
/* Páginas de error
---------------------------------------------------------*/
#error {
        text-align: center;
        padding: 50px 0;
}

#error p{
        font-size: 25px;
        margin: 0;
}

#error input{
        font-size: 25px;
        border: 5px solid #ccc;
}

#error_descripcion{
        border: 1px solid #CCC;
        margin: 20px 0;
}

#error_descripcion p{
        font-size: 9px;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Nuestra página de error 404 personalizada quedará con el siguiente diseño:

![](../incluir/figuras/image47.png)

Mientras que la página de error 500 quedará así:

![](../incluir/figuras/image31.png)

Como podemos ver, dentro de un recuadro queda el error de la página para tener luego de referencia.

