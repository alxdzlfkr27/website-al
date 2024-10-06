<?php 
$aksi = @$_GET['aksi'];


if($aksi == 'savekontak'){
    $nomor_telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $website  = $_POST['website'];

    $id = $_POST['id'];
    if($id == ''){
        $quer = "INSERT INTO kontak (nomor_telepon,email,alamat,website) VALUES ('$nomor_telepon','$email','$alamat','$website')";
        
    } else {
        $quer = "UPDATE kontak SET nomor_telepon = '$nomor_telepon' , email = '$email', alamat = '$alamat', website = '$website'";

    }
    $run = mysqli_query($conn,$quer);
    if($run){
       echo "<script>window.location.href='".$url."/index.php?p=manajemenkontak'</script>";
    }
}

$qq = mysqli_query($conn,"SELECT * FROM kontak LIMIT 1");
$data = mysqli_fetch_array($qq);
?>
<br /> <br />
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Kontak</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">
                        
                 
                    <form method="POST" action="<?php echo $url ?>/index.php?p=manajemenkontak&aksi=savekontak">
                <input type="hidden" name="id" value="<?php echo @$data['id'] ?>">
                    <div class="form-group">
                        <label> Nomor Telepon </label>
                        <input type="text" name="nomor_telepon" class="form-control" value="<?php echo @$data['nomor_telepon'] ?>">
                    </div>

                    <div class="form-group">
                        <label> Email </label>
                        <input type="email" name="email" class="form-control" value="<?php echo @$data['email'] ?>">
                    </div>

                    <div class="form-group">
                        <label> Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo @$data['alamat'] ?>">
                    </div>

                    <div class="form-group">
                        <label> Website </label>
                        <input type="text" name="website" class="form-control" value="<?php echo @$data['website'] ?>">
                    </div>


                    <button type="submit" class="btn btn-info"> Simpan </button>





                    </form>

                    </table>
                    </div>
                </div>
            </div>
        </section>