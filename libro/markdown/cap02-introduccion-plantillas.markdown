

Breve introducción a las plantillas en Joomla! 1.6
--------------------------------------------------

Joomla 1.6 es la última versión del premiado CMS Joomla!. Dicha versión incorpora muchas nuevas características que permiten que la aplicación sea más flexible, extendible y personalizable.


>Si desea conocer en mayor detalle las características, es muy recomendable visitar el sitio oficial dedicado a Joomla 1.6: <http://www.joomla.org/16/>


En el aspecto relacionado al desarrollo y diseño de plantillas, Joomla 1.6 ha incorporado como nuevas características:


* De forma predeterminada, el CMS cuenta con tres nuevas plantillas listas para utilizar y adaptar a las necesidades del sitio;

* El código generado por Joomla es 100% XHTML estricto;

* Incorporación de estilos en plantillas, una funcionalidad que permite dar más flexibilidad y personalización al sitio, permitiendo mostrar, por ejemplo, un estilo único a secciones determinadas;

* Detección integrada de navegadores, para poder cargar un estilo diferente para cada tipo de navegador.



### Tipos de plantillas

Antes de comenzar, es necesario saber que Joomla cuenta con dos tipos de plantillas:


* **Plantillas para utilizar en la administración *(backend)***: Son plantillas creadas especialmente para la parte de administración, las cuales pueden incorporar funcionalidades que faciliten el manejo de los contenidos en el sitio.

* **Plantillas para utilizar en el sitio público *(frontend)***: Son plantillas creadas para ser visualizadas por los visitantes. Pueden ser simples o complejas, todo dependerá del tipo de sitio y hacia quienes esta orientado.



### Encontrar las plantillas disponibles en la administración del CMS

Las plantillas disponibles para utilizar se encuentran, dentro de la administración, llendo a: **Extensiones → Gestor de plantillas → Plantillas**:

![](../incluir/figuras/image07.png)

A través del filtro por locación es posible seleccionar las plantillas pertenecientes al sitio ó a la administración. Al hacer click sobre la imagen correspondiente, se puede ver una vista alargada del diseño de la plantilla. Además, si hace click en el enlace de detalle, podrá acceder a los archivos principales la componen así como editarlos desde la misma interfaz:

![](../incluir/figuras/image09.png)

Por otro lado, si accede al apartado estilos, como se mencionó antes, podrá navegar por una de las nuevas características introducidas en Joomla 1.6: Los estilos en plantillas. 

![](../incluir/figuras/image30.png)

Esta funcionalidad lo que permite es, utilizando un mismo template otorgar un diseño diferente a determinada secciones. Por ejemplo: En gran parte de nuestro sitio deseamos utilizar la plantilla con el diseño predeterminado, pero en la sección contacto queremos que el color de fondo sea de otro color y que la estructura sea más angosta.


>Las características de personalización dependeran de cada plantilla. Existirán plantillas que otorgaran muchas opciones y flexibilidad mientras que otras pocas o ninguna.


Al acceder a uno de los items enlistados, podremos acceder a las opciones de personalización y a que secciones deseamos asignar el estilo:

![](../incluir/figuras/image25.png)

Como podemos ver, el nivel de personalización puede ser variados: Tamaño de estructuras, cambios de imágenes y textos, posición de elementos y diseño.



### Estructura básica de una plantilla

Las plantillas en Joomla! van alojadas dentro de la carpeta templates, en el directorio raiz del CMS. Allí dentro, cada plantilla esta separada por carpetas.

Todas las plantillas poseen la siguiente estructura básica de archivos y carpetas:

![](../incluir/figuras/image05.png)

Los archivos y carpetas dentro de la estructura pueden dividirse en obligatorios y no obligatorios:



#### Carpetas y archivos obligatorios

Son obligatorios, ya que si no estan presentes, la plantilla no funcionará:


* **Carpeta raiz**: Es la carpeta que contiene todos los archivos de la plantilla. Su nombre no debe posse espacios intermedios. Su ubicación es dentro de la carpeta templates, ubicada en el directorio raiz de Joomla;

* **index.php**: Archivo principal de la plantilla. Contiene la estructura básica, así como también los llamados a archivos CSS y JavaScript. Su contenido está formado por etiquetas HTML y PHP;

* **templateDetails.xml**: Archivo XML que sirve para instalar la plantilla en el CMS. Posee la siguiente información:

	* Datos relacionados a la plantilla: nombre de la plantilla, autor, licencia, versión, etc;
	
	* Estructura de carpetas, archivos y lenguajes;
	
	* Nombres de las posiciones de módulos que la plantilla admite;
	
	* Opciones de configuración de la plantilla.
	
* **template_preview.png**: Imagen con una captura completa de la plantilla en funcionamiento. Sirve como vista previa al momento de seleccionar una plantilla en el panel de administración;

* **template_thumbnail.png**: Pequeña imagen que también actúa como vista previa al momento de seleccionar una plantilla en el panel de administración;

* **index.html**: Archivo HTML en blanco (sin etiquetas). Sirve como método de seguridad en servidores que permiten la navegación de archivos desde el navegador. Es recomendable crear un archivo `index.html` por cada carpeta que la plantilla tenga;

* **css**: Carpeta que contendrá los estilos CSS que la plantilla utilizará.



#### Carpetas y archivos no obligatorios

Son archivos que agregan funcionalidades o características a la plantilla, pero que no son obligatorios de tener. Crearlos o no, dependerá de las necesidades al momento de crear la plantilla:


* **component.php**: Archivo PHP que permite crear una versión reducida de la plantilla. Por lo general, es utilizado como vista previa al querer imprimir un artículo ó enviarlo por email. En caso de no existir, se utiliza el archivo `component.php` ubicado en la carpeta `/templates/system/`;

* **error.php**: Archivo PHP utilizado para mostrar cuando existe ocurre algún error en el CMS ó cuando una página no es encontrada;

* **favicon.ico**: Imagen que se utilizará como icono de la página. Joomla comprueba que el archivo exista, en caso positivo, se insertan automaticamente las etiquetas apropiadas para mostrar el icono;

* **images**: Carpeta con imagenes a utilizar en el diseño de la plantilla;

* **js**: Carpeta con archivos JavaScript para utilizar en la plantilla;

* **html**: Los archivos alojados en esta carpeta permiten *sobrescribir* la salida HTML que imprime el CMS de forma predeterminada en componentes y módulos. Es decir, si deseamos personalizar el contenido HTML de una extensión, los archivos que lo harán serán ubicados en esta carpeta;

* **language**: Contendrá archivos de lenguajes `.ini`, los cuales serviran para mostrar textos diferentes dependiendo del idioma configurado para el sitio y la administración. Cada idioma está separado por carpeta.

