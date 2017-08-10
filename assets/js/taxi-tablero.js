// TODO: falta guardar los datos en la db con ashax
var guardarUrl = 'http://localhost/radiotaxicofrima/web/admin/tablero/taxis/guardar';
var datos = [];
var idTablero = $('#id_tablero').val();

$(function () {

   $('#guardar').click( function(){
         guardar( datos );
   });

   $(document).on('click','.mover', function(){

      var idFila = $(this).attr('id');
      agregarTaxi( idFila );
      moverFila(idFila);
      modificarBoton( idFila );
      estadoBotonGuardar();
   });

   function estadoBotonGuardar()
   {
      var boton = $('button#guardar');
      if ( datos.length === 0 )
      {
         boton.prop("disabled", true);
      } else {
         boton.prop("disabled", false);
      }
   }

   function modificarBoton( id )
   {
      var boton = $('button#'+id);
      var pool = '<span class="glyphicon glyphicon-arrow-right"></span>';
      var selected = '<span class="glyphicon glyphicon-arrow-left"></span>';
      var contenidoBoton;
      var posicion = boton.data('posicion');

      if ( posicion == 'pool')
      {
         contenidoBoton = selected;
         boton.data('posicion','selected');

      } else {

         boton.data('posicion','pool');
         contenidoBoton = pool;
      }

      boton.html(contenidoBoton);
   }

   function agregarTaxi( id )
   {
      if ( ! datos.includes(id) )
      {
         datos.push(id);
      } else {
         var index = datos.indexOf(id);
         datos.splice(index,1);
      }
   }

   function moverFila( idFila )
   {
      var id = idFila.toString();
      var fila = $('tr#fila-'+idFila);
      var boton = $('button#'+id);
      var pool = $('#bodyPool');
      var selected = $('#bodySelected');
      var posicion = boton.data('posicion');


      if ( posicion == 'pool' )
      {
         //mover a selected
         selected.append(fila);

      } else {
         // mover a pool
         pool.append(fila);
      }
   }


   function guardar( data )
   {
      console.log(datos);
      alert('Taxis guardados');
      $.each(data, function(x,i){

         var postData = {
            id_tablero : idTablero,
            id_taxi : i
         };

         console.log(postData);

         $.post( guardarUrl, postData );

         console.log(i);

      });
   }
});
