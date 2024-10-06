<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
    <body id="page-top">
        <!-- Navigation-->
        <?php include 'menu.php'; ?>

        <div style="padding:50px;min-height:700px;">

        <?php 
        if(isset($_GET['p'])){
            $pages = $_GET['p'];
            include 'pages/'.$pages.'.php';
        }else{
            include 'beranda.php';
        }
        ?>
        </div>
        <!-- Masthead-->
    
    
    
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
