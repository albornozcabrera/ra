	$(document).ready(function(){
 $('.ui-add').show();
		  
	});	
	




	
  function permite(elEvento, permitidos) {
      // Variables que definen los caracteres permitidos
      var numeros = "0123456789";
	  var correo = "0123456789@.-_abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	  var obserbacion = " 0123456789@.-_°,;abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
      var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
      var numeros_caracteres = numeros + caracteres;
      var teclas_especiales = [8, 37, 39, 46];
      // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
     
      // Seleccionar los caracteres a partir del parámetro de la función
      switch(permitidos) {
        case 'num':
          permitidos = numeros;
          break;
		case 'cor':
          permitidos = correo;
          break;
		case 'obs':
		  permitidos = obserbacion;
		  break;
        case 'car':
          permitidos = caracteres;
          break;
        case 'num_car':
          permitidos = numeros_caracteres;
          break;
      }
     
      // Obtener la tecla pulsada
      var evento = elEvento || window.event;
      var codigoCaracter = evento.charCode || evento.keyCode;
      var caracter = String.fromCharCode(codigoCaracter);
     
      // Comprobar si la tecla pulsada es alguna de las teclas especiales
      // (teclas de borrado y flechas horizontales)
      var tecla_especial = false;
      for(var i in teclas_especiales) {
        if(codigoCaracter == teclas_especiales[i]) {
          tecla_especial = true;
          break;
        }
      }
     
      // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
      // o si es una tecla especial
      return permitidos.indexOf(caracter) != -1 || tecla_especial;
  }
	




var idgrid ="#jqGrid";
var idpager =null;

var Consolidacion = function()
{
    
    this.ubigeo=null;
    grid = new Grid(idgrid,idpager);
    grid.width=930;
    grid.headers =['ID','ORG', 'NOMBRE', 'TIPO','ESTADO','RESOLUCIÓN','COLOR',''];
    grid.ventana='consolidacion';



    this.openModal=function(modal)
    {
        $("#"+modal).dialog("open");
    }
    this.closeModal=function(modal)
    {
        $("#"+modal).dialog("close");
    }

    this.setModel = function()
    {
        grid.model= [
        {
            name: 'id', key: true, width: 0, hidden:true 
        }, 
        {
            name: 'chkorg', width: 0, hidden:true 
        },                  
        {
            name: 'org', width: 0, hidden:true 
        },                   
        {   
            name: 'nombre',width: 400,editable: false,align:'center'
        },
        {   name: 'nomtipo',
            width: 150,editable: false,align:'center'
        },
        {   name: 'nomestado',
            width: 150,editable: false,align:'center'
        },
        {   name: 'numresol',
            width: 110,editable: false,align:'center'
        },
        {   name: 'color',
            width: 0,editable: false,hidden:true,align:'center'
        },
        {   name: 'accion',
            width: 50,editable: false,align:'center'
        }

        ];
        
    }

    this.getRowData=function(id)
    {
        grid.endEdit();
        if(id==undefined)
        return jQuery(idgrid).getRowData();
        else
        return jQuery(idgrid).jqGrid ('getRowData', id);
    }
    
    this.load=function()
    {   
        $(document).on("ready",function(){

            $("#modalResol").dialog({
                width:840,
                modal:true,
                autoOpen:false
            }); 
            $( "#fecha" ).datepicker();
            $( "#fecha" ).datepicker("option", "dateFormat","dd/mm/yy" );
        });

    }

    this.loadGrid= function(){
        grid.editPage='clientArray';
        grid.loadPage=C_SERVER+'/organizacion/consolidacion/listar'+(this.ubigeo!=''?'/':'')+this.ubigeo;
        grid.extraparam={};
        grid.load();
    }
}



