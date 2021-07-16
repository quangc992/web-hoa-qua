<?php
require_once('../../db/dbhelper.php');
$id = $name = '';

if(!empty($_POST)){
    $name = '';
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }

    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }

    if(!empty($name)){
        $created_at = $updated_at = date('Y-m-d H:s:i');

        //luu vao database
        if($id == ''){
            $sql = 'insert into category(name , created_at, updated_at)
            values(" '.$name.' "," '.$created_at.' "," '.$updated_at.' " )'; 
        }else{
            $sql = 'Update  category set name = "'.$name.'", updated_at = "'.$updated_at.'" where id = '.$id;
        }

        
        execute($sql);

        header('location: index.php');
        die();
    }
}


if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from category where id = '.$id;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$name = $category['name'];
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Quản lí danh mục</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" href="../category/">Quản lý danh mục</a>
		</li>
		<li class="nav-item">
			<a class="nav-link " href="../product/">Quản lý sản phẩm</a>
		</li>
	</ul>


	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/sửa Danh mục danh mục</h2>
			</div>

			<div class="panel-body">
				
			<form method="POST">
                <div class="form-group">
                    <label for="name">Tên Danh Mục</label>
                    <input type="text" name="id" value="<?=$id?>" hidden="true">
                    <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
                </div>
                <button class="btn btn-success">Lưu</button>
            </form>
			
			</div>
		</div>
	</div>
</body>
</html>