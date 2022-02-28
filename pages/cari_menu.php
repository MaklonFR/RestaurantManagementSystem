<?php include "../includes/koneksi.php"; ?>                               
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
                                                $s_kata = $_POST['kata'];
                                                $cari_kata = '%'. $s_kata .'%';
                                                $sql="SELECT * FROM menu WHERE (nama LIKE ?) ORDER BY id_menu DESC LIMIT 20";
                                                $result_satu= $conn->prepare($sql);
                                                $result_satu->bind_param('s',$cari_kata);
                                                $result_satu->execute();
                                                $result= $result_satu->get_result();

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