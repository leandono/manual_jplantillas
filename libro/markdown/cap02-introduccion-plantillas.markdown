

Breve introducción a las plantillas en Joomla!
----------------------------------------------


Antes de comenzar, puede que se pregunte ¿qué es una plantilla y para qué sirve?. Las plantillas son archivos que permiten controlar el diseño y la disposición de los elementos a lo largo de un sitio. Las mismas incluyen:


* El marcado HTML y la maquetación base del sitio;

* Los espacios donde se mostrarán los contenidos (artículos, módulos, componentes);

* El diseño (a través de estilos en cascada e imágenes);

* Y funcionalidades especificadas que dependerán de cada plantilla.


En particular, Joomla posee un excelente sistema de plantillas que permite adaptar cualquier sitio a los requerimientos deseados. Además, a medida que el *CMS* (Sistema de gestión de contenidos) evoluciona, el mismo va incorporando nuevas características que permiten mejorar la experiencia al momento de crear una plantilla. Actualmente, la última versión es la 1.6, la cual incorpora:


* Tres nuevos *templates* listos para utilizar y adaptar a las necesidades del sitio;

* El código generado por la aplicación es 100% XHTML estricto;

* Incorporación de estilos en plantillas, una funcionalidad que permite dar más flexibilidad y personalización al sitio, permitiendo mostrar, por ejemplo, un estilo único en secciones determinadas;

* Detección integrada de navegadores, para poder cargar un estilo diferente para cada tipo de navegador.


	>Si desea conocer en mayor detalle otras características nuevas de Joomla! 1.6, puede visitar el sitio oficial dedicado a dicha versión: <http://www.joomla.org/16/>



### Tipos de plantillas

Joomla cuenta con dos tipos de plantillas:


* **Plantillas para utilizar en la administración *(backend)***: Son creadas especialmente para la parte de administración, las cuales pueden incorporar funcionalidades que faciliten el manejo de los contenidos en el sitio.

* **Plantillas para utilizar en el sitio público *(frontend)***: Son creadas para ser visualizadas por los visitantes. Pueden ser simples o complejas, todo dependerá del tipo de sitio y hacia quienes está orientado. Durante este manual aprenderá a crear este tipo de plantillas.



### Encontrar las plantillas disponibles en la administración del CMS

Las plantillas disponibles para utilizar se encuentran, dentro de la administración, yendo a: **Extensiones → Gestor de plantillas → Plantillas**:

![](incluir/figuras/image07.png)

A través del filtro por locación es posible mostrar las plantillas pertenecientes al sitio o a la administración. Al hacer clic sobre la imagen correspondiente, se mostrará una vista alargada del diseño de la plantilla. Además, al clickear en el enlace de detalle, podrá acceder a los archivos principales que componen a la plantilla, así como editarlos desde la misma interfaz:

![](incluir/figuras/image09.png)

Por otro lado, al acceder al apartado estilos, como se mencionó antes, podrá navegar por una de las nuevas características introducidas en Joomla 1.6: Los estilos en plantillas. 

![](incluir/figuras/image30.png)

Esta funcionalidad lo que permite es, utilizando un mismo *template* otorgar un diseño diferente a determinadas secciones. Por ejemplo: En gran parte del sitio se desea utilizar la plantilla con un diseño predeterminado, pero en la sección *contacto* se requiere que el color de fondo sea otro y que la estructura sea más angosta.


>Las características de personalización dependerán de cada plantilla. Existirán plantillas que otorgarán muchas opciones y flexibilidad mientras que otras otorgarán pocas o ninguna.


Al acceder a uno de los items enlistados, es posible acceder a las opciones de personalización y especificar a qué secciones se desea asignar el estilo:

![](incluir/figuras/image25.png)

El nivel de personalización puede ser variado: Tamaño de estructuras, cambios de imágenes y textos, posición de elementos y diseño.



### Estructura básica de una plantilla

Las plantillas en Joomla! van alojadas dentro de la carpeta `templates`, en el directorio raiz del CMS. Allí dentro, cada plantilla esta separada por carpetas.

Todas las plantillas poseen la siguiente estructura básica de archivos y carpetas:

![](incluir/figuras/image05.png)

Los archivos y carpetas dentro de la estructura pueden dividirse en obligatorios y no obligatorios:



#### Carpetas y archivos obligatorios

Son obligatorios, ya que si no están presentes, la plantilla no funcionará:


* **Carpeta raiz**: Es la carpeta que contiene todos los archivos de la plantilla. Su nombre no debe poseer espacios intermedios. Su ubicación está dentro de la carpeta `templates`, que se encuentra en el directorio raíz;

* **index.php**: Archivo principal de la plantilla. Contiene la estructura básica, así como también las llamadas a archivos CSS y JavaScript. Su contenido está formado por etiquetas HTML y PHP;

* **templateDetails.xml**: Archivo XML que sirve para instalar la plantilla en el CMS. Posee la siguiente información:

	* Datos relacionados con la plantilla: nombre de la plantilla, autor, licencia, versión, etc;
	
	* Estructura de carpetas, archivos y lenguajes;
	
	* Nombres de las posiciones de módulos que la plantilla admite;
	
	* Opciones de configuración de la plantilla.
	
* **template_preview.png**: Imagen con una captura completa de la plantilla en funcionamiento. Sirve como vista previa al momento de seleccionar una plantilla en el panel de administración;

* **template_thumbnail.png**: Pequeña imagen que también actúa como vista previa al momento de seleccionar una plantilla en el panel de administración;

* **index.html**: Archivo HTML en blanco (sin etiquetas). Sirve como método de seguridad en servidores que permiten explorar directorios de archivos desde el navegador. Es recomendable crear un archivo `index.html` por cada carpeta que tenga la plantilla;

* **css**: Carpeta que contendrá los estilos CSS que utilizará la plantilla.



#### Carpetas y archivos no obligatorios

Son archivos que agregan funcionalidades o características a la plantilla, pero que no es obligatorio incluirlos. Crearlos o no, dependerá de las necesidades al momento de crear la plantilla:


* **component.php**: Archivo PHP que permite crear una versión reducida de la plantilla. Por lo general, se usa como vista previa al querer imprimir un artículo o enviarlo por correo electrónico. En caso de no existir, se utiliza el archivo `component.php` ubicado en la carpeta `/templates/system/`;

* **error.php**: Archivo PHP utilizado para mostrarse cuando ocurre algún error en el CMS o cuando una página no ha sido encontrada;

* **favicon.ico**: Imagen que se utilizará como icono de la página. Joomla comprueba que el archivo exista y, en caso positivo, se incorporan automáticamente las etiquetas apropiadas para mostrarlo;

* **images**: Carpeta con imágenes a utilizar en el diseño de la plantilla;

* **js**: Carpeta con archivos JavaScript para utilizar en la plantilla;

* **html**: Los archivos alojados en esta carpeta permiten *sobrescribir* la salida HTML que imprime el CMS de forma predeterminada en componentes y módulos. Es decir, si desea personalizar el contenido HTML de una extensión, los archivos que lo harán serán ubicados en esta carpeta;

* **language**: Contendrá archivos del idioma `.ini`, los cuales servirán para mostrar textos diferentes dependiendo del idioma configurado para el sitio y la administración. Cada idioma está separado por su correspondiente carpeta.



********************************
