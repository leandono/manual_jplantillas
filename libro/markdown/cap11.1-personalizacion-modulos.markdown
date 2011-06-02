

Personalización de módulos y componentes
----------------------------------------

### Extensiones desarrolladas en MVC

Desde la versión 1.5, Joomla permite la sobrescritura del HTML que poseen módulos y componentes, otorgando mucho más control sobre lo que se desea mostrar en el sitio, sin tener que modificar archivos del núcleo de dichas extensiones o del mismo CMS.

Para poder sobrescribir la estructura HTML que posea una extensión, es requisito que ésta esté creada utilizando el patrón de arquitectura MVC (Modelo-Vista-Controlador).

Desde el punto de vista del usuario común, no existe una forma automática de saber si una extensión utiliza MVC. La única manera de saberlo es yendo a la carpeta de dicha extensión y mirando su estructura de carpetas y archivos. Por ejemplo, los componentes creados con MVC suelen tener una estructura de esta forma: 

![](incluir/figuras/image43.png)

En donde existe una carpeta `controllers`, otra `models` y otra `views`. En ésta última carpeta se encuentran archivos que se utilizaran como base para personalizar el HTML del componente.

Por otro lado, los módulos desarrollados en MVC poseen el siguiente aspecto:

![](incluir/figuras/image35.png)

En este caso, la carpeta `tmpl` posee archivos que se utilizaran para personalizar al gusto el HTML del módulo.


>En Joomla, los archivos que componen cada componente pueden encontrarse dentro de la carpeta `components`, en el directorio raiz del CMS. Allí cada componente está separado por carpetas diferentes (`com_banners`, `com_contact`, etc).
>En el caso de los módulos, estos se encuentran en la carpeta `modules`, también en el directorio raiz del CMS. Y al igual que el caso anterior, cada módulo está separado en una carpeta diferente (`mod_articles_archive`, `mod_articles_categories`, etc). 


>Si desea conocer un poco más sobre MVC puede consultar:
>
>* <http://es.wikipedia.org/wiki/Modelo_Vista_Controlador>
>* <http://docs.joomla.org/MVC>
>

Tanto la personalización de módulos como de componentes, se trabajan dentro de la carpeta `html` de la plantilla.



### Módulos personalizados

En este aspecto, es posible adaptar a los módulos en varios aspectos:


* La manera con que se muestra el módulo: Anteriormente, en el análisis de las secciones que componen a `index.php`, se explicó que los módulos se pueden cargar de diferentes formas cambiando el valor del atributo `style` en la directiva `<jdoc:include type="modules" name="" style="" />`. Sin embargo, existen situaciones en que se necesita que un módulo cargue dentro de una estructura determinada. Por eso mismo, Joomla permite crear estilos personalizados de visualización de módulos.

* El mismo HTML que compone un módulo: También es posible personalizar las etiquetas HTML que componen a uno o varios módulos en particular, otorgando la flexibilidad para adaptar un diseño al gusto.


#### Personalizar la forma con que muestran los módulos

Como se comentó anteriormente, el trabajo de personalización de módulos (y también de componentes) ocurre en la carpeta `html` de la plantilla. En el caso de la plantilla creada de ejemplo, al acceder a la carpeta `html` se visualizará:

![](incluir/figuras/image46.png)

Es el archivo `modules.php` quien se encarga de contener los diferentes estilos personalizados de visualización de módulos. Al abrir a dicho archivo, el mismo posee tres funciones definidas:


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


Cada función corresponde a una manera personalizada de mostrar un módulo (las cuales ya venían definidas en la plantilla `atomic` a modo de ejemplo). Lo que se hará es crear una nueva función para definir un nuevo estilo de visualización de módulos:


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


Al descomponer la función en detalles, se obtiene una análisis más profundo:

**Sección 1**


~~~~~~~~~{.php .numberLines}
<?php
function modChrome_personalizado($module, &$params, &$attribs) {
...
}
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Definición de la función para el estilo personalizado. El nombre de la función debe estar conformado por `modChrome_(nombre_del_estilo)`. Entre paréntesis se pasan tres argumentos:


* `$module`: Es el objeto PHP perteneciente al módulo que se mostrará en la posición definida. Este objeto posee información relacionada al módulo: título (y si se debe mostrar), contenido, ID único;

* `&$params`: Contendrá información relacionada a los parámetros de configuración del módulo, los cuales se especifican al editarlo desde el panel de administración;

* `&$attribs`:  Antes se señaló que la directiva `<jdoc:include type="modules" />` posee los atributos `type`, `name` y `style`. Sin embargo es posible agregar más atributos personalizados con el nombre y valor que se desee. Luego, para poder obtener el valor de los nuevos atributos, se utiliza a `$attribs`. En el caso del estilo creado, se agregará un nuevo atributo llamado `headerLevel`, quedando la directiva de esta forma: `<jdoc:include type="modules" name="(nombre_de_la_posicion)" style="personalizado" headerLevel="3" />`.


