<br /> <br />
<?php 
$aksi = @$_GET['aksi'];
$html = '';
if($aksi == 'updatepassword'){


$password_lama = $_POST['password_lama'];
$password_lama = md5($password_lama);


$query = mysqli_query($conn,"SELECT * FROM users WHERE id = '".$_SESSION['id_user']."'");
$data = mysqli_fetch_array($query);


    
    if($data['password'] != $password_lama){

        $html = '<div class="alert alert-danger"> Password lama salah !!! </div>';

    // print_r(mysqli_connect_errno());
        //login gagal;

    }else{
        $password_new = md5($_POST['password_baru']);
        
        $query = "UPDATE users SET password = '$password_new' WHERE id = '".$_SESSION['id_user']."'";
        $run = mysqli_query($conn,$query);

        $html = '<div class="alert alert-danger"> Ubah Password Berhas !!! </div>';


    }

} 
?>
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Form-->
              
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                     <h3> Ubah Password </h3>

                     <?php 
                        echo $html;
                        ?>
                     <form method="POST" action="<?php echo $url ?>/index.php?p=profil&aksi=updatepassword">
                     <div class="form-group">
                        <label> Password lama </label>
                        <input type="password" name="password_lama" required class="form-control">
                     </div>


                     <div class="form-group">
                        <label> Password Baru </label>
                        <input type="password" name="password_baru" required class="form-control">
                     </div>
                     
                     <button type="submit" class="btn btn-primary"> Simpan </button>
                     </form>

                     


                    </div>
                </div>
            </div>
        </section>