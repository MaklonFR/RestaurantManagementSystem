<?php include "../includes/koneksi.php"; ?>    
   
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                   <div class="card-header">
                                        <h4 class="text-center">Daftar Menu Resto</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <div class="search-box me-2 mb-2 d-inline-block">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" id="carinama" placeholder="Search...">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <button type="button" id="tombol_pesan_baru" class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2">
                                                        <i class="mdi mdi-plus me-1"></i> Pesan baru
                                                    </button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>

                                        <div class="table-responsive" id="cari_menu">
                                            <table class="table align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Pesanan</th>
                                                        <th>Nama</th>
                                                        <th colspan="3">Deskripsi</th>
                                                        <th class="text-center">Jenis</th>
                                                        <th class="text-center">Harga</th>
                                                        <th class="text-center">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                              <?php
                                                $sql="SELECT * FROM menu  ORDER BY id_menu DESC LIMIT 20";
                                                $result= $conn->query($sql);
                                                if ($result->num_rows > 0 ) {
                                                while ($row = $result->fetch_assoc())
                                                {
                                                if ($row["status"]=="Tersedia"){
                                                $status="Tersedia"; $warna="badge bg-success";
                                                } if ($row["status"]=="Kosong"){
                                                $status="Kosong"; $warna="badge bg-warning";
                                                } 
                                              ?>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/<?php echo $row["filename"];?>" alt="product-img"
                                                                title="product-img" class="avatar-md" />
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 text-truncate">
                                                                <a href="#" class="text-dark"> <?php echo $row["nama"];?> </a>
                                                            </h5>                    
                                                        </td>
                                                        <td colspan="3">
                                                         <?php echo $row["deskripsi"];?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php echo $row["jenis"];?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php echo $row["harga"];?>
                                                        </td>
                                                         <td class="text-center">
                                                         <span class="badge badge-pill badge-soft-success font-size-12"> <?php echo $status;?> </span>
                                                        </td>
                                                    </tr>
                                            <?php 
                                               }
                                            }
                                            ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->

<script>
$("document").ready(function(){

  $("#tombol_pesan_baru").click(function(){
     document.getElementById("fmeja").reset();
     $("#modal_meja").modal("show");
   });

  $("#tombol_lanjut").click(function(){
     $("#modal_meja").modal("hide");
     $(".modal_pesan").modal("show");
        var el = document.getElementById('nomeja');
        var no = el.options[el.selectedIndex].innerHTML;
        document.getElementById('label_tp').innerHTML="TRANSAKSI PEMESANAN " + no;
        var nomeja = $("#nomeja").val();
        document.getElementById('id_meja').innerHTML= nomeja;
     tampil_null();
   });

   $('#carinama').keyup(function(){
	  var kata = $("#carinama").val();
	  $.ajax({
     url: "pages/cari_menu.php",
     method: "POST",
     data:{kata:kata},
          success: function(data)
          {
            //alert(data);return;
            $("#cari_menu").html(data).refresh;
          }
        });
   });

   $("#add_pesan").click(function(){
    var idm   = document.getElementById("id_meja").innerHTML;
    var idp   = $("#pilih_menu").val();
    var harga = $("#harga").val();
    var jml   = $("#jumlah").val();
    var total = harga * jml;
    //alert (idp); return;

    if ( (idp == "") || (harga=="") || (jml=="") ){
        alert("Error! Data masih ada yang kosong!"); return;
    }

    $.ajax({
        url:"crud/add_pesanan.php",
        method:"POST",
        data:{ 
               idm:idm, idp:idp, harga:harga, jml:jml, total:total
             },
        success:function(data)
          {
            alert(data);      
            document.getElementById("fpesan").reset();
            tampil_tabel_pemesanan();             
          }
       });
    });

    $("#cek_pesan").click(function(){
        tampil_tabel_pemesanan();
    });

    $("#tutup_modal").click(function(){
        location.reload();
    });


  $("#batal_pesan").click(function(){
     var idmm   = document.getElementById("id_meja").innerHTML;
     $.ajax({
        url:"crud/batal_pesan.php",
        method:"POST",
        data:{idm:idmm},
          success:function(data)
          {
            alert(data);
          }
       });
       window.location.href="index.php?#";
     //location.reload();
    });

  $("#add_bayar").click(function(){
    var idm   = document.getElementById("id_meja").innerHTML;
    var tharga= document.getElementById("tharga").innerHTML;
    var tbayar= document.getElementById("tbayar").innerHTML;
    //alert (tharga); return;
    
    if ( (tharga.trim()=="") || (tbayar.trim()=="") || (idm.trim()=="") ){
        alert("Error! Harga & total Harga Masih Kosong!"); return;
    }
    $.ajax({
        url:"crud/add_bayar.php",
        method:"POST",
        data:{ 
               idm:idm, tharga:tharga, tbayar:tbayar
             },
        success:function(data)
          {
            alert(data);   return; 
            tampil_histori();            
          }
          //location.reload();
       });
       
    });

});


//memanggil fungsi Null
function tampil_null(){
    $.ajax({
        url:"pages/null.php",
        method:"GET",
        data:{},
          success:function(data)
          {
            /*Tampilkan Data Home berdasarkan nama ID (#) DIV*/
            $("#tampil_pemesanan").html(data).refresh;
            document.getElementById("fpesan").reset();
          }
    });
}

//memanggil fungsi tabel pemesan
function tampil_tabel_pemesanan(){
    var idmm   = document.getElementById("id_meja").innerHTML;
     $.ajax({
        url:"pages/tabel_transaksi_pemesanan.php",
        method:"GET",
        data:{idm:idmm},
          success:function(data)
          {
            harga();
            //alert("Sukses..");
            /*Tampilkan Data Home berdasarkan nama ID (#) DIV*/
            $("#tampil_pemesanan").html(data).refresh;
          }
    });
}

//memanggil fungsi tampil harga
function harga(){
    //alert("hai");
    var idmm   = document.getElementById("id_meja").innerHTML;
     $.ajax({
        url:"crud/tampil_harga.php",
        type:"POST",
        data:{idm:idmm},  
        dataType: 'json',   
          success:function(data)
          {
            //alert(data.total); return;
            $("#tharga").html("Rp. "+data.total).refresh;
            $("#tbayar").html("Rp. "+data.total).refresh;
          }
    });
}

function hapus_item(id)
  {
    $.ajax({
     url: "crud/delete_item_pesanan.php",
     method: "POST",
     data:{
		   idp:id
	      },
     success: function(data)
      {
        tampil_tabel_pemesanan();
      }
    });
  }

</script>