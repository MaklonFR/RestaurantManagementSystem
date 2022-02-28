<?php include "../includes/koneksi.php"; ?>                          
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
                                                 $s_kata = $_POST['kata'];
                                                 //echo $s_kata;
                                                 $cari_kata = '%'. $s_kata .'%';
                                                    $sql="SELECT * FROM pembayaran 
                                                        JOIN meja ON pembayaran.id_meja = meja.id_meja
                                                        WHERE(tgl_pembayaran LIKE ?)
                                                        ORDER BY id_pembayaran DESC LIMIT 20";
                                                    $result_satu= $conn->prepare($sql);
                                                    $result_satu->bind_param('s',$cari_kata);
                                                    $result_satu->execute();
                                                    $result= $result_satu->get_result();
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