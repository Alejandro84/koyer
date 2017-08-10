var intervalo = ( 1 * 60 ) * 1000;
var url_DHF = '/radiotaxicofrima/api/programada';
var tonoAlerta = '/radiotaxicofrima/web/assets/tonos/alert';

$(document).ready(function(){
   buscarDHF();
   setInterval(function(){
      buscarDHF();
   }, intervalo );
});

function buscarDHF()
{
   console.log('buscando carreras programadas...');

   $.get( url_DHF, function(data){ })

   .done(function(data){

      if ( data.info.status )
      {
         var carrera                =  data.carreras[0];
         var hora_carrera           =  carrera.hora_carrera;
         var hora_alerta            =  carrera.hora_alerta;
         var hora_actual            =  carrera.hora_actual;
         var id_programada          =  carrera.info_carrera.id_programada;
         var id_cliente             =  carrera.info_carrera.id_cliente;
         var direccion_alternativa  =  carrera.direccion;

         // TODO: usar el id_programada para crear registros (  recordar en 5 minutos o carrera enviada )

         if ( hora_actual >= hora_alerta && hora_actual <= hora_carrera )
         {
            // TODO: pasar los datos para la alerta

            var data_programada =  {
               idCliente               :  id_cliente,
               direccionAlternativa    :  direccion_alternativa,
               hora_carrera            :  hora_carrera,
               id_programada           :  id_programada
            };

            enviarCarreraProgramada( data_programada );


         } else {

            console.log('aún no se debe mostrar la alerta');
            console.log('Hora Actual: '+hora_actual+'\nHora Alerta: '+hora_alerta+'\nHora Carrera: '+hora_carrera);
         }

      }

      else
      {
         console.log('No hay carreras por el momento');
      }

   })

   .fail(function(xhr, status, error){
      alert(error);
   });
}

function enviarCarreraProgramada( data )
{
   var id                     =  data.idCliente;
   var direccion_alternativa  =  data.direccion_alternativa;
   var url_cliente            =  "/radiotaxicofrima/api/cliente/"+id;



   $.post( url_cliente, function(cliente){

   })

   .done(function(cliente){

      var direccion  =  direccion_alternativa != null ? direccion_alternativa:cliente.cliente.direccion;
      var telefono   =  cliente.cliente.numero_cliente;
      var nombre     =  cliente.cliente.nombre_cliente ? cliente.cliente.nombre_cliente:'--';
      var apellido   =  cliente.cliente.apellido_cliente ? cliente.cliente.apellido_cliente:'--';
      var hora       =  data.hora_carrera;

      playSound(tonoAlerta);

      $('#clienteDHF').html(nombre+' '+apellido);
      $('#horaDHF').html(hora);
      $('#modal-dhf').modal('show');

      $(document).on('click', '#enviarDHF', function(){

         $('#numero_cliente').val(telefono);
         $('#direccion').val(direccion);
         $('#direccion_alternativa').val(direccion);
         $('#numero_cliente').val(telefono);
         $('#nombre_cliente').val(nombre);
         $('#apellido_cliente').val(apellido);
         cerrarDhf(data.id_programada);

      });

      $(document).on('click', '#descartarDHF', function(){
         cerrarDhf(data.id_programada);
      });

   })

   .fail(function( xhr, status, error ){

   });
}

function cerrarDhf( id_dhf )
{
   var url_cerrar_dhf   =  "/radiotaxicofrima/api/programada/completado/"+id_dhf;
   $.post( url_cerrar_dhf );
}
