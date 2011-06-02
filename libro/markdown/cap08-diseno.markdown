

template.css
------------

Llegó el momento de añadir diseño a la plantilla. Para eso se editará el archivo `template.css` que se encuentra dentro de la carpeta `css` de la plantilla. Note que ya existe contenido dentro del archivo, lo que se hará es borrarlo para luego incorporar los estilos apropiados. 


>Antes de comenzar a escribir los estilos, es muy importante tener preparados los recortes de las diferentes imágenes que componen el diseño. Dichas imágenes deben ir guardadas en la carpeta `images` de la plantilla.


![](incluir/figuras/image11.png)


>Si no sabe recortar imágenes con Photoshop, puede consultar el siguiente artículo: <http://www.todo-photoshop.com/tutorial-photoshop/basicos/recortando_imagenes_photoshop.html>


>A medida que se van aplicando los estilos es conveniente ir rellenando el sitio con contenidos (menús, artículos, etc.) para poder visualizar de mejor manera el trabajo.


>El nivel de comprensión de los estilos mostrados a continuación dependaran de los conocimientos de CSS que posea. Si desea introducirse más en profundidad con los estilos en cascada, puede consultar la colección referente a este tema en **LibrosWeb**: <http://www.librosweb.es/>.
>Aún así, los estilos descritos son de ejemplo, los cuales pueden mejorarse o implementarse de otra forma.


**Estilos generales**

Los primeros estilos corresponden para elementos generales del sitio: Tipografías, colores de enlaces, etc:


~~~~~~~~~{.css .numberLines}
/* Estilos generales
---------------------------------------------------------*/
body{
   background: #FFF;
   color: #5f5d5d;
   font-family: Arial, Helvetica, sans-serif;
   font-size: 14px;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


**Estilos para la parte superior**

Se continua con los estilos para la parte superior:


~~~~~~~~~{.css .numberLines}
/* Parte superior
---------------------------------------------------------*/
#header{
   padding: 15px 0 20px 0;
   border-bottom: 1px solid #bcb9b9;
}


/* Logo y eslogan
---------------------------------------------------------*/
#logo{
   position: relative;
}

#logo h1{
   width: 330px;
   height: 80px;
   background: transparent url(../images/interpoint-logo.png) no-repeat left top;
   margin: 0;
   text-indent: -3000px;
}

#logo a{
   display: block;
}

#eslogan{
   color: #696767;
   font-size: 14px;
   font-weight: normal;
   margin: 0;
   position: absolute;
   right: 20px;
   bottom: 0px;
}


/* Menú ingresar
---------------------------------------------------------*/
#menu_ingresar ul{
   margin: 0;
   overflow: hidden;
}

#menu_ingresar li{
   width: 72px;
   float: right;
   list-style: none;
   margin: 0 0 0 20px;
}

#menu_ingresar li a{
   display: block;
   width: 72px;
   height: 31px;
   line-height: 30px;
   text-align: center;
   text-decoration: none;
   color: #FFF;
   background: transparent url(../images/interpoint-boton.png) no-repeat center top;
}

#menu_ingresar li a:hover{
   text-decoration: underline;
}


/* Menú superior principal
---------------------------------------------------------*/
#menu_superior ul{
   margin: 20px 0 0 30px;
   overflow: hidden;
   padding: 0;
}

#menu_superior li{
   width: auto;
   float: left;
   list-style: none;
   margin: 0 0 0 20px;
}

#menu_superior li a{
   display: block;
   text-align: center;
   text-decoration: none;
   color: #959393;
}

#menu_superior li a:hover{
   text-decoration: underline;
}

#menu_superior .selected a{
   color: #036e9e;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


![](incluir/figuras/image00.png)
	
Para completar los espacios superiores, se utilizaron dos módulos del tipo **Menú**.



**Estilos para el destacado superior, video y caja media**

Luego se continúa con los estilos para el destacado superior, video y caja del medio:


