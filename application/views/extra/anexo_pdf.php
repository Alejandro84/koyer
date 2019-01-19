<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0"
        name="viewport">
  <meta content="ie=edge"
        http-equiv="X-UA-Compatible">
  <title>Reserva</title>
  <style>
        html, body {
            height: 100%;
            width: 100%;
        }
        body {
            color:#444;
            font-family:Helvetica,Arial,Verdana,sans-serif; 
        }
        .row {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        .label {
            font-weight:bold;
        }
        .col-md-4 {
            display: inline-block;
            width: 30%;
        }
        .col-md-5 {
            display: inline-block;
            width: 40%;
        }

        .col-md-3 {
            display: inline-block;
            width: 20%;
        }
        .table, th, td{
            border: 1px solid #444;
            border-collapse: collapse;
            width:100%;
            font-size:10px;
        }
        .col-md-6 {
            width: 50%;
            display: inline-block;
        }
        .col-md-6-m {
            width: 70%;
            display: inline-block;
        }
        .col-md-2 {
            width: 10%;
            display: inline-block;
        }

        .logo {
            text-align:right;
        }

        thead tr {
            background-color: #eee;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        h2{
            font-size:12px;
        }

        h3{
            font-size:10px;
        }
        p {
            font-size:12px;
        }
        .table_2 {
            border-collapse: collapse;
        }

        .table_2 td{
            border: 0px solid black;
            margin:0px;
            padding:0px;
        }
        
        .espaciador {
            display:block;
            width:100%;
            height: 300px;
        }


  </style>
</head>
    <body>
    <div class="container">
        <div class="row"
            id="header">
        <?php $this->load->view('extra/pdf/header'); ?>
        <hr>
        </div>
        <div class="row">
        <?php $this->load->view('extra/pdf/detalle_cliente'); ?>
        </div>
        <div class="row">
        <?php $this->load->view('extra/pdf/detalle_vehiculo'); ?>
        </div>
        <div class="row">
        <?php $this->load->view('extra/pdf/detalle_arriendo');?>
        </div>
        <div class="row">
        <?php $this->load->view('extra/pdf/detalle_extras');?>
        </div>

        <div class="row">
            <?php $this->load->view('reserva/pdf/detalle_precios'); ?>
        </div>
        
        <div class="espaciado" style="100px"></div>
        <div class="row">
            <div class="col-md-12">
            <table class="table_2" style="text-align:center; margin-top:20px; width:100%" >
                    <tr>
                        <td>___________________________________</td>
                        <td>___________________________________</td>
                    </tr>

                    <tr>
                        <td>FIRMA/SIGNATURE KOYER RENT A CAR</td>
                        <td>FIRMA CLIENTE / CLIENT SIGNATURE</td>
                    </tr>

                </table>  
            </div>
        </div>
    </div>
</body>
</html>
