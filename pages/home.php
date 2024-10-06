<br /> <br />
<?php 
$aksi = @$_GET['aksi'];
$html = '';
if($aksi == 'proseslogin'){




    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);


    $cek = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    if(mysqli_num_rows($cek) == 0){

        $html = '<div class="alert alert-danger"> Username atau Password Salah !!! </div>';

    // print_r(mysqli_connect_errno());
        //login gagal;

    }else{
        $_SESSION['username'] = $username;

        
        while($user = mysqli_fetch_array($cek)){
            $_SESSION['id_user'] = $user['id'];
        }

        header("Location: index.php?p=home");
        exit;
    }

} 
?>
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Form-->
              
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                     <h3> Halaman Utama </h3>
                     <?php echo $_SESSION['username']; ?>
                    </div>
                </div>
            </div>
        </section>