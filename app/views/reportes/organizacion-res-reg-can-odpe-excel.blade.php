
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text / html; charset = utf-8" />
        <?= HTML::style ( 'css/program/reports.css' ) ?>
    </head>
<body>
<?php 
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename= ListOrgResolRegCandOdpe.xls");
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
        <td  colspan="13" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
            <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
        </td>    
        <td></td>
        <td  colspan="2" align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td></td>
            <td colspan="13" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>LISTADO DE ORGANIZACIONES CONSOLIDADAS SEGÚN DEPARTAMENTO</strong></td>
        <td></td>
        <td></td>
    </tr>
</table>

<table width="100%" class="table-report-excel" >
    <tr id="table-report-excelTitulo">
        <th rowspan="2" valign="middle" style="vertical-align:middle">N°</th>
        <th rowspan="2" valign="middle" style="vertical-align:middle">ORGANIZACIÓN</th>
        <th rowspan="2" valign="middle" style="vertical-align:middle">TIPO</th>
        <th rowspan="2" valign="middle" style="vertical-align:middle">DEPARTAMENTO</th>
        <th rowspan="2" valign="middle" style="vertical-align:middle">PROVINCIA</th>
        <th rowspan="2" valign="middle" style="vertical-align:middle">DISTRITO</th>
        <th colspan="10" valign="middle" style="vertical-align:middle" align ="center">ESTADO</th>
        <th colspan="2" width="15" valign="middle" style="vertical-align:middle" align ="center" width="50">VALIDADO POR</th>
    </tr>
    <tr>
        <th width="">ÁMBITO</th>
        <th width="">ÁMBITO</th>
        <th width="">ÁMBITO</th>
        <th width="">ÁMBITO</th>
        <th width="">ÁMBITO</th>
        <th width="">ÁMBITO</th>
        
        <th width="">RECIBIDO</th>
        <th width="">ADMITIDO</th>
        <th width="">PUBLICADO</th>
        <th width="">INSCRITO</th>
        <th width="">TACHA EN TRÁMITE</th>
        <th width="">INADMISIBLE</th>
        <th width="">EXCLUIDO</th>
        <th width="">RENUNCIA</th>
        <th width="">FALLECIDO</th>
        <th width="">IMPROCEDENTE</th>
        <th width="">REGISTRO</th>
        <th width="">GESTIÓN</th>
      </tr>{{$i=1;}}
      @foreach ($data as $col)
      <tr>
            <td align="left"   width="5">{{ $i++; }}</td>
            <td align="left"   width="40">{{ $col->organizacion }}</td>
            <td align="center" width="11">{{ $col->tipo }}</td>
            <td align="center" width="12">{{ $col->departamento }}</td>
            <td align="center" width="16">{{ $col->provincia }}</td>
            <td align="center" width="22">{{ $col->distrito }}</td>
            <td align="center" width="10">{{ $col->recibido }}</td>
            <td align="center" width="10">{{ $col->admitido }}</td>
            <td align="center" width="12">{{ $col->publicado }}</td>
            <td align="center" width="10">{{ $col->inscrito }}</td>
            <td align="center" width="20">{{ $col->tacha_tramite }}</td>
            <td align="center" width="13">{{ $col->inadmisible }}</td>
            <td align="center" width="10">{{ $col->excluido }}</td>
            <td align="center" width="10">{{ $col->renuncia }}</td>
            <td align="center" width="12">{{ $col->fallecido }}</td>
            <td align="center" width="16">{{ $col->improcedente }}</td> 
            <td align="center" width="10">{{ ($col->f_registro_organizacion != null)? 'SI':'NO' }}</td>
            <td align="center" width="10">{{ ($col->f_gestion_organizacion  != null)? 'SI':'NO' }}</td> 
      </tr>
      @endforeach
</table>
</body>
</html>