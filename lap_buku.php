<?php
include "config/connection.php";
include "library/controller.php";

if(isset($_POST['cetak'])){
  @$penulis = $_POST['penulis'];
    echo "<script>window.open('cetak_table.php?table=buku&penulis=$penulis', '_blank');</script>";
}
?>
 <div class="container">
  <div class="text-secondary mt-5 border border-4  rounded py-4 px-2 shadow border-secondary border-start-0 border-end-0" data-aos="fade-up" data-aos-delay="600" data-aos-anchor=".top">
  <h1 class="text-center">Laporan BUKU</h1>
  <form method="POST" class="my-3">
  <label class="form-label h5 ">PILIH NAMA PENULIS :</label>
        <div class="d-flex">
          <select class="form-select" name="penulis" aria-label="Default select example">
            <option value=" ">pilih ini untuk Mencetak Semua</option>
            <?php
              @$sql = mysqli_query($con,"SELECT DISTINCT penulis FROM buku");
              while($data = mysqli_fetch_assoc($sql)){
			 			?>
             <option value="<?= $data['penulis'];?>"><?= $data['penulis'];?></option>
            <?php } ?>
          </select>
        </div>
  <input type="submit" name="cetak" class="btn btn-dark py-2 my-3 w-100" value="cetak">
  </form>
  <table  id="data" class="data table-sm table table-striped table-bordered border-light table-hover py-3 display ">
    <thead>
        <tr class="table-light">
            <th>Id Buku</th>
            <th>Judul</th>
            <th>ISBN</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>stok</th>
            <th>Harga Pokok</th>
            <th>Harga Jual</th>
            <th>PPN</th>
            <th>Diskon</th>
            <th>hapus</th>
            <th>edit</th>
          </tr>
    </thead>
    <tbody class="table-primary">
        <?php 
            
            $no = 0;
            $sql = "SELECT * from buku";
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
              <td><?=  $r['id_buku'] ?></td>
              <td><?=  $r['judul'] ?></td>
              <td><?=  $r['isbn'] ?></td>
              <td><?=  $r['penulis'] ?></td>
              <td><?=  $r['penerbit'] ?></td>
              <td><?=  $r['tahun'] ?></td>
              <td><?=  $r['stok'] ?></td>
              <td><?=  $r['harga_pokok'] ?></td>
              <td><?=  $r['harga_jual'] ?></td>
              <td><?=  $r['ppn'] ?></td>
              <td><?=  $r['diskon'] ?></td>
              <td><a class="btn btn-primary active text-light hover" href="?menu=buku&hapus&id=<?php echo $r['id_buku'] ?>" onclick="return confirm('yakin mau hapus?')">Hapus</a></td>
              <td><a class="btn btn-primary active text-light hover" href="?menu=buku&edit&id=<?php echo $r['id_buku'] ?>">Edit</a></td>
          </tr>
          <?php }  ?>
    </tbody>
    

  </table>
</div>