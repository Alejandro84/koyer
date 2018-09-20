<!DOCTYPE html>
<html lang="es">
<?php
$versionFake = rand(0, 100); // genero un numero de 1 a 100 al azaar
?>
    <head>
        <meta charset="utf-8">
        <title>Koyer Rent-a-Car - Administración</title>
        <link rel="icon" type="image/png" href="<?php echo  base_url('/assets/img/favicon-koyer.png'); ?>"/>
        <link href="assets/css/jquery-ui.css" rel="stylesheet" />
        <link href="assets/css/jquery.ui.theme.css" rel="stylesheet" />
        <link href="assets/css/timelineScheduler.css" rel="stylesheet" />
        <link href="assets/css/timelineScheduler.styling.css" rel="stylesheet" />
        <link href="assets/css/calendar.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo  base_url('/assets/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo  base_url('/assets/css/bootstrap-datetimepicker.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo  base_url('/assets/css/select2.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo  base_url('/assets/css/select2.bootstrap.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo  base_url('/assets/css/main.css?ver='.$versionFake); ?>"> <!-- asi carga una version nueva siempre, independiente del caché -->

   </head>

   <body>
