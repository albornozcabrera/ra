function eventoUpload(scope) {
    
    $('#file').uploadFile({
        url: C_SERVER + '/utilitarios/cargamasiva/upload',
        allowedTypes: "xls,xlsx",
        fileName: "file",
        multiple: false,
        maxFileSize: 1048576 * 100,
        showStatusAfterSuccess:false,
        onSuccess: function(file, data, xhr)
        {
            $('#message').text('');
            if (data.message === 'ok') {
                $('#message').html('<b>Archivo Excel subido satisfactoriamente, pulse el botón guardar.</b>');
                $('#message').addClass('msjsuccess');
                $('#message').removeClass('msjerror-xls');

                scope.previewData(data);
            }
            else {
                // $('#modalUpload .ajax-file-upload-statusbar').remove();
                $('#message').html('<b>' + data.filenameorig + '</b>' + ' ' + data.message);
                $('#message').addClass('msjerror-xls');
                $('#message').removeClass('msjsuccess');
                scope.ocultarpreviewData();
            }

        },
        onSelect: function()
        {
            $('#message').text('');
            $('#modalUpload .ajax-file-upload-statusbar').remove();
            scope.previewDataClean();
        },
        onError: function(files, status, errMsg)
        {   
            $('#modalUpload .ajax-file-upload-statusbar').remove();
            $('#message').text('error: ' + errMsg);
            $('#message').addClass('msjerror');
            $('#message').removeClass('msjsuccess');
            scope.botonClean();
        }
    });
}
