    
   <script type="text/javascript" src="<?php echo  site_url('/assets/js/jquery.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/moment.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/jquery-1.9.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo  base_url('/assets/js/jquery-ui-1.10.2.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/bootstrap.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/moment-with-locales.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/select2.full.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/main.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/timelineScheduler.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo  base_url('/assets/js/calendar.js'); ?>"></script>

   <? if ( isset($javascript) )
   {
      foreach ( $javascript as $js )
      {
         echo '<script type="text/javascript" src="'.site_url('assets/js/'.$js.'.js').'"></script>'."\n";
      }
   } ?>


</body>
</html>
