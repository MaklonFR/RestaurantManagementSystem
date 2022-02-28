<?php include "../includes/koneksi.php"; ?>                  
                    <div class="row">
                      <div class="col-xl-3">
                      </div>

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="text-center">Selamat datang di Aplikasi <br />Restoran MyCafe</h3>
                                        <p class="card-title-desc text-center">Restoran my cofe menyediakan makanan dan minuman yang dapat membuat ada semangat 
                                        dalam beraktifitas.</p>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                            <?php
                                            $aktif="active";
                                            $sql="SELECT * FROM menu ORDER BY id_menu ASC LIMIT 3";
                                                $result= $conn->query($sql);
                                            ?>
                                        <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <?php
                                                if ($result->num_rows > 0 ) {
                                                while ($row = $result->fetch_assoc())
                                                {                                                   
                                            ?>               
                                                <div class="carousel-item <?php echo $aktif;?> ">
                                                    <img src="assets/<?php echo $row["filename"] ?>" alt="..." class="d-block img-fluid mx-auto">
                                                    <div class="carousel-caption d-none d-md-block text-white-50">
                                                        <h3 class="text-white"> <?php echo $row["nama"]; ?> </h3>
                                                        <h6 class="text-white"><?php echo $row["deskripsi"]; ?></h6>
                                                    </div>
                                                  </div>
                                                <?php
                                                    $aktif=""; 
                                                    }
                                                }
                                                ?>

                                            </div>
                                            
                                            <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div><!-- end carousel -->
                                        
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div> <!-- end col -->

                          <div class="col-xl-3">
                          </div>
                        </div> <!-- end row -->