>Notar que el atributo `style` para poder utilizar el estilo personalizado, posee el valor `personalizado` no `modChrome_personalizado` (que es el nombre de la función).


**Sección 2**


~~~~~~~~~{.php .numberLines}
if (isset($attribs['headerLevel'])) :
       $headerLevel = $attribs['headerLevel'];
else :
       $headerLevel = 4;
endif;
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


En este bloque de código, se pregunta si el atributo `headerLevel` posee algún valor. Si lo posee se asigna a la variable `$headerLevel` dicho valor o en caso contrario se establece a 4 como valor predeterminado.

**Sección 3**


~~~~~~~~~{.php .numberLines}
<?php if (!empty ($module->content)) : ?>
...
<?php endif;
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Luego se pregunta si el módulo posee algún contenido HTML, ya que no tiene sentido mostrar un módulo vacío.

**Sección 4**


~~~~~~~~~{.php .numberLines}
<?php if ($module->showtitle) : ?>
  
       <h<?php echo $headerLevel; ?>>
               <?php echo $module->title; ?>
       </h<?php echo $headerLevel; ?>>
      
<?php endif; ?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Continuando, se pregunta si el módulo posee un título asignado. Si lo posee, se muestra dicho título entre etiquetas `<h />`, la cual podrá variar dependiendo del valor establecido en el atributo `headerLevel`.

**Sección 5**


~~~~~~~~~{.php .numberLines}
<div id="module_<?php echo $module->id; ?>" class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
       <?php echo $module->content; ?>
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Finalmente se muestra el contenido del módulo, el cual se encierra en una etiqueta `<div />` que posee el atributo `id` conformado por `module_(id_del_modulo)` y el atributo `class` por `moduletable(parametro_moduleclass_sfx)` (recordar nuevamente que este parámetro se especifica en la configuración del módulo, en la administración del CMS. Más precisamente corresponde al parámetro *Clase CSS* del módulo).

El archivo `modules.php` quedará conformado de la siguiente forma:


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


Para mostrar en la plantilla los módulos de la nueva forma definida, tan solo es necesario agregar una nueva directiva en algún lugar o reemplazar alguna por la nueva. Por ejemplo, para la sección de dos columnas, en la parte derecha, se incorpora el nuevo estilo:


~~~~~~~~~{.php .numberLines}
<div id="columna_izquierda" class="span-17 append-1">
       <jdoc:include type="component" />
</div>

<div id="columna_derecha" class="span-6 last">
       <jdoc:include type="modules" name="interpoint-columna_derecha" style="personalizado" headerLevel="3" />
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Si se verifica el código HTML generado en cada módulo derecho, se podrá notar una estructura de esta forma:


~~~~~~~~~{.php .numberLines}
<h3>(título del módulo)</h3>
<div class="moduletable(parametro moduleclass_sfx)" id="module_(id del módulo)">
   (contenido del módulo)
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Por lo tanto, el nuevo estilo personalizado de módulo se ha aplicado correctamente.



#### Personalizar el HTML de un módulo en particular

Anteriormente se comentó que los módulos creados bajo el patrón MVC, poseen una subcarpeta llamada `tmpl`. Dicha carpeta contendrá uno o más archivos `.php` con las etiquetas HTML que conforman al módulo.

Por ejemplo, si se dirige a la carpeta `tmpl` del módulo `mod_stats` (módulo que muestra las estadísticas del sitio), encontrará un archivo llamado `default.php` que contiene:


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


Suponiendo el caso en el que se necesita que los datos de estadísticas del sitio, en lugar de mostrarse dentro de etiquetas `<dl />`, `<dt />` y `<dd />`, se muestren dentro de una lista desordenada (`<ul />`, `<li />`). Para realizarlo, utilizando la plantilla creada, se debe:


* En la carpeta `html` de la plantilla, crear una carpeta llamada `mod_stats`;
* Dentro de la carpeta creada, copiar los archivos `default.php` y `index.html` que estan en la carpeta `tmpl`;
	
	
De modo que la carpeta `html` posea la siguiente estructura de archivos:

![](incluir/figuras/image20.png)

Lo siguiente será abrir el archivo `default.php` copiado y modificarlo con las nuevas etiquetas:


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


Si se publica el módulo **estadísticas** en el sitio, se podrá ver que en lugar de utilizar las etiquetas HTML que posee el archivo `default.php` en la carpeta `tmpl`, se utilizaran las etiquetas del archivo creado en la carpeta `mod_stats` del directorio `html` de la plantilla.

En caso de querer personalizar otros módulos, se deben realizar los mismos pasos descritos.


>Note que `atomic`, la plantilla utilizada como base para el trabajo, ya posee varios módulos personalizados dentro de la carpeta `html`:
>
>* `mod_custom`
>* `mod_login`
>* `mod_menu`
>* `mod_search`
>
>Por lo tanto, si se necesita personalizar alguno de estos módulos, tan solo se debe modificar los archivos `.php` que estan dentro de cada directorio.

