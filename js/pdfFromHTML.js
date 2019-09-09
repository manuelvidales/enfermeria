function ver_expedientes(){
var pdf = new jsPDF('p', 'pt', 'letter');
source = $('#ver_expedientes')[0];
specialElementHandlers = {
	'#bypassme': function(element, renderer){
		return true
	}
}
margins = {
    top: 30,
    left: 40,
    width: 645
  };
pdf.fromHTML(
  	source // HTML string or DOM elem ref.
  	, margins.left // x coord
  	, margins.top // y coord
  	, {
  		'width': margins.width // ancho máximo del contenido en PDF
  		, 'elementHandlers': specialElementHandlers
  	},
  	function (dispose) {
   	  // dispose: el objeto con X, Y de la última línea se agrega al PDF
  	  //          Esto permite la inserción de nuevas líneas después de html.
        pdf.save('Reporte_.pdf'); //nombre inicial con que se identificara cada documento despues del '_' los enumera
      }
  )		
}