~~~~~~~~~{.css .numberLines}
/* Destacado superior
---------------------------------------------------------*/
#destacado_superior{
   margin: 40px 0 0 0;
}

#destacado_superior h3{
   color: #035f88;
   font-size: 28px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   font-weight: 600;
}

#destacado_superior p{
   font-size: 18px;
   color: #5f5d5d;
}

#destacado_superior a{
   display: block;
   width: 262px;
   height: 64px;
   color: #FFF;
   font-size: 28px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   font-weight: 600;
   line-height: 55px;
   text-decoration: none;
   text-align: center;
   text-shadow: 1px 1px 3px #000;
   margin: 0 auto;
   background: transparent url(../images/interpoint-boton-grande.png) no-repeat top center;
}

#destacado_superior a:hover{
   text-decoration: underline;
}


/* Video
---------------------------------------------------------*/
#video{
   height: 355px;
   margin: 40px 0 0 0;
   background: transparent url(../images/interpoint-video.png) no-repeat top center;
   position: relative;
}

#reproductor{
   position: absolute;
   left: 72px;
   top: 17px;
}


/* Caja medio
---------------------------------------------------------*/
#caja_medio{
   background: #d9eef7;
   margin: 50px 0 0 0;
}

#caja_medio p{
   padding: 10px;
   color: #181818;
   font-size: 18px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   margin: 0;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


![](incluir/figuras/image04.png)
	
Para completar los espacios se utilizaron tres módulos del tipo **HTML personalizado** (uno con el texto destacado/botón, otro con el video y otro con un pequeño texto para la caja media).



**Estilos para las columnas centrales**

Luego se incorporan los estilos para las columnas medias:


~~~~~~~~~{.css .numberLines}
/* Contenido / Columnas centrales
---------------------------------------------------------*/
#contenido{
   margin: 50px 0 0 0;
}

#contenido .leading-0, #contenido .leading-1, #contenido .leading-2{
   width: 280px;
   float: left;
}

#contenido h2{
   line-height: 55px;
   margin: 0 0 10px 0;
}

#contenido h2 a{
   color: #035f88;
   font-size: 20px;
   font-weight: 600;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   text-decoration: none;
}

#contenido h2 a:hover{
   text-decoration: underline;
}

#contenido .leading-0{
   margin: 0 50px 0 0;
}

#contenido .leading-1{
   margin: 0 50px 0 0;
}

#contenido .leading-2{
   margin: 0;
}

#contenido .leading-0 h2{
   padding: 0 0 0 69px;
   background: transparent url(../images/interpoint-icono-1.png) no-repeat left center;
}

#contenido .leading-1 h2{
   padding: 0 0 0 60px;
   background: transparent url(../images/interpoint-icono-2.png) no-repeat left center;
}

#contenido .leading-2 h2{
   padding: 0 0 0 71px;
   background: transparent url(../images/interpoint-icono-3.png) no-repeat left center;
}

#contenido .readmore a{
   color: #3c8203;
   text-decoration: none;
}

#contenido .readmore a:hover{
   text-decoration: underline;
}

#contenido .readmore a:before {
 content: ">> ";
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


![](incluir/figuras/image21.png)
	
Como se explicó anteriormente, los contenidos de las columnas están conformados por tres artículos seleccionados para ser publicados en la página de inicio.



**Estilos para el texto destacado inferior y slideshow**


~~~~~~~~~{.css .numberLines}
/* Destacado inferior
---------------------------------------------------------*/
#destacado_inferior{
   margin: 50px 0 0 0;
}

#destacado_inferior .newsflash-title{
   color: #035f88;
   font-size: 20px;
   font-weight: 600;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
}

#destacado_inferior .readmore{
   display: block;
   width: 94px;
   height: 30px;
   line-height: 30px;
   background: transparent url(../images/interpoint-leermas.png) no-repeat center center;
   color: #5f5d5d;
   text-decoration: none;
   text-align: center;
}

#destacado_inferior .readmore:hover{
   text-decoration: underline;
}


