<?php 
$detail = @$_GET['detail'];
$aksi = @$_GET['aksi'];
if(isset($detail)){


    if($detail == 'tambahpengumuman'){
        ?>


<br /> <br />
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />

<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tambah Pegumuman</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">

                    <form method="POST" action="<?php echo $url ?>/index.php?p=manajemenpengumuman&aksi=savepengumuman">

                    <div class="form-floating mb-3">
                                <input class="form-control" id="judul" name="judul" type="text" data-sb-validations="required" />
                                <label for="phone">Judul</label>
                                <div class="invalid-feedback" data-sb-feedback="judul:required">judul wajib disii.</div>
                            </div>


                        <div class="form-floating mb-3">
                            <textarea id="pengumuman" name="pengumuman" rows="5" class="form-control" required> </textarea>

                                <!-- <input class="form-control" id="pengumuman" name="pengumuman" type="text" data-sb-validations="required" /> -->
                                <label for="phone">Pengumuman</label>
                                <div class="invalid-feedback" data-sb-feedback="pengumuman:required">Pengumuman wajib disii.</div>
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
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

        <?php 
        exit;
    } else if($detail == 'editpengumuman'){   
        $id_user = $_GET['id'];

        $q2 = "SELECT * FROM pengumuman where id = '$id_user'";
        $datauser = mysqli_query($conn,$q2);
        $users = mysqli_fetch_array($datauser);
    

        ?>


<br /> <br />
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edit Pengumuman</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">

                    <form method="POST" action="<?php echo $url ?>/index.php?p=manajemenpengumuman&aksi=saveeditpengumuman">
        <input type="hidden" name="id" value="<?php echo $users['id'] ?>">
<div class="form-floating mb-3">
            <input class="form-control" id="judul" name="judul" type="text"  value="<?php echo $users['judul'] ?>" data-sb-validations="required" />
            <label for="phone">Judul</label>
            <div class="invalid-feedback" data-sb-feedback="judul:required">judul wajib disii.</div>
        </div>


        <div class="form-floating mb-3">
            <input class="form-control" id="pengumuman" name="pengumuman"   value="<?php echo $users['pengumuman'] ?>" type="text" data-sb-validations="required" />
            <label for="phone">Pengumuman</label>
            <div class="invalid-feedback" data-sb-feedback="pengumuman:required">Pengumuman wajib disii.</div>
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
    $query = "DELETE FROM pengumuman where id = '$id'";
    $run =  mysqli_query($conn,$query);
    if($run){
        echo "<script>window.location.href='".$url."/index.php?p=manajemenpengumuman&message=deleteberhasil'</script>";
        exit();
    }

} else if($aksi == 'savepengumuman'){
    $judul = $_POST['judul'];
    $pengumuman = $_POST['pengumuman'];

    $aktif = $_POST['aktif'];
    $now = date('Y-m-d H:i:s');

    $query = "INSERT INTO pengumuman(judul,pengumuman,aktif,created_at) VALUES ('$judul','$pengumuman','$aktif','$now')";
    $run = mysqli_query($conn,$query);
    if($run){
        echo "<script>window.location.href='".$url."/index.php?p=manajemenpengumuman&message=saveberhasil'</script>";


    }

} else if($aksi == 'saveeditpengumuman'){

    $id = $_POST['id'];
    $pengumuman = $_POST['pengumuman'];
    $judul = $_POST['judul'];

    $aktif = $_POST['aktif'];
    $now = date('Y-m-d H:i:s');
   
        $query = "UPDATE pengumuman SET judul = '$judul', pengumuman = '$pengumuman', aktif = '$aktif', updated_at = '$now' WHERE id = '$id'";

    
    $run = mysqli_query($conn,$query);
    if($run){
        echo "<script>window.location.href='".$url."/index.php?p=manajemenpengumuman&message=editberhasil'</script>";


    }
}   
?>



<br /> <br />
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Manajemen Pengumuman</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">
                        <a class="btn btn-primary" href="<?php echo $url ?>/index.php?p=manajemenpengumuman&detail=tambahpengumuman"> Tambah Pengumuman </a>
                        <?php 
                        if(@$_GET['message']){
                            if($_GET['message'] == 'deleteberhasil'){
                                echo "<div class='alert alert-info'> Delete Pengumuman Berhasil </div>";
                            }else if($_GET['message'] == 'tambahpengumuman'){
                                echo "<div class='alert alert-info'> Tambah Pengumuman Berhasil </div>";

                            }else if($_GET['message'] == 'editpengumuman'){
                                echo "<div class='alert alert-info'> Edit Pengumuman Berhasil </div>";

                            }
                        }
                        ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Judul </th>
                                <th> Isi </th>
                                <th> Aktif </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query = "SELECT * FROM pengumuman";
                        $run = mysqli_query($conn,$query);
                        $no = 1;
                        while($data = mysqli_fetch_array($run)){ ?>
                        <tr>
                        <td> <?php echo $no++; ?> </td>
                        <td> <?php echo $data['judul']; ?> </td>
                        <td> <?php echo $data['pengumuman']; ?> </td>
                        <td> <?php if($data['aktif'] == 1){
                            echo '<span class="label label-primary"> Aktif </span>';
                            }else{
                                echo '<span class="label label-danger"> Tidak Aktif </span>';

                            }?> </td>
                        <td>
                        <a class="btn btn-info" href="<?php echo $url ?>/index.php?p=manajemenpengumuman&detail=editpengumuman&id=<?php echo $data['id']; ?>" > Edit </a>
                        <a class="btn btn-danger" href="<?php echo $url ?>/index.php?p=manajemenpengumuman&aksi=delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin hapus data?')"> Delete </a>
                        </td>
                        </tr>


                    <?php } ?>

                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </section>