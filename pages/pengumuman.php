<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Pengumuman</h2> <br /> <br />
                <div class="row">
    <?php 
    $pengumuman = "SELECT * FROM pengumuman where aktif = 1 ORDER BY created_at DESC";
    $run = mysqli_query($conn,$pengumuman);
    while($dt = mysqli_fetch_array($run)){ ?>
   <div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php echo $dt['judul'] ?></h5>
    <p class="card-text"><?php echo $dt['pengumuman'] ?>.</p>
    <p></p>
  </div>
</div>

<?php } ?>


</div>
                </div>
            </div>
</section>