
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
        <td colspan="2" align="right"> Fecha: <?php echo $fecha = date("j/n/Y "); ?></td>
    </tr>
    <tr height="15">
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>
    </tr>
    <tr height="15">
        <td  valign="middle" style="vertical-align:middle" align ="center"></td>
        <td  colspan="3" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
            <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
        </td>    
        <td align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td colspan="3" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>LISTA DE CANDIDATOS POR UBIGEO - ORGANIZACIONES CON LISTAS</strong></td>
        <td></td>
    </tr>
</table>


<table width="265" border="0">
  <tr>
    <td width="144" ><strong>DEPARTAMENTO</strong>:</td>
    <td width="105" align="center">{{ $dep }}</td>
  </tr>
  @if($prov != 'null' )
  <tr>
    <td><strong>PROVINCIA:</strong></td>
    <td align="center">{{ $prov }}</td>
  </tr>
  @endif
   @if($dist != 'null' )
  <tr>
    <td><strong>DISTRITO:</strong></td>
    <td align="center">{{ $dist }}</td>
  </tr>
  @endif
</table>

<table class="table-report-excel" >

  <tr>
        <th>NRO</th> 
        <th>AMBITO ORG</th>
        <th>ORGANIZACION</th>
        <th>ESTADO ORG.</th>
        <th>ULT. RES. ORG.</th>
  </tr>
  @foreach ($data as $col)
  <tr>
        <td align="center" width="20">{{ $col->nro }}&nbsp;</td>
        <td align="center"  width="17">{{ $col->ambito }}&nbsp;</td>
        <td width="100">{{ $col->organizacion }}&nbsp;</td>
        <td width="20" align="center">{{ $col->estado }}&nbsp;</td>
        <td width="20" align="center">{{ $col->resolucion }}&nbsp;</td>
  </tr>
  @endforeach
</table>

</body>
</html>