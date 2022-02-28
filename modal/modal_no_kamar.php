  
<!----------------------------- Bagian Awal Modal Pilih No. Meja ----------------------------->
                        <div calss="row">
                           <div class="col-lg-6">
                             <div class="modal fade" id="modal_meja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                         <h5 class="modal-title" id="modal_meja_label">Ambil No. Meja</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="col-lg-12 col-md-6">
                                             <form id="fmeja">
                                              <div class="mb-3">     
                                              <?php 
                                              /*Pilih No. Meja dari tabel meja*/                   
                                               $sql_nome = mysqli_query($conn,"SELECT * FROM meja ORDER BY id_meja ASC");
                                              ?>                                     
                                                <select class="form-control" data-trigger  name="nomeja" id="nomeja"
                                                 placeholder="Ambil No. Meja">
                                                 <option value="">Pilih sekarang</option>
                                                 <?php                       
                                                  while($rs_cat = mysqli_fetch_assoc($sql_nome)){ 
                                                  echo '<option value="'.$rs_cat['id_meja'].'"> 
                                                           '.$rs_cat['id_meja'].". ". $rs_cat['no_meja']." "." (". $rs_cat['status'].")".'
                                                        </option>';
                                                  }                        
                                                 ?>
                                                </select>
                                               </div>
                                              </form>
                                            </div>
                                        </div>                                      
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                          <button type="button" id="tombol_lanjut" class="btn btn-primary">Lanjutkan</button>
                                        </div>
                                   </div>
                                </div>
                              </div>
                            </div> <!-- end col-lg-6 -->
                        </div> <!-- end row -->
<!----------------------------- Bagian Akhir Modal Pilih No. Meja -----------------------------> 