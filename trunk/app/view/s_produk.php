<div id="tampil">
	
	<div id="title">
		Manajemen Produk
	</div>
    <link rel='stylesheet' type='text/css' href='s_produk.css'></link>
    <div id="form">
    	<form method="post">
        	<div class="s_form" id="s_form_p"> 
                <table class="table">
                   <tr>
						<td>Jenis Produk</td>
						<td>:</td>
						<td><label class="control-label" for="j_produk"></label>
                    	<select type="text" name="j_produk">
                        	<option value="none">Pilih Salah Satu</option>
					    	<option value="kemeja">Kemeja</option>
 					    	<option value="kaos">Kaos</option>
						</select></td>
				   </tr>
                   
                   <tr>
						<td>Merk</td>
						<td>:</td>
						<td colspan="3"><input type="text" name="merk" placeholder="Contoh: Djay Collection" /></td>
				   </tr>
                
            	    <tr>
						<td>Warna</td>
						<td>:</td>
						<td colspan="3"><input type="text" name="warna" placeholder="Contoh : hitam" /></td>
				   </tr>
                
				   <tr>
						<td>Jenis Ukuran</td>
						<td>:</td>
						<td><label class="control-label" for="j_ukuran"></label>
                    		<select type="text" name="j_ukuran">
					    	<option value="none">Pilih Salah Satu</option>
                            <option value="S">S</option>
 					    	<option value="M">M</option>
                        	<option value="L">L</option>
                        	<option value="XL"> XL</option>
                        	<option value="XXL">XXL</option>
						</select></td>
					</tr>
                </table>
                
                <input type="submit" value="cari" name="cari"></input>
            </div>
        </form>
     </div>

<?php
if(isset($_POST['cari'])){
	$query_str='';
	if($_POST['j_produk']!='none'){
		if($query_str!=''){
			$query_str.='and ';
		}
		$query_str.="jenis_produk='".$_POST['j_produk']."' ";
	}
	if($_POST['merk']!=''){
		if($query_str!=''){
			$query_str.='and ';
		}
		$query_str.="merk='".$_POST['merk']."' ";
	}
	if($_POST['warna']!=''){
		if($query_str!=''){
			$query_str.='and ';
		}
		$query_str.="warna='".$_POST['warna']."' ";
	}
	if($_POST['j_ukuran']!='none'){
		if($query_str!=''){
			$query_str.='and ';
		}
		$query_str.="jenis_ukuran='".$_POST['j_ukuran']."'";
	}
	if($query_str!=''){
		$query_str='where '.$query_str;
	}
	$cari=$_POST['j_produk'];
	include ("connect.php"); 
	$query="select * from produk ".$query_str;
	echo $query;
	$result=mysql_query($query);
	$data=array();

	while($row=mysql_fetch_array($result)){
		$data[]=array(
			'jenis_produk'=>$row['jenis_produk'],
			'merk'=>$row['merk'],
			'warna'=>$row['warna'],
			'jenis_ukuran'=>$row['jenis_ukuran']
		);
	}	


?>
<table id="list_produk">
	

<?php
$c=1;
foreach($data as $row){
	if($c % 2){
		echo "<tr class='even'>";
	}else{
		echo "<tr class='odd'>";
	}
	echo 	"<td>".$row['jenis_produk']."</td>".
			"<td>".$row['merk']."</td>".
	 		"<td>".$row['warna']."</td>".
			"<td>".$row['jenis_ukuran']."</td>".
			"</tr>";
	$c+=1;
echo $c;
	}

} 
 ?> 
 </table>