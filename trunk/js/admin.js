(function($){

	$(document).ready(function(){
	
		$("#boxes #a_akun").click(function(){	
			var toShow=$('#toShow #a_akun').html();
			console.log(toShow);
			$('#right').html(toShow);
		});
		
		$("#boxes #c_akun").click(function(){	
			var toShow=$('#toShow #c_akun').html();
			console.log(toShow);
			$('#right').html(toShow);
		});
		
		
	});

})(jQuery)