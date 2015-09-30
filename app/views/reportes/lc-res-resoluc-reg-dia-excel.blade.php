<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text / html; charset = utf-8" />
        <?= HTML::style ( 'css/program/reports.css' ) ?>
    </head>
<body>
<?php   
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename= ResDeResolRegPorDia.xls");
header("Pragma: no-cache");		
$path = str_replace(DIRECTORY_SEPARATOR,'/', public_path());  
?>
<img src="{{ $path}}/img/plantilla/logo_onpe3.png"/>

<table border="1">
    <tr height="15">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td  align="right"> Fecha: <?php echo $fecha = date("j/n/Y "); ?></td>
    </tr>
    <tr height="15">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td  align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>
    </tr>
    <tr height="15">
        <td  valign="middle" style="vertical-align:middle" align ="center"></td>
        <td  colspan="6" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
            <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
        </td> 
        <td  align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td colspan="6" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>RESUMEN DE RESOLUCIONES REGISTRADAS POR DÍA</strong></td>
        <td></td>
    </tr>
</table>

    <br>
<table  width="100%" class="table-report-excel2" border="1" bordercolor="#3268B1" >
  <tr>
    <th>N°</th>
    <th width="10" >COD.ODPE</th>
    <th>ODPE</th>
    <th>FECHA</th>
    <th>CANT. RES. ORG. POL</th>
    <th>CANT. RES. POR LISTA</th>
    <th>CANT. RES. POR CAND</th>
    <th width="30" >USUARIO</th>
  </tr> {{$i=1; }}
   @foreach ($data as $col) 
  <tr style="border: 1px solid #3268B1; "  >
    <td width="6" align="center">{{$i++; }}</td>
    <td width="20" align="center">{{ $col -> c_odpe }}</td>
    <td width="25">{{ $col -> odpe }}</td>
    <td width="15" align="center">{{ $col -> fecha_format }}</td>
    <td width="20" align="center">{{ $col -> cant_r_op }}</td>
    <td width="25" align="center">{{ $col -> cant_r_list}}</td>
    <td width="20" align="center">{{ $col -> cant_r_cand}}</td>
    <td  width="17"align="center">{{ $col -> usuario }}</td>    
  </tr>
   @endforeach
</table>
</body>
</html>