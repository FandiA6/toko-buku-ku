<?php 

include 'config/connection.php';
include 'library/controller.php';

@$table = $_GET['table'];
@$nama_dis=$_GET['nama_dis'];
if(isset($nama_dis)){
  @$text="Cetak Pasok Berdasarkan Distributor &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;".$_GET['nama_dis'];
}
@$query="SELECT * FROM set_laporan";
$edit=mysqli_fetch_assoc(mysqli_query($con,$query));

?>
<link href="css/styles.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        
<div class="container  text-secondary mt-5 border border-4  rounded py-4 px-2 shadow border-secondary border-start-0 border-end-0 " data-aos="fade-up" data-aos-delay="600" data-aos-anchor=".top">
<div class="d-flex justify-content-between"><h1 class="uppercase text-uppercase">CETAK <?= $_GET['table'] ?></h1><img style="width: 200px;" src="logo/<?= $edit['logo'] ?>"></div>

  <div align="center" class="text-dark h6"></div>
  <div align="center" class="text-dark h4 mb-5"><?= $edit['nama_perusahaan'] ?></div>
  <table  id="data" class="data table table-responsive table-striped table-bordered border-light table-hover py-3 display ">
    <thead class="table-light">
        <tr align="center"><th colspan=5><?= @$text?></th></tr>
        <tr class="table-secondary">
           <?php
           $sql = "SHOW COLUMNS FROM $table";
           $result = mysqli_query($con,$sql);
           while($row = mysqli_fetch_array($result)){?>
              <th><?= $row['Field'] ?></th>
          <?php } ?>
          </tr>
    </thead>
    <tbody class="table-primary">
    
        <?php 
            @$penulis=$_GET['penulis'];
            @$id_dis=$_GET['id_dis'];
            if($penulis == "" && $id_dis == "" ){
              $where = 1;
            }else if(isset($penulis)){
              $where = "penulis = '$penulis'";
            }else if(isset($id_dis)){
              $where = "id_dis = '$id_dis' ";
            }
            $sql = "SELECT * from $table WHERE $where";
            $jalan = mysqli_query($con, $sql);
              
              // if ($jalan == "") {
              //     echo "<tr><td colspan='4'>No Record</td></tr>";
              
              // } else{

              // foreach($jalan as $r){
              //     $no++
              // $query=mysqli_fetch_assoc($jalan);
          ?>
              <tr>
                <?php
                  while ($r = mysqli_fetch_array($jalan)){
                    $sql = "SHOW COLUMNS FROM $table";
                    $result = mysqli_query($con,$sql);
                    $no = -1;
                    while($row = mysqli_fetch_array($result)){
                    $no++;
                ?>
                  <td><?=  $r[$no]  ?></td>
                <?php } ?>
              </tr>
          <?php }?>
          
    </tbody>
  

  </table>
    <div align="center" class="text-dark h6">Jl. Pasir Kalong Kel.Sukakarya</div>
    <div align="center" class="text-dark h6"><?= $edit['no_hp'] ?></div>
    <div align="center" class="text-dark h6"><?= $edit['web'] ?></div>
    <div align="center" class="text-dark h6"><?= $edit['email'] ?></div>
</div>

<script>
  window.print();
</script>