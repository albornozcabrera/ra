
var idgrid = "#jqGrid";
var idpager = "#jqGridPager";

var Organizacion = function()
{
    this.ambito = null;
    this.ubigeo = null;

    grid = new Grid(idgrid, idpager);
    grid.width = 850;
    grid.headers = ['ID', 'NOMBRE', 'TIPO'];

    this.validation = function(value, colname)
    {
        if (colname === "NOMBRE")
        {
            if (value === "")
            {
                return [false, "Ingresar nombre"];
            }
        }
        return [true, null];
    }

    this.setModel = function()
    {
        if ($('.op1').val() == 1) {
            var op1 = true;
        }
        if ($('.cedcartel').val() == 1) {
            var op1 = false;
        }


        grid.model = [
            {name: 'id', key: true, width: 0, hidden: true},
            {
                name: 'dsc_org', width: 500, editable: op1, align: 'center',
                editrules: {custom: true, custom_func: this.validation},
                editoptions: {maxlength: 100,
                    dataEvents: [
                        {
                            type: 'keypress',
                            fn: function(e) {
                                var key = e.charCode || e.keyCode;  // para apoyar a todos los navegadores 
                                var inp = String.fromCharCode(key);
                                var esShift = e.shiftKey;
                                var boolRetorno = false;
                                if ((/^([a-zA-Z0-9\b\t()/áéíóúÁÉÍÓÚñÑ& _-]+)$/.test(inp)) || (key >= 37 && key <= 40) || (key == 222) || (key == 46))
                                {
                                    if (esShift)
                                        boolRetorno = (key === 47 || key === 40 || key === 41 || key === 95  || key === 38);
                                    else
                                        boolRetorno = true;
                                }
                                return boolRetorno;
                            }
                        }
                    ]}
            },
            {name: 'tipo_org',
                width: 350, editable: false, align: 'center'
            }];
    }

    this.load = function() {

//        $("#btnagregar").on("click", function() {
//            datarow = {id: $.jgrid.randId(), dsc_org: "", tipo_org: ""};
//            var cantidad = jQuery(idgrid).jqGrid('getDataIDs').length;
//            var posicion = (cantidad === 0) ? 0 : cantidad - 1;
//            var idNuevaFila = (posicion === 0) ? null : String(jQuery(idgrid).jqGrid('getDataIDs')[posicion]);
//            if (cantidad <= 1 || (idNuevaFila !== null && idNuevaFila.substring(0, 3) !== "jqg"))
//            {
//                datarow = {id: $.jgrid.randId(), dsc_org: "", tipo_org: ""};
//                grid.addRow(datarow);
//                posicion = posicion + ((cantidad === 0) ? 0 : 1);
//            }
//            grid.editRow(jQuery(idgrid).jqGrid('getDataIDs')[posicion], true);
//            $("tr[id=" + String(jQuery(idgrid).jqGrid('getDataIDs')[posicion]) + "] td:eq(1) input").addClass("editable");
//            $("tr[id=" + String(jQuery(idgrid).jqGrid('getDataIDs')[posicion]) + "] td:eq(1) input").focus();
//        });

         $("#btnagregar").on("click", function() {                        
            var nuevoId=$.jgrid.randId();            
            var cantidad = jQuery(idgrid).jqGrid('getDataIDs').length;            
            var posicion=0;            
            if(cantidad === 0)
            {              
              datarow = {id: nuevoId, dsc_org: "", tipo_org: ""};
              grid.addRow(datarow);
            }
            else 
            {               
               posicion=cantidad-1;               
               var idNuevaFila =(cantidad===0)?null:String(jQuery(idgrid).jqGrid('getDataIDs')[posicion]);                               
               if((idNuevaFila!==null && idNuevaFila.substring(0, 3) !== "jqg"))
               {                   
                   posicion=cantidad;
                   datarow = {id: nuevoId, dsc_org: "", tipo_org: ""};
                   grid.addRow(datarow);
               }
            }            
            grid.editRow(jQuery(idgrid).jqGrid('getDataIDs')[posicion], true);
            $("tr[id=" + String(jQuery(idgrid).jqGrid('getDataIDs')[posicion]) + "] td:eq(1) input").addClass("editable");
            $("tr[id=" + String(jQuery(idgrid).jqGrid('getDataIDs')[posicion]) + "] td:eq(1) input").focus();            
            var idRow = jQuery(idgrid).jqGrid('getDataIDs')[posicion];
            jQuery(idgrid).setSelection(idRow, true);            
        });
        
        $("#btneliminar").on("click", function() {
            var gr = jQuery(idgrid).jqGrid('getGridParam', 'selrow');
            if((gr!==null && gr.substring(0, 3) !== "jqg"))
               {grid.deleteRow();}               
        });
    }

    this.loadGrid = function() {
        grid.deletePage = C_SERVER + '/organizacion/eliminar';
        grid.editPage = C_SERVER + '/organizacion/guardar';
        grid.loadPage = C_SERVER + '/organizacion/listar/ambito&ubigeo/' + this.ambito + (this.ubigeo != '' ? '/' : '') + this.ubigeo;
        grid.extraparam = {"ambito": this.ambito, "ubigeo": this.ubigeo};
        grid.load();
    }
}

