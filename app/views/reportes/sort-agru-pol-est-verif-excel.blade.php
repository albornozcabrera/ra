
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
        <td colspan="2" align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>
    </tr>
    <tr height="15">
        <td></td>
        <td></td>
        <td  colspan="6" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
            <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
        </td>    
        <td></td>
        <td align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="6" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>RESUMEN DE SORTEO DE ORGANIZACIONES POLÍTICAS SEGÚN ESTADO DE VERIFICACIÓN</strong></td>
        <td></td>
    </tr>
</table>
<table class="table-report-excel2" border="1" bordercolor="#3268B1"  >
 
  <tr>
    <th>N°</th>
    <th>TIPO</th>
    <th>ORGANIZACIÓN</th> 
    <th>DEPARTAMENTO</th>
    <th>PROVINCIA</th>
    <th>DISTRITO</th>
    <!--<th>ORDEN BLOQUE</th>-->
    <th>NRO.ORDEN</th>
    <th>REGISTRO</th>
    <th>GESTIÓN</th>
  </tr>{{$i=1;}}
  @foreach ($data as $col)
  <tr>
    <td align="center" width="5">{{ $i++;}}</td>
    <td align="center" width="15">{{ $col->tipo }}</td>
    <td width="80">{{ $col->organizacion }}</td>
    <td align="center" width="17">{{ $col->departamento }}</td>
    <td align="center" width="15">{{ $col->provincia }}</td>
    <td align="center" width="10">{{ $col->distrito }}</td>
    <!--<td align="center" width="15">{{ $col->or_bloque }}</td>-->
    <td align="center" width="15">{{ $col->n_orden }}</td>       
    <td align="center" width="10">{{ ($col->f_registro_organizacion != null)? 'SI':'NO' }}</td>
    <td align="center" width="10">{{ ($col->f_gestion_organizacion != null)? 'SI':'NO' }}</td> 

  </tr>
  @endforeach
</table>

</body>
</html>