/* Slideshow inferior
---------------------------------------------------------*/
#slideshow_inferior{
   margin: 50px 0 0;
   position: relative;
}

#slideshow_contenedor{
   border: 10px solid #eeeded;
   height: 195px;
   width: 290px;
   float: right;
}

#slideshow_inferior .slideshow_nav{
   width: 29px;
   height: 29px;
   position: absolute;
   top: 90px;
   cursor: pointer;
   z-index: 100;
}

#slideshow_izq{
   background: transparent url(../images/interpoint-slideshow-izq.png) no-repeat center center;
   left: -10px;
}

#slideshow_der{
   background: transparent url(../images/interpoint-slideshow-der.png) no-repeat center center;
   right: -10px;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


![](incluir/figuras/image38.png)
	
Para los mostrar el artículo se utilizó un módulo del tipo **Artículos - Noticias de actualidad**. Se lo configuró para mostrar un solo artículo, de una categoría definida, ordenado por fecha. De esta forma, en esta sección pueden ir, por ejemplo, las últimas noticias del sitio y cada vez que se carga una noticia nueva, esta aparece en dicho lugar. 

Para la sección de slideshow, se utilizó un módulo de **HTML personalizado**. Se incorporó una sola imagen en modo de demostración.


>El slideshow aún no es funcional. Más adelante se explicará como agregar la funcionalidad a la plantilla utilizando JavaScript.



**Estilos para el footer y zona inferior**


~~~~~~~~~{.css .numberLines}
/* Footer y menú inferior
---------------------------------------------------------*/
#footer{
   height: 200px;
   background: transparent url(../images/interpoint-footer.png) no-repeat top center;
}

#legal{
   color: #6e6d6d;
   font-size: 12px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   margin: 175px 0 0 0;
   line-height: 12px;
}

#menu_inferior{
   margin: 175px 0 0 0;
}

#menu_inferior ul{
   overflow: hidden;
   padding: 0;
   margin: 0;
}

#menu_inferior li{
   width: auto;
   float: left;
   list-style: none;
   margin: 0 0 0 10px;
}

#menu_inferior li a{
   display: block;
   text-align: center;
   text-decoration: none;
   color: #6e6d6d;
   font-size: 12px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   border-left: 1px solid #6e6d6d;
   padding: 0 0 0 10px;
   line-height: 12px;
}

#menu_inferior li:first-child a{
   border: 0px;
}

#menu_inferior li a:hover{
   text-decoration: underline;
}

#menu_inferior .selected a{
   color: #036e9e;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


![](incluir/figuras/image39.png)
	
Para completar las zonas inferiores se usó un solo módulo **Menú** con distintos enlaces hacia secciones del sitio.



**Estilos para elementos y mensajes del sistema**

Por último se agregan estilos pertenecientes a elementos comunes en el CMS: Mensajes del sistema, iconos de acciones y tooltips.


~~~~~~~~~{.css .numberLines}
/* Estilos pertenecientes al CMS
---------------------------------------------------------*/
/* Mensajes del sistema
---------------------------------------------------------*/
#system-message{
  display: block;
  clear: both;
  padding: 15px 0 0 0;
}

#system-message dt, #system-message dd{
  margin: 5px 0;
}

#system-message ul{
  margin: 0;
}


/* Acciones
---------------------------------------------------------*/
ul.actions {
  clear:both;
  margin-top: -50px;
  float:right;
}

ul.actions li {
  list-style-type: none;
  float:right;
  margin-left: 10px;
}


/* Tooltips
---------------------------------------------------------*/
.tip-wrap{
  background: #D9EEF7;
  padding: 5px;
  font-size: 12px;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Estos elementos aparecen en ciertas situaciones, por ejemplo: cuando un usuario quiere ingresar al sitio y la acción es rechazada, el CMS muestra un mensaje. Los iconos de acciones y tooltips suelen aparecer cuando se ingresa al sitio con permisos de edición de artículos:

![](incluir/figuras/image29.png)



**Estilos completos**

Al juntar todos los estilos, el archivo `template.css` conformado de la siguiente forma:


~~~~~~~~~{.css .numberLines}
/* Estilos generales
---------------------------------------------------------*/
body{
   background: #FFF;
   color: #5f5d5d;
   font-family: Arial, Helvetica, sans-serif;
   font-size: 14px;
}


/* Parte superior
---------------------------------------------------------*/
#header{
   padding: 15px 0 20px 0;
   border-bottom: 1px solid #bcb9b9;
}


