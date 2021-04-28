$(function(){
	$('body').on('submit','form.ajax',function(){
		var form = $(this);
		$.ajax({
			//beforeSend:function(){
				//alert('teste');
			//},
			url:include_path+'ajax/formularios.php',
			method:'post',
			dataType: 'json',
			data:form.serialize()
		}).done(function(data){
			if(data.sucesso){
				alert('sucesso');
			}else{
				//Algo deu errado.
				alert('erro');
			}
		});
		return false;
	})
})