(function($){

	$(document).ready(function(){
	
		var margin=0;
		var size=$('#slider').width()
		var total=size*($('#image ul li').length-1);
		console.log(total);
		
		$('#next').click(function(){
		
			 if(margin<=-(total)){
				margin=0;
			 }else{
				margin-=size;
			 }
	
			$('#image').animate({marginLeft:margin},"normal");
		});
		
		$('#prev').click(function(){
			
			if(margin==0){
				margin=-(total);
			 }else{
				margin+=676;
			 }
			$('#image').animate({marginLeft:margin},"normal");
		});
	
	});
	

})(jQuery)