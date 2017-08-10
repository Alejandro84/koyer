
$(function () {

   if ( $('.datetimepicker') )
   {
      $('.datetimepicker').datetimepicker({
         locale: 'es'
      });
   }

   if ( $('.timepicker') )
   {
      $('.timepicker').datetimepicker({
         locale: 'es',
         format: 'LT'
      });
   }

   if ( $('.datepicker') )
   {
      $('.datepicker').datetimepicker({
         locale: 'es',
         format: "D/M/YYYY"
      });
   }

   if ( $('select') )
   {
      $('select').select2();
   }
});

function playSound(filename){
   document.getElementById("sound").innerHTML='<audio autoplay="autoplay"><source src="' + filename + '.mp3" type="audio/mpeg" /><source src="' + filename + '.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="' + filename +'.mp3" /></audio>';
}
