
<!doctype html>
<html lang="en">
<?php include "includes/session.php"; ?>
<!----------------------------- AWAL BAGIAN HEAD ----------------------------->
<?php include "includes/head.php"; ?>

<body data-layout="horizontal" data-topbar="dark">
 <!-- Begin page -->
<div id="layout-wrapper">

<!--------------------------- AWAL BAGIAN HEADER ----------------------------->
<?php include "includes/header.php"; ?>


<!------------------------- AWAL BAGIAN NAVBAR-TOP --------------------------->
<?php include "includes/navbar-top.php"; ?>
        


<!------------------------------ ISI HALAMAN --------------------------------->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

<!------------------------- AWAL SLIDE MENU RESTORAN -------------------------->
<!------------------------ AWAL DAFTAR MENU RESTORAN -------------------------->
<!------------------------- AWAL TRANSAKSI PEMESANAN -------------------------->
<!----------------------- AWAL DATA HISTORI TRANSAKSI ------------------------->
                <div id="tampilkan_halaman" > 
                <!---ISI TAMPILAN YANG DIPANGGIL MENGGUNAKAN AJAX---->

                </div>

                       
        </div>
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<!---------------------- HALAMAN MODAL ------------------------->
<?php include "modal/modal_no_kamar.php"; ?>
<?php include "modal/modal_transaksi_pemesanan.php"; ?>
<?php include "modal/modal_item_histori.php"; ?>         
<!---------------------- BAGIAN BAWAH (FOOTER) ------------------------->
<?php include "includes/footer.php"; ?>

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!----------------------- AWAL SCRIPT PLUGIN JS ------------------------->
<?php  include "includes/script.php"; ?>

<script>
$("document").ready(function(){
    tampil_home();
    $("#tombol_pesan_baru").click(function(){
        $("#modal_meja").modal("show");
     });

    $("#data_home").click(function(){
        tampil_home();
     });

    $("#data_daftar_menu").click(function(){
        tampil_daftar_menu();
     });

     $("#data_daftar_histori").click(function(){
        tampil_histori();
     });
     

});

//memanggil fungsi home.php menggunakan ajax
function tampil_home (){
    $.ajax({
        url:"pages/home.php",
        method:"GET",
        data:{},
          success:function(data)
          {
            /*Tampilkan Data Home berdasarkan nama ID (#) DIV*/
            $("#tampilkan_halaman").html(data).refresh;
          }
    });
}

//memanggil fungsi daftar menu.php menggunakan ajax
function tampil_daftar_menu (){
    $.ajax({
        url:"pages/daftar_menu.php",
        method:"GET",
        data:{},
          success:function(data)
          {
            /*Tampilkan Data Daftar Menu berdasarkan nama ID (#) DIV*/
            $("#tampilkan_halaman").html(data).refresh;
          }
    });
}

//memanggil fungsi histori.php menggunakan ajax
function tampil_histori (){
    $.ajax({
        url:"pages/daftar_histori.php",
        method:"GET",
        data:{},
          success:function(data)
          {
            /*Tampilkan Data Histori berdasarkan nama ID (#) DIV*/
            $("#tampilkan_halaman").html(data).refresh;
          }
    });
}

</script>

    </body>
</html>
