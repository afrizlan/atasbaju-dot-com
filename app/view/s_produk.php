<div id="produk_container" style=";
width: 687px;
margin: auto;">
<div id="tambah" style="width: 327px;
background-color: #04DBCF;
float: left;
padding: 10px;">
	
	<div id="title" style="text-align: center;
color: white;
font-weight: bold;">
		Tambah Produk
	</div>

	<div id="form">
	<form method="post">
	  <div class="t_form" id="t_form_p">
			<table>                
				<tr>
					<td>Jenis Produk</td>
					<td>:</td>
					<td><label class="control-label" for="j_produk"></label>
                    <select type="text" name="j_produk">
                    	<option>Pilih salah satu</option>
					    <option>Kemeja</option>
 					    <option>Kaos</option>
					</select></td>
				</tr>
				
                <tr>
					<td>Merk</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="merk" placeholder="Contoh: Djay Collection" /></td>
				</tr>
                
				<tr>
					<td>Jenis Ukuran</td>
					<td>:</td>
					<td><label class="control-label" for="j_ukuran"></label>
                    <select type="text" name="j_ukuran">
                    	<option>Pilih salah satu</option>
					    <option>S</option>
 					    <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                        <option>XXL</option>
					</select></td>
				</tr>
                
				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="jumlah" placeholder="Contoh : 99" /></td>
				</tr>
                
				<tr>
					<td>Warna</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="warna" placeholder="Contoh : hitam" /></td>
				</tr>
                
                <tr>
					<td>Harga</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="harga" placeholder="Contoh : 125000" /></td>
				</tr>
                
                <tr>
					<td>Keterangan</td>
					<td>:</td>
					<td colspan="3"><input type="text" name="keterangan" /></td>
				</tr>
			</table>
			
		<table>
				<tr>
					<td>
						<input type="submit" class="saves" name="simpan" value="Simpan">
					</td>
				</tr>	
			  </table>

<?php  

if(isset($_POST["simpan"]))
{  
	$jenis_produk = $_POST["j_produk"];
    $merk = $_POST["merk"];
    $jenis_ukuran = $_POST["j_ukuran"];
	$jumlah = $_POST["jumlah"];
	$warna = $_POST["warna"];	
	$harga = $_POST["harga"];
	$keterangan = $_POST["keterangan"];
      
    $query="INSERT INTO produk( jenis_produk, merk, jenis_ukuran, jumlah, warna, harga, keterangan,  tanggal_masuk ) 
		VALUES('$jenis_produk', '$merk', '$jenis_ukuran', '$jumlah', '$warna', '$harga', '$keterangan', now() )";
		   
		if(strlen($jenis_produk&&$jenis_ukuran&&$merk&&$jumlah&&$warna&&$harga)<1){
			echo "Semua data harus terisi!";
	}else{
		   
    	$result=mysql_query($query);            
    
		if($result){  
       		echo "<script>alert(Produk telah tersimpan!)</script>";
    	}else{  
       	 	echo "<script>alert(Data produk tidak berhasil disimpan!)</script>";  
    	}  
	}  
}
?>
	
	</div>
	</form>
	</div>
	
</div>


<div id="tampil" style="float: left;
margin-left: 30px;
background-color: #48CF6E;
padding: 10px;">
	
	<div id="title" style="text-align: center;
color: white;
font-weight: bold;">
		Cari Produk
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
</div>
<a href="http://localhost/atasbaju?content=keuangan"><div id="ke_keuangan" style="height: 54px;
background-color: red;
clear: both;
width: 286px;
float: right;
margin-top: -89;
margin-right: 24px;
color:white;
text-align:center;
padding-top:34px;
margin-bottom: 20px;">
	Modul Manajemen Keuangan
</div></a>

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
	$query="select * from produk ".$query_str;
	$result=mysql_query($query);
	$data=array();

	while($row=mysql_fetch_array($result)){
		$data[]=array(
			'jenis_produk'=>$row['jenis_produk'],
			'merk'=>$row['merk'],
			'warna'=>$row['warna'],
			'jenis_ukuran'=>$row['jenis_ukuran'],
			'id'=>$row['idnum']
		);
	}	


?>
<table id="list_produk" style="clear: both;
padding: 10px;
width: 100%;
font-size: 14px;">
	<tr>
		<th>Jenis Produk</th>
		<th>Merk</th>
		<th>Warna</th>
		<th>Jenis Ukuran</th>
		<th></th>
		<th></th>
	</tr>

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
			"<td align='center'>".$row['jenis_ukuran']."</td>".
			"<td align=center><a style='text-decoration:underline;color:blue;' class=btn btn-primary btn-small href='http://localhost/atasbaju/?content=edit_produk&id=$row[id]'>Edit</a></li></ul></td>".
			"<td align=center><a style='text-decoration:underline;color:blue;' class=btn btn-primary btn-small href='http://localhost/atasbaju/?content=delete_produk&id=$row[id]'>Hapus</a></li></ul></td>".
			"</tr>";
	$c+=1;
	}

} 
 ?> 
 </table>
 
 <a href="app/model/logout.php">
 <div id="logout" style="clear: both;
height: 30px;
background-color: rgb(46, 223, 31);
width: 663px;
text-align: center;
color: white;">
	Logout
 </div>
 </a>
 
 </div>
 