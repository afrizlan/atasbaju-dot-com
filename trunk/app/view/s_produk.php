<div id="tampil">
	
	<div id="title">
		Manajemen Produk
	</div>
    
    <div id="form">
    	<form method="post">
        	<div class="s_form" id="s_form_p"> 
                <table class="table">
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
						<td>Warna</td>
						<td>:</td>
						<td colspan="3"><input type="text" name="warna" placeholder="Contoh : hitam" /></td>
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
                </table>
                
                <div class="submit" next_c=".s_form"><p>Cari</p></div>
            </div>
        </form>
     </div>

<?php
include ("connect.php"); 
 //This is only displayed if they have submitted the form 
	if ($searching =="yes"){ 
		 echo "<h2>Results</h2><p>"; 
 
 //If they did not enter a search term we give them an error 
 	if ($find == ""){ 
		 echo "<p>You forgot to enter a search term"; 
 	exit; 
 	}  
 
 // We preform a bit of filtering 
	 $find = strtoupper($find); 
	 $find = strip_tags($find); 
  	 $find = trim($find); 
 
 //Now we search for our search term, in the field the user specified 
 	 $data = mysql_query("SELECT * FROM produk WHERE upper($field) LIKE'%$find%'"); 
 
 //And we display the results 
 	 while($result = mysql_fetch_array( $data )){ 
 		echo $result['fname']; 
 		echo " "; 
 		echo $result['lname']; 
 		echo "<br>"; 
 		echo $result['info']; 
 		echo "<br>"; 
 		echo "<br>"; 
 		} 
 
 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
 	 $anymatches=mysql_num_rows($data); 
 if ($anymatches == 0){ 
 	 echo "Sorry, but we can not find an entry to match your query<br><br>"; 
 } 
 
 //And we remind them what they searched for 
 	 echo "<b>Searched For:</b> " .$find; 
 } 
 ?> 