<?php 
include 'config/koneksi.php';
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
<script>
    window.location.href="<?php echo $url ?>";
</script>