<?php
 //print_r($_POST);
 include "../includes/koneksi.php";
 include "../includes/timezone.php";
 $jml       = $_POST['jml'];
 $total     = $_POST['total'];
 $status    = "Dalam Pemesanan";
 $idm       = $_POST['idm'];
 $idp       = $_POST['idp'];
 $today     = date('Y-m-d h:i:sa');
 $status_meja="Dalam Pesanan";

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

    $sql = "INSERT INTO pesanan (tgl_pesanan, jumlah, total, status, id_meja, id_menu, kode_pesanan) 
			VALUES ('$today','$jml', '$total', '$status', '$idm', '$idp','$hasil')";
    $sql2 = "UPDATE meja SET status ='$status_meja' WHERE (id_meja= '$idm')"; 				
            if( ($conn->query($sql) == 1) && ($conn->query($sql2) == 1) )
            {
             $data = "Add successfully!";
             echo $data;               
			}
			else
			{
             $data = "Add Error!";
			 echo $data;
			}
?>

