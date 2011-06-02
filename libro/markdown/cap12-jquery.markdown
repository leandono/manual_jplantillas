

Incorporación de jQuery
-----------------------

Anteriormente se mostró el aprovechamiento de **Mootools** para facilitar el armado de funciones JavaScript. Sin embargo, puede suceder que se necesite utilizar a **jQuery**, otra popular biblioteca JavaScript para dotar de funcionalidades a la plantilla. 


>Más información sobre jQuery: <http://jquery.com/>
>Aprender a utilizar jQuery: <http://librojquery.com/>


Los pasos para incorporar jQuery en la plantilla son los siguientes:


* Descargamos la biblioteca jQuery: <http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js>

* Guardar el archivo `jquery.min.js` dentro de la carpeta `js` de la plantilla;

* Abrir el `index.php` de la plantilla e insertar a la biblioteca dentro del `<head />`, después de la directiva `<jdoc:include type="head" />` pero antes de la llamada al archivo `template.js`:


~~~~~~~~~{.php .numberLines}
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/screen.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/print.css" type="text/css" media="print" />
<!--[if lt IE 8]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />

<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


* Abrir `template.js` y escribir en la primera línea:

~~~~~~~~~{.javascript .numberLines}
jQuery.noConflict();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	
>La línea anterior permite que jQuery funcione sin problemas con otras bibliotecas JavaScript (como es el caso de Mootools). Hay que tener en cuenta que, cuando se escriban funciones jQuery, en lugar de utilizar el símbolo `$`, se deberá utilizar la palabra `jQuery`.
>Por ejemplo, la siguiente función:
>
>		$(“#footer”).hide();
>
>Pasa a ser:
>
>		jQuery(“#footer”).hide();
>
>Más información sobre `jQuery.noConflict()`: <http://api.jquery.com/jQuery.noConflict/>


Y listo. De esta forma es posible utilizar jQuery sin problemas en la plantilla.


### Creación de un slideshow con jQuery

Aprovechando que se incorporó a jQuery en la plantilla, se mostrará la manera de crear un slideshow de imágenes para completar la funcionalidad planeada en la página de inicio:

![](incluir/figuras/image26.png)

Para esto, se utilizará la extensión de la biblioteca **jQuery Cycle Plugin**: <http://jquery.malsup.com/cycle/>

Recordar que la zona que conforma al slideshow en la plantilla esta compuesta de la siguiente forma:


~~~~~~~~~{.php .numberLines}
<div id="slideshow_inferior" class="span-8 last">
 <?php if($this->countModules('interpoint-slideshow_inferior')) : ?>
         <div id="slideshow_contenedor">
                 <jdoc:include type="modules" name="interpoint-slideshow_inferior" style="none" />
         </div>
         <span id="slideshow_der" class="slideshow_nav"></span>
         <span id="slideshow_izq" class="slideshow_nav"></span>
 <?php endif; ?>
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


La posición `interpoint-slideshow_inferior` mostrará a un módulo del tipo HTML personalizado, en donde se incorporarán varias imágenes para hacer funcionar al slideshow. Al insertar las imágenes, el HTML final queda de la siguiente manera:


~~~~~~~~~{.php .numberLines}
<div id="slideshow_inferior" class="span-8 last">
   <div id="slideshow_contenedor">
   
           <p><img src="/joomla16/images/city-q-c-290-195-1.jpg" border="0" /></p>
           <p><img src="/joomla16/images/animals-q-c-290-195-4.jpg" border="0" /></p>
           <p><img src="/joomla16/images/city-q-c-290-195-4.jpg" border="0" /></p>
           <p><img src="/joomla16/images/nature-q-c-290-195-3.jpg" border="0" /></p>
           
   </div>
   <span id="slideshow_der" class="slideshow_nav"></span>
   <span id="slideshow_izq" class="slideshow_nav"></span>
</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Es probable que al hacerlo, todo el slideshow se vea mal. Esto por ahora no importa, ya que luego, al establecer las funciones relativas al slideshow el problema se habrá solucionado.

Lo siguiente a realizar será descargar **jQuery Cycle Plugin**: <http://jquery.malsup.com/cycle/download.html>. Descomprimir el archivo `.zip` descargado y copiar el archivo `jquery.cycle.all.min.js` en la carpeta `js` de la plantilla, de forma que quede en conjunto con `jquery.min.js` y `template.js`:

![](incluir/figuras/image32.png)

Luego, insertar a `jquery.cycle.all.min.js` en la plantilla. La llamada al archivo debe quedar por debajo de `jquery.min.js` pero antes de `template.js`:


~~~~~~~~~{.php .numberLines}
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Por último, en `template.js` se establecen las funciones para hacer funcionar el slideshow. El archivo quedará de la siguiente forma:


~~~~~~~~~{.javascript .numberLines}
jQuery.noConflict();
/*Funciones para el slideshow*/
jQuery(document).ready(function() {
        jQuery('#slideshow_contenedor').cycle({
           fx:          'scrollHorz',
           timeout:  3000,
           prev:        '#slideshow_izq',
           next:        '#slideshow_der'
        });
   
});
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


La creación del slideshow es muy fácil, tan solo se debe especificar:


* El ID del `<div />` contenedor de las imágenes: `#slideshow_contenedor`;
* El efecto a utilizar entre transiciones: `scrollHorz`;
* El tiempo de transición entre imagenes: 3000 milisegundos;
* Los IDs de los elementos para pasar a la siguiente o anterior imagen: `#slideshow_izq` y `#slideshow_der`.

![](incluir/figuras/image34.png)

Más información y otras opciones sobre la utilización de `jQuery Cycle Plugin`: <http://jquery.malsup.com/cycle/>



********************************