/* Logo y eslogan
---------------------------------------------------------*/
#logo{
   position: relative;
}

#logo h1{
   width: 330px;
   height: 80px;
   background: transparent url(../images/interpoint-logo.png) no-repeat left top;
   margin: 0;
   text-indent: -3000px;
}

#logo a{
   display: block;
}

#eslogan{
   color: #696767;
   font-size: 14px;
   font-weight: normal;
   margin: 0;
   position: absolute;
   right: 20px;
   bottom: 0px;
}


/* Menú ingresar
---------------------------------------------------------*/
#menu_ingresar ul{
   margin: 0;
   overflow: hidden;
}

#menu_ingresar li{
   width: 72px;
   float: right;
   list-style: none;
   margin: 0 0 0 20px;
}

#menu_ingresar li a{
   display: block;
   width: 72px;
   height: 31px;
   line-height: 30px;
   text-align: center;
   text-decoration: none;
   color: #FFF;
   background: transparent url(../images/interpoint-boton.png) no-repeat center top;
}

#menu_ingresar li a:hover{
   text-decoration: underline;
}


/* Menú superior principal
---------------------------------------------------------*/
#menu_superior ul{
   margin: 20px 0 0 30px;
   overflow: hidden;
   padding: 0;
}

#menu_superior li{
   width: auto;
   float: left;
   list-style: none;
   margin: 0 0 0 20px;
}

#menu_superior li a{
   display: block;
   text-align: center;
   text-decoration: none;
   color: #959393;
}

#menu_superior li a:hover{
   text-decoration: underline;
}

#menu_superior .selected a{
   color: #036e9e;
}


/* Destacado superior
---------------------------------------------------------*/
#destacado_superior{
   margin: 40px 0 0 0;
}

#destacado_superior h3{
   color: #035f88;
   font-size: 28px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   font-weight: 600;
}

#destacado_superior p{
   font-size: 18px;
   color: #5f5d5d;
}

#destacado_superior a{
   display: block;
   width: 262px;
   height: 64px;
   color: #FFF;
   font-size: 28px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   font-weight: 600;
   line-height: 55px;
   text-decoration: none;
   text-align: center;
   text-shadow: 1px 1px 3px #000;
   margin: 0 auto;
   background: transparent url(../images/interpoint-boton-grande.png) no-repeat top center;
}

#destacado_superior a:hover{
   text-decoration: underline;
}


/* Video
---------------------------------------------------------*/
#video{
   height: 355px;
   margin: 40px 0 0 0;
   background: transparent url(../images/interpoint-video.png) no-repeat top center;
   position: relative;
}

#reproductor{
   position: absolute;
   left: 72px;
   top: 17px;
}


/* Caja medio
---------------------------------------------------------*/
#caja_medio{
   background: #d9eef7;
   margin: 50px 0 0 0;
}

#caja_medio p{
   padding: 10px;
   color: #181818;
   font-size: 18px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   margin: 0;
}


/* Contenido / Columnas centrales
---------------------------------------------------------*/
#contenido{
   margin: 50px 0 0 0;
}

#contenido .leading-0, #contenido .leading-1, #contenido .leading-2{
   width: 280px;
   float: left;
}


#contenido h2{
   line-height: 55px;
   margin: 0 0 10px 0;
}

#contenido h2 a{
   color: #035f88;
   font-size: 20px;
   font-weight: 600;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   text-decoration: none;
}

#contenido h2 a:hover{
   text-decoration: underline;
}

#contenido .leading-0{
   margin: 0 50px 0 0;
}

