

Incorporación de jQuery
-----------------------

Anteriormente vimos como podemos aprovechar a **Mootools** para facilitar el armado de funciones JavaScript. Sin embargo, puede suceder que necesitemos utilizar a **jQuery**, otra popular biblioteca JavaScript para dotar de funcionalidades a nuestra plantilla. 


>Más información sobre jQuery: <http://jquery.com/>
>Aprender a utilizar jQuery: <http://librojquery.com/>


Los pasos para incorporar jQuery en nuestra plantilla son los siguientes:


* Descargamos la biblioteca jQuery: <http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js>

* Guardamos el archivo `jquery.min.js` dentro de la capeta `js` de nuestra plantilla;

* Abrimos el archivo `index.php` de la plantilla e insertamos la biblioteca dentro de `<head />`, después de la directiva `<jdoc:include type="head" />` pero ántes del llamado al archivo `template.js`:


~~~~~~~~~{.php .numberLines}
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/screen.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/print.css" type="text/css" media="print" />
<!--[if lt IE 8]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />

<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


* Luego, abrimos `template.js` y escribimos en la primera línea:

~~~~~~~~~{.javascript .numberLines}
jQuery.noConflict();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	
>La línea anterior permite que jQuery funcione sin problemas con otras bibliotecas JavaScript (como es el caso de Mootools). Hay que tener en cuenta que, cuando escribamos funciones jQuery, en lugar de utilizar el símbolo `$`, utilizaremos la palabra jQuery.
>Por ejemplo, la siguiente función:
>
>		$(“#footer”).hide();
>
>Pasa a ser:
>
>		jQuery(“#footer”).hide();
>
>Más información sobre `jQuery.noConflict()`: <http://api.jquery.com/jQuery.noConflict/>


Y listo. De esta forma podemos utilizar jQuery sin problemas en nuestra plantilla.


### Creación de un slideshow con jQuery

Aprovechando que tenemos a la biblioteca incorporada en nuestra plantilla, vamos a ver como crear un slideshow de imágenes para completar la funcionalidad planeada en la página de inicio de nuestro ejemplo:

![](../incluir/figuras/image26.png)

Para esto, utilizaremos la extensión de la biblioteca **jQuery Cycle Plugin**: <http://jquery.malsup.com/cycle/>

Recordemos que, la zona que conforma al slideshow en nuestra plantilla esta compuesta por:


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


La posición `interpoint-slideshow_inferior` mostrará a un módulo del tipo HTML personalizado, en donde incorporaremos varias imágenes para hacer funcionar al slideshow. Al insertar las imagenes, el HTML final quedará así:


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


Es probable que al hacerlo, todo el slideshow se vea mal. Esto por ahora no nos importa, ya que luego, al establecer las funciones relativas al slideshow el problema se habra solucionado.

Lo siguiente que haremos será bajar **jQuery Cycle Plugin**: <http://jquery.malsup.com/cycle/download.html>. Descomprimimos el `.zip` descargado y copiamos el archivo `jquery.cycle.all.min.js` en la carpeta `js` de nuestra plantilla, de forma que quede en conjunto con `jquery.min.js` y `template.js`:

![](../incluir/figuras/image32.png)

Luego, insertamos a `jquery.cycle.all.min.js` en nuestra plantilla. El llamado al archivo debe quedar por debajo de `jquery.min.js` pero antes de `template.js`:


~~~~~~~~~{.php .numberLines}
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Por último, en `template.js` establecemos las funciones para hacer funcionar el slideshow. El archivo quedará de esta forma:


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


Como vemos, es muy fácil la creación del slideshow, tan solo debemos especificar:


* El ID del `<div />` contenedor de las imágenes: `#slideshow_contenedor`;
* El efecto a utilizar entre transiciones: `scrollHorz`;
* El tiempo de transición entre imagenes: 3000 milisegundos;
* Los IDs de los elementos para pasar al siguiente o anterior slide: `#slideshow_izq` y `#slideshow_der`.

![](../incluir/figuras/image34.png)

Más información y otras opciones sobre la utilización de `jQuery Cycle Plugin`: <http://jquery.malsup.com/cycle/>

