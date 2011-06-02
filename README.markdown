#Desarrollo de plantillas para Joomla! 1.6 y versiones posteriores



##Introducción

En el momento de construir un sitio web utilizando Joomla!, la creación de plantillas (ó *templates*) suele ser uno de los trabajos más comunes que emprenden diseñadores y desarrolladores web.

Esta guía pretende ser un documento fundamental para que, tanto usuarios noveles como avanzados, aprendan a realizar una plantilla funcional para Joomla! 1.6.

Al finalizar el documento, el lector deberá ser capaz de:


* Entender la estructura básica de una plantilla;

* Conocer los archivos que la componen y su funcionalidad;

* Poder agregar nuevas características y estilos personalizados;

* Conocer cómo modificar correctamente plantillas ya creadas;

* Saber crearlas plantillas desde cero.



#Sobre este libro

* **Autor**: [Leandro D'Onofrio](http://dzign.us/), para [Comunidad Joomla](http://comunidadjoomla.org/) y [Biblioteca Comunidad Joomla](http://biblioteca.comunidadjoomla.org/).

* **Correcciones**: [Rafael Gomez](http://comunidadjoomla.org/) y [Gustavo Raúl Aragón](http://comunidadjoomla.org/).

* **Licencia**: [Creative Commons Reconocimiento-NoComercial-CompartirIgual 2.5 España](http://creativecommons.org/licenses/by-nc-sa/2.5/es/): Eres libre de copiar, distribuir, transmitir y modificar el trabajo, siempre y cuando hagas referencia la autoría original a [Leandro D'Onofrio](http://dzign.us/), para [Comunidad Joomla](http://comunidadjoomla.org/) y [Biblioteca Comunidad Joomla](http://biblioteca.comunidadjoomla.org/). Si alteras, transformas o creas una obra derivada, deberás distribuir el resultado bajo una licencia igual, similar o compatible. Cualquiera de las condiciones mencionadas pueden no aplicarse si obtienes permisos del autor. Para cualquier reutilización o distribución, deberás dejar en claro la licencia, la mejor manera para hacerlo es a través de un enlace hacia la licencia [Creative Commons Reconocimiento-NoComercial-CompartirIgual 2.5 España](http://creativecommons.org/licenses/by-nc-sa/2.5/es/).


#¿Quieres colaborar / realizar mejoras en el material?

Tienes dos formas de hacerlo:

* Si es un error ó mejora, puedes subir un ticket en el panel de incidencias: <https://github.com/dzignus/manual_jplantillas/issues>. Trata de detallar de forma especifica el asunto :)

* Si quieres contribuir con textos, puedes [clonar el repositorio](http://help.github.com/fork-a-repo/), realizar los cambios y enviar una solicitud para incorporarlos. Los contenidos a añadir pueden ser de todo tipo: nuevos temas, mejores explicaciones, trucos, tips, etc. 
Los textos de cada capítulo se encuentran dentro de la carpeta `/libro/markdown`. Allí cada capítulo es un `.markdown` el cual no es más que archivo de texto plano, escrito en markdown, una forma muy fácil de desarrollar textos (muy similar a la forma con que se escriben los textos en la wikipedia...). Más información sobre la sintaxis de markdown: <http://es.debugmodeon.com/articulo/sintaxis-de-markdown> (aunque si abres un capítulo con cualquier editor de textos te darás cuenta lo fácil que es...)


#Código de ejemplo

Todo el código de ejemplo que se desarrolla en el manual está dentro de la carpeta ``templates`` del repositorio. Allí además se irán incorporando nuevos documentos que permitan complementar más los conocimientos.

