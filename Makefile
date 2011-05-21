#AUN NO FUNCIONA EL MAKEFILE

pandoc -s -S --toc --section-divs --template libro/html/incluir/pandoc/html.template libro/markdown/cap01-bienvenido.markdown libro/markdown/cap02-introduccion-plantillas.markdown libro/markdown/cap03-creacion-archivos.markdown libro/markdown/cap04-templateDetails.markdown libro/markdown/cap05-index.markdown libro/markdown/cap06-blueprint.markdown libro/markdown/cap07-maquetacion.markdown libro/markdown/cap08-diseno.markdown libro/markdown/cap09-consideraciones.markdown libro/markdown/cap10-parametros.markdown libro/markdown/cap11.1-personalizacion-modulos.markdown libro/markdown/cap11.2-personalizacion-componentes.markdown libro/markdown/cap12-jquery.markdown libro/markdown/cap13-paginas-errores.markdown libro/markdown/cap14-apendice.markdown -o libro/html/index.html


wkpdf --source libro/html/index.html --output libro/pdf/desarrollo_plantillas_joomla.pdf --margins 60 --stylesheet-media print --caching false --print-background true
