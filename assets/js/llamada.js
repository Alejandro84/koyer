var urlCliente = '/radiotaxicofrima/web';
function cargarNumeros()
{
   // console.log('Numeros cargados');
   var numeros = [];

   $.get(urlCliente+'/api/clientes', function(data){

      // console.log('Url fetcheada');

   }).done(function(data){

      var objeto = data;

      // console.log(data);
      $.each( objeto.content, function (x,i){
         numeros.push(i.numero_cliente);
      });
      // console.log(numeros);
      var numeroInput = document.getElementById('numero_cliente');
      awesomplete = new Awesomplete( numeroInput, { list: numeros, autoFirst:true } );

   }).fail(function(data){

   });
}

window.addEventListener("awesomplete-selectcomplete", function(e){

   var num = $('#numero_cliente').val();

   $.get(urlCliente+'/api/cliente/'+num, function(data){

   }).done(function(data){

      var cliente = data.content[0];
      var nombre_cliente = cliente.nombre_cliente;
      var apellido_cliente = cliente.apellido_cliente;
      var numero_cliente = cliente.numero_cliente;
      var direccion_cliente = cliente.direccion;
      var id_cliente = cliente.id_cliente;

      $('#nombre_cliente').val(nombre_cliente);
      $('#apellido_cliente').val(apellido_cliente);
      $('input[name="id_cliente"]').val(id_cliente);
      $('input[name="direccion"]').val(direccion_cliente);

   }).fail(function(){

   });

}, false);


$('#numero_cliente').keyup(function(e){

   if( e.keyCode == 8 )
   {
      $('#id_cliente').val("");
   }

});

cargarNumeros();
