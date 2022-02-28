<?php
// print_r($_GET);
 include "../includes/koneksi.php";
 $id  = isset($_GET['idm']) ? $_GET['idm'] : NULL;
          $sql="SELECT * FROM menu WHERE id_menu= $id";
          $result= $conn->query($sql);
          $row      = $result->fetch_assoc();
          $harga    = $row["harga"];
          if($harga != "")
            {
             echo $harga;               
			}
			else
			{
			 echo "Belum input";
			}
?>