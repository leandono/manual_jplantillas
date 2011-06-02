

templateDetails.xml
-------------------

Como se comentó anteriormente, `templateDetails` es un archivo XML que posee toda la información relacionada con el `template`. Su importancia radica en que es el archivo que lee Joomla al momento de instalar la plantilla y mostrar su información asociada en el panel de administración.

Muchas de las definiciones que se realizaron en el análisis previo van a ir expuestas en este archivo. El archivo esta conformado de la siguiente manera:


~~~~~~~~~{.xml .numberLines}
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE install PUBLIC "-//Joomla! 1.6//DTD template 1.0//EN" "http://www.joomla.org/xml/dtd/1.6/template-install.dtd">
<extension
   version="1.6"
   type="template"
   client="site">
   <name>atomic</name>
   <creationDate>10/10/09</creationDate>
   <author>Ron Severdia</author>
   <authorEmail>contact@kontentdesign.com</authorEmail>
   <authorUrl>http://www.kontentdesign.com</authorUrl>
   <copyright>Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.</copyright>
   <license>GNU General Public License version 2 or later; see LICENSE.txt</license>
   <version>1.6.0</version>
   <description>TPL_ATOMIC_XML_DESCRIPTION</description>
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
           <position>atomic-bottomleft</position>
           <position>atomic-bottommiddle</position>
           <position>atomic-search</position>
           <position>atomic-sidebar</position>
           <position>atomic-topmenu</position>
           <position>atomic-topquote</position>
   </positions>
   <!--     For core templates, we also install/uninstall the language files in the core language folders.
   -->
   <languages folder="language">
           <language tag="en-GB">en-GB/en-GB.tpl_atomic.ini</language>
           <language tag="en-GB">en-GB/en-GB.tpl_atomic.sys.ini</language>
   </languages>
</extension>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Con la información recopilada, el mismo quedará:


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
  <!--         For core templates, we also install/uninstall the language files in the core language folders.
  -->
  <languages folder="language">
          <language tag="es-ES">es-ES/es-ES.tpl_interpoint.ini</language>
          <language tag="es-ES">es-ES/es-ES.tpl_interpoint.sys.ini</language>
  </languages>
</extension>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Para entender lo modificado, a continuación se muestra un detalle de cada sección correspondiente al archivo:


**Sección 1**


