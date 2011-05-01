

Personalización de módulos y componentes
----------------------------------------

### Extensiones desarrolladas en MVC

Desde la versión 1.5, Joomla permite la sobrescritura del HTML que posean módulos y componentes, otorgándonos mucho más control sobre lo que queremos que se visualice en nuestro sitio, sin tener que modificar archivos del núcleo de dichas extensiones ó del mismo CMS.

Para poder sobrescribir la estructura HTML que posea una extensión, es requisito que esta esté creada utilizando el patrón de arquitectura MVC (Modelo-Vista-Controlador).

Desde el punto de vista del usuario común, no existe una forma automática de saber si una extensión utiliza MVC. La única manera de saberlo es llendo a la carpeta de dicha extensión y mirando sus estructura de carpetas y archivos. Por ejemplo, los componentes creados con MVC suelen tener una estructura así: 

![](../incluir/figuras/image43.png)

En donde encontraremos una carpeta llamada `controllers`, otra llamada `models` y otra llamada `views`. Es esta última carpeta la que nos interesa, ya que en ella se encuentran carpetas y archivos que utilizaremos como base para personalizar el HTML del componente.

Por otro lado, los módulos desarrollados en MVC tienen este aspecto:

![](../incluir/figuras/image35.png)

En este caso, la carpeta que nos interesa es `tmpl`, ya que, al igual que la carpeta `views` (en el caso de componentes), posee archivos que se utilizaran para personalizar a nuestro gusto el módulo.


>En Joomla, los archivos que componen cada componente pueden encontrarse dentro de la components, en el directorio raiz del CMS. Allí cada componente esta separado por carpetas diferentes (`com_banners`, `com_contact`, etc).
>En el caso de los módulos, estos se encuentran en la carpeta `modules`, también en el directorio raiz del CMS. Y al igual que el caso anterior, cada módulo esta separado en una carpeta diferente (`mod_articles_archive`, `mod_articles_categories`, etc). 


>Si desea conocer un poco más sobre MVC puede consultar: <http://es.wikipedia.org/wiki/Modelo_Vista_Controlador> <http://docs.joomla.org/MVC>


Tanto la personalización de módulos, como de componentes, se trabajan dentro de la carpeta `html` de nuestra plantilla.



### Módulos personalizados

Vamos a comenzar por la personalización del HTML de módulos. En este aspecto, podremos adaptar a nuestras necesidades:


* La forma con que se muestra el módulo: Anteriormente, al analizar las secciones que componen a `index.php`, se explicó que los diferentes módulos se pueden cargar de diferentes formas con solo cambiar el valor del atributo style en la directiva `<jdoc:include type="modules" name="" style="" />`: `xhtml`, `rounded`, `table`, `horz`, `none` y `outline`. Sin embargo, existen situaciones en que necesitamos que un módulo se cargue dentro de una estructura determinada, por eso mismo, Joomla nos permite crear nuestros propios estilos de visualización de módulos.

* El mismo HTML que compone un módulo: No solo podremos personalizar la forma con que los módulos están contenidos sino también las etiquetas HTML que componen a uno o varios módulos en particular, dándonos la flexibilidad para adaptar el diseño a nuestro gusto.


#### Personalizar la forma con que muestran los módulos

Como dijimos antes, todo el trabajo de personalización de módulos (y también de componentes) ocurren en la carpeta `html` de nuestra plantilla. En el caso de la plantilla que hemos creado de ejemplo, al acceder a la carpeta `html` veremos:

![](../incluir/figuras/image46.png)

Para la personalización de la carga de módulos, a nosotros nos interesa el archivo `modules.php`. Si lo analizamos, veremos que el mismo tiene tres funciones definidas:


~~~~~~~~~{.php .numberLines}
function modChrome_container($module, &$params, &$attribs)
{
   if (!empty ($module->content)) : ?>
           <div class="container">
                   <?php echo $module->content; ?>
           </div>
   <?php endif;
}

function modChrome_bottommodule($module, &$params, &$attribs)
{
   if (!empty ($module->content)) : ?>
           <?php if ($module->showtitle) : ?>
                   <h6><?php echo $module->title; ?></h6>
           <?php endif; ?>
           <?php echo $module->content; ?>
   <?php endif;
}

