<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=divice-width, initial-scale=1.0">
  <title>{{ $alu->no_cont }}</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

  {{--Links plantilla--}}
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
</head>

<body style="background-color:rgb(255, 255, 255);">
  <div class="nav">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="row">
        <br><br>
        <table>
          <tbody>
            <td><img src="<?php echo $im ?>" width="50" height="70" /></td>
            <td>
              <h2 class="head text-center" style="text-align: center"> <b>TECNOLÓGICO NACIONAL DE MÉXICO
                  CAMPUS CIUDAD HIDALGO</b>
              </h2>
            </td>
          </tbody>
        </table>
        <hr color="#000000">

        <div>
          <strong>Asesor:</strong> {{ " " . $alu->nombre}}
        </div>
        <strong>Número de Control:</strong> {{ " " . $alu->no_cont }}
        <hr><br>
        <strong>Registro de asesorías.</strong>
        <div class="row">
          <table border="1">
            <thead>
              <tr>
                <th style="color:#000000;font-size: 14px"><strong>Número de control</strong></th>
                <th style="color:#000000;font-size: 14px"><strong>Nombre</strong></th>
                <th style="color:#000000;font-size: 14px"><strong>Materia</strong></th>
                <th style="color:#000000;font-size: 14px"><strong>Tema</strong></th>
                <th style="color:#000000;font-size: 14px"><strong>Fecha</strong></th>
                <th style="color:#000000;font-size: 14px"><strong>Firma</strong></th>
              </tr>
            </thead>
            <tbody>
              @foreach($rep as $re )
              <tr>
                <td style="color:#000000;font-size: 13px">{{ $re->no_cont2 }}</td>
                <td style="color:#000000;font-size: 13px">{{ $re->nombre }}</td>
                <td style="color:#000000;font-size: 13px">{{ $re->materia }}</td>
                <td style="color:#000000;font-size: 13px">{{ $re->tema }}</td>
                <td style="color:#000000;font-size: 13px">{{ $re->fecha }}</td>
                <td style="padding-left: 90px"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</body>

</html>