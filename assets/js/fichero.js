var ficheroApi = '/radiotaxicofrima/web/api_controller/getTaxiFromFichero';

$(function () {
   $('[data-toggle="tooltip"]').tooltip();
});

$(function(){
   console.log('Cargando fichero...');

   cargarPosiciones();

   setInterval(function()
   {
      cargarPosiciones();
   }, 15000 );

});

function cargarPosiciones()
{
   var counter = 0;

   $.get(ficheroApi, function(data){

   }).done(function(data){
      $('#id_fichero').val(data.info_tablero.id_tablero);
      $('#fichero').html('');
      $('#fichero_carrera').html('');

      $.each(data.taxis.disponibles, function(x,i){

         counter++;
         var cssClass = ( counter == 1 ) ? 'btn-success activo' : 'btn-primary';

         if ( counter == 1 )
         {
            $('#id_taxi').val(i.id_taxi);
         }

         $('#fichero').append(
            '<div class="col-sm-2 col-md-2">'+
               '<div class="thumbnail "><center>'+
                  '<h2><button x-data-id="'+i.id_taxi+'" class=" btn-big btn '+cssClass+' puntero">'+i.numero+'</button></h2>'+
                  '<button x-data-id="'+i.id_taxi+'" class="btn-bajar btn btn-xs btn-block btn-warning">Bajar <span class="glyphicon glyphicon-arrow-down"></span></button>'+
                  '<div class="caption">'+
                  '<span class="mute"><strong>'+counter+'</strong></span>'+
                  '</div>'+
               '<center></div>'+
            '</div>'
         );
      });

      $.each(data.taxis.en_carrera, function(x,i){
         var id_carrera = i.estado.id_carrera;
         var direccion = ( i.estado.direccion_alternativa !== "" ) ? i.estado.direccion_alternativa:i.estado.direccion;
         counter++;
         $('#fichero_carrera').append(
            '<div class="col-sm-2 col-md-2">'+
               '<div class="thumbnail "><center>'+
                  '<h2><button data-toggle="tooltip" data-placement="top" title="'+direccion+'" class="btn  btn-md b btn-danger cerrarCarrera" x-data-carrera="'+id_carrera+'">'+i.numero+'</button></h2>'+
                  '<div class="caption">'+
                  '<button class="infoBtn btn btn-info btn-xs btn-block" x-data-nombre="'+i.estado.nombre_cliente+'" x-data-direccion="'+direccion+'" x-data-fecha="'+i.estado.c_date+'" x-data-telefono="'+i.estado.numero_cliente+'">Información</button>'+
                  '<button class="btn btn-block btn-xs btn-warning cancelarCarrera" x-data-id_carrera = "'+id_carrera+'">Cancelar</button>'+
                  '</div>'+
               '<center></div>'+
            '</div>'
         );
      });

   }).fail(function(){

   });
}

function cancelarCarrera( id )
{
   $.post('http://localhost/radiotaxicofrima/web/api_controller/cancelar', { id_carrera:id } );
   cargarPosiciones();
}

function mostrarInformacionCarrera( telefono, direccion, nombre, hora)
{
   modalInfo( telefono, direccion, nombre, hora );
   var addr = direccion+', Punta Arenas';
   initMap(addr);
}

function modalInfo(telefono, direccion, nombre, hora)
{
   $('.direccionModal').html(direccion);
   $('.nombreModal').html(nombre);
   $('.fechaModal').html(hora);
   $('.telefonoModal').html(telefono);
   $('#map').hide();
   $('#modalInfo').modal('show');
}

var mapCounter = 0;

function initMap( direccion ) {

   var address = direccion.replace(/^[0]+/g,"");
   var geocoder = new google.maps.Geocoder();
   geocoder.geocode({
      'address' : address
   },
   function (result, status){
      if ( status == google.maps.GeocoderStatus.OK ) {

         $('#map').show();
         var myOptions = {
            zoom: 17,
            center: result[0].geometry.location,
            mapTypeId: google.maps.MapTypeId.HYBRID
         };

         if ( mapCounter === 0 )
         {
            map = new google.maps.Map(document.getElementById('map'), myOptions );
            mapCounter++;
            console.log('map counter: '+mapCounter);
         }

         marker = new google.maps.Marker({
             map: map,
             position: result[0].geometry.location
         });

         map.setCenter(result[0].geometry.location);
      }
   });
}

function bajarTaxi( taxi, operador ) {
   $.post('/radiotaxicofrima/web/api_controller/bajar', { id_taxi : taxi, id_operador: operador });
   cargarPosiciones();
}

$(document).on('click', 'button.cancelarCarrera', function() {
      var id_carrera = $(this).attr('x-data-id_carrera');
      cancelarCarrera(id_carrera);
});

$(document).on('click', 'button.btn-bajar', function(){
   var id_taxi = $(this).attr('x-data-id');
   var id_operador = $('#id_operador').val();
   bajarTaxi( id_taxi, id_operador );
});

$(document).on('click', 'button.infoBtn', function(){

   var direccion = $(this).attr('x-data-direccion');
   var nombre = $(this).attr('x-data-nombre');
   var hora = $(this).attr('x-data-fecha');
   var telefono = $(this).attr('x-data-telefono');

   mostrarInformacionCarrera( telefono, direccion, nombre, hora);

});

$(document).on('click','button.cerrarCarrera',function(){
   var id_carrera = $(this).attr('x-data-carrera');
   cerrarCarrera(id_carrera);
});

$(document).on('click', 'button.puntero', function(){

   if ( $('.puntero').hasClass('btn-success') )
   {
      $('button.puntero.btn-success').toggleClass('btn-default');
      $('button.puntero.btn-success').toggleClass('btn-success');
   }

   $(this).toggleClass('btn-success');
   $(this).toggleClass('btn-default');

   $('#id_taxi').val($(this).attr('x-data-id'));

});

function cerrarCarrera(id)
{
   $.get('/radiotaxicofrima/web/api/carrera/cerrar/'+id, function(data){

   }).done(function(data){

      console.log(data);

      if ( data.info.respuesta == "ok" )
      {
         console.log('ok');
         cargarPosiciones();

      } else {
         alert('no se pudo cerrar la carrera!. avise a base.');
      }

   }).fail(function(){

   });
}
