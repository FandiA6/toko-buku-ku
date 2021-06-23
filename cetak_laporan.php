<?php 

include 'config/connection.php';
include 'library/controller.php';

@$id_fak=$_GET['id'];

@$sql = mysqli_query($con,"SELECT * FROM penjualan WHERE id_penjualan = '$id_fak'");
@$data = mysqli_fetch_assoc($sql);

@$query="SELECT * FROM set_laporan";
$edit=mysqli_fetch_assoc(mysqli_query($con,$query));

?>
<link href="css/styles.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        
<div class="container text-secondary mt-5 border border-4  rounded py-4 px-2 shadow border-secondary border-start-0 border-end-0 w-75" data-aos="fade-up" data-aos-delay="600" data-aos-anchor=".top">
<div class="d-flex justify-content-between mb-5"><h1 class="uppercase text-uppercase mt-2 text-center">CETAK STRUK PENJUALAN</h1><img style="width: 250px;" src="logo/<?= $edit['logo'] ?>"></div>
  <div class="text-dark h6 d-flex justify-content-between"><div>NO FAKTUR &nbsp; :</div><div><?= $id_fak ?></div></div>
    <table class="data table table-responsive table-striped table-bordered table-hover py-3 display" id="">
              <thead class="table-light">
                <tr>
                  <th>No</th>
                  <th>Judul Buku</th>
                  <th>Jumlah Beli</th>
                  <th>Harga</th>
                  <th>PPN</th>
                  <th>Diskon</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody class="table-primary">
              <?php
                    $no=0;
                    @$sql = mysqli_query($con,"SELECT * FROM penjualan INNER JOIN buku USING(id_buku) WHERE id_penjualan = '$id_fak'");
                    while($data = mysqli_fetch_assoc($sql)){
                      
                    $no++;
                  ?>
                  <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $data['judul'] ?></td>
                  <td><?php echo $data['jumlah_beli'] ?></td>
                  <td><?php echo $data['harga_jual'] ?></td>
                  <td><?php echo $data['ppn'] ?></td>
                  <td><?php echo $data['diskon'] ?></td>
                  <td><?php  @$total = (intval($data['jumlah_beli'])*intval($data['harga_jual'])); echo $total; ?></td>
                  <?php } ?> 
                </tbody> 
                <tfoot class="table-primary">
                <?php 
                @$sql = mysqli_query($con,"SELECT * FROM penjualan WHERE id_penjualan = '$id_fak'");
                @$data = mysqli_fetch_assoc($sql);
                ?>
                  <tr class="table-primary">
                    <td colspan="4">Total buku</td>
                    <?php 
                       $sql = mysqli_fetch_array(mysqli_query($con,"SELECT jumlah_beli,sum(jumlah_beli) AS jumlah_beli FROM penjualan WHERE id_penjualan = '$id_fak' "));
                    ?>
                    <td colspan="3" ><?= $sql['jumlah_beli'] ?>&nbsp;&nbsp;&nbsp;<strong>BUKU</strong></td>
                  </tr>
                  <tr>
                    <td colspan="4" ><strong>Total Harga | setelah diskon dan pajak </strong></td>
                    <td colspan="3"><?php echo $data['total_harga']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="4">Bayar</td>
                    <td colspan="3"><?php echo $data['bayar']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="4">Kembalian</td>
                    <td colspan="3"><?php echo $data['kembalian']; ?></td>
                  </tr>
                </tfoot>
    </table>
    <div align="center" class="text-dark h6">Jl.Pasir Kalong Kel.Sukakarya</div>
    <div align="center" class="text-dark h6"><?= $edit['no_hp'] ?></div>
    <div align="center" class="text-dark h6"><?= $edit['web'] ?></div>
    <div align="center" class="text-dark h6"><?= $edit['email'] ?></div>
</div>

<script>
  window.print();
</script>