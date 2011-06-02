

Creación de los archivos de la plantilla
----------------------------------------

### Análisis previo

Antes de comenzar a crear los archivos pertenecientes a la plantilla, es muy importante trabajar un aspecto fundamental en toda pieza de software: el análisis previo.

A continuación de enumeran algunas cuestiones que deberá tener en cuenta al momento del análisis:


* **Definiciones gráficas**:
	
	* Contar con un diseño gráfico en el cual se basará la plantilla. El diseño deberá contemplar diferentes aspectos que permitan al usuario estar cómodo y además satisfaga las necesidades del sitio: Gama de colores, disposición de los elementos, técnicas gráficas utilizadas, usabilidad y accesibilidad.
	
* **Definiciones funcionales**:

	* Dependiendo de los requerimientos y necesidades, el sitio contará con una cantidad definida de funcionalidades. Para implementarlas, deberá analizar de que forma realizarlas: Utilizando las características que el CMS trae por defecto, instalando extensiones de terceros o desarrollando una solución personalizada. 
	
	* Debe tener en cuenta que la plantilla sea lo suficientemente extensible y flexible para adecuarse a distintas situaciones. Una manera de hacerlo es a través de la implementación de parámetros de configuración en la plantilla.
	
* **Definiciones técnicas**:

	* Si ya ha trabajado en el mundo del diseño y desarrollo web, sabrá que no siempre es posible realizar un sitio que luzca exactamente igual en todos los navegadores, versiones y dispositivos. Particularmente, Internet Explorer suele ser el navegador más problemático. Por lo tanto deberá tomar como determinación que navegadores, versiones y dispositivos serán soportados por la plantilla.
	
	* Nombre de la plantilla e información asociada: Deberá elegir un nombre representativo para la plantilla y si lo desea, una licencia;
	
	* Posiciones de módulos: Esta es una definición que dependerá de los elementos que compongan a la plantilla y su disposición. Para hacerlo, deberá delimitar el diseño en “zonas funcionales”, por ejemplo: zona perteneciente al menú, zona perteneciente a la caja de búsqueda, zona perteneciente a elementos izquierdos, etc. A partir de esta definición, le será fácil definir las posiciones de módulos y sus nombres.


>Tenga en cuenta que no siempre se podrá contar con anticipación con todos los puntos nombrados, sin embargo, cuanto antes los tenga, mejor.


En el caso de este manual, se utilizará el siguiente diseño para la realización de la plantilla:

![](incluir/figuras/image14.png)


>Créditos del diseño: [PSD Style](http://psdstyle.net/)


Al realizar el análisis, es posible definir las siguientes posiciones de módulos y funcionalidades:

![](incluir/figuras/image22.png)


* Tres espacios para módulos de menús (dos en la parte superior, uno en la parte inferior);

* Un espacio para un texto destacado;

* Un espacio para un video destacado;

* Un espacio para una texto resumido destacado;

* Un espacio central para tres artículos;

* Un espacio para un texto explicativo;

* Un espacio para un slideshow de imágenes;


Además la plantilla contará con las siguientes definiciones:


* Nombre de la plantilla: InterPoint

* Licencia: GNU General Public License version 2

* Navegadores soportados: Internet Explorer 8 o superior, Firefox 3.6 o superior, Google Chrome, Safari 5 o superior.


Una vez obtenidos los resultados del análisis es posible proseguir con la creación de los archivos.



### Utilizar la plantilla `atomic` como base

A partir de la versión 1.6, Joomla incorpora una nueva plantilla llamada *atomic*, la cual tiene como objetivo que pueda ser utilizada como base para la creación de nuevas plantillas. Su principal característica es la de utilizar [Blueprint](http://www.blueprintcss.org/), un *framework* CSS que permite agilizar la creación de estilos y maquetaciones.

Para comenzar, lo primero será ir a la carpeta `templates` para copiar y pegar el directorio `atomic`. Luego se renombra la carpeta copiada con el nombre que se ha seleccionado para la plantilla.


>El nombre debe estar en minúsculas y con guiones bajos (en caso de tener espacios de por medio).


![](incluir/figuras/image51.png)

Lo siguiente será ir por cada uno de los archivos para modificarlos en base a las necesidades solitatas.



********************************
