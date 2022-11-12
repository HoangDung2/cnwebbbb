<?php
require_once '../bootstrap.php';
require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();
use Project\CNWeb\Film;
$errors = [];

include('../config.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $poster = $_FILES['poster']['name'];
    $poster_tmp = $_FILES['poster']['tmp_name'];
    $background = $_FILES['background']['name'];
    $background_tmp = $_FILES['background']['tmp_name'];
    $content = $_POST['content'];
    $user_name = $_POST['user_name'];
    $sql = "INSERT INTO films (name, poster, background, content, user_name, created) VALUES ('$name', '$poster', '$background', '$content','$user_name', now())";
    $query = mysqli_query($connect, $sql);
    move_uploaded_file($poster_tmp, 'upload_img/'.$poster);
    move_uploaded_file($background_tmp, 'upload_img/'.$background);
    echo "<script>alert('Đã thêm thành công!!')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/logo1.png" rel="icon">
    <title>Thêm phim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">    
</head>
<body>
    <?php include('./navbar.php') ?>
    <div class="container">
        <section id="inner" class="inner-section section">
            <div class="container">
                <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Thêm phim</h2>
                <div class="inner-wrapper row d-flex justify-content-center">
                        <form name="frm" id="frm" action="" method="post" class="col-md-6 col-md-offset-3" enctype="multipart/form-data">
                            <!-- Tên phim -->
                            <div class="form-group<?=isset($errors['name']) ? ' has-error' : '' ?>">
                                <label for="name">Tên phim</label>
                                <input type="text" name="name" class="form-control" maxlen="255" id="name" placeholder="Enter Name" 
                                    value="<?=isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" />

                                <?php if (isset($errors['name'])): ?>
                                    <span class="help-block">
                                        <strong><?=htmlspecialchars($errors['name'])?></strong>
                                    </span>
                                <?php endif ?>                                 
                            </div>
                            <br>
                            <!-- Poster -->
                            <div class="form-group<?=isset($errors['poster']) ? ' has-error' : '' ?>">
                                <label for="poster">Poster</label>
                                <input type="file" name="poster" class="form-control" id="poster"/>
                                <?php if (isset($errors['poster'])): ?>
                                    <span class="help-block">
                                        <strong><?=htmlspecialchars($errors['poster'])?></strong>
                                    </span>
                                <?php endif ?>                                   
                            </div> <br>
                            <!-- Background -->
                            <div class="form-group<?=isset($errors['background']) ? ' has-error' : '' ?>">
                                <label for="background">Background</label>
                                <input type="file" name="background" class="form-control" id="background"/>
                                <?php if (isset($errors['background'])): ?>
                                    <span class="help-block">
                                        <strong><?=htmlspecialchars($errors['background'])?></strong>
                                    </span>
                                <?php endif ?>                                   
                            </div>
                            <br>
                            <!--Content -->
                            <div class="form-group<?=isset($errors['content']) ? ' has-error' : '' ?>">
                                <label for="description">Nội dung</label>
                                <textarea name="content" id="content" class="form-control" 
                                    placeholder=""><?=isset($_POST['content']) ? htmlspecialchars($_POST['content']) : '' ?></textarea>

                                <?php if (isset($errors['content'])): ?>
                                    <span class="help-block">
                                        <strong><?=htmlspecialchars($errors['content'])?></strong>
                                    </span>
                                <?php endif ?>                                 
                            </div>
                            <br>
                            <!-- Post Creater -->
                            <br>
                            <div class="form-group<?=isset($errors['user_name']) ? ' has-error' : '' ?>">
                                <label for="description">Nguời đăng bài </label>
                                <textarea name="user_name" id="user_name" class="form-control" 
                                    placeholder=""><?=isset($_POST['user_name']) ? htmlspecialchars($_POST['user_name']) : '' ?></textarea>

                                <?php if (isset($errors['user_name'])): ?>
                                    <span class="help-block">
                                        <strong><?=htmlspecialchars($errors['user_name'])?></strong>
                                    </span>
                                <?php endif ?>                                 
                            </div>
                            <!-- Submit -->
                            <div class="text-center">
                            <button type="submit" name="submit" id="submit" class="btn btn-secondary mt-2"> Thêm phim</button>
                            <a href="manage.php"><button type="button" name="cancel" id="cancel" class="btn btn-secondary mt-2">Hủy</button></a>
                            </div>
                        </form>

                </div>
            </div>
        </section>
    </div> 

    <?php include('./footer.php') ?>  

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script>
        $(document).ready(function(){
            new WOW().init();          
        });
    </script>
</body>
</html>
