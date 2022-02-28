<?php include "includes/koneksi.php"; ?>

                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                       <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <h5 id="label_show">Form Pemesanan</h5>     
                                            </div>  
                                            <div class="col-sm-8"> 
                                              <div class="text-sm-end">
                                              <button type="button" id="cek_pesan" class="btn btn-success waves-effect btn-label waves-light">
                                                  <i class="bx bx-reset label-icon"></i> Refresh
                                                </button> 
                                              </div>  
                                            </div>                                         
                                        </div>                             

                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">                                            
                                        <label hidden id="id_meja" name="id_meja"></label>
                                         <form id="fpesan" class="align-items-center">
                                            <div class="mb-3">  
                                              <?php 
                                              /*Pilih No. Meja dari tabel meja*/                   
                                               $sql_nome = mysqli_query($conn,"SELECT * FROM menu ORDER BY id_menu ASC");
                                              ?>                                         
                                                <select class="form-control" data-trigger name="pilih_menu"
                                                    onchange="get_harga(this)" id="pilih_menu"
                                                    placeholder="Pilih menu pesanan">
                                                    <option value="">Pilih menu pesanan</option>
                                                    <?php                       
                                                        while($rs_cat = mysqli_fetch_assoc($sql_nome)){ 
                                                        echo '<option value="'.$rs_cat['id_menu'].'">
                                                              '.$rs_cat['id_menu'].". ". $rs_cat['nama']." "." (". $rs_cat['jenis'].")".'
                                                              </option>';
                                                        }                        
                                                 ?>
                                                 </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <input type="number" class="form-control" id="harga" name="harga">
                                            </div>

                                            <div class="mb-3">
                                                <input type="number" class="form-control" id="jumlah" placeholder="Masukan jumlah pesanan">
                                            </div>                                               
                                          </form>
                                            <button type="button" id="add_pesan" class="btn btn-primary btn-rounded waves-effect waves-light">
                                             Tambah ke pemesan
                                            </button>
                                            <button type="button" id="batal_pesan" class="btn btn-warning btn-rounded waves-effect waves-light">
                                              Batal
                                            </button>
                                        </div>
                                    </div>    
                                    <!-- Tampil Data Tabel Transaksi dan Form Tambah Pesan -->
                                    <div id="tampil_pemesanan" class="mt-4" >

                                    </div>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                 <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Estimasi pesanan</h4>

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Total Harga :</td>
                                                        <td> <div id="tharga"> </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount : </td>
                                                        <td>Rp.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Harga Bayar :</th>
                                                        <td> <div id="tbayar"> </div></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-sm-end mt-4">
                                                    <button type="button"  id="add_bayar"
                                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                                        <i class="mdi mdi-plus me-1"></i> Proses Pembayaran
                                                    </button>
                                            </div>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                       <!-- end row -->

<script>

function get_harga(a) {
    var x = a.options[a.selectedIndex].value;
    //document.querySelector('input[name="input_harga"]').value=8000
    //document.getElementById("demo").innerHTML = a;
    //alert(x); return;
    $.ajax({
        url:"pages/harga.php",
        method:"GET",
        data:{ 
               idm:x
             },
          success:function(data)
          {
            //alert(data); return;
            /*Tampilkan Data Home berdasarkan nama ID (#) DIV*/
            document.querySelector('input[name="harga"]').value= data;
          }
    });
}


</script>

