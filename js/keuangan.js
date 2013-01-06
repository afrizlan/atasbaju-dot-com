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
			var f='';
			if(div=="top_right") 	f='get_penjualan';
			else					f='get_pengeluaran';
			var row = "#"+div+" .add_filter table tr";
			var val = "";
			for(var i=1; i<$(row).length; i++){
				var kategori	= row+":eq("+i+") td:eq(1) option:selected";
				var value		= row+":eq("+i+") td:eq(2) .nilai";
				val+=" and "+$(kategori).val()+"='"+$(value).val()+"'";
				
			}
			val=val.substr(4);
			
			jQuery.ajax({
				type: 'POST',
				url: "http://localhost/atasbaju?m=M_keuangan&f="+f+"&p="+val,
				dataType : 'json',
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
				},
				error:  function(data){
				
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