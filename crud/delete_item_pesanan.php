<?php
 //print_r($_POST);
 include "../includes/koneksi.php";
 $id  = isset($_POST['idp']) ? $_POST['idp'] : NULL;

$sql  = "DELETE FROM pesanan WHERE (id_pesanan = '$id')";  			
        if( ($conn->query($sql) == 1)  )
         {
           $data="OK";
           echo $data;            
         }

?>

