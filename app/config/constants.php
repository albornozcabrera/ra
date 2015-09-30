<?php
return array(    
    'C_ODPE_NACION'=>'J30000',
    'CHECK_CARTEL'=>1,
    'CHECK_CEDULA'=>2,
    'CHECK_DISENIO'=>3,
    'CHECK_IMPRESION'=>4,
    'C_USERS_SGOI'=>array('ropc_admin_sgoi','ropc_aprobacion'),

    //PROCESO
    'C_PROC_ERM'=>'ERM',
    'C_PROC_EMC'=>'EMC',
    //////UBIGEOS ESPECIALES
    'C_NACION' => '000000',
    'C_LIMA' => '140000',
    'C_CALLAO' => '240000',
    'C_CALLAO_PROVINCIA' => '240100',
    'C_LIMA_PROV' => '140100',
    'C_CALLAO_PROV' => '240100',
    'C_ELEC_REG' => '01',
    'C_ELEC_MUNI_PROV' => '02',
    'C_ELEC_DIST' => '03',
    'C_UBI_COL' => '240107,050311,070911,070912,080528,080529,030320',

    /////MCASI
    'MCASI_SERVICE_NAME' => 'ROPC_MCASI',
    'MCASI_CODIGO_SISTEMA' => 'RA_V2',
    'MCASI_WSDL' => 'http://172.16.84.155:8080/MCASI_EAR-MCASI_WS/WSMCASIImpl?wsdl',
    'MCASI_METHODO_IS' => 'iniciarSesion',
    'MCASI_METHODO_AU' => 'autenticarUsuario',
    'MCASI_METHODO_CS' => 'cerrarSesion',
    'MCASI_METHODO_CA' =>'consultarAccesos',
    'MCASI_METHODO_ES' =>'existeSesion',
    'MCASI_METHODO_LUPS' =>'listaUsuarioPorSistema',
    'MCASI_USUARIO_ACTIVO' =>'EU001',
    'MCASI_NAME' => 'MCASI',

    //////UBICACION DE ARCHIVOS
    'C_CEDULA_FOLDER' => '/descarga/cedula',
    'C_CARTEL_FOLDER' => '/descarga/cartel',
    'C_CARTEL_FOLDER_DIF' => '/descarga/cartel-difusion',


    'C_UPLOAD_DIR' => 'uploads',
    'C_IMG_ACTA_DIR' => 'acta',
    'C_IMG_NUMERO_DIR' => 'numero_lista',
    'C_IMG_CEDULA_DIR' => 'cedula',
    'C_IMG_CARTEL_DIR' => 'cartel',
    'C_IMG_FOTO_DIR' => 'foto',
    'C_IMG_EXT' => 'jpg',
    'C_IMG_EXT_FORMAT' => 'jpg',
	
    //AUTHENTIFICACION
    'C_SESSION_EXPIRADO' => 'Tu Session ha expirado',
    'C_SESSION_NOVALIDO' => 'Usuario y/o Contraseña no Valida',
    'C_SESSION_FALLO' => 'No se pudo Autentificarse correctamente   ',
    'C_SESSION_EXIT' => 'No se pudo eliminar la session',
    //'C_SESSION_EXISTE' => 'Usuario tiene una session activa',
    'C_SESSION_EXISTE' => 'El usuario inicio session desde otra ubicacion',
    'C_SESSION_EXISTE_INGRESAR' => 'Este usuario tiene una session activa, desea continuar:',

    //AMBITO DE ELECCION
    'C_AMBITO_NAC'=>'00',
    'C_AMBITO_REG'=>'01',
    'C_AMBITO_PRO'=>'02',
    'C_AMBITO_DIS'=>'03',
    
    //////TIPO DE ORGANIZACION
    'C_TIPO_NAC'=>'1',
    'C_TIPO_REG'=>'2',
    'C_TIPO_PRO'=>'3',
    'C_TIPO_DIS'=>'4',
       
     //////TIPO DE PARAMETRO
    'C_ESTADO_ORG'=>'01',
    'C_ESTADO_CANDIDATO'=>'02',
    'C_ESTADO_LISTA'=>'03',
    'C_ESTADO'=>'04',
    'C_COLOR_CANDIDATO'=>'05',
    'C_PROCEDENCIA'=>'06',
    'C_RESUELVE'=>'07',
    'C_RESOLUCION_AFECTA'=>'08',	
    'C_COLOR_ORG'=>'09',
    'C_ESTADO_SESSION'=>'11',
    'C_ESTADO_LOG'=>'12',
    'C_TABLA'=>'13',
    'C_SERVICIO_WEB'=>'14',

     /////////ESTADO CANDIDATO
    'C_RECIBIDO'=>'07',
    'C_ADMITIDO'=>'08',
    'C_PUBLICADO'=>'09',
    'C_INSCRITO_CAN'=>'10',
    'C_TACHA_EN_TRAMITE'=>'11',
    'C_INADMISIBLE'=>'12',
    'C_EXCLUIDO'=>'13',
    'C_RENUNCIA'=>'14',
    'C_FALLECIDO'=>'15',
    'C_IMPROCEDENTE'=>'16',
	
    /////////ESTADO LISTA
    'C_PROVISIONAL'=>'17',
    'C_DEFINITIVA'=>'18',			

    /////////ESTADO ORGANIZACION
    'C_TRAMITE'=>'01',
    'C_PERIODO_DE_TACHA'=>'02',
    'C_INSCRITO_ORG'=>'03',
    'C_NO_INSCRITO'=>'04',
    'C_INSCRITO_APELACION'=>'05',
    'C_NO_INSCRITO_APELACION'=>'06',
    
    ///////ESTADO DE LA RESOLUCION
    'C_CORRECTO' =>'19',
    'C_INCORRECTO' =>'20',
    'C_RECTIFICADO' =>'21',
    
    //ESTADO CLASE ORGANIZACION
    'C_RESOLUCION_ORGANIZACION' => '01', 
    'C_RESOLUCION_LISTA' => '02', 
    'C_RESOLUCION_CANDIDATO' => '01', 

    /////////ESTADO 
    'ESTADO_ACTIVO' => 'A',
    'ESTADO_INACTIVO' => 'I',
    'ACTIVO'=>'01',
    
    /////////AMBITO EN QUE CORRE LA APLICACION
    'AMBITO_DEVELOPER'=>'developer',
    'AMBITO_PRODUCTION'=>'production',

    ////////PROCEDENCIA
    'C_JEE'=>'25',
    'C_JNE'=>'26',

    /////////FLAG
    'F_CAPITAL'=>'01',    
    'F_CEDULA'=>'1',
    'F_CARTEL'=>'1',
    'F_IMG_CED'=>'1',
    'F_IMG_FOT'=>'1',
    'F_IMG_CAR'=>'1',
    'F_GITE'=>'1', 
    'F_REGISTRO_LISTA'=>'1',
    'F_GESTION_LISTA'=>'1',
    'F_REGISTRO_ORGANIZACION'=>'1',
    'F_GESTION_ORGANIZACION'=>'1',    
    'F_IMPORTADO'=>'I',    
    'C_FLAG'=>'S',
    'C_SCAMBIOS'=>'sca',
    
    /////PROCESOS
    'C_ELEC_MUNIREG_2014' => '01',
    'C_ELEC_2DA_VUELTA_MUNIREG_2014' => '02',
    /////ELECCIONES
    'C_PRESIDENTE' => '1',
    'C_CONSEJERO' => '2',
    'C_VICEPRESIDENTE' => '5',
    'C_NACIONAL' => '00',
    'C_DEPARTAMENTAL' => '01',
    'C_PROVINCIAL' => '02',
    'C_DISTRITAL' => '03',

    'C_CARTEL_REG' => '01',
    'C_CARTEL_REG_PROV' => '02',
    'C_CARTEL_PROV' => '03',
    'C_CARTEL_DIST' => '04',
    
    'C_CEDULA_REG_PROV' => '01',
    'C_CEDULA_PROV' => '02',
    'C_CEDULA_MUNICIPAL' => '03',
    'C_CEDULA_DISTRITAL' => '04',
    
    
    ////////PERFILES
    'PERFIL_DIGIT'=>'ropc_digit',
    'PERFIL_GGE'=>'ropc_gge',
    'PERFIL_SGOI'=>'ropc_admin_sgoi',
       
     //////ACCCIONES 
    'C_ELIMINADO'=>'EL',
    'C_ELIMINAR'=>'del',
    'C_EDITAR'=>'edit',
    
    /////
    'C_TODOS' => '100',	
    'C_TODOS_DE' => '100',       
    'C_TODOS_P'  => '100',  
    'C_TODOS_DI' => '100',  
	
	//ESTADO VALIDADAS - POR VALIDAR
	'C_VALIDADAS'  => '01',  
	'C_PORVALIDAR' => '02',  
	
	//TIPO CEDULA Y CARTELES
	'C_CEDULAS'  => '01',  
	'C_CARTELES' => '02',  
    
    ///SESSION
    'C_SESSION_ACTIVA' => 'SA',
    'C_SESSION_FINALIZADA' => 'SF',   

    ///////ESTADOS LOG
    'C_SELECT' => '01',
    'C_INSERT'=> '02',
    'C_UPDATE'=> '03',
    'C_DELETE'=> '04',
    'C_INICIA_SESSION'=> '05',
    'C_CIERRA_SESSION'=> '06',
    'C_AUTENTIFICACION_FALLIDA'=> '07',
    'C_UPLOAD_FILE'=> '08',
    
    ///////TABLAS
    'C_TAB_EXT_MCASI'=> '00', 
    'C_CAB_IMPORTACION'=> '01',
    'C_DET_IMPORTACION'=> '02',
    'C_TAB_AMBITO'=> '03',
    'C_TAB_CANDIDATO'=> '04',
    'C_TAB_CARGO'=> '05',
    'C_TAB_LISTA_CANDIDATO'=> '06',
    'C_TAB_LOG'=> '07',
    'C_TAB_MEDIDA_CARTEL'=> '08',
    'C_TAB_MEDIDA_CEDULA'=> '09',
    'C_TAB_ODPE'=> '10',
    'C_TAB_ODPE_AMBITO'=> '11',
    'C_TAB_ORGANIZACION'=> '12',
    'C_TAB_PARAMETRO'=> '13',
    'C_TAB_PROCESO'=> '14',
    'C_TAB_RESOLUCION'=> '15',
    'C_TAB_SESSIONS'=> '16',
    'C_TAB_TIPO_ELECCION'=> '17',
    'C_TAB_TIPO_ORGANIZACION'=> '18',
    'C_TAB_TIPO_PARAMETRO'=> '19',
    'C_TAB_UBIGEO'=> '20',
    'C_TAB_UBIGEO_AMBITO'=> '21',
    'C_TAB_UBIGEO_VERIFICACION'=> '22',
    'C_TAB_USUARIO'=> '23',
    'C_TAB_USUARIO_ODPE'=> '24',
    'C_TAB_USUARIO_VALIDACION'=> '25', 
    'C_TMP_PADRON'=> '26',
    'C_TAB_TIPO_BLOQUE'=> '27',
    
    //PAGINATION
    'N_PAGINATION'=> '10',   
        
    //CAB_IMPORTACION C_TIPO
    'C_CARGAMASIVA_PRIMERA_VUELTA'=> 'P',
    'C_CARGAMASIVA_SEGUNDA_VUELTA'=> 'A',
    //VARIABLE ODPE - ORC
    'C_ODPE'=>'DEPARTAMENTO'
);
