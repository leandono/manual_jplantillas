

El sistema de grillas de BluePrint
----------------------------------

**[BluePrint](http://www.blueprintcss.org/)** es una colección de archivos `.css`, los cuales poseen variados estilos predefinidos para ahorrar tiempo en diferentes tareas del diseño web: Maquetaciones, reseteo de estilos, diseño de formularios, tipografías, etc. Para la creación de la maquetación de la plantilla se utilizará su sistema de grillas.


>Puede obtener más información sobre BluePrint en su sitio web: <http://www.blueprintcss.org/>


El sistema de grillas de `BluePrint` es muy fácil de utilizar, permitiendo agilizar de forma severa el proceso de maquetación. Su mecanismo permite crear un máximo de 24 columnas (o grillas) las cuales se pueden combinar dependiendo de las necesidades:

![](incluir/figuras/image02.png)

La clave de su utilización es añadir una serie de clases predefinidas en los elementos del documento para poder crear las columnas y el ancho necesitado. 

Por ejemplo, si se desea crear dos columnas y que cada una utilice el espacio de ocho grillas, se deberá incorporar en el cuerpo del documento:


~~~~~~~~~{.html .numberLines}
<body>
	<div class="container">

		<div class="span-12">

		</div>

		<div class="span-12 last">

		</div>

	</div>
</body>
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


El `<div />` con la clase `container` será el elemento que contendrá todas las columnas de la maquetación. Al agregar dicha clase, se hará que el documento tenga un ancho de `950px` y aparezca centrada horizontalmente. Luego, cada `<div />` con la clase `span-12` especifica que ocupen el espacio de 12 grillas, o sea, la mitad del espacio disponible (recordar que como máximo se dispone de 24 grillas). 
De la misma forma, si se desea que cada columna ocupe un tercio del espacio, lo único que hay que hacer es cambiar la clase por `span-8`. 
Finalmente note que el último elemento (es decir, la última columna) debe tener la clase `last`, caso contrario la maquetación se visualizará de forma incorrecta.

También existen otras clases que permiten modificar la disposición de las columnas: `prepend-x` y `append-x`. La primera permite mover una columna más hacia la derecha, mientras que la otra más hacia la izquierda, todo dependerá del valor que se le asigne a `x` (por ejemplo: `prepend-4` / `append-4`).



********************************
