var cliente = {};

$('#espera').click(function(){
   console.log('enviar');
   agregarEspera();
});

$('.btn-enviar-espera').click(function(){
   var id_cliente = $(this).attr('x-data-id-cliente');
   var id_espera = $(this).attr('x-data-id');
   // obtener info desde api
   $.get('http://radiotaxicofrima.ddns.net:8000/radiotaxicofrima/web/api_controller/clientePorId/'+id_cliente, function(data){

   }).done(function(data){
      cliente = data;
      $('#numero_cliente').val(cliente.numero_cliente);
      $('#nombre_cliente').val(cliente.nombre_cliente);
      $('#apellido_cliente').val(cliente.apellido_cliente);
      $('#direccion').val(cliente.direccion);
      $('#id_cliente').val(cliente.id_cliente);

   }).fail(function(data){

   });
   // quitar del listado
   $.post('http://radiotaxicofrima.ddns.net:8000/radiotaxicofrima/web/api_controller/cerrarEspera/'+id_espera);
   $('tr#'+id_espera).remove();

});

$('.cancelarEspera').click(function(){
   var id = $(this).attr('x-data-id');
   $.post('http://radiotaxicofrima.ddns.net:8000/radiotaxicofrima/web/api_controller/cerrarEspera/'+id);
   $('tr#'+id).remove();
});


function agregarEspera(){

   var nombre = $('#nombre_cliente').val();
   var direccion = $('#direccion').val();
   var telefono = $('#numero_cliente').val();
   var observacion = $('#observacion').val();
   var id_cliente = $('#id_cliente').val();

   cliente = {
      nombre_cliente : nombre,
      numero_cliente : telefono,
      direccion_cliente : direccion,
      observacion : observacion,
      id_cliente : id_cliente
   };

   $.post('http://radiotaxicofrima.ddns.net:8000/radiotaxicofrima/web/api_controller/guardarEspera', cliente).done(function(){
      cargarEspera();
   });

}

function cargarEspera(){
   // obtener listado
   $.get('http://radiotaxicofrima.ddns.net:8000/radiotaxicofrima/web/api_controller/getEspera', function(data){

   }).done(function(data){

      location.reload();

   }).fail(function(data){

   });
}
