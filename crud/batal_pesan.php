<?php
 //print_r($_POST);
 include "../includes/koneksi.php";
 $idm         = $_POST['idm'];
 $status_meja = "Kosong";

 $sql="SELECT pesanan.id_meja as im, pesanan.kode_pesanan as kp, meja.status  as sm
       FROM pesanan JOIN meja ON pesanan.id_meja = meja.id_meja
       WHERE meja.id_meja = $idm";
 $result= $conn->query($sql);
 if ($result->num_rows > 0 ) {
     $cek=0;
     while($row = $result->fetch_assoc()){
        if ($row['sm']=="Dalam Pesanan"){
         $hasil=$row['kp'];
         $sql  = "DELETE FROM pesanan WHERE ((id_meja = '$idm') and (kode_pesanan='$hasil'))";  
         $sql2 = "UPDATE meja SET status ='$status_meja' WHERE (id_meja= '$idm')"; 				
                 if( ($conn->query($sql) == 1) && ($conn->query($sql2) == 1) )
                 {
                  $cek++;               
                 }
        } 
    }
    if ( $cek > 0 ){
        $data = "Pesanan dibatalkan!";
        echo $data;
    } else
    {
        $data = "Belum ada pesanan!";
        echo $data;
    }

} else {            
    $data = "Data Kosong!";
    echo $data;
} 
    $sql3 = "UPDATE meja SET status ='$status_meja' WHERE (id_meja= '$idm')"; 
    if( ($conn->query($sql3) == 1) )
        {
            //echo "Update status meja Successfully" ;      
        }	
?>

