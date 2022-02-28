<?php
 //print_r($_POST);
 include "../includes/koneksi.php"; 
 include "../includes/timezone.php";
 $tharga    = $_POST['tharga'];
 $tbayar    = $_POST['tbayar'];
 $diskon    = "Rp. 0";
 $status    = "Selesai";
 $idm       = $_POST['idm'];
 $today     = date('Y-m-d h:i:sa');
 $status_meja="Kosong";

 $sql="SELECT pesanan.id_meja as im, pesanan.kode_pesanan as kp, meja.status  as sm
       FROM pesanan JOIN meja ON pesanan.id_meja = meja.id_meja
       WHERE meja.id_meja = $idm";
 $result= $conn->query($sql);
 if ($result->num_rows > 0 ) {
     while($row = $result->fetch_assoc()){
        if ($row['sm']=="Dalam Pesanan"){
         $hasil=$row['kp'];
         //echo $hasil;
        } 
        if ($row['sm']!="Dalam Pesanan"){
            $karakter = rand(); 
            $hasil = hash("sha256", $karakter);
           // echo $hasil;
        }
    }
} else  {
         $karakter = rand(); 
         $hasil = hash("sha256", $karakter);
         //echo $hasil;
        }

    $sql = "INSERT INTO pembayaran (total_harga, diskon, harga_bayar, tgl_pembayaran, id_meja, kode_pesanan) 
			VALUES ('$tharga','$diskon', '$tbayar', '$today', '$idm','$hasil')";
    $sql2 = "UPDATE meja SET status ='$status_meja' WHERE (id_meja= '$idm')"; 
    $sql3 = "UPDATE pesanan SET status ='$status' WHERE (id_meja= '$idm') AND (kode_pesanan='$hasil')"; 					
            if( ($conn->query($sql) == 1) && ($conn->query($sql2) == 1)&& ($conn->query($sql3) == 1) )
            {
             $data = "Transaksi successfully!";
             echo $data;               
			}
			else
			{
             $data = "Add Error!";
			 echo $data;
			}
?>

