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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>
    </tr>
    <tr height="15">
        <td  valign="middle" style="vertical-align:middle" align ="center"></td>
        <td></td>
        <td  colspan="7" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
            <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
        </td>    
        <td  colspan="2" align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="7" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>LISTAS VÁLIDAS DE REGISTRO DE CANDIDATOS PARA PROVINCIAS</strong></td>
        <td></td>
        <td></td>
    </tr>
</table>
<br>

<table class="table-report-excel2" border="1" bordercolor="#3268B1" >   
 
  <tr >
    <th width="22">DEPARTAMENTO</th>
    <th width="17">PROVINCIA</th>
    <th width="17">ORGANIZACION</th>
    <th width="17">DNI</th>
    <th width="22">APELLIDO PATERNO</th>
    <th width="22">APELLIDO MATERNO</th>
    <th width="20">NOMBRES</th>
    <th width="17">ORDEN</th>
    <th width="17">CARGO</th>
  </tr>
    @foreach ($data as $col)
  <tr> 
   
    <td>{{$col->departamento}}</td>
    <td>{{$col->provincia}}</td>
    <td width="60">{{$col->nom_org}}</td>
    <td align="center"  >{{"'".$col->c_dni}}</td>
    <td>{{$col->c_apellido_paterno}}</td>
    <td>{{$col->c_apellido_materno}}</td>
    <td>{{$col->c_nombres}}</td> 
    <td align="center">{{$col->n_orden}}</td> 
    <td align="center">{{$col->cargo}}</td>
  </tr>
    @endforeach
</table>

</body>
</html>


