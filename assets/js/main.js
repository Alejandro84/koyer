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

   $('#fecha_nacimiento').datetimepicker({
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

   $('#repo_desde').datetimepicker({
      locale: "es",
      format: "YYYY-MM-DD",
   });
   $('#repo_hasta').datetimepicker({
      locale: "es",
      format: "YYYY-MM-DD",
      useCurrent: false
   });

   $("#repo_desde").on("dp.change", function (e) {
      $('#repo_hasta').data("DateTimePicker").minDate(e.date);
   });

});
