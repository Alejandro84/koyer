   <script type="text/javascript" src="<?php echo  site_url('/assets/js/jquery.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/bootstrap.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/moment-with-locales.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/select2.full.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/main.js'); ?>"></script>

   <? if ( isset($javascript) )
   {
      foreach ( $javascript as $js )
      {
         echo '<script type="text/javascript" src="'.site_url('assets/js/'.$js.'.js').'"></script>'."\n";
      }
   } ?>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        html: true
    });
});
</script>


</body>
</html>
