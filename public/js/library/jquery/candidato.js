var idgrid = "#jqGrid";
var idpager = null;

var Candidato = function()
{

    this.provincias = null;
    this.regional = false;
    this.ubigeo = "";
    this.lista = "";
    this.org = "";
    this.odpe = "";
    grid = new Grid(idgrid, idpager);
    grid.width = 1100;
    grid.local = true;
    grid.ventana = "lista-candidato";


    this.load = function()
    {
        $(document).on("ready", function() {

            $("#modalResol").dialog({
                width: 840,
                modal: true,
                autoOpen: false
            });
            $("#modalCand").dialog({
                width: 880,
                modal: true,
                autoOpen: false
            });
            $("#fecha").datepicker();
            $("#fecha").datepicker("option", "dateFormat", "dd/mm/yy");
        });

    }

    this.closeConfirmResol = function()
    {
        $("#dialog-confirm-resol").dialog("close");
    }
    this.openConfirmResol = function()
    {
        $("#dialog-confirm-resol").dialog({
            dialogClass: C_CLASS_CONFIRM,
            resizable: false,
            height: 140
        });
    }

    this.openConfirmLista = function()
    {
        $("#dialog-confirm-lista").dialog({
            dialogClass: C_CLASS_CONFIRM,
            resizable: false,
            height: 140
        });
    }
    this.closeConfirmLista = function()
    {
        $("#dialog-confirm-lista").dialog("close");
    }


    this.openModal = function(modal)
    {
        $("#" + modal).dialog("open");
    }
    this.closeModal = function(modal)
    {
        $("#" + modal).dialog("close");
    }

    this.getRowData = function(id)
    {
        grid.endEdit();
        if (id == undefined)
            return jQuery(idgrid).getRowData();
        else
            return jQuery(idgrid).jqGrid('getRowData', id);
    }

    this.setModel = function()
    {
        grid.headers = ['ID', 'CARGO', 'CARGO', 'ORDEN', 'DNI', 'A. PATERNO', 'A. MATERNO', 'NOMBRES', 'UBIGEO', 'UBIGEO', 'SEXO'];
        grid.editPage = C_SERVER + '/padron/obtener';
        grid.loadPage = C_SERVER + '/lista/agregar-candidatos/index/' + this.ubigeo + '/' + this.org + '/' + this.odpe;
        grid.editclick = true;
        grid.model = [
            {name: 'id', key: true, width: 0, hidden: true},
            {name: 'cargo', width: 0, hidden: true},
            {name: 'nomcargo', width: 120, editable: false, align: "center"},
            {name: 'orden', width: 70, editable: false, align: "center"},
            {name: 'dni', width: 80, editable: true, align: "center",
                editoptions: {maxlength: 8,
                    dataEvents: [
                        {
                            type: 'keydown',
                            fn: function(event) { 
                                var esShift = event.shiftKey;
                                if (!(event.keyCode == 8                                    // backspace
                                        || event.keyCode == 46                              // delete
                                        || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end
                                        || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                                        || (event.keyCode >= 96 && event.keyCode <= 105)    // number on keypad
                                        || (event.ctrlKey && (event.which == 86 || event.which==118)) 
                                        || (event.ctrlKey && event.which == 67)))
                                {                                    
                                        event.preventDefault();
                                }
                                else
                                {
                                    if(esShift)
                                        event.preventDefault();
                                }
                            }
                        }
                    ]}},
            {name: 'appaterno', width: 175, editable: false, align: "center"},
            {name: 'apmaterno', width: 175, editable: false, align: "center"},
            {name: 'nombres', width: 196, editable: false, align: "center"},
            {name: 'ubigeo', width: 0, hidden: true},
            {name: 'nomubigeo', width: 150, editable: this.provincias != null, align: "center",
                edittype: "select",
                editoptions: {value: this.provincias,
                    dataInit: function(elem) {
                        id = $(elem).attr('id').split('_');
                        id = id[0];
                        value = $("#" + id + "_nomubigeo").val();
                        jQuery(idgrid).jqGrid('setCell', id, "ubigeo", value);
                        row = jQuery(idgrid).jqGrid('getRowData', id);
                        if (row.orden === '')
                        {
                            $("#" + id + "_nomubigeo").val('');
                        }
                    },
                    dataEvents: [
                        {type: 'change',
                            fn: function(e) {
                                id = $(this).attr('id').split('_');
                                id = id[0];
                                value = $("#" + id + "_nomubigeo").val();
                                jQuery(idgrid).jqGrid('setCell', id, "ubigeo", value);
                                row = jQuery(idgrid).jqGrid('getRowData', id);
                                if (row.orden === '')
                                {
                                    $("#" + id + "_nomubigeo").val('');
                                }
                            }
                        }
                    ]
                }
            },
            {name: 'sexo', width: 0, editable: false, hidden: true}
        ]
    }


    this.setModelView = function(showAction)
    {
        grid.editPage = 'clientArray';
        grid.loadPage = C_SERVER + '/candidato/listar/' + this.lista;
        grid.headers = ['ID','ORDEN', 'CARGO', 'CARGO', 'DNI', 'A. PATERNO', 'A. MATERNO', 'NOMBRES', 'UBIGEO', 'UBIGEO', 'ESTADO', 'ESTADO', 'SEXO', 'LISTA', 'RESOLUCIÓN', ' ', 'COLOR'];
        grid.model = [
            {name: 'id', key: true, width: 0, hidden: true},
//            {name: 'f_registro_lista', width: 0, hidden: true},
            {name: 'orden', width: 80, editable: false, align: "center"},
            {name: 'cargo', width: 0, hidden: true},
            {name: 'nomcargo', width: 140, editable: false, align: "center"},
            {name: 'dni', width: 90, editable: false, align: "center"},
            {name: 'appaterno', width: 196, editable: false, align: "center"},
            {name: 'apmaterno', width: 196, editable: false, align: "center"},
            {name: 'nombres', width: 196, editable: false, align: "center"},
            {name: 'ubigeo', width: 0, hidden: true},
            {name: 'nomubigeo', width: 120, editable: false, align: "center", hidden: !this.regional},
            {name: 'estado', width: 0, hidden: true},
            {name: 'nomestado', width: 196, editable: false, align: "center"},
            {name: 'sexo', width: 0, hidden: true},
            {name: 'lista', width: 0, hidden: true},
            {name: 'numresolucion', width: 176, editable: false, align: "center"},
            {name: 'accion', width: 70, hidden: showAction, editable: false, align: "center"},
            {name: 'color', width: 0, hidden: true}
        ]
    }


    this.loadGrid = function() {
        grid.load();
    }
}