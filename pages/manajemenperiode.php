<?php 
$detail = @$_GET['detail'];
$aksi = @$_GET['aksi'];
if(isset($detail)){


    if($detail == 'tambahperiode'){
        ?>


<br /> <br />
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

<!-- Include Quill library -->
<script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>

<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tambah Periode</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">

                    <form method="POST" action="<?php echo $url ?>/index.php?p=manajemenperiode&aksi=saveperiode">

                    <div class="form-floating mb-3">
                                <input class="form-control" id="keterangan" name="keterangan" type="text" data-sb-validations="required" />
                                <label for="phone">Keterangan</label>
                                <div class="invalid-feedback" data-sb-feedback="judul:required">Keterangan</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="tanggal_mulai" name="tanggal_mulai" type="date" data-sb-validations="required" />
                                <label for="phone">Tanggal Mulai</label>
                                <div class="invalid-feedback" data-sb-feedback="judul:required">Tanggal Mulai</div>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" id="tanggal_selesai" name="tanggal_selesai" type="date" data-sb-validations="required" />
                                <label for="phone">Tanggal Selesai</label>
                                <div class="invalid-feedback" data-sb-feedback="judul:required">Tanggal Selesai</div>
                            </div>




                            <div class="form-group">
                                <select class="form-control" name="aktif" id="aktif" required>
                                    <option value="1"> Aktif </option>
                                    <option value="0"> Tidak Aktif </option>
                                </select>
                            </div>
                                    <br />
                                    <div class="form-group">

                            <button type="submit" class="btn btn-primary"> Simpan </button>
                                    </div>

                    </form>
                    </div>
                </div>
            </div>
        </section>

        <?php 
        exit;
    } else if($detail == 'editperiode'){   
        $id_user = $_GET['id'];

        $q2 = "SELECT * FROM periode_pendaftaran where id = '$id_user'";
        echo $q2;
        $datauser = mysqli_query($conn,$q2);
        $users = mysqli_fetch_array($datauser);
    

        ?>


<br /> <br />
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edit Periode</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">

                    <form method="POST" action="<?php echo $url ?>/index.php?p=manajemenperiode&aksi=saveeditperiode">
                    <input type="hidden" name="id" value="<?php echo $users['id'] ?>">
                    <div class="form-floating mb-3">
                                <input class="form-control" id="keterangan" name="keterangan" type="text" data-sb-validations="required" value="<?php echo $users['keterangan'] ?>" />
                                <label for="phone">Keterangan</label>
                                <div class="invalid-feedback" data-sb-feedback="judul:required">Keterangan</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="tanggal_mulai" name="tanggal_mulai" type="date" data-sb-validations="required" value="<?php echo $users['tanggal_mulai'] ?>" />
                                <label for="phone">Tanggal Mulai</label>
                                <div class="invalid-feedback" data-sb-feedback="judul:required">Tanggal Mulai</div>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" id="tanggal_selesai" name="tanggal_selesai" type="date" data-sb-validations="required" value="<?php echo $users['tanggal_selesai'] ?>" />
                                <label for="phone">Tanggal Selesai</label>
                                <div class="invalid-feedback" data-sb-feedback="judul:required">Tanggal Selesai</div>
                            </div>




                            <div class="form-group">
                                <select class="form-control" name="aktif" id="aktif" required>
                                    <?php if($users['aktif'] == 1){ ?>
                                    <option value="1"> Aktif </option>
                                    <option value="0"> Tidak Aktif </option>
                                    <?php } else { ?>
                                        <option value="0"> Tidak Aktif </option>
                                        <option value="1"> Aktif </option>

                                    
                                    <?php } ?>
                                </select>
                            </div>
                                    <br />
                                    <div class="form-group">

                            <button type="submit" class="btn btn-primary"> Simpan </button>
                                    </div>

                    </form>
                    </div>
                </div>
            </div>
        </section>


        <?php 
        exit;
    }



}

if($aksi == 'delete'){

    $id = $_GET['id'];
    $query = "DELETE FROM periode_pendaftaran where id = '$id'";
    $run =  mysqli_query($conn,$query);
    if($run){
       echo "<script>window.location.href='".$url."/index.php?p=manajemenperiode&message=deleteberhasil'</script>";
        exit();
    }

} else if($aksi == 'saveperiode'){
    $keterangan = $_POST['keterangan'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    $aktif = $_POST['aktif'];
    $now = date('Y-m-d H:i:s');

    $query = "INSERT INTO periode_pendaftaran (keterangan,tanggal_mulai,tanggal_selesai,aktif,created_at) VALUES ('$keterangan','$tanggal_mulai','$tanggal_selesai','$aktif','$now')";
    $run = mysqli_query($conn,$query);
    if($run){
        echo "<script>window.location.href='".$url."/index.php?p=manajemenperiode&message=simpanberhasil'</script>";


    }

} else if($aksi == 'saveeditperiode'){

    $id = $_POST['id'];
    $keterangan = $_POST['keterangan'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    $aktif = $_POST['aktif'];
    $now = date('Y-m-d H:i:s');
   
        $query = "UPDATE periode_pendaftaran SET keterangan = '$keterangan', tanggal_mulai = '$tanggal_mulai', tanggal_selesai = '$tanggal_selesai', aktif = '$aktif', updated_at = '$now' WHERE id = '$id'";

    
    $run = mysqli_query($conn,$query);
    if($run){
        echo "<script>window.location.href='".$url."/index.php?p=manajemenperiode&message=editberhasil'</script>";


    }
}   
?>



<br /> <br />
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Manajemen Periode</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">
                        <a class="btn btn-primary" href="<?php echo $url ?>/index.php?p=manajemenperiode&detail=tambahperiode"> Tambah Periode </a>
                        <?php 
                        if(@$_GET['message']){
                            if($_GET['message'] == 'deleteberhasil'){
                                echo "<div class='alert alert-info'> Delete Periode Berhasil </div>";
                            }else if($_GET['message'] == 'tambahpengumuman'){
                                echo "<div class='alert alert-info'> Tambah Periode Berhasil </div>";

                            }else if($_GET['message'] == 'editpengumuman'){
                                echo "<div class='alert alert-info'> Edit Periode Berhasil </div>";

                            }
                        }
                        ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Keterangan </th>
                                <th> Tanggal Mulai </th>
                                <th> Tanggal Selesai </th>
                                <th> Aktif </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query = "SELECT * FROM periode_pendaftaran";
                        $run = mysqli_query($conn,$query);
                        $no = 1;
                        while($data = mysqli_fetch_array($run)){ ?>
                        <tr>
                        <td> <?php echo $no++; ?> </td>
                        <td> <?php echo $data['keterangan']; ?> </td>
                        <td> <?php echo tglIndo($data['tanggal_mulai']); ?> </td>
                        <td> <?php echo tglIndo($data['tanggal_selesai']); ?> </td>
                        <td> <?php if($data['aktif'] == 1){
                            echo '<span class="label label-primary"> Aktif </span>';
                            }else{
                                echo '<span class="label label-danger"> Tidak Aktif </span>';

                            }?> </td>
                        <td>
                        <a class="btn btn-info" href="<?php echo $url ?>/index.php?p=manajemenperiode&detail=editperiode&id=<?php echo $data['id']; ?>" > Edit </a>
                        <a class="btn btn-danger" href="<?php echo $url ?>/index.php?p=manajemenperiode&aksi=delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin hapus data?')"> Delete </a>
                        </td>
                        </tr>


                    <?php } ?>

                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </section>