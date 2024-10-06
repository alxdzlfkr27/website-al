<br /> <br />
<?php 
$aksi = @$_GET['aksi'];
if(isset($aksi)){
if($aksi == 'saveuser'){

    $foto = "";

    if (isset($_FILES['foto'])) {
        $file = $_FILES['foto'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
    
        // Menentukan direktori penyimpanan file
        $uploadDir = 'foto/';
        $fileDestination = $uploadDir . basename($fileName);
    
        // Mengecek error pada file
        if ($fileError === UPLOAD_ERR_OK) {
            // Menyimpan file ke direktori
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
              //  echo "File berhasil di-upload.";
                $foto = $fileName;
    
            } else {
                //echo "Gagal memindahkan file.";
            }
        } else {
//            echo "Error pada file upload: " . $fileError;
        }
    } else {
  //      echo "Tidak ada file yang di-upload.";
    }
    

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nisn = $_POST['nisn'];
    $nik = $_POST['nik'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $alamat_sekolah = $_POST['alamat_sekolah'];
    $rata_rata_nilai = $_POST['rata_rata_nilai'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $nama_orangtua = @$_POST['nama_orangtua'];
    $tanggal_lahir = $_POST['tanggal_lahir'];


    $status = 0;


    $query = "INSERT INTO calonsiswa (foto,nama_lengkap,jenis_kelamin,nisn,nik,nomor_telepon,asal_sekolah,alamat_sekolah,rata_rata_nilai,tempat_lahir,tanggal_lahir,nama_orangtua,status) VALUES ('$foto', '$nama_lengkap', '$jenis_kelamin', '$nisn', '$nik', '$nomor_telepon', '$asal_sekolah', '$alamat_sekolah', '$rata_rata_nilai', '$tempat_lahir', '$tanggal_lahir','$nama_orangtua','$status')";

    // Mengikat parameter
    // mysqli_stmt_bind_param($stmt, "ssssssssdss",$foto, $nama_lengkap, $jenis_kelamin, $nisn, $nik, $nomor_telepon, $asal_sekolah, $alamat_sekolah, $rata_rata_nilai, $tempat_lahir, $tanggal_lahir);

    // Menjalankan query
    if (mysqli_query($conn,$query)) {
        $last_id = mysqli_insert_id($conn);

        $insert_user = mysqli_query($conn,"INSERT INTO users (username,password,role_id,siswa_id) VALUES ('$username','$password',1,".$last_id.")");
        header("Location: index.php?p=ppdb&aksi=saveberhasil");
        ?>



<?php

        


    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }


} else if($aksi == 'saveberhasil'){
    echo '';
     echo '
        <div class="container" style="margin-top:100px;margin-bottom:50px;">

            <div class="alert alert-success"> Berhasil Melakukan Pendaftaran </div>

            Silahkan Klik Login 
        </div>';

}
}else{
?>
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">PPDB</h2>
                <!-- Icon Divider-->
              <P></P>
                <!-- Contact Section Form-->
             

<?php 
$now = date('Y-m-d');
$periode_ada = 0;


$cek = mysqli_query($conn,"SELECT * FROM periode_pendaftaran WHERE tanggal_mulai <= '$now' AND tanggal_selesai >= '$now'");
while($dt = mysqli_fetch_array($cek)){
    if($dt['aktif'] == 1){
        $periode_ada = 1;
    }

}

if($periode_ada == 0){?>

<br />

<div class="row">
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Maaf, Periode Pendaftaran Sudah Selesai </strong>
</div>

</div>

            </div>
</section>

<?php
 }else{ 
?>


<div class="row justify-content-center">
<a class="btn btn-warning mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
Tutorial Pendaftaran
</a>
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" action="<?php echo $url ?>/index.php?p=ppdb&aksi=saveuser" method="POST" enctype="multipart/form-data">
                            <!-- Name input-->
                            <form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="foto" type="file" name="foto"  data-sb-validations="required" />
                                <label for="name">Foto</label>
                                <div class="invalid-feedback" data-sb-feedback="foto:required">Nama Wajib Disii.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name="nama_lengkap" data-sb-validations="required" />
                                <label for="name">Nama Lengkap</label>
                                <div class="invalid-feedback" data-sb-feedback="nama_lengkap:required">Nama Wajib Disii.</div>
                            </div>

                            <div class="form-floating mb-3">
                            <select class="form-control" id="name"  name="jenis_kelamin" data-sb-validations="required">
                            <option value="L">Laki-Laki </option>
                            <option value="P">Perempuan </option>
                             </select>

                                <label for="name">Jenis Kelamin</label>
                                <div class="invalid-feedback" data-sb-feedback="jenis_kelamin:required">Nama Wajib Disii.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="nisn" type="text" name="nisn" data-sb-validations="required" />
                                <label for="name">NISN</label>
                                <div class="invalid-feedback" data-sb-feedback="nisn:required">Nama Wajib Disii.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="nik" type="text" name="nik"  data-sb-validations="required" />
                                <label for="name">NIK</label>
                                <div class="invalid-feedback" data-sb-feedback="nik:required">NIK Wajib Disii.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="nama_orangtua" type="text"   name="nama_orangtua" data-sb-validations="required" />
                                <label for="phone">Nama Orang Tua</label>
                                <div class="invalid-feedback" data-sb-feedback="nama_orangtua:required">Nama Orang Tua is required.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" name="nomor_telepon"  data-sb-validations="required" />
                                <label for="phone">Nomor Telepeon</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="tempat_lahir" type="text"   name="tempat_lahir" data-sb-validations="required" />
                                <label for="phone">Tempat Lahir</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="tanggal_lahir" type="date"   name="tanggal_lahir"  data-sb-validations="required" />
                                <label for="phone">Tanggal Lahir</label>
                                <div class="invalid-feedback" data-sb-feedback="tanggal_lahir:required">Tanggal Lahir is required.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="asal_sekolah" name="asal_sekolah" type="text" data-sb-validations="required" />
                                <label for="phone">Asal Sekolah</label>
                                <div class="invalid-feedback" data-sb-feedback="asal_sekolah:required">Asal Sekolah wajib disii.</div>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" id="alamat_sekolah" name="alamat_sekolah" type="text" data-sb-validations="required" />
                                <label for="phone">Alamat Sekolah</label>
                                <div class="invalid-feedback" data-sb-feedback="alamat_sekolah:required">Alamat Sekolah wajib disii.</div>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" id="rata_rata_nilai" name="rata_rata_nilai" type="text" data-sb-validations="required" />
                                <label for="phone">Rata Rata Nilai Raport</label>
                                <div class="invalid-feedback" data-sb-feedback="alamat_sekolah:required">Rata Rata Nailai wajib disii.</div>
                            </div>



                            <div class="form-floating mb-3">
                                <input class="form-control" id="username" name="username" type="text" data-sb-validations="required" />
                                <label for="phone">Username</label>
                                <div class="invalid-feedback" data-sb-feedback="username:required">Username wajib disii.</div>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="text" data-sb-validations="required" />
                                <label for="phone">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">Password wajib disii.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl" type="submit">Daftar</button>
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
                                    <!-- Icon Divider--><p></p>
                                    cara mendaftar(Isi data pribadi, isi nama dan Password untuk buat akun, klik daftar, jika ingin mengubah data atau sandi bisa login menggunakan nama dan password, logout)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>