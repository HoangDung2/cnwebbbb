<?php 
    include('../config.php');
    if(isset($_POST['search_film'])){
        $name = $_POST['username'];
        $query = mysqli_query($connect, "SELECT * FROM films where name like '%$name%'");
    }
?>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light"
        style="
        background: url(/img/background.jpg);
        "
        >
        <div class="container text-light" >
            <a class="navbar-brand d-flex h-100" href="index.php" style="wight: 150px;">
                <img src="img/logo1.png" alt="" width="100x" height="100px">              
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex" id="navbarTogglerDemo02" style="wight: 500px;">
            
                <form class="d-flex" method="POST" action="index.php">
                        <input class="form-control me-2" type="text" placeholder="Tìm kiếm......" aria-label="Search"  name="username" style="border-radius: 40px 0 0 40px;">
                        <button class="btn btn-dark" name="search_film" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i> 
                        </button>                     
                </form>
                <ul class="navbar-nav me-auto mb-lg-0">
                    <?php if(!isset($_SESSION['user'])){
                        echo "<li class='nav-item'><a class='nav-link' href='login.php'> <button id='btnLogin' class='btn btn-secondary' style='border-radius: 40px'><i class='fa fa-sign-in' aria-hidden='true'></i>  Đăng nhập</button></a></li>";
                    }else{
                        echo "<li class='nav-item'><a class='nav-link' href='manage.php'> <button class='btn btn-secondary'><i class='fa fa-book' aria-hidden='true'></i> Quản lí</button></a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='logout.php'> <button class='btn btn-secondary'><i class='fa fa-sign-out' aria-hidden='true'></i> Thoát ra</button></a></li>";
                        
                    } ?>
                </ul>
            </div>
        </div>
        </nav>
    </div>
