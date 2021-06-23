<?php 

include 'config/connection.php';
include 'library/controller.php';





@$query="SELECT * FROM set_laporan";
$edit=mysqli_fetch_assoc(mysqli_query($con,$query));
@$awal = $_GET['tglawl'];
@$akhir = $_GET['tglakr'];
if($awal=='' || $akhir=='' ){
  $sql = "SELECT * from penjualan";
  $text = "laporan Seluruh Penjualan";
}else{
 $sql = "SELECT * from penjualan WHERE tanggal BETWEEN '$awal' AND '$akhir'";
  $text = "Laporan seluruh penjualan dari $awal sampai $akhir";
}
?>
<link href="css/styles.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        
<div class="container  text-secondary mt-5 border border-4  rounded py-4 px-2 shadow border-secondary border-start-0 border-end-0" data-aos="fade-up" data-aos-delay="600" data-aos-anchor=".top">
<div class="d-flex justify-content-between mb-5"><h1 class="uppercase text-uppercase mt-2 text-center">CETAK LAPORAN PENJUALAN</h1><img style="width: 200px;" src="logo/<?= $edit['logo'] ?>"></div>
  <div align="center" class="text-dark h6"><?= $edit['nama_perusahaan'] ?></div>
  <div align="center" class="text-dark h4 mb-3"><?= $text ?></div>
  <table  id="penjualan" class="data table table-sm table-striped table-bordered border-light table-hover py-3 display ">
    <thead>
        <tr class="table-ligjt">
            <th>Id Faktur</th>
            <th>Id Buku</th>
            <th>Id Kasir</th>
            <th>Jumlah Beli</th>
            <th>Bayar</th>
            <th>Uang kembali</th>
            <th>Total Harga</th>
            <th>Tanggal Transaksi</th>
          </tr>
    </thead>
    <tbody class="table-primary">
        <?php 
            
            $no = 0;
           
              
              // if ($jalan == "") {
              //     echo "<tr><td colspan='4'>No Record</td></tr>";
              
              // } else{

              // foreach($jalan as $r){
              //     $no++
              // $query=mysqli_fetch_assoc($jalan);
              $jalan = mysqli_query($con, $sql);
              while ($r = mysqli_fetch_assoc($jalan)){
              $no++;
          ?>
          <tr>
              <td><?=  $r['id_penjualan'] ?></td>
              <td><?=  $r['id_buku'] ?></td>
              <td><?=  $r['id_kasir'] ?></td>
              <td><?=  $r['jumlah_beli'] ?></td>
              <td><?=  $r['bayar'] ?></td>
              <td><?=  $r['kembalian'] ?></td>
              <td><?=  $r['total_harga'] ?></td>
              <td><?=  $r['tanggal'] ?></td>
          </tr>
          <?php }  ?>
    </tbody>
   

  </table>
    <div align="center" class="text-dark h6">Jl. Pasir Kalong Kel. Sukakarya</div>
    <div align="center" class="text-dark h6"><?= $edit['no_hp'] ?></div>
    <div align="center" class="text-dark h6"><?= $edit['web'] ?></div>
    <div align="center" class="text-dark h6"><?= $edit['email'] ?></div>
</div>

<script>
  window.print();
</script>