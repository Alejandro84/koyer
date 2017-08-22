$(function () {
   $('#fecha_mantencion').datetimepicker({
      locale: "es",
      format: "YYYY-MM-DD"
   });
   $('#fecha_desde').datetimepicker({
      locale: "es",
      format: "YYYY-MM-DD",
      inline: true
   });
   $('#fecha_hasta').datetimepicker({
      locale: "es",
      format: "YYYY-MM-DD",
      inline: true,
      useCurrent: false
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

});
