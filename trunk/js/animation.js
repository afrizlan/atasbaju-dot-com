(function($){

	$(document).ready(function(){
		
			/* slider function ===============================*/
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
			/* end slider function ===============================*/
			
			
			/* daftar_akun function ==============================*/
			
			var da_error=0; //detail_akun error
			var dp_error=0; //detail_perusahaan error
			
			$(".save").click(anmt);
			$(".back").click(anmt);
			
			function anmt(){//navigation next-prev
			
				var nform=$(this).attr('next_c')+$(this).attr('next_i');
				var pform=$(this).attr('prev_c')+$(this).attr('prev_i');
				var box='#boxes '+$(this).attr('next_i');
				
		
				$(pform).fadeOut("fast", function(){
					$(nform).fadeIn("fast");
				});
				
				//$(box).animate({width:$('.box').width()+4},0);
				//$(box).animate({fontColor:black,0);
				
			}
			/*      error check function         */
			
			function da_check(){
				if(da_error!=0){
					$(".save").fadeOut("fast");
				}else $(".save").fadeIn("fast");
			}
			function dp_check(){
				if(dp_error!=0){
					$(".save").fadeOut("fast");
				}else $(".save").fadeIn("fast");
			}
			
			/*      form_validation function     */
						
			$("[name='k_password']").change(function(){
				var k_password=$("[name='k_password']").val();
				var password=$("[name='password']").val();
				if(k_password!=password){
					da_error+=1;
				}else{
					if(da_error>0){
						da_error-=1;
					}
				}
				da_check();
				
			});
			
			
			
			
			
		
	
	});
	

})(jQuery)