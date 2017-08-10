getRechazo();
setInterval(function(){
   getRechazo();
}, 10000 );

function getRechazo() {
   console.log('Buscando carreras rechazadas');
   var api = '/radiotaxicofrima/web/api/rechazo';
   var tonoAlerta = '/radiotaxicofrima/web/assets/tonos/data';
   $.get(api, function(data){

   }).done(function(data){

      if ( data.info.estado === true ){
         // hay carrera rechazada
         console.log('Una carrera rechazada');
         var nombre = data.carrera.nombre_cliente+' '+data.carrera.apellido_cliente;
         var apellido_cliente = data.carrera.apellido_cliente;
         var nombre_cliente = data.carrera.nombre_cliente;
         var direccion = ( data.carrera.direccion_alternativa !== null || data.carrera.direccion_alternativa !== "" ) ? data.carrera.direccion_alternativa:data.carrera.direccion;
         var telefono = data.carrera.numero_cliente;
         var taxi = data.carrera.numero;
         var id_carrera = data.carrera.id_carrera;
         var id_cliente = data.carrera.id_cliente;
         var direccion_alternativa = data.carrera.direccion_alternativa;
         var observacion = data.carrera.observacion;

         rechazoModal(telefono, direccion, nombre, taxi, id_carrera);
         playSound(tonoAlerta);

         $('#enviarOtro').click(function(){

            $('#id_cliente').val(id_cliente);
            $('#numero_cliente').val(telefono);
            $('#nombre_cliente').val(nombre_cliente);
            $('#apellido_cliente').val(apellido_cliente);
            $('#direccion').val(direccion);
            $('#direccion_alternativa').val(direccion_alternativa);
            $('#observacion').val(observacion);

            var url = '/radiotaxicofrima/web/api/rechazo/cerrar/'+id_carrera;

            $.get( url, function(){

            }).done(function(){
            }).fail(function(){
               alert('no se cerro la carrera');
            });

         });
      }

   }).fail(function(){
      alert('No se  estan recibiendo las carreras rechazadas');
   });
}



$('#cancelarCarreraRechazada').click(function(){
   var id_rechazo = $('.id_rechazo').val();
   var url = '/radiotaxicofrima/web/api/carrera/cancelar/'+id_rechazo;
   $.post(url, function(){

   }).done(function(){
      $('#modalRechazada').modal('hide');
   }).fail(function(){
      alert('No se pudo cancelar la carrera');
   });
});

function rechazoModal(telefono, direccion, nombre, taxi, id_carrera)
{
   $('.id_rechazo').val(id_carrera);
   $('.direccionModal').html(direccion);
   $('.nombreModal').html(nombre);
   $('.rechazo_id_movil').html(taxi);
   $('.telefonoModal').html(telefono);
   $('#map').hide();
   $('#modalRechazada').modal('show');
}
