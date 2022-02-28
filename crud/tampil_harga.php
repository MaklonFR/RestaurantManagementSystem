<?php
 //print_r($_POST);
 include "../includes/koneksi.php";
 $idm       = $_POST['idm'];

 $sql="SELECT pesanan.id_meja as im, pesanan.kode_pesanan as kp, meja.status  as sm
       FROM pesanan JOIN meja ON pesanan.id_meja = meja.id_meja
       WHERE meja.id_meja = $idm";
 $result= $conn->query($sql);
 if ($result->num_rows > 0 ) {
     while($row = $result->fetch_assoc()){
        if ($row['sm']=="Dalam Pesanan"){
         $hasil=$row['kp'];
        } 
        if ($row['sm']!="Dalam Pesanan"){
            $cek = array("total"=>"Kosong");
            echo json_encode($cek);
        }
    }  
    $sql3 = "SELECT SUM(total) AS total FROM pesanan WHERE (id_meja='$idm') AND (kode_pesanan='$hasil')";
    $query = $conn->query($sql3);
    $row2 = $query->fetch_assoc();
    echo json_encode($row2);
} else  {
         $cek = array("total"=>"Kosong");
         echo json_encode($cek);
        }

?>
