<?php
require_once '../bootstrap.php';

use Project\CNWeb\Film;

$film = new Film($PDO);
$films = $film->all();
include('../config.php');
$id = $_GET['id'];
$sql = "SELECT * FROM films where id = '$id' ";
$query = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/logo1.png" rel="icon">
    <title>Chi tiết phim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">     
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <style>
        #formatImg{
            width: 100px;
            height: 100px;
        }
    </style>   
</head>
<body>
    <?php include('./navbar.php') ?>

    <div class="container">
        <div class="row hover-zoom">
             <?php foreach($query as $key => $value){ ?>
            <h3 class="text-primary title-film mt-4">Review phim <?php echo $value['name']?></h3>
            <?php echo $value['content']?>
            <div class="col-3"></div>
            <div>
                <img class="mt-3 mb-3" src="upload_img/<?php echo $value['background']?>" alt="">
            </div>    
            <div class="col-3"></div>
            
            <div class="col-12 mt-2">
                <img class="mt-3 mb-3" src="upload_img/<?php echo $value['poster']?>" alt="">
            </div>    
            <?php } ?>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script>
        $(document).ready(function(){
            new WOW().init();
            $('#contacts').DataTable();

            $('button[name="delete-contact"]').on('click', function(e){
                var $form = $(this).closest('form');
                e.preventDefault();
                $('#delete-confirm').modal({
                    backdrop: 'static', keyboard: false
                }).one('click', '#delete', function() {
                    $form.trigger('submit');
                });
            });
        });
    </script>
    <?php include('./footer.php') ?>
</body>
</html>