//function cambiarTitulo()
//    {
//        var $infoDlg = $("#info_dialog");
//        alert(JSON.stringify($infoDlg));
//        var $parentDiv = $infoDlg.parent();
//        alert(JSON.stringify($parentDiv));
//        var dlgWidth = $infoDlg.width();
//        alert(JSON.stringify(dlgWidth));
//        var parentWidth = $parentDiv.width();
//        alert(JSON.stringify(parentWidth));
//        alert("cambiar");
//    }
//    
//    //texto del error a modal
//    $(idgrid).jqModal = $.extend($(idgrid).jqModal || {}, {
//        beforeOpen: cambiarTitulo
//    });
/*
 
 var Organizacion = function()
 {
 
 this.rowlast=null;
 this.rowlastSelect=null;
 this.tipos=null;
 this.editPage="";
 this.loadPage="";
 
 this.
 
 this.grid = function()
 {
 $(idgrid).jqGrid('GridUnload');
 $(idgrid).jqGrid({
 url: this.url,
 editurl:C_SERVER + "/organizacion/listar/140109",
 mtype: "GET",
 datatype: "json",
 page: 1,
 colNames: ['ID', 'NOMBRE', 'TIPO'],
 colModel: [
 { name: 'cod_org', key: true, width: 75, hidden:true },                   
 {
 name: 'dsc_org',
 width: 150,
 editable: true
 },
 {
 name: 'dsc_tipo_org',
 width: 150,
 editable: true,
 edittype: "select",
 editoptions: {
 value: "AA:AAA;BB:CC"
 }
 }
 
 ],
 
 onSelectRow: this.selectRow,
 ondblClickRow: this.editRow, // the javascript function to call on row click. will ues to to put the row in edit mode
 viewrecords: true,
 width: 750,
 height: 350,
 rowNum: 20,
 del:true,
 pager: idpager
 });
 }
 
 this.load = function ()
 {
 $("#btnagregar").on("click",function(){
 var datarow = {cod_org:$.jgrid.randId(),dsc_org:"",dsc_tipo_org:""};
 $(idgrid).jqGrid('addRowData',$.jgrid.randId(),datarow);
 });   
 
 $("#btneliminar").on("click",function(){
 alert(1);
 var gr = jQuery(idgrid).jqGrid('getGridParam','selrow');
 if( gr != null ) jQuery(idgrid).jqGrid('delGridRow',gr,{reloadAfterSubmit:false});
 else alert("Please Select Row to delete!");
 });
 };
 
 this.selectRow = function(id) {
 
 if(id!=this.rowlastSelect){
 var grid = $(idgrid);
 grid.restoreRow(this.rowlast);
 this.rowlastSelect = id;
 }
 
 }
 
 this.editRow = function(id) {
 //if (id !== this.rowlast) {
 var grid = $(idgrid);
 grid.restoreRow(this.rowlast);
 grid.editRow(id, true);
 this.rowlast = id;
 //}
 }
 }
 */
