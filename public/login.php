<?php
require_once '../bootstrap.php';

use Project\CNWeb\Film;

require '../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/logo1.png" rel="icon">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    <?php include('./navbar.php') ?>
    <!-- Main Page Content --> 
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-6 col-md-offset-2 w-50">
                <form id="frm" role="form" method="POST" action="login_submit.php">
                    <h1 class="text-center mt-3">Đăng Nhập</h1>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label h4">Email</label>
                        <input id="email" type="email" class="form-control" name="email" style="border-radius: 40px"
                                value="<?php if(isset($_SESSION['mail'])){echo $_SESSION['mail'];} else {echo "";} ?>" required autofocus aria-describedby="emailHelp">
                        <?php if (isset($errors['email'])): ?>
                            <span class="help-block">
                                <strong><?=$this->e($errors['email'])?></strong>
                            </span>
                        <?php endif ?> 
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label h4">Mật Khẩu</label>
                        <input id="password" type="password" class="form-control" name="password" style="border-radius: 40px" required>
                        <?php if (isset($errors['password'])): ?>
                            <span class="help-block">
                                <strong><?=$this->e($errors['password'])?></strong>
                            </span>
                        <?php endif ?>  
                    </div>
                    <form class="container" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                            <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-secondary" name="submit" style="border-radius: 40px">
                                    <i class='fa fa-sign-in' aria-hidden='true'></i> 
                                    Đăng nhập
                                </button>

                                <a class="btn btn-link" href="register.php">
                                    Bạn chưa đăng kí?
                                </a>
                            </div>
                        </div>
                    </form><br>
                </form>
            </div>
        </div>
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
