<?php
require_once '../bootstrap.php';
use Project\CNWeb\Film;
$film = new Film($PDO);
$films = $film->all();
include('../config.php');
$sql = 'SELECT * FROM films';
$query = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/logo1.png" rel="icon">
    <title>Quản lí phim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
    <!-- Main Page Content --> 
    <div class="container bg-white">
        <session id="inner" class="inner-section section">
                <h2 class="section-heading text-center wow fadeIn mt-4" data-wow-duration="1s">Quản lí phim</h2>
                <div class="inner-wrapper row">
                    <div class="col-md-12">
                        <a href="/add.php" class="btn btn-secondary" style="margin-bottom: 30px;border-radius: 40px">
                            <i class="fa fa-plus"></i> Thêm phim mới</a>

                        <table id="contacts" class="table table-bordered table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th>Tên phim</th>
                                    <th>Poster</th>
                                    <th>Background</th>
                                    <th>Ngày tạo</th>
                                    <th>Nội Dung</th>
                                    <th>Điều chỉnh</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($query as $key => $value){ ?>
                                    <tr>
                                        <td><?php echo $value['name']?></td>
                                        <td><img src="upload_img/<?php echo $value['poster']?>" alt="" id="formatImg"></td>
                                        <td><img src="upload_img/<?php echo $value['background']?>" alt="" id="formatImg"></td>


                                        <td><?=date("d-m-y", strtotime($value['created']))?></td>
                                        <td class="claimedRight"><?php echo $value['content']?></td>
                                        <td>
                                            <a href="/edit.php?id=<?=$value['id']?>" class="btn btn-xs btn-warning">
                                                <i alt="Edit" class="fa fa-pencil"> Chỉnh sửa</i>
                                            </a>
                                            <form action="/delete.php" class="delete " method="POST" style="display: inline;">
                                                <input type="hidden" name="id" value="<?=$value['id']?>">
                                                <button type="submit" class="btn btn-xs btn-danger mt-2" name="delete-contact" data-bs-toggle="modal" data-bs-target="#delete-confirm">
                                                    <i alt="Delete" class="fa fa-trash"> Xóa</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
        </session>
    </div>
    <?php include('./footer.php') ?>

    <div  class="modal fade" role="dialog" id="delete-confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Xác nhận</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Bạn có muốn xóa?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="delete">Xóa</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default" data-bs-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
                })
                .one('click', '#delete', function() {
                    $form.trigger('submit');
                });
            });
            $('.claimedRight').each(function (f) {
                var newstr = $(this).text().substring(0,100);
                $(this).text(newstr);

                });
        });
    </script>
</body>
</html>