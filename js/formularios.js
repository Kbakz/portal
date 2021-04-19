$(function(){
	

	$('body').on('submit','form.ajax',function(){
		var form = $(this);
		$.ajax({
			//beforeSend:function(){
				//$('.overlay-loading').fadeIn();
			//},
			url:include_path+'ajax/formularios.php',
			method:'post',
			dataType: 'json',
			data:form.serialize()
		}).done(function(data){
			if(data.sucesso){
				//Tudo certo vamos melhorar a interface!
				alert('sucesso');
			}else{
				//Algo deu errado.
				alert('erro');
			}
		});
		return false;
	})

})