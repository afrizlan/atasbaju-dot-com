(function($){

	$(document).ready(function(){
	
		$("#boxes #a_akun").click(function(){
			$("#right form").slideUp("normal");
			$("#right #hasil_cari").slideUp("normal");
			var toShow=$('#toShow #a_akun').html();
			console.log(toShow);
			$('#right #ts').html(toShow).hide();
			$('#right #ts').slideDown("normal");			
		});
		
		$("#boxes #c_akun").click(function(){
			$("#right form").slideDown();
			$("#right #hasil_cari").slideDown("normal");
			$('#right #ts').html('').hide();
			$('#right #ts').slideDown("normal");
		});
		
		$("#jcari_akun").live("click",function(){	
			console.log("masuk");
			var toShow=$('#toShow #hasil_cari').html();
			console.log(toShow);
			$('#right').html(toShow);
		});
		
	});

})(jQuery)