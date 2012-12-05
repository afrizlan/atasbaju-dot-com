(function($){

	$(document).ready(function(){
	
		var margin=0;
		var size=$('#slider').width()
		var total=size*($('#image ul li').length-1);
		
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
				margin+=size;
			 }
			$('#image').animate({marginLeft:margin},"normal");
		});
		
		$(".save").click(anmt);
		$(".back").click(anmt);
		
		function anmt(){
		
			var nform=$(this).attr('next_c')+$(this).attr('next_i');
			var pform=$(this).attr('prev_c')+$(this).attr('prev_i');
			console.log(nform);
			
			$(pform).fadeOut("fast", function(){
				$(nform).fadeIn("fast");
			});
		}
		
		/*afrizal manajemen akun*/
		
		
		
	
	});
	

})(jQuery)