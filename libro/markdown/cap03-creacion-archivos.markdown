

Creación de los archivos de la plantilla
----------------------------------------

### Análisis previo

Antes de comenzar a crear la plantilla, es muy importante trabajar un aspecto fundamental en toda pieza de software: el análisis.

A continuación de enumeran algunas cuestiones para el análisis previo:


* **Definiciones gráficas**:
	
	* Contar con un diseño gráfico el cual se basará la plantilla. El diseño deberá contemplar diferentes aspectos que permitan al usuario estar cómodo en el sitio: Gama de colores, disposición de los elementos, técnicas gráficas utilizadas, usabilidad y accesibilidad.
	
* **Definiciones funcionales**:

	* Dependiendo de los requerimientos y necesidades, el sitio contará con una cantidad definida de funcionalidades. Para implementarlas, es necesario saber de que forma se realizará: Utilizando las características que el CMS trae por defecto, instalando extensiones de terceros ó desarrollando nuestra propia solución. 
	
	* Debe tener en cuenta que la plantilla sea lo suficientemente extendible y flexible para adecuarse a distintas situaciones. Una manera de hacerlo es a través de la implementación de parametros de configuración en la plantilla.
	
* **Definiciones técnicas**:

	* Si trabajó en el mundo del diseño y desarrollo web, sabrá que no siempre es posible realizar un sitio que luzca exactamente igual en todos los navegadores y en todas sus versiones. Particularmente, Internet Explorer suele ser el navegador más problematico. Por lo tanto deberá tomar como determinación que navegadores y que versiones serán soportados por la plantilla.
	
	* Nombre de la plantilla y licencia: Deberá elegir un nombre representativo para la plantilla y si lo desea, una licencia;
	
	* Posiciones de módulos que contendrá la plantilla: Esta es una definición que dependerá de los elementos que compongan a la plantilla y su disposición. Para hacerlo, deberá delimitar el diseño en “zonas funcionales”, por ejemplo: zona perteneciente al menú, zona perteneciente a la caja de búsqueda, zona perteneciente a elementos izquierdos, etc. A partir de esta definición, le será fácil definir las posiciones de módulos y sus nombres.


>Tenga en cuenta que no siempre se podrá contar con anticipación con todos los puntos nombrados, sin embargo, cuanto antes los tenga, mejor.


En nuestro caso, este será el diseño que realizaremos como demostración:

![](../incluir/figuras/image14.png)


>Diseño obtenido de [PSD Style](http://psdstyle.net/)


Del análisis, podemos definir las siguientes posiciones de módulos y funcionalidades:

![](../incluir/figuras/image22.png)


* Tres espacios para módulos de menus (dos en la parte superior, uno en la parte inferior);

* Un espacio para un texto destacado;

* Un espacio para un video destacado;

* Un espacio para una texto resumido destacado;

* Un espacio central para tres artículos;

* Un espacio para un texto explicativo;

* Un espacio para un slideshow;


Además la plantilla contará con las siguientes definiciones:


* Nombre de la plantilla: InterPoint

* Licencia: GNU General Public License version 2

* Navegadores soportados: Internet Explorer 8, Firefox 3.6, Google Chrome, Safari 5

Ahora si, podemos comenzar a crear nuestra plantilla.



### Utilizar la plantilla `atomic` como base

Joomla! 1.6 incorpora una nueva plantilla llamada atomic, la cual tiene como objetivo ser utilizada como base para la creación de nuevas plantillas. Su principal característica es la de utilizar [Blueprint](http://www.blueprintcss.org/), un framework CSS que permite agilizar la creación de estilos y maquetaciones.

Para comenzar, lo primero que se haremos será ir a la carpeta templates para copiar y pegar el directorio `atomic`. Luego renombramos la carpeta copiada con el nombre que queremos que se llame nuestro trabajo.


>El nombre debe estar en minúscula y con guiones bajos (en caso de tener espacios de por medio).


![](../incluir/figuras/image51.png)

Ahora iremos por cada uno de los archivos para modificarlos a nuestra necesidad.

