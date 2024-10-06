<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Kontak Kami</h2> <br /> <br />
                <div class="row">
    <?php 
    $pengumuman = "SELECT * FROM kontak LIMIT 1";
    $run = mysqli_query($conn,$pengumuman);
    while($dt = mysqli_fetch_array($run)){ ?>
   <div class="card">
  <div class="card-body">
  <h5 class="card-title">Nomor Telepon : <?php echo $dt['nomor_telepon'] ?> </h5>
  <h5 class="card-title">Email : <?php echo $dt['email'] ?> </h5>
  <h5 class="card-title">Alamat : <?php echo $dt['alamat'] ?> </h5>
  <h5 class="card-title">Website : <?php echo $dt['website'] ?> </h5>
  <p></p>
  </div>
</div>

<?php } ?>


</div>
                </div>
            </div>
</section>