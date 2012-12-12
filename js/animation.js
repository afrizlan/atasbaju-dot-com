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
			
			
			
			$(".save").click(anmt);
			$(".back").click(anmt);
			
			function anmt(){//navigation next-prev
				var nform=$(this).attr('next_c')+$(this).attr('next_i');
				var pform=$(this).attr('prev_c')+$(this).attr('prev_i');
				var n_box='#boxes '+$(this).attr('next_i');
				var p_box='#boxes '+$(this).attr('prev_i');
					
				$(pform).fadeOut("fast", function(){
					$(nform).fadeIn("fast");
				});
				$(n_box+" p").css({'color': 'black'},'slow');
				$(p_box+" p").css({'color': 'white'},'slow');
				var num=da_check();
			}
			/*      error check function         */
			var da_error=new Array(); //detail_akun error
			var dp_error=new Array(); //detail_perusahaan error
			function da_check(){
				for(var i in da_error){
					if(da_error[i]==1){
						$(".save").fadeOut(0);
						break;
						return 0;
					}
					else {
						$(".save").fadeIn(0);
					}
				}
		
			}
			function dp_check(){
				if(dp_error!=0){
					$(".save").fadeOut("fast");
				}else $(".save").fadeIn("fast");
			}			
					
			/*      form_validation function     */
			
			$(".save").fadeOut(0);
			var not_must=new Array("n_belakang","k_password","tel_per","f_per","kec_per","kel_per");
			$(":text").blur(function(){
				var name=$(this).attr('name');
				if(not_must.indexOf(name)==-1){
				console.log("wajib");
					if($(this).val()==null||$(this).val()==""){
						
						$(".error#"+name).fadeIn("slow");
						da_error[name]=1;
					}else{
						da_error[name]=0;
					}
					da_check();
				}else console.log("tidak wajib");
			});
			
			$(":text").focus(function(){
				var name=$(this).attr('name');
				$(".error#"+name).fadeOut("fast");
			});
			
			$("[name='password']").blur(function(){
				if($(this).val()==null||$(this).val()==""){
					$(".error#password").fadeIn("slow");
					da_error[$(this).attr('name')]=1;
				}else{
					da_error[$(this).attr('name')]=0;
				}
				da_check();
			});
			
			$(":password").focus(function(){
				var name=$(this).attr('name');
				$(".error#"+name).fadeOut("fast");
			});
			
	});
	

})(jQuery)