

Apéndice
--------

### Evitar que Mootools cargue de forma predeterminada

Existen ocasiones en que no se desea cargar a Mootools en la plantilla, ya sea porque se va a utilizar otra biblioteca JavaScript o porque se necesita agilizar la velocidad de la página reduciendo las peticiones a archivos que no se utilizan. 

Para quitar cualquier archivo .js se debe realizar lo siguiente:

En `index.php`, antes de la directiva `<jdoc:include type="head" />` insertar:


~~~~~~~~~{.php .numberLines}
<?php
unset($this->_scripts[$this->baseurl."/media/system/js/mootools-core.js"]);
unset($this->_scripts[$this->baseurl."/media/system/js/core.js"]);
unset($this->_scripts[$this->baseurl."/media/system/js/caption.js"]);
unset($this->_scripts[$this->baseurl."/media/system/js/mootools-more.js"]);
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	
En este caso, se estará eliminando de la plantilla los archivos `mootools-core.js`, `core.js`, `caption.js`, `mootools-more.js`. Algo a tener en cuenta es que Joomla (y muchas extensiones) suelen hacer uso de Mootools, por lo que realizar esta práctica puede traer problemas posteriores.



### Estilos determinados para diferentes navegadores

Un problema común al diseñar una página es tratar de hacer que el diseño sea compatible con la mayoría de los navegadores. Joomla! 1.6 posee una nueva característica que es la incorporación de estilos específicos dependiendo del tipo de navegador web. 

Suponiendo que se desea mostrar estilos diferentes para *Internet Explorer* y *Mozilla Firefox*, lo primero a realizar será crear dos archivos: `template_msie.css` y `template_mozilla.css`. El primero será el archivo que cargará *Internet Explorer*, mientras que el otro será el que cargue *Mozilla Firefox*. 

Luego, en el archivo `index.php` de la plantilla se incorpora:


~~~~~~~~~{.php .numberLines}
<?php
       $archivos = JHtml::_('stylesheet','templates/interpoint/css/template.css',null,false,true);
       if ($archivos):
               if (!is_array($archivos)):
                       $archivos = array($archivos);
               endif;
               foreach($archivos as $archivo):
?>
               <link rel="stylesheet" href="<?php echo $archivo;?>" type="text/css" />
<?php
                endforeach;
       endif;
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Antes de cargar el archivo correspondiente, Joomla comprueba que éste exista en el directorio web.


`JHtml` es la función que se encargará de detectar el tipo de navegador y cargará los archivos necesarios. Algo interesante es que además es posible cargar un archivo para una determinada versión de un navegador. Por ejemplo, si se desea establecer un estilo para `Internet Explorer 8`, el nombre del archivo debe ser `template_msie_8.css`. 


>Es posible encontrar más información sobre las diferentes variantes para cargar archivos específicos para un navegador en los comentarios de la función `stylesheet()` en el archivo `/libraries/joomla/html/html.php`.
>También podemos cargar archivos `.js` para distintos navegadores, pero en lugar de poner `stylesheet` como parámetro de `JHtml` debemos cambiarlo por `script`. 



### Detectar la página principal del sitio

Puede existir una situación en que se necesita detectar cuando el usuario se encuentra en la página principal del sitio. A través del siguiente código es posible realizarlo:


~~~~~~~~~{.php .numberLines}
<?php
$app        = JFactory::getApplication();
$menu        = $app->getMenu();
if (($menu->getActive() == $menu->getDefault()))
{
        //El usuario se encuentra en la página principal del sitio
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Más información sobre `getMenu()`: <http://docs.joomla.org/JApplication::getMenu>


### Detectar si un usuario está logueado en el sitio

Si se desea detectar si un usuario está (o no) logueado en el sitio, es posible realizarlo con este código:


~~~~~~~~~{.php .numberLines}
<?php
$usuario =& JFactory::getUser();
if ($usuario->guest == 1)
{
        //El usuario no está logueado en el sitio
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Más información sobre `getUser()`: <http://docs.joomla.org/Accessing_the_current_user_object>



### Detectar un componente determinado

Puede ocurrir que en algunas situaciones necesite detectar un componente determinado. Esto es posible realizarlo obteniendo el valor del parámetro `option` que se establece en la URL de la página:


~~~~~~~~~{.php .numberLines}
<?php
$componente = JRequest::getVar('option');
if ($componente == "com_content")
{
        //Se encuentra en el componente com_content
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


De la misma forma es posible obtener otros parámetros como son `ItemId`, `view`, etc.


>Más información sobre la obtención de variables por `POST` y `GET`: <http://docs.joomla.org/Retrieving_data_from_GET_and_POST_requests>

