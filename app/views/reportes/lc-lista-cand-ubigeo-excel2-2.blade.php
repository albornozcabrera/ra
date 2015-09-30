
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
        <td  colspan="3" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
            <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
        </td>   
        <td></td>
        <td align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td colspan="3" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>LISTA DE CANDIDATOS POR UBIGEO - ORGANIZACIONES CON LISTAS Y SUS CANDIDATOS</strong></td>
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

<table class="table-report-excel" border="1" >

  <tr> 
  		<th>NRO</th> 
        <th>ÁMBITO ORG</th>
        <th>ORGANIZACION</th>
        <th>ESTADO ORG.</th>
        <th colspan="2">ULT. RES. ORG.</th>
  </tr>
  @foreach ($data as $col)
  <tr style="color: #FFFFFF" >
  		
        <td align="center"  style="background-color:#538DD5; color:#FFFFFF"><strong>{{ $col->nro }}</strong></td>
        <td align="center" width="50"  style="background-color:#538DD5; color:#FFFFFF"><strong>{{ $col->ambito }}</strong></td>
        <td align="center" width="70" style="background-color:#538DD5; color:#FFFFFF"><strong>{{ $col->organizacion }}</strong></td>
        <td align="center" width="20"  style="background-color:#538DD5; color:#FFFFFF"><strong>{{ $col->estado }}</strong></td>
        <td colspan="2"  align="center"  style="background-color:#538DD5; color:#FFFFFF"><strong>{{ $col->resolucion }}</strong></td>
  </tr>
    				 <tr>
                        <td width="20" align="center" style="background-color:#C5D9F1; color:#000000"><strong>NRO.</strong></td>
                        <td width="20" align="center" style="background-color:#C5D9F1; color:#000000"><strong>DNI</strong></td>
                        <td align="center" style="background-color:#C5D9F1; color:#000000"><strong>CANDIDATO</strong></td>
                        <td align="center" style="background-color:#C5D9F1; color:#000000"><strong>ESTADO</strong></td>
                        
                        <td width="20" align="center" style="background-color:#C5D9F1; color:#000000"><strong>CARGO</strong></td>
                        <td width="7" align="center" style="background-color:#C5D9F1; color:#000000"><strong>POS</strong></td>
                        
                      </tr>
                     @foreach ($col->ListaCand as $col2)
                      <tr>
                        <td align="center">{{ $col2->nro }}</td>
                        <td align="center">{{"'". $col2->c_dni }}</td>
                        <td align="center">{{ $col2->candidato }}</td>
                        <td align="center">{{ $col2->estado }}</td>
                        
                        <td align="center">{{ $col2->cargo }}</td>
                        <td align="center">{{ $col2->pos }}</td>

                      </tr>
                      @endforeach
                      
  

  @endforeach
</table>

</body>
</html>