#contenido .leading-1{
   margin: 0 50px 0 0;
}

#contenido .leading-2{
   margin: 0;
}

#contenido .leading-0 h2{
   padding: 0 0 0 69px;
   background: transparent url(../images/interpoint-icono-1.png) no-repeat left center;
}

#contenido .leading-1 h2{
   padding: 0 0 0 60px;
   background: transparent url(../images/interpoint-icono-2.png) no-repeat left center;
}

#contenido .leading-2 h2{
   padding: 0 0 0 71px;
   background: transparent url(../images/interpoint-icono-3.png) no-repeat left center;
}

#contenido .readmore a{
   color: #3c8203;
   text-decoration: none;
}

#contenido .readmore a:hover{
   text-decoration: underline;
}

#contenido .readmore a:before {
   content: ">> ";
}


/* Destacado inferior
---------------------------------------------------------*/
#destacado_inferior{
   margin: 50px 0 0 0;
}

#destacado_inferior .newsflash-title{
   color: #035f88;
   font-size: 20px;
   font-weight: 600;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
}

#destacado_inferior .readmore{
   display: block;
   width: 94px;
   height: 30px;
   line-height: 30px;
   background: transparent url(../images/interpoint-leermas.png) no-repeat center center;
   color: #5f5d5d;
   text-decoration: none;
   text-align: center;
}

#destacado_inferior .readmore:hover{
   text-decoration: underline;
}


/* Slideshow inferior
---------------------------------------------------------*/
#slideshow_inferior{
   margin: 50px 0 0;
   position: relative;
}

#slideshow_contenedor{
   border: 10px solid #eeeded;
   height: 195px;
   width: 290px;
   float: right;
}

#slideshow_inferior .slideshow_nav{
   width: 29px;
   height: 29px;
   position: absolute;
   top: 90px;
   cursor: pointer;
   z-index: 100;
}

#slideshow_izq{
   background: transparent url(../images/interpoint-slideshow-izq.png) no-repeat center center;
   left: -10px;
}

#slideshow_der{
   background: transparent url(../images/interpoint-slideshow-der.png) no-repeat center center;
   right: -10px;
}


/* Footer y menú inferior
---------------------------------------------------------*/
#footer{
   height: 200px;
   background: transparent url(../images/interpoint-footer.png) no-repeat top center;
}

#legal{
   color: #6e6d6d;
   font-size: 12px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   margin: 175px 0 0 0;
   line-height: 12px;
}

#menu_inferior{
   margin: 175px 0 0 0;
}

#menu_inferior ul{
   overflow: hidden;
   padding: 0;
   margin: 0;
}

#menu_inferior li{
   width: auto;
   float: left;
   list-style: none;
   margin: 0 0 0 10px;
}

#menu_inferior li a{
   display: block;
   text-align: center;
   text-decoration: none;
   color: #6e6d6d;
   font-size: 12px;
   font-family: "Myriad Pro", Arial, Helvetica, sans-serif;
   border-left: 1px solid #6e6d6d;
   padding: 0 0 0 10px;
   line-height: 12px;
}

#menu_inferior li:first-child a{
   border: 0px;
}

#menu_inferior li a:hover{
   text-decoration: underline;
}

#menu_inferior .selected a{
   color: #036e9e;
}


/* Estilos pertenecientes al CMS
---------------------------------------------------------*/
/* Mensajes del sistema
---------------------------------------------------------*/
#system-message{
   display: block;
   clear: both;
   padding: 15px 0 0 0;
}

#system-message dt, #system-message dd{
   margin: 5px 0;
}

#system-message ul{
   margin: 0;
}


/* Acciones
---------------------------------------------------------*/
ul.actions {
   clear:both;
   margin-top: -50px;
   float:right;
}

ul.actions li {
   list-style-type: none;
   float:right;
   margin-left: 10px;
}


/* Tooltips
---------------------------------------------------------*/
.tip-wrap{
   background: #D9EEF7;
   padding: 5px;
   font-size: 12px;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~



********************************
