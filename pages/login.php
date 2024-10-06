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
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['siswa_id'] = $user['siswa_id'];
        }

   

        header("Location: index.php?p=home");
        exit();
    }

} 
?>
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
               <p></p>
                <!-- Contact Section Form-->
              
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" action="<?php echo $url ?>/index.php?p=login&aksi=proseslogin" method="POST">
                            <!-- Name input-->
                             <?php 
                             echo $html;
                             ?>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="username" type="text" name="username" data-sb-validations="required" />
                                <label for="name">Username</label>
                                <div class="invalid-feedback" data-sb-feedback="username:required">Nama Wajib Disii.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" type="password" name="password" data-sb-validations="required" />
                                <label for="name">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">Nama Wajib Disii.</div>
                            </div>

                         
                   
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Tutorial Pendaftaran</h2>
                                    <!-- Icon Divider-->
                                    cara mendaftar(buat akun pake email, nama sama password, simpan akun ,login, isi data dll, simpan, logout)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>