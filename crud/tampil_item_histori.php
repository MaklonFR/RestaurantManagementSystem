
<div class="row mb-2">
    <div class="col-sm-4">
       <div class="">
        
        </div><!-- end card header -->
    </div>                                          
</div>

<div class="table-responsive">
    <table class="table align-middle mb-0 table-nowrap">
        <thead class="table-light">
            <tr>
                <th>Pesanan</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th class="text-center">Jumlah</th>
                <th>Total</th>
                <th colspan="2">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            //print_r($_GET);
            include "../includes/koneksi.php";
            $id  = isset($_POST['idp']) ? $_POST['idp'] : NULL;
            $sql="SELECT * FROM pesanan 
            JOIN meja ON pesanan.id_meja = meja.id_meja
            JOIN menu ON pesanan.id_menu = menu.id_menu
            JOIN pembayaran ON pesanan.kode_pesanan = pembayaran.kode_pesanan
             WHERE (pesanan.kode_pesanan='$id')";
            $result= $conn->query($sql);
            if ($result->num_rows > 0 ) {
            while ($row = $result->fetch_assoc())
             {
               
            ?>
            <tr>
                <td>
                    <img src="assets/<?php echo $row["filename"]; ?>" alt="product-img"
                    title="product-img" class="avatar-md" />
                </td>
                <td>
                    <?php echo $row["nama"]; ?>
                </td>
                <td>
                    <?php echo $row["harga"]; ?>
                </td>
                <td class="text-center">
                    <?php echo $row["jumlah"]; ?>
                </td>
                <td>
                    <?php echo $row["total"]; ?>
                </td>
                <td>
                <span class="badge badge-pill badge-soft-success font-size-12"> Selesai </span>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>