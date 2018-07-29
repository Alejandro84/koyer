$(function () {
   $('#fecha_mantencion').datetimepicker({
      locale: "es",
      format: "YYYY-MM-DD"
   });
   $('#fecha_desde').datetimepicker({
      locale: "es",
      format: "YYYY-MM-DD",
   });
   $('#fecha_hasta').datetimepicker({
      locale: "es",
      format: "YYYY-MM-DD",
      useCurrent: false
   });

   $("#fecha_desde").on("dp.change", function (e) {
      $('#fecha_hasta').data("DateTimePicker").minDate(e.date);
   });

   $('#reserva-fecha_desde').datetimepicker({
      locale: "es",
      useCurrent: false
   });
   $('#reserva-fecha_hasta').datetimepicker({
      locale: "es",
      useCurrent: false
   });

   $("#reserva-fecha_desde").on("dp.change", function (e) {
      $('#reserva-fecha_hasta').data("DateTimePicker").minDate(e.date);
   });

   $(function () {
       $('#buqueda_fecha').datetimepicker({
           viewMode: 'years',
           format: 'MM/YYYY'
       });
   });

   $(function () {
       $('#fecha_reporte').datetimepicker({
           viewMode: 'years',
           format: 'MM/YYYY'
       });
   });
});

const celda = $('.periodo');

function cargarCeldas() {
  $.each(celda, function(x,i){
    var width = $(this).attr('x-data-percent');
    width = width + '%';
    $(this).css('width', width);
  });
}

$('#load').on('click', function(){
  cargarCeldas();
})


[
  {
    auto: 'fisker',
    arriendos: [
      {
        nombre_cliente: 'Juan Carrasco',
        inicio: '2018-06-01',
        fin: '2018-06-10',
        delta: 5760 // minutos
      },

      {
        nombre_cliente: 'Anibal Barria',
        inicio: '2018-06-08',
        fin: '2018-06-13',
        delta: 5760 // minutos
      }
    ]
  }
]
