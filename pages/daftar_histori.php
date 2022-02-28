<?php include "../includes/koneksi.php"; ?>    
   
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                   <div class="card-header">
                                        <h4 class="text-center">Histori Menu Resto</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <div class="search-box me-2 mb-2 d-inline-block">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" id="caritanggal" placeholder="Search...">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="table-responsive" id="cari_histori">
                                            <table class="table align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Nomor Meja</th>
                                                        <th>Total Harga</th>
                                                        <th>Harga Bayar</th>
                                                        <th colspan="5">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                              <?php
                                                $sql="SELECT * FROM pembayaran 
                                                 JOIN meja ON pembayaran.id_meja = meja.id_meja
                                                 ORDER BY id_pembayaran DESC LIMIT 20";
                                                $result= $conn->query($sql);
                                                if ($result->num_rows > 0 ) {
                                                while ($row = $result->fetch_assoc())
                                                {
                                              ?>
                                                    <tr>
                                                        <td>
                                                          <?php echo $row["tgl_pembayaran"]; ?>
                                                        </td>
                                                        <td>
                                                        <h5 class="font-size-14 text-truncate">
                                                                <a href="#" class="text-dark"> <?php echo $row["no_meja"];?> </a>
                                                            </h5>  
                                                        </td>
                                                        <td>
                                                            <?php echo $row["total_harga"];?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["harga_bayar"];?>
                                                        </td>
                                                         <td>
                                                          <a href="#" onClick="tampil_item_histori(this.id)" 
                                                           id="<?php echo $row["kode_pesanan"]; ?>" class="action-icon text-success"> 
                                                           <i class="bx bx-show font-size-24"></i>
                                                          </a>                                                        
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

$('#caritanggal').keyup(function(){
	  var kata = $("#caritanggal").val();
	  $.ajax({
     url: "pages/cari_histori.php",
     method: "POST",
     data:{kata:kata},
          success: function(data)
          {
            //alert(data);return;
            $("#cari_histori").html(data).refresh;
          }
        });
   });
});

function tampil_item_histori(id)
  {
    $(".modal_histori").modal("show");
    //alert(id); return;
    $.ajax({
     url: "crud/tampil_item_histori.php",
     method: "POST",
     data:{idp:id},
     beforeSend:function()
        {
        $('#load').html("<center><label class='text-success'>Sedang mengambil data...</label> </center>");
        },
     success: function(data)
      {
        $("#load").hide();
        $("#histori").html(data).refresh;
      }
    });
  }

</script>