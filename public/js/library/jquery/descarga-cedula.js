$(document).on('ready',function()
{
	$('#carga').html('');
	$('#btn1').attr('disabled',false);
	$('#btn2').attr('disabled',false);
	$('#btn3').attr('disabled',false);
	function decargaCedula(obj){
		tipo=obj.data('tipo');
		dep=$('#cbo'+tipo).val();
		$('#btn1').attr('disabled',true);
		$('#btn2').attr('disabled',true);
		$('#btn3').attr('disabled',true);
		$('#carga').html("<center> <img width='200' height='200' src='"+ C_SERVER+'/img/plantilla/loading_trans.gif' + "'/></center>");
		$.post( C_SERVER+'/utilitarios/descarga/cedula',{dep:dep,tip:tipo}, function( data ) {
			$('#carga').html('');
			$('#btn1').attr('disabled',false);
			$('#btn2').attr('disabled',false);
			$('#btn3').attr('disabled',false);
		});
	}

	$('#btn1').on('click',function()
	{
		decargaCedula($(this));
	});
	$('#btn2').on('click',function()
	{
		decargaCedula($(this));
	});
	$('#btn3').on('click',function()
	{
		decargaCedula($(this));
	});
});
