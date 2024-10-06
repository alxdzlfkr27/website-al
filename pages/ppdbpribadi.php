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

    // echo $foto;
    // print_r($_POST);
    // exit;
    $siswa_id = $_SESSION['siswa_id'];
   
    $query = "UPDATE calonsiswa SET nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin',nisn = '$nisn', alamat_sekolah = '$alamat_sekolah',nik = '$nik',nomor_telepon = '$nomor_telepon',asal_sekolah = '$asal_sekolah',rata_rata_nilai = '$rata_rata_nilai',tempat_lahir = '$tempat_lahir',tanggal_lahir = '$tanggal_lahir',nama_orangtua = '$nama_orangtua' WHERE id = '$siswa_id'";

  


    // $query = "INSERT INTO calonsiswa (foto,nama_lengkap,jenis_kelamin,nisn,nik,nomor_telepon,asal_sekolah,alamat_sekolah,rata_rata_nilai,tempat_lahir,tanggal_lahir,nama_orangtua) VALUES ('$foto', '$nama_lengkap', '$jenis_kelamin', '$nisn', '$nik', '$nomor_telepon', '$asal_sekolah', '$alamat_sekolah', '$rata_rata_nilai', '$tempat_lahir', '$tanggal_lahir','$nama_orangtua')";


    // Mengikat parameter
    // mysqli_stmt_bind_param($stmt, "ssssssssdss",$foto, $nama_lengkap, $jenis_kelamin, $nisn, $nik, $nomor_telepon, $asal_sekolah, $alamat_sekolah, $rata_rata_nilai, $tempat_lahir, $tanggal_lahir);

    // Menjalankan query
    if (mysqli_query($conn,$query)) {
        $last_id = mysqli_insert_id($conn);

        if($foto != ""){
            $query = "UPDATE calonsiswa SET foto = '$foto' WHERE id = '$siswa_id'";
            mysqli_query($conn,$query);
        }

        header("Location: index.php?p=ppdbpribadi");
        ?>



<?php

        


    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }


} else if($aksi == 'saveberhasil'){
    echo '';
     echo '
        <div class="container" style="margin-top:100px;margin-bottom:50px;">

            <div class="alert alert-success"> Berhasil Melakukan Update Data </div>

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
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
             

<?php 
$now = date('Y-m-d');
$periode_ada = 1;


$cek = mysqli_query($conn,"SELECT * FROM periode_pendaftaran WHERE tanggal_mulai <= '$now' AND tanggal_selesai >= '$now'");
while($dt = mysqli_fetch_array($cek)){
    if($dt['aktif'] == 1){
        $periode_ada = 1;
    }

}


    $siswa = mysqli_fetch_array(mysqli_query($conn," SELECT * FROM calonsiswa WHERE id = '".$_SESSION['siswa_id']."' "))

    
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
                        <form id="contactForm" action="<?php echo $url ?>/index.php?p=ppdbpribadi&aksi=saveuser" method="POST" enctype="multipart/form-data">
                            <!-- Name input-->

                            <div class="form-floating mb-3">
                                <img src="<?php echo $url ?>/foto/<?php echo $siswa['foto'] ?>" class="img img-responsive" style="max-height: 200px;">
                                <input class="form-control" id="foto" type="file" name="foto"  data-sb-validations="required" />
                                <label for="name">Foto</label>
                                <div class="invalid-feedback" data-sb-feedback="foto:required">Nama Wajib Disii.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name="nama_lengkap" value="<?php echo $siswa['nama_lengkap'] ?>" data-sb-validations="required" />
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
                                <input class="form-control" id="nisn" type="text" name="nisn" data-sb-validations="required" value="<?php echo $siswa['nisn'] ?>" />
                                <label for="name">NISN</label>
                                <div class="invalid-feedback" data-sb-feedback="nisn:required">Nama Wajib Disii.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="nik" type="text" name="nik"  data-sb-validations="required" value="<?php echo $siswa['nik'] ?>" />
                                <label for="name">NIK</label>
                                <div class="invalid-feedback" data-sb-feedback="nik:required">NIK Wajib Disii.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="nama_orangtua" type="text"   name="nama_orangtua" data-sb-validations="required"  value="<?php echo $siswa['nama_orangtua'] ?>"/>
                                <label for="phone">Nama Orang Tua</label>
                                <div class="invalid-feedback" data-sb-feedback="nama_orangtua:required">Nama Orang Tua is required.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" name="nomor_telepon"  data-sb-validations="required" value="<?php echo $siswa['nomor_telepon'] ?>" />
                                <label for="phone">Nomor Telepeon</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="tempat_lahir" type="text"   name="tempat_lahir" data-sb-validations="required"  value="<?php echo $siswa['tempat_lahir'] ?>"/>
                                <label for="phone">Tempat Lahir</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="tanggal_lahir" type="date"   name="tanggal_lahir"  data-sb-validations="required" value="<?php echo $siswa['tanggal_lahir'] ?>" />
                                <label for="phone">Tanggal Lahir</label>
                                <div class="invalid-feedback" data-sb-feedback="tanggal_lahir:required">Tanggal Lahir is required.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="asal_sekolah" name="asal_sekolah" type="text" data-sb-validations="required" value="<?php echo $siswa['asal_sekolah'] ?>" />
                                <label for="phone">Asal Sekolah</label>
                                <div class="invalid-feedback" data-sb-feedback="asal_sekolah:required">Asal Sekolah wajib disii.</div>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" id="alamat_sekolah" name="alamat_sekolah" type="text" data-sb-validations="required" value="<?php echo $siswa['alamat_sekolah'] ?>" />
                                <label for="phone">Alamat Sekolah</label>
                                <div class="invalid-feedback" data-sb-feedback="alamat_sekolah:required">Alamat Sekolah wajib disii.</div>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" id="rata_rata_nilai" name="rata_rata_nilai" type="text" data-sb-validations="required" value="<?php echo $siswa['rata_rata_nilai'] ?>" />
                                <label for="phone">Rata Rata Nilai Raport</label>
                                <div class="invalid-feedback" data-sb-feedback="alamat_sekolah:required">Rata Rata Nailai wajib disii.</div>
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
                                    <!-- Icon Divider-->
                                    cara mendaftar(buat akun pake email, nama sama password, simpan akun ,login, isi data dll, simpan, logout)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>