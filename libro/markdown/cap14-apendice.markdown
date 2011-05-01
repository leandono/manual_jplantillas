

Apéndice
--------

### Evitar que Mootools cargue de forma predeterminada

Existen ocaciones en que no deseamos cargar a Mootools en nuestra plantilla, ya sea porque vamos a utilizar otra biblioteca JavaScript ó deseamos agilizar la página reduciendo las peticiones a archivos que no se utilizan. 

Para quitar cualquier archivo .js debemos realizar lo siguiente:

En `index.php`, ántes de la directiva `<jdoc:include type="head" />` insertamos:


~~~~~~~~~{.php .numberLines}
<?php
unset($this->_scripts[$this->baseurl."/media/system/js/mootools-core.js"]);
unset($this->_scripts[$this->baseurl."/media/system/js/core.js"]);
unset($this->_scripts[$this->baseurl."/media/system/js/caption.js"]);
unset($this->_scripts[$this->baseurl."/media/system/js/mootools-more.js"]);
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	
En este caso, estaremos eliminando de nuestra plantilla los archivos `mootools-core.js`, `core.js`, `caption.js`, `mootools-more.js`. Algo a tener en cuenta es que Joomla (y muchas extensiones) suelen hacer uso de Mootools, por lo que utilizar este método puede traer problemas posteriores.



### Estilos determinados para diferentes navegadores

Un problema común al diseñar una página es tratar de hacer que el diseño se vea igual en todos los navegadores. Joomla! 1.6 posee una nueva característica que es la incorporación de estilos específicos dependiendo del tipo de navegador web. 

Supongamos que tenemos nuestro archivo `template.css`. Pero además queremos que para *Internet Explorer* y *Mozilla Firefox* se muestren estilos diferentes. Lo primero que haremos será crear dos archivos: `template_msie.css` y `template_mozilla.css`. El primero será el archivo que cargará *Internet Explorer*, mientras que el otro será el que cargue *Mozilla Firefox*. 

Luego, en nuestra plantilla incorporamos:


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


>Ántes de cargar el archivo correspondiente, Joomla comprueba que este exista en el directorio web.


`JHtml` es la función que se encargará de detectar el tipo de navegador y cargará los archivos necesarios. Algo interesante es que además podemos cargar un archivo para una determinada versión de un navegador. Por ejemplo, si deseamos establecer un estilo para `Internet Explorer 8`, el nombre del archivo debe ser `template_msie_8.css`. 


>Podemos encontrar más información sobre las diferentes variantes para cargar archivos específicos para un navegador en los comentarios de la función `stylesheet()` en el archivo `/libraries/joomla/html/html.php`.
>También podemos cargar archivos `.js` para distintos navegadores, pero en lugar de poner `stylesheet` como parámetro de `JHtml` debemos cambiarlo por `script`. 



### Detectar la página principal del sitio

Pueden existir situaciones en que necesitamos detectar cuando estamos en la página principal del sitio. Estilo podemos hacer de forma simple a través del siguiente código:


~~~~~~~~~{.php .numberLines}
<?php
$app        = JFactory::getApplication();
$menu        = $app->getMenu();
if (($menu->getActive() == $menu->getDefault()))
{
        //Nos encontramos en la página principal del sitio
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Más información sobre `getMenu()`: <http://docs.joomla.org/JApplication::getMenu>


### Detectar si un usuario esta logueado en el sitio

Si deseamos detectar si un usuario esta (o no) logueado en el sitio, podemos hacerlo con este código:


~~~~~~~~~{.php .numberLines}
<?php
$usuario =& JFactory::getUser();
if ($usuario->guest == 1)
{
        //El usuario no esta logueado en el sitio
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Más información sobre `getUser()`: <http://docs.joomla.org/Accessing_the_current_user_object>



### Detectar un componente determinado

En algunas situaciones deseamos detectar un componente determinado. Esto lo podemos realizar obteniendo el valor del parámetro option que se establece en la URL de la página:


~~~~~~~~~{.php .numberLines}
<?php
$componente = JRequest::getVar('option');
if ($componente == "com_content")
{
        //Estamos en el componente com_content
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


De la misma forma podemos obtener otros parámetros como son `ItemId`, `view`, etc.


>Más información sobre la obtención de variables por `POST` y `GET`: <http://docs.joomla.org/Retrieving_data_from_GET_and_POST_requests>