function modChrome_sidebar($module, &$params, &$attribs)
{
   if (!empty ($module->content)) : ?>
           <?php if ($module->showtitle) : ?>
                   <h3><?php echo $module->title; ?></h3>
           <?php endif; ?>
           <?php echo $module->content; ?>
   <?php endif;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Cada función corresponde a una manera personalizada de mostrar un módulo (las cuales ya venian definidas en la plantilla `atomic` a modo de ejemplo). Lo que haremos será definir un nuevo estilo de carga de módulos escribiendo una nueva función:


~~~~~~~~~{.php .numberLines}
<?php
function modChrome_personalizado($module, &$params, &$attribs)
{
   if (isset($attribs['headerLevel'])) :
           $headerLevel = $attribs['headerLevel'];
   else :
           $headerLevel = 3;
   endif; ?>
   
   <?php if (!empty ($module->content)) : ?>
  
           <?php if ($module->showtitle) : ?>
              
                   <h<?php echo $headerLevel; ?>>
                           <?php echo $module->title; ?>
                   </h<?php echo $headerLevel; ?>>
                  
           <?php endif; ?>
           
           <div id="module_<?php echo $module->id; ?>" class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
                   <?php echo $module->content; ?>
           </div>
          
   <?php endif;
  
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Vamos a descomponer la función creada:

**Sección 1**


~~~~~~~~~{.php .numberLines}
<?php
function modChrome_personalizado($module, &$params, &$attribs) {
...
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Aca definimos la función para nuestro estilo personalizado. El nombre de la función debe estar conformado por `modChrome_(nombre_del_estilo)`. Por lo tanto, cuando llamemos a este estilo en nuestra plantilla lo haremos a través de `<jdoc:include type="modules" name="(nombre_de_la_posicion)" style="personalizado" />`.  Luego, entre parentesis se pasan tres argumentos:


* `$module`: Es el objeto PHP perteneciente al módulo que mostraremos en la posición definida. Este objeto posee información relacionada al módulo: título (y si se debe mostrar), contenido, id identificatorio;

* `&$params`: Contendrá información relacionada a los parametros de configuración del módulo, los cuales se especifican al editarlo desde el panel de administración;

* `&$attribs`:  Hemos visto que la directiva `<jdoc:include type="modules" />` posee los atributos `type`, `name` y `style`. Sin embargo es posible agregar más atributos personalizados con el nombre y valor que queramos. Para poder obtener el valor de los nuevos atributos, utilizaremos a `$attribs`. Para nuestra estilo personalizado, agregaremos un nuevo atributo llamado `headerLevel`, quedando la directiva de esta forma: `<jdoc:include type="modules" name="(nombre_de_la_posicion)" style="personalizado" headerLevel="3" />`.
	

**Sección 2**


~~~~~~~~~{.php .numberLines}
if (isset($attribs['headerLevel'])) :
       $headerLevel = $attribs['headerLevel'];
else :
       $headerLevel = 4;
endif;
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


En este bloque de código, preguntamos si el atributo `headerLevel` posee algún valor. Si lo posee asignamos a la variable `$headerLevel` dicho valor, caso contrario establecemos a 4 como valor predeterminado.

**Sección 3**


~~~~~~~~~{.php .numberLines}
<?php if (!empty ($module->content)) : ?>
...
<?php endif;
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Luego preguntamos si el módulo posee algún contenido HTML, ya que no nos interesa continuar si este se encuentra vacío.

**Sección 4**


~~~~~~~~~{.php .numberLines}
<?php if ($module->showtitle) : ?>
  
       <h<?php echo $headerLevel; ?>>
               <?php echo $module->title; ?>
       </h<?php echo $headerLevel; ?>>
      
<?php endif; ?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Continuando, preguntamos si el módulo posee un título asignado. Si lo posee, mostramos el título entre etiquetas `<h />`, la cual podrá variar dependiendo del valor establecido en el atributo `headerLevel`.

**Sección 5**


~~~~~~~~~{.php .numberLines}
<div id="module_<?php echo $module->id; ?>" class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
       <?php echo $module->content; ?>
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Finalmente mostramos el contenido del módulo. Para nuestras necesidades, a este lo encerramos en una etiqueta `<div />`, el cual posee el atributo id conformado por `module_(id_del_modulo)` y el atributo `class` por `moduletable(parametro_moduleclass_sfx)` (recordemos nuevamente que este parametro se especifica en la configuración del módulo en la administración, más precisamente, `moduleclass_sfx` corresponde al parámetro *Clase CSS* del módulo).

El archivo `modules.php` quedará conformado de esta forma:


~~~~~~~~~{.php .numberLines}
function modChrome_container($module, &$params, &$attribs)
{
   if (!empty ($module->content)) : ?>
           <div class="container">
                   <?php echo $module->content; ?>
           </div>
   <?php endif;
}
function modChrome_bottommodule($module, &$params, &$attribs)
{
   if (!empty ($module->content)) : ?>
           <?php if ($module->showtitle) : ?>
                   <h6><?php echo $module->title; ?></h6>
           <?php endif; ?>
           <?php echo $module->content; ?>
   <?php endif;
}
function modChrome_sidebar($module, &$params, &$attribs)
{
   if (!empty ($module->content)) : ?>
           <?php if ($module->showtitle) : ?>
                   <h3><?php echo $module->title; ?></h3>
           <?php endif; ?>
           <?php echo $module->content; ?>
   <?php endif;
}
?>
<?php
function modChrome_personalizado($module, &$params, &$attribs)
{
   if (isset($attribs['headerLevel'])) :
           $headerLevel = $attribs['headerLevel'];
   else :
           $headerLevel = 3;
   endif; ?>
   
   <?php if (!empty ($module->content)) : ?>
  
           <?php if ($module->showtitle) : ?>
              
                   <h<?php echo $headerLevel; ?>>
                           <?php echo $module->title; ?>
                   </h<?php echo $headerLevel; ?>>
                  
           <?php endif; ?>
           
           <div id="module_<?php echo $module->id; ?>" class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
                   <?php echo $module->content; ?>
           </div>
          
   <?php endif;
  
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Y para mostrar en la plantilla los módulos de la forma que definimos, tan solo debemos agregar una nueva directiva `<jdoc:include type="modules" />` ó reemplazar alguna. Por ejemplo, para la sección de dos columnas, en la izquierda incorporamos nuestro estilo:


~~~~~~~~~{.php .numberLines}
<div id="columna_izquierda" class="span-17 append-1">
       <jdoc:include type="component" />
</div>

<div id="columna_derecha" class="span-6 last">
       <jdoc:include type="modules" name="interpoint-columna_derecha" style="personalizado" headerLevel="3" />
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Si verificamos el código HTML generado en cada módulo izquierdo, veremos que cada uno posee una estructura así:


~~~~~~~~~{.php .numberLines}
<h3>(título del módulo)</h3>
<div class="moduletable(parametro moduleclass_sfx)" id="module_(id del módulo)">
   (contenido del módulo)
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Por lo tanto, nuestro estilo de módulo se ha aplicado correctamente.



#### Personalizar el HTML de un módulo en particular

Anteriormente vimos que los módulos en Joomla, creados bajo el patrón MVC, poseen una subcarpeta llamada `tmpl`. Dicha carpeta contendrá uno o más archivos `.php` con las etiquetas HTML que conforman al módulo.

Por ejemplo, si vamos a la carpeta `tmpl` del módulo `mod_stats` (módulo que muestra las estadísticas de nuestro sitio), encontraremos un archivo llamado `default.php` que contiene:


~~~~~~~~~{.php .numberLines}
<?php
/**
* @version            $Id: default.php 20196 2011-01-09 02:40:25Z ian $
* @package            Joomla.Site
* @subpackage    mod_stats
* @copyright    Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
* @license            GNU General Public License version 2 or later; see LICENSE.txt
*/
// no direct access
defined('_JEXEC') or die;
?>
<dl class="stats-module<?php echo $moduleclass_sfx ?>">
<?php foreach ($list as $item) : ?>
   <dt><?php echo $item->title;?></dt>
   <dd><?php echo $item->data;?></dd>
<?php endforeach; ?>
</dl>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Supongamos el caso que nosotros necesitamos que los datos de estadísticas de nuestro sitio, en lugar de mostrarse dentro de etiquetas `<dl />`, `<dt />` y `<dd />`, las queremos dentro de una lista desordenada (`<ul />`, `<li />`). Para realizarlo, utilizando nuestra plantilla, deberemos:


	* En la carpeta `html` de nuestra plantilla, crear una carpeta llamada `mod_stats`;
	* Dentro de la carpeta creada, copiar los archivos `default.php` y `index.html` que estan en la carpeta `tmpl`;
	
	
De modo que nuestra carpeta `html` tenga la siguiente estructura de archivos:

![](../incluir/figuras/image20.png)

Lo siguiente que haremos será abrir el archivo `default.php` copiado y modificarlo a nuestro gusto:


~~~~~~~~~{.php .numberLines}
<?php
// no direct access
defined('_JEXEC') or die;
?>
<ul class="stats-module<?php echo $moduleclass_sfx ?>">
	<?php foreach ($list as $item) : ?>
		<li>
		<p><?php echo $item->title;?>: <?php echo $item->data;?></p>
		</li>
	<?php endforeach; ?>
</ul>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Si publicamos el módulo estadísticas en nuestro sitio, veremos que en lugar de utilizar las etiquetas HTML que posee el archivo `default.php` en la carpeta `tmpl`, se utilizará el que nosotros poseemos en la carpeta `mod_stats` del directorio `html` de nuestra plantilla.

En caso de querer personalizar otros módulos, debemos realizar los mismos pasos descriptos.


>Podemos notar que `atomic`, la plantilla que utilizamos como base para nuestro trabajo, ya poseia varios módulos personalizados dentro de la carpeta html:
>
>* `mod_custom`
>* `mod_login`
>* `mod_menu`
>* `mod_search`
>
>Por lo tanto, si necesitamos personalizar alguno de estos módulos, tan solo debemos modificar los archivos `.php` que estan dentro de cada directorio.

