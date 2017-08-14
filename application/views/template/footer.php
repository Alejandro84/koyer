   <script type="text/javascript" src="<?= base_url('/assets/js/jquery.min.js'); ?>"></script>
   <script type="text/javascript" src="<?= base_url('/assets/js/tether.min.js'); ?>"></script>
   <script type="text/javascript" src="<?= base_url('/assets/js/bootstrap.min.js'); ?>"></script>
   <script type="text/javascript" src="<?= base_url('/assets/js/awesomplete.min.js'); ?>"></script>
   <script type="text/javascript" src="<?= base_url('/assets/js/moment-with-locales.min.js'); ?>"></script>
   <script type="text/javascript" src="<?= base_url('/assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>
   <script type="text/javascript" src="<?= base_url('/assets/js/select2.full.min.js'); ?>"></script>
   <script type="text/javascript" src="<?= base_url('/assets/js/bootbox.min.js'); ?>"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4dRWyGjFT-1geiGFyB3uktxNwAWg48Oc"
    async defer></script>
   <? if ( isset($javascript) )
   {
      foreach ( $javascript as $js )
      {
         echo '<script type="text/javascript" src="'.site_url('assets/js/'.$js.'.js').'"></script>'."\n";
      }
   } ?>


</body>
</html>
