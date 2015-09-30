
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text / html; charset = utf-8" />
        <?= HTML::style ( 'css/program/reports.css' ) ?>
    </head>
<body>
<?php 
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename= avanImprCedCartExcel.xls");
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
        <td colspan="2" align="right"> Fecha: <?php echo $fecha = date("j/n/Y "); ?></td>


    </tr>
    <tr height="15">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>

    </tr>
    <tr height="15">
        <td  valign="middle" style="vertical-align:middle" align ="center"></td>
        <td  colspan="4" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
            <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
        </td> 
        <td  align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td colspan="4" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>AVANCE DE IMPRESIONES DE CÉDULAS Y/O CARTELES</strong></td>
        <td></td>
    </tr>
</table>


<table width="100%" class="table-report-excel" >    
    <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
        <th width="10">NRO°</th>
        <th width="30">DEPARTAMENTO</th>
        <th width="30">PROVINCIA</th>
        <th width="30">DISTRITO</th>
        <th width="15">V.B. CED/CART</th>
        <th width="15">TIPO</th>

    </tr>{{$i = 1;}}
      @foreach ($data as $col)
      <tr>
        <td align="center">{{$i++;}}&nbsp;</td>
        <td align="left">{{$col->departamento }}&nbsp;</td>
        <td align="left">{{$col->provincia }}</td>
        <td align="left">{{empty($col->distrito)?  '': $col->distrito }}</td>
        <td align="left">{{empty($col->estado)? 'NO' : 'SI' }}</td>
        <td align="center">{{$col->tipo}}</td>

      </tr>
      @endforeach
</table>

