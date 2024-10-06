<?php 
$detail = @$_GET['detail'];
$aksi = @$_GET['aksi'];
if(isset($detail)){


    if($detail == 'tambahuser'){
        ?>


<br /> <br />
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tambah User</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">

                    <form method="POST" action="<?php echo $url ?>/index.php?p=manajemenuser&aksi=saveuser">

                    <div class="form-floating mb-3">
                                <input class="form-control" id="username" name="username" type="text" data-sb-validations="required" />
                                <label for="phone">Username</label>
                                <div class="invalid-feedback" data-sb-feedback="username:required">Username wajib disii.</div>
                            </div>



                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="text" data-sb-validations="required" />
                                <label for="phone">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">password wajib disii.</div>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="role_id" id="role_id" required>
                                    <?php 
                                    $list_role = mysqli_query($conn,"SELECT * FROM role");
                                    while($dt = mysqli_fetch_array($list_role)){
                                        echo "<option value='".$dt['id']."'>".$dt['nama_role']."</option>";
                                    }
                                    ?>
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
    } else if($detail == 'edituser'){   
        $id_user = $_GET['id_user'];

        $q2 = "SELECT * FROM users where id = '$id_user'";
        echo $q2;
        $datauser = mysqli_query($conn,$q2);
        $users = mysqli_fetch_array($datauser);
    

        ?>


<br /> <br />
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edit User</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">

                    <form method="POST" action="<?php echo $url ?>/index.php?p=manajemenuser&aksi=saveedituser">
                    <input type="hidden" name="id" value="<?php echo $users['id'] ?>">
                    <div class="form-floating mb-3">
                                <input class="form-control" id="username" name="username" type="text" value="<?php echo $users['username'] ?>" data-sb-validations="required" />
                                <label for="phone">Username</label>
                                <div class="invalid-feedback" data-sb-feedback="username:required">Username wajib disii.</div>
                            </div>



                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="text" data-sb-validations="required" />
                                <label for="phone">Password (kosongkan jika tidak ingin merubah password)</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">password wajib disii.</div>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="role_id" id="role_id" required>
                                    <?php 
                                    $list_role = mysqli_query($conn,"SELECT * FROM role");
                                    while($dt = mysqli_fetch_array($list_role)){
                                        $selected = '';
                                        if($dt['id'] == $users['role_id']){
                                            $selected = 'selected="selected"';
                                        }
                                        echo "<option value='".$dt['id']."'  ".$selected.">".$dt['nama_role']."</option>";
                                    }
                                    ?>
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

    $id = $_GET['id_user'];
    $query = "DELETE FROM users where id = '$id'";
    $run =  mysqli_query($conn,$query);
    if($run){
        echo "<script>window.location.href='".$url."/index.php?p=manajemenuser&message=deleteuser'</script>";
        exit();
    }

} else if($aksi == 'saveuser'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    $role_id = $_POST['role_id'];

    $query = "INSERT INTO users(username,password,role_id) VALUES ('$username','$password','$role_id')";
    $run = mysqli_query($conn,$query);
    if($run){
        echo "<script>window.location.href='".$url."/index.php?p=manajemenuser&message=tambahuser'</script>";

    }

} else if($aksi == 'saveedituser'){

    $id = $_POST['id'];
    $username = $_POST['username'];
  

    $role_id = $_POST['role_id'];

    if($_POST['password'] == ''){
        $query = "UPDATE users SET username = '$username', role_id = '$role_id' WHERE id = '$id'";

    }else{
        $password = $_POST['password'];
        $password = md5($password);
        $query = "UPDATE users SET username = '$username', password = '$password',  role_id = '$role_id' WHERE id = '$id'";

    }
    $run = mysqli_query($conn,$query);
    if($run){
   echo "<script>window.location.href='".$url."/index.php?p=manajemenuser&message=edituser'</script>";


    }
}   
?>



<br /> <br />
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Manajemen User</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">
                        <a class="btn btn-primary" href="<?php echo $url ?>/index.php?p=manajemenuser&detail=tambahuser"> Tambah User </a>
                        <?php 
                        if(@$_GET['message']){
                            if($_GET['message'] == 'deleteberhasil'){
                                echo "<div class='alert alert-info'> Delete User Berhasil </div>";
                            }else if($_GET['message'] == 'tambahuser'){
                                echo "<div class='alert alert-info'> Tambah User Berhasil </div>";

                            }else if($_GET['message'] == 'edituser'){
                                echo "<div class='alert alert-info'> Edit User Berhasil </div>";

                            }
                        }
                        ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Username </th>
                                <th> Role </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query = "SELECT u.*, b.nama_role FROM users u left join role b  ON u.role_id = b.id";
                        $run = mysqli_query($conn,$query);
                        $no = 1;
                        while($data = mysqli_fetch_array($run)){ ?>
                        <tr>
                        <td> <?php echo $no++; ?> </td>
                        <td> <?php echo $data['username']; ?> </td>
                        <td> <?php echo $data['nama_role']; ?> </td>
                        <td>
                        <a class="btn btn-info" href="<?php echo $url ?>/index.php?p=manajemenuser&detail=edituser&id_user=<?php echo $data['id']; ?>" > Edit </a>
                        <a class="btn btn-danger" href="<?php echo $url ?>/index.php?p=manajemenuser&aksi=delete&id_user=<?php echo $data['id']; ?>" onclick="return confirm('Yakin hapus data?')"> Delete </a>
                        </td>
                        </tr>


                    <?php } ?>

                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </section>