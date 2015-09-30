
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text / html; charset = utf-8" />
        <?= HTML::style ( 'css/program/reports.css' ) ?>
    </head>
<body>
    <?php header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename= ListOrgPolixEleccionParaCedulas.xls");
    header("Pragma: no-cache");		
    $path = str_replace(DIRECTORY_SEPARATOR,'/', public_path()); ?>
    
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
            <td align="right"> Fecha: <?php echo $fecha = date("j/n/Y "); ?></td>
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
            <td align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>
        </tr>
        <tr height="15">
            <td  valign="middle" style="vertical-align:middle" align ="center"></td>
            <td></td>
            <td  colspan="7" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
                <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
            </td>    
            <td></td>
            <td  align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="7" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>ORGANIZACIONES POLÍTICAS POR ELECCIÓN PARA CÉDULAS</strong></td>
            <td></td>
            <td></td>
        </tr>
    </table>

<table  class="table-report-excel2"  border="1" bordercolor="#3268B1" >
   <tr>
        <th width="5">N°</th>
        <th>DEPARTAMENTO</th>
        <th width="20">PROVINCIA</th>
        <th width="30">DISTRITO</th>
        <th width="10">TRÁMITE</th>
        <th width="25">PERIODO DE TACHAS</th>
        <th width="10">INSCRITO</th>
        <th width="15">NO INSCRITO</th>
        <th width="30">INSCRITO EN APELACIÓN</th>
        <th width="30">NO INSCRITO EN APELACIÓN</th> 
        <th width="15">ESTADO</th>          
  </tr>     {{$i=1;}}     
     @foreach ($data as $col)
  <tr style="background-color:{{$col->color_tr}}"> 
  		<td width="5" align="left">{{$i++;}}</td>
        <td align="left" width="20">{{$col->departamento}}</td>
        <td align="left">{{$col->provincia}}</td>
        <td align="left">{{$col->distrito}}</td> 
        <td align="center">{{($amb == '03' && $col->departamento != null)? '':($col->capital=='01'?'':$col->tramite) }}</td>
        <td align="center">{{($amb == '03' && $col->departamento != null)? '':($col->capital=='01'?'':$col->periodo_tacha) }}</td>
        <td align="center">{{($amb == '03' && $col->departamento != null)? '':($col->capital=='01'?'':$col->inscrito) }}</td>
        <td align="center">{{($amb == '03' && $col->departamento != null)? '':($col->capital=='01'?'':$col->no_inscrito) }}</td> 
        <td align="center">{{($amb == '03' && $col->departamento != null)? '':($col->capital=='01'?'':$col->inscrito_apel) }}</td>
        <td align="center">{{($amb == '03' && $col->departamento != null)? '':($col->capital=='01'?'':$col->no_inscrito_apel) }}</td>
        <td style="color:{{ $col->color_est}}" width="15">{{ ($amb == '03' && $col->departamento != null)?'': $col->estado }} </td>               
  </tr>
     @endforeach
        
</table>
</body>
</html>