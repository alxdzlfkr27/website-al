<br /> <br />

<?php 
$aksi = @$_GET['aksi'];
$now = date('Y-m-d H:i:s');

if($aksi == 'approvesiswa'){
    $id = $_GET['id'];
    $query = "UPDATE calonsiswa SET status = 1,  waktu_approval = '$now' where id = '$id'";
    $run = mysqli_query($conn,$query);
    if($run){   

        echo "<script>window.location.href='".$url."/index.php?p=manajemensiswa'</script>";



    }
}else if($aksi == 'approveall'){
    $query = "UPDATE calonsiswa SET status = 2, waktu_pengesahan = '$now' WHERE waktu_pengesahan IS NULL AND status = 1";  
    $run = mysqli_query($conn,$query);
    if($run){   

        $query = "UPDATE periode_pendaftaran SET aktif = 0";
        $run = mysqli_query($conn,$query);

  echo "<script>window.location.href='".$url."/index.php?p=manajemensiswa'</script>";



    }
}else if($aksi == 'tolaksiswa'){
    $id = $_GET['id'];
    $query = "UPDATE calonsiswa SET status = 9,  waktu_approval = '$now' where id = '$id'";
    $run = mysqli_query($conn,$query);
    if($run){   


        echo "<script>window.location.href='".$url."/index.php?p=manajemensiswa'</script>";


    }
}


?>
<section class="page-section" id="contact">
            <div class="container">
              
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Data Calon Siswa</h2>
   
                <a href="<?php echo $url ?>/cetak.php"> Cetak </a>
                
        <?php 
$qtotal = "SELECT COUNT(*)  total FROM calonsiswa where status = 1";
$rtotal = mysqli_query($conn,$qtotal);
$total_diterima = 0;
while($dd = mysqli_fetch_array($rtotal)){
$total_diterima = $dd['total'];
}
?>

<div> Total Diterima : <?php echo $total_diterima; ?> </div><!-- Icon Divider-->
                <div class="divider-custom">
                </div>

                <?php if($_SESSION['role_id'] == 3){
                    echo '<a class="btn btn-success" href="'.$url.'/index.php?p=manajemensiswa&aksi=approveall"> Setujui </a>';  
                    $where = "WHERE waktu_pengesahan IS NULL  AND status = 1 ";
                } else {
                    $where = "WHERE waktu_pengesahan IS NULL  AND status = 0 ";

                }
                ?>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">

                    <form action="" method="POST">
	 <input type="text" name="query" placeholder="Cari" />
	 <input type="submit" name="cari" value="Search" />
    </form>  
   <?php
    $query = $$_POST['query'];
    echo $query;
    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Foto </th>
                                <th> NISN </th>
                                <th> NIK </th>
                                <th> Nama Siswa </th>
                                <th> Jenis Kelamin </th>
                                <th> Tempat, Tanggal Lahir </th>
                                <th> Nomor Telepon </th>
                                <th> Asal Sekolah </th>
                                <th> Alamat Sekolah </th>
                                <th> Rata Rata Nilai </th>
                                <th> Status </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query = "SELECT * FROM calonsiswa  ".$where." ORDER BY waktu_registrasi ASC";
                        $run = mysqli_query($conn,$query);
                        $no = 1;
                        while($data = mysqli_fetch_array($run)){ ?>
                        <tr>
                        <td> <?php echo $no++; ?> </td>
                        <td> <img src="<?php echo $url ?>/foto/<?php echo $data['foto'] ?>" style="max-width:100px;max-height:100px;"> </td>
                        <td> <?php echo $data['nisn']; ?> </td>
                        <td> <?php echo $data['nik']; ?> </td>
                        <td> <?php echo $data['nama_lengkap']; ?> </td>
                        <td> <?php echo $data['jenis_kelamin']; ?> </td>
                        <td> <?php echo $data['tempat_lahir'].' '.tglIndo($data['tanggal_lahir']); ?> </td>
                        <td> <?php echo $data['nomor_telepon']; ?> </td>
                        <td> <?php echo $data['asal_sekolah']; ?> </td>
                        <td> <?php echo $data['alamat_sekolah']; ?> </td>
                        <td> <?php echo $data['rata_rata_nilai']; ?> </td>
                        <td>
                            <?php if($data['status'] == 1){ ?>
                                <span class="label label-success"> Diterima </span>
                            <?php } else if($data['status'] == 9){ ?>
                                <span class="label label-danger"> Ditolak </span>

                            <?php } ?>

                        </td>
                        <td> 
                            <?php if($data['status'] == 0){ ?>
                        <a class="btn btn-info" onclick="return confirm('Terima Data ini ?')" href="<?php echo $url ?>/index.php?p=manajemensiswa&aksi=approvesiswa&id=<?php echo $data['id'] ?>"> Terima </a>        
                        <a class="btn btn-danger" onclick="return confirm('Tolak Data ini ?')" href="<?php echo $url ?>/index.php?p=manajemensiswa&aksi=tolaksiswa&id=<?php echo $data['id'] ?>"> Tolak </a>       
                        <?php } ?> 
                        
                    </td>
                        </tr>


                    <?php } ?>

                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </section>