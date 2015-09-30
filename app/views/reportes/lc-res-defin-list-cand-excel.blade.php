
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text / html; charset = utf-8" />
        <?= HTML::style ( 'css/program/reports.css' ) ?>
    </head>
<body>
<?php 
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename= ListaOrgResolRegCandOdpe.xls");
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
        <td colspan="2" align="right"> Fecha: <?php echo $fecha = date("j/n/Y "); ?></td>
    </tr>
    <tr height="15">
        <td></td>
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
        <td></td>
        <td align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td colspan="4" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>REPORTE DE RESOLUCIÓN DEFINITIVA DE LISTA DE CANDIDATOS</strong></td>
        <td></td>
    </tr>
</table>
<br>
<table width="100%" class="table-report-excel2" border="1" bordercolor="#3268B1" >
   <tr>
		<th width="5">N°</th>      
        <th width="30">DEPARTAMENTO</th>
        <th width="30">PROVINCIA</th>
        <th width="30">DISTRITO</th>
        <th width="22">PROVISIONAL</th>
        <th width="22">DEFINITIVA</th>
        <th width="13">ESTADO</th>          
  </tr>   {{$i=1;}}
 @foreach ($data as $col)
  <tr style="background-color:{{$col->color_tr}}"> 
        <td align="center">{{$i++;}}</td>       
        <td align="left">{{$col->departamento}}</td>
        <td align="left">{{$col->provincia}}</td>
        <td align="left">{{$col->distrito}}</td> 
        <td align="center">{{ $col->capital=='01'?'':$col->provicional }}</td>
        <td align="center">{{ $col->capital=='01'?'':$col->definitiva }}</td>
        <td style="color:{{ $col->color_est}}" >{{ $col->estado }} </td>              
  </tr>
 @endforeach
        
</table>
</body>
</html>