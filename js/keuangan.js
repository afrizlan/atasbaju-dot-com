(function($){
	var filter=1;
	$(document).ready(function(){
		$(".edit_filter").click(function(){
			var div=$(this).parents("div").attr("id");
			$('#'+div+' .add_filter').slideDown("normal");
		});
		
		$(".close_filter").click(function(){
			var div=$(this).parents("div:eq(1)").attr("id");
			$('#'+div+' .add_filter').slideUp("normal");
		})
		
		$(".tambah_filter").click(function(){
			var div=$(this).parents("div:eq(2)").attr("id");
			if(filter<=3){
				filter+=1;
				var tr=$('#'+div+' .add_filter table tr:eq(1)').html();
				$("#"+div+" .add_filter table").append("<tr>"+tr+"<td class='remove_filter'>x</td></tr>");
			}
			
		})
		
		$(".remove_filter").live('click',function(){
			$(this).closest('tr').remove();
			if(filter>1){
				filter-=1;
			}
		})
		
		$("#simpan2").live('click',populate_data);
		$("#simpan4").live('click',populate_data);
		
		function populate_data(){
			var div	= $(this).parents("div:eq(2)").attr("id");
			var func_d='';
			var url='';
			if(div=="top_right"){
				func_d='get_penjualan_by_category';
				url='http://localhost/atasbaju/app/controller/c_pemasukan.php?p=';
			}
			else{
				func_d='get_pengeluaran_by_category';
				url='http://localhost/atasbaju/app/controller/c_pengeluaran.php?p=';
			}
			var row = "#"+div+" .add_filter table tr";
			var val = "";
			for(var i=1; i<$(row).length; i++){
				var kategori	= row+":eq("+i+") td:eq(1) option:selected";
				var value		= row+":eq("+i+") td:eq(2) .nilai";
				
				if($(kategori).val()!="") 	val+=" and "+$(kategori).val()+"='"+$(value).val()+"'";
				
			}
			val=val.substr(5);
			if(val=="") val="all";
			
			console.log(val);
			jQuery.ajax({
				type: 'POST',
				data: {func:func_d,via_ajax:'f'},
				url: url+""+val,
				dataType : 'JSON',
				success: function(data){
					var html = "";
					for(var key in data){
						html +=	"<tr>"+
								"<td>"+data[key]['tanggal']+"</td>"+
								"<td>"+data[key]['jenis']+"</td>"+
								"<td>"+data[key]['merk']+"</td>"+
								"<td>"+data[key]['ukuran']+"</td>"+
								"<td>"+data[key]['warna']+"</td>"+
								"<td>"+data[key]['jumlah']+"</td>"+
								"</tr>;"
					}
					
					$("#"+div+" .data_table table tbody").html(html);
					$('.add_filter').slideUp("normal");
					console.log(data);
				},
				error:  function(xhr, ajaxOptions, thrownError){
					alert(xhr.status);
					alert(thrownError);
				}
			});
		}
		
		$(".list").live('change',function(){
			var div			= $(this).parents("div:eq(1)").attr("id");
			var label		= $(this).parents("tr").next().find("td:eq(0) label").html();
			label = label.substr(0,label.indexOf(" "));
			console.log(label);
			var selected	= $(this).find("option:selected").val();
			var column		= $(this).attr('column');
			var next		= $(this).attr('next_d');
			jQuery.ajax({
				type: 'POST',
				url: "http://localhost/atasbaju?m=formProduk&f=data_list&p="+selected+"-"+column+"-"+next,
				dataType : 'json',
				success: function(data){
					
					var html="";
					for(var key in data){
						html+= "<option value='"+data[key]+"'>"+data[key]+"</option>";
					}
					html+="<option value='' selected>Pilih "+label+"</option>";
					$("#"+div+" #"+next).html(html);
					
				},
				error:  function(data){
					console.log("error");
				}
			});
		});
		
		
		
	});

})(jQuery)