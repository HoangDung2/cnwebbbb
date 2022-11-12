 <?php 
 require_once '../bootstrap.php'; 
include('../config.php');
$sql = 'SELECT * FROM films';
$query = mysqli_query($connect, $sql);

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <link href="css/font-awesome.min.css" rel="stylesheet"></style>
     <link href="css/style.css" rel="stylesheet"></style>
     <link href="img/logo1.png" rel="icon">
     <style>
        .card{
            background: url(/img/background.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        #card-shadow{
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            background-color: rgba(218, 167, 167, 0.25);
	        box-shadow: 0 0 17px rgb(222, 206, 206);
        }
        .card #card-shadow:hover{
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
            border-radius: 5px;
        }
        .card-img-top #img{
        }
     </style>
     <title>TeaRV</title>
 </head>
 <body>
 <?php include('./navbar.php') ?>
    <div class="container">
         <div id="exam" class="carousel slide mt-3" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-bs-target="#exam" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#exam" data-bs-slide-to="1"></li>
                <li data-bs-target="#exam" data-bs-slide-to="2"></li>
            </ul>
            <div class="carousel-inner" style="height: 450px width:400px">
                <div class="carousel-item active">
                    <img src="img/tomorow-background.jpeg" class="w-100"  alt="">
                </div>
                <div class="carousel-item">
                    <img src="img/hoabi-background.png" class="w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="img/thor-background.jpg" class="w-100" alt="">
                </div>
            </div>
                    <a class="carousel-control-prev" href="#exam" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span></a><a class="carousel-control-next" href="#exam" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span></a>
            </div> 
         <div class="card text-center d-flex">                 
                <h2><img src="img/hot.png" alt="" width="110px" height="100px"><em>Phim Mới Nhất<em></h2>         
                <div class="row">
                    <?php foreach($query as $key => $value){ ?>
                    <div class="col-lg-4 col-xs-12 mt-4">
                        <div class="card" style="width: 400px" id="card-shadow">
                            <img src="upload_img/<?php echo $value['background']?>" class="card-img-top" alt="" style="height: 200px">
                            <div class="card-body">
                                <h5 class="card-title">Review film <?php echo $value['name']?></h5><p>
                                <span class="card-text claimedRight"><?php echo $value['content']?></span>
                                <span>....</span></p>
                                <p>Ngày đăng: <?=date("d-m-y h:m:s", strtotime($value['created']))?></p>
                                <p>Người đăng bài: <?=$value['user_name']?></p>                              
                                <a href="detail.php?id=<?php echo $value['id'] ?>" class="btn btn-secondary">Chi tiết phim</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>         
        </div> 
    </div>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="/js/wow.min.js"></script>
    
    <script>
        
    </script>
    <script>
        $(document).ready(function(){
            new WOW().init();
            $('#contacts').DataTable();

            $('button[name="delete-contact"]').on('click', function(e){
                var $form = $(this).closest('form');
                e.preventDefault();
                $('#delete-confirm').modal({
                    backdrop: 'static', keyboard: false
                })
                .one('click', '#delete', function() {
                    $form.trigger('submit');
                });
            });
 
  
            $('.claimedRight').each(function (f) {
 
                var newstr = $(this).text().substring(0,80);
                $(this).text(newstr);
 
            });
        });
    </script>
    <?php include('./footer.php') ?>      
 </body>
 </html>