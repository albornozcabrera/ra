$(document).on('ready',function()
{
	$('#carga').html('');
	$('#btn1').attr('disabled',false);
	$('#btn2').attr('disabled',false);
	$('#btn3').attr('disabled',false);
	$('#btn4').attr('disabled',false);
	function descargaCartel(obj){
		tipo=obj.data('tipo');
		dep=$('#cbo'+tipo).val();
		dif= ($('#chk'+tipo).is(':checked')?1:0);
		$('#btn1').attr('disabled',true);
		$('#btn2').attr('disabled',true);
		$('#btn3').attr('disabled',true);
		$('#btn4').attr('disabled',true);
		$('#carga').html("<center> <img width='200' height='200' src='"+ C_SERVER+'/img/plantilla/loading_trans.gif' + "'/></center>");
		$.post( C_SERVER+'/utilitarios/descarga/cartel',{dep:dep,dif:dif,tip:tipo}, function( data ) {
			$('#carga').html('');
			$('#btn1').attr('disabled',false);
			$('#btn2').attr('disabled',false);
			$('#btn3').attr('disabled',false);
			$('#btn4').attr('disabled',false);
		});
	}

	$('#btn1').on('click',function()
	{
		descargaCartel($(this));
	});
	$('#btn2').on('click',function()
	{
		descargaCartel($(this));
	});
	$('#btn3').on('click',function()
	{
		descargaCartel($(this));
	});
	$('#btn4').on('click',function()
	{
		descargaCartel($(this));
	});

});
