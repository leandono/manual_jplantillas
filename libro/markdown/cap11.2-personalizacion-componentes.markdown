

### Componentes personalizados

Los componentes suelen ser extensiones más complejas que los módulos, ya que abarcan la parte principal de la página.

El mecanismo para personalizar el HTML de un componente determinado es exactamente igual que el descrito para los módulos, con algunas diferencias. Por ejemplo, suponiendo que se necesita personalizar los resultados de búsqueda, actualmente, dicha pantalla posee el siguiente diseño:

![](incluir/figuras/image50.png)

Para la personalización, se desea las zonas "**Condiciones de búsqueda**" y "**Buscar solo en**" aparezcan ocultas y que éstas sean visibles al hacer clic en un enlace con el texto "**Búsqueda avanzada**".

Para realizarlo, se hará lo siguiente:


* Ir a la carpeta del componente de búsqueda. En este caso `com_search` (la cual se encuentra dentro del directorio `components`);
* Allí dentro se encontrará a la carpeta `views`. Al entrar a ella, existirá otra carpeta con el nombre `search`.


>Dependiendo del tipo de componente, es posible encontrar más de una carpeta dentro del directorio `views`. Por ejemplo, al ir a la carpeta `views` del componente `com_content` se encontrarán 6 directorios: `archive`, `article`, `categories`, `category`, `featured` y `form`. Cada carpeta es una funcionalidad distinta del componente.


* Al entrar a la carpeta `search`, se encontraran varios archivos y además un directorio con el nombre `tmpl`, el cual contiene (al igual que en el caso de los módulos) archivos `.php` con las etiquetas HTML que conforman al componente:


![](incluir/figuras/image13.png)


>Note que existe más de un archivo `.php` dentro del directorio. Esto es debido a que, al ser los componentes más complejos, suelen dividir su HTML en varios archivos para reunirlos en uno solo (`default.php`).


* El archivo a copiar es `default_form.php`, ya que posee las etiquetas HTML que conforman las zonas a personalizar.

* Lo siguiente a realizar es crear una carpeta `com_search` dentro del directorio `html` de la plantilla. Allí dentro se creará otra carpeta llamada `search` para luego pegar el archivo `default_form.php` localizado en el paso anterior. La estructura del directorio `html` debería quedar de la siguiente manera:


![](incluir/figuras/image12.png)


>Note que se ha creado una carpeta `search`. Esta corresponde al nombre de la carpeta `search` que se encuentra dentro del directorio `views` del componente. En caso de que existan otras carpetas con otros nombres, se debe seguir la misma lógica.


Lo siguiente será abrir el archivo `default_form.php` copiado, y modificarlo al gusto.

Las etiquetas que corresponden a la zona a personalizar son:


~~~~~~~~~{.xml .numberLines}
<fieldset class="phrases">
       <legend><?php echo JText::_('COM_SEARCH_FOR');?>
       </legend>
               <div class="phrases-box">
               <?php echo $this->lists['searchphrase']; ?>
               </div>
               <div class="ordering-box">
               <label for="ordering" class="ordering">
                       <?php echo JText::_('COM_SEARCH_ORDERING');?>
               </label>
               <?php echo $this->lists['ordering'];?>
               </div>
</fieldset>

<?php if ($this->params->get('search_areas', 1)) : ?>
       <fieldset class="only">
       <legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY');?></legend>
       <?php foreach ($this->searchareas['search'] as $val => $txt) :
               $checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
       ?>
       <input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area-<?php echo $val;?>" <?php echo $checked;?> />
               <label for="area-<?php echo $val;?>">
                       <?php echo JText::_($txt); ?>
               </label>
       <?php endforeach; ?>
       </fieldset>
<?php endif; ?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Como se comentó, se desea ocultar estas zonas de manera predeterminada y agregar un enlace, que al hacerle clic, haga visibles las opciones de búsqueda.

Lo primero será crear el enlace y además encerrar las zonas que contienen las opciones en un `<div />`:


~~~~~~~~~{.php .numberLines}
<p>
	<a href="#" id="search-advanced-link">Búsqueda avanzada</a>
</p>