~~~~~~~~~{.xml .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Las primeras etiquetas corresponden a la información asociada a la plantilla: Nombre, fecha de creación, autor, contacto, licencia, versión y descripción. 

>Note  que en la descripción se ha puesto `TPL_INTERPOINT_XML_DESCRIPTION`, que es una referencia que se incorporará en el archivo de lenguaje `es-ES.tpl_interpoint.ini`. La idea es que todos los textos localizados estén situados en el archivo del idioma, por si en un futuro la plantilla se utilizada en más idiomas.


**Sección 2**


~~~~~~~~~{.xml .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Luego se especifican los archivos y carpetas que compondrán a la plantilla. Es muy importante, a medida que se avanza con el desarrollo de la plantilla, ir especificando en esta sección los archivos nuevos creados. En caso contrario, si no existe referencia a un archivo, cuando se quiera instalar la plantilla el CMS mostrará un error.


**Sección 3**


~~~~~~~~~{.xml .numberLines}
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


A continuación se especifican las posiciones admitidas por los módulos en la plantilla. El nombre de cada una suele ser un breve resumen de la posición o funcionalidad especifica de dicha zona. Luego, en el archivo del idioma `es-ES.tpl_interpoint.sys.ini` es posible especificar una descripción más explicativa de cada posición.


**Sección 4**


~~~~~~~~~{.xml .numberLines}
<languages folder="language">
       <language tag="es-ES">es-ES/es-ES.tpl_interpoint.ini</language>
       <language tag="es-ES">es-ES/es-ES.tpl_interpoint.sys.ini</language>
</languages>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Por último se añaden los archivos del idioma, los cuales tendrán la descripción y textos explicativos de las posiciones de módulos y parámetros de la plantilla. El archivo `es-ES.tpl_interpoint.ini` contendrá todas las definiciones que se utilizarán en la pantalla de edición de estilos de plantillas. Mientras que `es-ES.tpl_interpoint.sys.ini` contendrá las explicaciones correspondientes a cada posición de módulos (estos textos aparecen de ayuda, en el momento de asignar un módulo a una posición). Para poder utilizar estos archivos del idioma, lo que se hará es:


* En la carpeta de la plantilla, ir al directorio `language`;

* Allí dentro existe otra carpeta llamada `en-GB`. Cambiarle el nombre por `es-ES`;

* Dentro de esta carpeta existen dos archivos `.ini`: `en-GB.tpl_atomic.ini` y `en-GB.tpl_atomic.sys.ini`. Respectivamente, se los renombra a `es-ES.tpl_interpoint.ini` y `es-ES.tpl_interpoint.sys.ini`;

* Abrir `es-ES.tpl_interpoint.ini`, borrar el contenido y luego escribir:

~~~~~~~~~{.xml .numberLines}
TPL_INTERPOINT_XML_DESCRIPTION="Template de ejemplo para Joomla! 1.6"
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
>Note que `TPL_INTERPOINT_XML_DESCRIPTION` hace referencia al término incorporado en la etiqueta `<description />` en el archivo `templateDetails.xml`. El texto de descripción se puede cambiar a gusto.

* Guardar `es-ES.tpl_interpoint.ini`;

* Abrir `es-ES.tpl_interpoint.sys.ini`, borrar el contenido y escribir:


~~~~~~~~~{.xml .numberLines}
TPL_INTERPOINT_XML_DESCRIPTION="Template de ejemplo para Joomla! 1.6"
TPL_INTERPOINT_POSITION_INTERPOINT-MENU_INGRESAR="Menú superior de ingreso y registro"
TPL_INTERPOINT_POSITION_INTERPOINT-MENU_SUPERIOR="Menú superior principal"
TPL_INTERPOINT_POSITION_INTERPOINT-DESTACADO_SUPERIOR="Texto destacado superior"
TPL_INTERPOINT_POSITION_INTERPOINT-VIDEO="Caja de video"
TPL_INTERPOINT_POSITION_INTERPOINT-CAJA_MEDIO="Caja del medio"
TPL_INTERPOINT_POSITION_INTERPOINT-DESTACADO_INFERIOR="Texto destacado inferior"
TPL_INTERPOINT_POSITION_INTERPOINT-SLIDESHOW_INFERIOR="Slideshow inferior"
TPL_INTERPOINT_POSITION_INTERPOINT-MENU_INFERIOR="Menú inferior"
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
	
* Guardar `es-ES.tpl_interpoint.sys.ini`.


>Note que cada referencia de descripción de módulos esta compuesta por `TPL_(nombre de la plantilla)_POSITION_(nombre de la posición del módulo)`. También se ha agregado nuevamente la descripción de la plantilla con la misma referencia que se usó anteriormente. Los textos de descripción de cada posición se pueden cambiar al gusto.


>En el momento de instalar la plantilla, los archivos `es-ES.tpl_interpoint.ini` y `es-ES.tpl_interpoint.sys.ini` se copiarán dentro de la carpeta `language/es-ES`, en el directorio raiz del CMS.


>En el archivo `templateDetails.xml` también se especifican las opciones de personalización de la plantilla. Más adelante se explicará como añadir esta característica y de que forma.


Con esto listo, es posible continuar con la visualización del template en la administración de Joomla.


### Descubrir la plantilla en la administración de CMS

Antes de continuar, es importante que Joomla reconozca la copia realizada de la plantilla, ya que será necesario poder previsualizar el trabajo a medida que se va avanzando. 

Para esto, en la administración, vaya a **Extensiones → Gestor de extensiones → Descubrir → Presionar el botón Descubrir**. Si todo sale bien, debería aparecer la plantilla enlistada:

![](incluir/figuras/image42.png)

Lo siguiente será seleccionar el ítem de la plantilla y presionar el botón **Instalar**. Si todo salió bien debe aparecer el texto **“La instalación de la extensión descubierta se ha realizado correctamente”** y más abajo la descripción de la plantilla:

![](incluir/figuras/image48.png)

Finalmente, para poder visualizar la plantilla en el sitio, vaya a **Extensiones → Gestor de plantillas**:

![](incluir/figuras/image28.png)

Seleccionar el ítem de la plantilla nueva y presionar el botón **Predeterminada**. De esta forma se logrará que al ingresar al sitio se cargue la plantilla.



********************************
