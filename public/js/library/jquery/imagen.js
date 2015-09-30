var Imagen = function()
{
    this.nom = null;
    this.opc = null;
    this.ubigeo = null;
    this.selected = null;

    this.openModal = function()
    {
        selected = this.selected;
        $('.ajax-upload-dragdrop').each(function()
        {
            $(this).remove();
        });

        $('#file').html('Cargar');
        $('#modalUpload').dialog('open'); 
        $('.ajax-file-upload-statusbar').remove();
        $('#file').uploadFile({
            url: C_SERVER + '/upload/imagen/' + this.nom + '/' + this.opc,
            allowedTypes: "png,gif,jpg,jpeg",
            fileName: "img",
            multiple: false,
            onSelect:function(s){
                cantidad=$('.ajax-file-upload-statusbar').length;
                if(cantidad>0 ){
                        $('.ajax-file-upload-statusbar').first().remove();
                }
            },
            onSuccess: function(files, data, xhr)
            {
                if(data===''){
                    setTimeout((function()
                    {
                        $('#modalUpload').dialog('close');
                        $('#uploadcerrar').trigger('click');
                        $('#formUpload').remove();
                        selected.trigger("click");
                        //var selector = $.jstree._focused().get_selected();
                        //$("#jstree_demo_div").jstree("select_node", selector).trigger("select_node.jstree");
                    }), 1000);
                }else{
                    cantidad=$('.ajax-file-upload-statusbar').length;
                    if(cantidad>1 ){
                        $('.ajax-file-upload-statusbar').first().remove();
                    }
                    $('#uploadcerrar').trigger('click');
                    $('#formUpload').remove();
                    $('.ajax-file-upload-statusbar').html("<span style='color:red'>"+data+"</span>");
                }

            },
            onError: function(files, status, errMsg)
            {
                cantidad=$('.ajax-file-upload-statusbar').length;
                if(cantidad>1 ){
                    $('.ajax-file-upload-statusbar').first().remove();
                }
                $('#uploadcerrar').trigger('click');
                $('#formUpload').remove();
            }
        });
    }
    this.closeModal = function()
    {
        $('#modalUpload').dialog('open');
    }

    this.load = function()
    {
        $(document).on("ready", function()
        {
            $('#jstree_demo_div').jstree();
            $('#modalUpload').dialog(
                    {
                        modal:true,
                        width: 550,
                        height: 200,
                        autoOpen: false
                    });
        });
    }
}