<div id="search-advanced">

	<fieldset class="phrases">
	       <legend><?php echo JText::_('COM_SEARCH_FOR');?>
	       </legend>
	               <div class="phrases-box">
	               <?php echo $this->lists['searchphrase']; ?>
	               </div>
	               <div class="ordering-box">
	               <label for="ordering" class="ordering">
	                       <?php echo JText::_('COM_SEARCH_ORDERING');?>
	               </label>
	               <?php echo $this->lists['ordering'];?>
	               </div>
	</fieldset>
	
	<?php if ($this->params->get('search_areas', 1)) : ?>
	       <fieldset class="only">
	       <legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY');?></legend>
	       <?php foreach ($this->searchareas['search'] as $val => $txt) :
	               $checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
	       ?>
	       <input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area-<?php echo $val;?>" <?php echo $checked;?> />
	               <label for="area-<?php echo $val;?>">
	                       <?php echo JText::_($txt); ?>
	               </label>
	       <?php endforeach; ?>
	       </fieldset>
	<?php endif; ?>

</div>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Luego, se incorporan unos estilos CSS para darle más presencia al enlace y una función JavaScript que realizará el trabajo de ocultar/mostrar las opciones de búsqueda:


~~~~~~~~~{.php .numberLines}
<?php
$doc = JFactory::getDocument();
$js = "window.addEvent('domready', function() {
   var opciones = new Fx.Slide('search-advanced');
   
   opciones.hide();
   
   $('search-advanced-link').addEvent('click', function(e){
           e = new Event(e);
           opciones.toggle();
           e.stop();
   });
   
});";
$css = "#search-advanced-link{
font-weight: bold;
font-size: 16px;
}";
$doc->addStyleDeclaration ($css);
$doc->addScriptDeclaration ($js);
?>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


>Note que, para insertar el estilo CSS y la función JavaScript, ha utilizado `JFactory::getDocument()`, `addStyleDeclaration()` y `addScriptDeclaration()`. El beneficio de utilizar estas funciones es que Joomla se encarga de insertar todo el código dentro de las etiquetas `<head />` de la plantilla. 
>
>Más información sobre:
>
>* `JDocument`: <http://docs.joomla.org/JDocument>
>* `getDocument`: <http://docs.joomla.org/JFactory::getDocument/>
>* `addScriptDeclaration`: <http://docs.joomla.org/JDocument/addScriptDeclaration>
>* `addStyleDeclaration`: <http://docs.joomla.org/JDocument/addStyleDeclaration>
>
>Otra manera de realizar el trabajo es utilizando las etiquetas `<style type="text/css" />` y `<script type="text/javascript" />`. El funcionamiento sería el mismo, pero todo el código quedaría dentro del `<body />` del documento.


>Para realizar la funcionalidad JavaScript, se ha aprovechado que Joomla utiliza **Mootools** como *framework* JavaScript. Esta biblioteca posee una clase JavaScript llamada `Fx.Slide` que permite realizar el tipo de efecto se necesita. Más información sobre `Fx.Slide`: <http://mootools.net/docs/more/Fx/Fx.Slide>


Si todo se realiza correctamente, la página de resultados quedará de la siguiente forma:

![](incluir/figuras/image15.png)

Al hacer click en el enlace **Búsqueda avanzada**, se desplegarán las opciones:

![](incluir/figuras/image19.png)


>Una buena práctica sería incorporar el texto **Búsqueda avanzada** dentro de los archivos del idioma de la plantilla y no en el mismo archivo `.php`.


De esta manera ya se tiene terminada la personalización del componente. En caso que se quiera realizar lo mismo con otros componentes se deben realizar los mismos pasos descritos anteriormente.


### Conclusión

Se ha podido comprobar el potencial de las plantillas de Joomla para la personalización de componentes y módulos. Esta práctica posee varias ventajas importantes:


* Adaptación a las necesidades sin mucho esfuerzo;
* No se modificó ningún archivo del núcleo de la extensión permitiendo que, en caso de actualización, no se pierda el trabajo realizado, minimizando el tiempo de mantenimiento;
* Centralización del trabajo: el mismo transcurrió dentro de la carpeta `html` de la plantilla.



********************************
