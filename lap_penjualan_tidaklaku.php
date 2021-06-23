<?php
include "config/connection.php";
include "library/controller.php";


?>

<div class="container  text-secondary mt-5 border border-4  rounded py-4 px-2 shadow border-secondary border-start-0 border-end-0" data-aos="fade-up" data-aos-delay="600" data-aos-anchor=".top">

  <table  id="data" class="data table table-striped table-bordered border-light table-hover py-3 display ">
    <thead>
        <tr class="table-light">
            <th>NO</th>
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <th>Jumlah Terjual</th>
          </tr>
    </thead>
    <tbody class="table-primary">
        <?php 
            
            $no = 0;
            $sql = "SELECT buku.id_buku AS id, buku.judul  FROM buku LEFT JOIN penjualan ON penjualan.id_buku = buku.id_buku WHERE penjualan.id_buku IS NULL";
            $jalan = mysqli_query($con, $sql);
            
              
              // if ($jalan == "") {
              //     echo "<tr><td colspan='4'>No Record</td></tr>";
              
              // } else{

              // foreach($jalan as $r){
              //     $no++
              // $query=mysqli_fetch_assoc($jalan);
              while ($r = mysqli_fetch_assoc($jalan)){
              $no++;
          ?>
          <tr>
              <td><?=  $no ?></td>
              <td><?=  $r['id'] ?></td>
              <td><?=  $r['judul'] ?></td>
              <td><?=  0 ?></td>
          </tr>
          <?php } ?>
    </tbody>
    

  </table>
</div>