
var app = angular.module("app", [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

var C_CLASS_CONFIRM = 'ui-jqdialog';

var C_TODOS = '100';
var C_NACIONAL = '00';
var C_DEPARTAMENTAL = '01';
var C_PROVINCIAL = '02';
var C_DISTRITAL = '03';

var C_TIPO_NACIONAL = '1';
var C_TIPO_REGIONAL = '2';
var C_TIPO_PROVINCIAL = '3';
var C_TIPO_DISTRITAL = '4';
var C_LIMA_PROV = '140100';
var C_CALLAO_PROV = '240100';
var C_NACION = '000000';
var C_SERVER = 'http://localhost/ra/public';


//CLASES DE RESOLUSIONES
var C_RESOLUCION_ORGANIZACION = '01';
var C_RESOLUCION_LISTA = '02';
var C_RESOLUCION_CANDIDATO = '03';


/* METODO DE TABS */
/*var urlPages=Array();
 $(document).on('ready',function()
 {
 $(document).on('click','.menu_principal a',function(e)
 {   url = $(this).attr('href');
 title= $(this).text();
 exist=false;
 jQuery.each(urlPages,function(index,value){   
 if(url==value){
 exist=true;
 console.log(exist);
 }
 });
 if(!exist && url!="#"){
 $.get(url, function( data ) {
 urlPages.push(url);
 $("[role='presentation']").each(function(){
 $(this).removeClass('active');
 });
 $("[role='tablist']").append("<li role='presentation' class='active'><a href='#home' aria-controls='home' role='tab' data-toggle='tab'>"+title+"</a></li>");
 $(".tab-content").append("<div role='tabpanel' class='tab-pane active'>"+data+"</div>");
 });
 }
 e.preventDefault();
 })
 })*/

var idSeleccion = 0;
function jsonToSelect(data)
{
    result = "";
    angular.forEach(data, function(value, key) {
        result = result + (value.cod + ":" + value.nom + ";");
    });
    result = result.substring(0, result.length - 1);
    return result;
}

var Grid = function(idgrid, idpager)
{

    currentPage = 1;
    this.option = null;
    this.rowlast = null;
    this.rowlastSelect = null;
    this.width = null;
    this.model = null;
    this.editPage = "";
    this.deletePage = "";
    this.loadPage = "";
    this.headers = "";
    this.extraparam = null;
    this.local = false;
    this.ventana = null;
    this.editclick = false;
    extraparamg = null;
    editPageg = "";
    rowSelect = null;

    this.load = function()
    {
        islocal = this.local;
        ventana = this.ventana;
        extraparamg = this.extraparam;
        editPageg = this.editPage;

//        alert(ventana);

        $(idgrid).jqGrid('GridUnload');
        $(idgrid).jqGrid({
            url: this.loadPage,
            editurl: this.editPage,
            mtype: "POST",
            datatype: "json",
            page: 1,
            colNames: this.headers,
            colModel: this.model,
            onSelectRow: this.editclick ? this.selectAndEdit : this.selectRow,
            ondblClickRow: this.editRow, // the javascript function to call on row click. will ues to to put the row in edit mode
            viewrecords: true,
            width: this.width,
            height: 290, //height: 250 - Cambiar altura de la grilla para evitar el scroll
            rowNum: 12, //rowNum: 12  - Cambiar la cantidad de registros por página
            //rowNum: 12,
            del: true,
            loadonce: true,
            pager: idpager,
            loadComplete: function() {
                if (this.p.datatype === 'json' && currentPage !== 1) {
                    setTimeout(function() {
                        $(idgrid).trigger("reloadGrid", [{page: currentPage}]);
                    }, 25);
                }
                if (ventana == "lista-candidato") {
                    var ids = $(idgrid).jqGrid('getDataIDs');
                    for (var i = 0; i < ids.length; i++) {
                        var cl = ids[i];
                        var row = jQuery(idgrid).jqGrid('getRowData', cl)
//                        console.log(row);
                        var trElement = jQuery("#" + cl, jQuery(idgrid));
                        trElement.removeClass('ui-widget-content');
                        trElement.addClass('ui-content-row');
                        trElement.css('background-color', row.color);
                        be = " <label  class='ui-button ui-edit'   data-id='" + cl + "'><span style='display:block;margin:0px auto;cursor:pointer;' class=\"ui-icon ui-icon-pencil\" ></span></label> ";
                        be = be + " <label  class='ui-button ui-add' data-id='" + cl + "'><span style='display:block;margin:0px auto;cursor:pointer;' class=\"ui-icon ui-icon-plusthick\" ></span></label> ";
                        jQuery(idgrid).jqGrid('setRowData', ids[i], {accion: be});
                    }
                } else if (ventana == "consolidacion") {
                    var ids = $(idgrid).jqGrid('getDataIDs');

                    for (var i = 0; i < ids.length; i++) {
                        var cl = ids[i];
                        var row = jQuery(idgrid).jqGrid('getRowData', cl)

                        if ($('.op1').val() == 1) {
                            if (row.chkorg == '1') {
                                var perfil = 'none'; //ocultar boton "+"
                            } else {
                                var perfil = 'block'; // mostrar boton "+"
                            }
                        } else {
                            var perfil = 'none'; // ocultar boton "+"
                        }


                        var trElement = jQuery("#" + cl, jQuery(idgrid));
                        trElement.removeClass('ui-widget-content');
                        trElement.addClass('ui-content-row');
                        trElement.css('background-color', row.color);
                        be = " <label class='ui-button ui-add' data-id='" + cl + "'><span style='display:" + perfil + ";margin:0px auto;cursor:pointer;' class=\"ui-icon ui-icon-plusthick\" ></span></label> ";
                        jQuery(idgrid).jqGrid('setRowData', ids[i], {accion: be});
                    }

                }
            },
        });
    }



    this.getAllRowData = function() {
        return jQuery(idgrid).getRowData();
    }
    function reload()
    {
        currentPage = $(".ui-pg-input").val();
        if (!islocal) {
            jQuery(idgrid).jqGrid('setGridParam', {datatype: 'json',
                gridComplete: function() {

                    jQuery(idgrid).jqGrid('setSelection', rowSelect, true);
                }
            }).trigger("reloadGrid", [{page: currentPage}]);
        }

    }

    this.endEdit = function()
    {
        var ids = $(idgrid).jqGrid('getDataIDs');
        for (var i = 0; i < ids.length; i++) {
            var cl = ids[i];
            var grid = $(idgrid);
            grid.restoreRow(cl);
        }
    }
    this.deleteRow = function() {

        var gr = jQuery(idgrid).jqGrid('getGridParam', 'selrow');
        console.log(gr);
        if (gr != null)
        {
            jQuery(idgrid).jqGrid('delGridRow', gr, {
                url: this.deletePage,
                beforeShowForm: centerDelDialog,
                afterComplete: function(response)
                {
                    console.log(response);
                    data = jQuery.parseJSON(response.responseText);
                    if (!data.success) {
                        $.jgrid.info_dialog($.jgrid.errors.errcap, data.message, $.jgrid.edit.bClose);
                        $("#infocnt").css("color", "red");
                        reload();
                        return false;
                    } else {
                        reload();
                        return true;
                    }

                }
            });

        }
        else
        {
            alert("Seleccionar fila");
        }

    }

    this.addRow = function(datarow) {
        $(idgrid).jqGrid('addRowData', $.jgrid.randId(), datarow);
    }

    this.selectRow = function(id) {
        if (id != this.rowlastSelect) {
            var grid = $(idgrid);
            grid.restoreRow(this.rowlast);
            this.rowlastSelect = id;
        }
    }

    this.selectAndEdit = (function edit(id)
    {
        /*if(id!=this.rowlastSelect){
         var grid = $(idgrid);
         grid.restoreRow(this.rowlast);
         this.rowlastSelect = id;
         }*/
        var ids = $(idgrid).jqGrid('getDataIDs');
        for (var i = 0; i < ids.length; i++) {
            var cl = ids[i];
            var grid = $(idgrid);
            grid.restoreRow(cl);
        }

        //this.rowlast = id;
        jQuery(idgrid).jqGrid('editRow', id, true,
                function() {/*oneditfunc*/
                },
                function(response, postdata)
                {
                    data = jQuery.parseJSON(response.responseText);
                    if (!data.success) {
                        $.jgrid.info_dialog($.jgrid.errors.errcap, data.message, $.jgrid.edit.bClose);
                        $("#infocnt").css("color", "red");
                        return false;
                    } else
                    {
                        if (data['code'] != null)
                        {
                            rowSelect = data['code'];
                        }
                        if (!islocal)
                        {
                            reload();
                        }
                        else {
                            jQuery.each(data.data, function(name, value) {
                                jQuery(idgrid).jqGrid('setCell', id, name, value);
                            });
                        }
                        return true;
                    }
                },
                editPageg,
                extraparamg,
                function() {
                    if (islocal) {
                        edit(parseInt(id) + 1);
                    }
                },
                function() {/*errorfunc*/
                },
                function() {
                });


    });


    this.editRow = function(id) {
        this.rowlast = id;
        idSeleccion = id;
        jQuery(idgrid).jqGrid('editRow', id, true,
                function() {/*oneditfunc*/
                },
                function(response, postdata)
                {
                    data = jQuery.parseJSON(response.responseText);
                    if (!data.success) {
                        $.jgrid.info_dialog($.jgrid.errors.errcap, data.message, $.jgrid.edit.bClose);
                        $("#infocnt").css("color", "red");
                        return false;
                    } else
                    {

                        if (data['code'] != null)
                        {
                            rowSelect = data['code'];
                        }
                        if (!islocal) {
                            reload();
                        }
                        else {
                            jQuery.each(data.data, function(name, value) {
                                jQuery(idgrid).jqGrid('setCell', id, name, value);
                            });
                        }

                        return true;
                    }
                },
                editPageg,
                extraparamg,
                function() {
                },
                function() {/*errorfunc*/
                },
                function() {/*afterrestorefunc*/
                });

        /*jQuery(idgrid).jqGrid('editRow',id, true, oneditfunc, succesfunc,this.editPage,
         extraparam, aftersavefunc,errorfunc, afterrestorefunc);*/
    }
}


//
//$(document).ready(function ()
//{
//    $.jgrid.jqModal = $.extend($.jgrid.jqModal || {}, {
//        beforeOpen: centerInfoDialog
//    });
//
//});

function openMessageError(message)
{
    $.jgrid.info_dialog("INFORMACIÓN", message, $.jgrid.edit.bClose);
    $("#infocnt").css("color", "red");
}

function openMessage(message)
{
    $.jgrid.info_dialog("INFORMACIÓN", message, $.jgrid.edit.bClose);
}

function centerInfoDialog()
{
    var $infoDlg = $("#info_dialog");
    //titulo (modal):Advertencia para los infoDialog
    $("#info_dialog div:first span b").text("Advertencia");
    //-------------------------------------
    var $parentDiv = $infoDlg.parent();
    var dlgWidth = $infoDlg.width();
    var parentWidth = $parentDiv.width();
    $infoDlg[0].style.left = Math.round((parentWidth - dlgWidth) / 2) + "px";
}

function centerDelDialog()
{

    var $infoDlg = $("#delmodjqGrid");
    var $parentDiv = $infoDlg.parent();
    var dlgWidth = $infoDlg.width();
    var parentWidth = $parentDiv.width();
    $infoDlg.css(
            {
                position: 'fixed',
                zIndex: '100',
                top: '50%',
                left: '50%',
                margin: '-100px 0 0 -100px',
                width: '350px'
            }
    );
    //$infoDlg[0].style.left = Math.round((parentWidth - dlgWidth) / 2) + "px";

}

function cerrar()
{
    if (idSeleccion != undefined) {
        var idCajaTexto = ($("tr[id=" + idSeleccion + "] td:eq(1) input").attr('id'));
        if (idCajaTexto == idSeleccion + "_dsc_org")
        {
            $("input[id=" + idCajaTexto + "]").addClass("editable");
            $("input[id=" + idCajaTexto + "]").focus();
        }
    }
}

$(document).ready(function() {
    ////NOTA CAMBIAR ESTE METODO A ALGO MAS LOCAL
//	$(document).on('blur','input[type=text]',function()
//	{
//		var val = $(this).val().toUpperCase();
//		$(this).val(val);
//	});
    $("#mainContainerPage").css('display', 'block');

    $(document).on('blur', 'textarea', function()
    {
        var val = $(this).val().toUpperCase();
        $(this).val(val);
    });

    $(document).on('keyup', 'input[type=text]', function(e)
    {
        if (e.keyCode == 13)
        {
            var val = $(this).val().toUpperCase();
            //  Evitar el ingreso de número superiores a la cantidad de paginas totales
            var nombreClase = $(this).attr('class');
            var paginaFinal = $("#sp_1_jqGridPager").text();
            if (nombreClase == 'ui-pg-input') {
                if (val > paginaFinal) {
                    $(idgrid).setGridParam({page: (paginaFinal > 0) ? paginaFinal : 1}).trigger("reloadGrid");
                }
                else
                {
                    $(this).val(val);
                }
            }
            //-------------------------------------------------------------------------
        }
    });

    $.jgrid.jqModal = $.extend($.jgrid.jqModal || {}, {
        beforeOpen: centerInfoDialog,
        onClose: cerrar
    });
});

