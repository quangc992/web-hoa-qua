<?php
require_once('../../db/dbhelper.php')
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
				<h2 class="text-center">Quản lí danh mục</h2>
			</div>

			<div class="panel-body">
				
			<a href="add.php">
			<button class="btn btn-success" style="margin-bottom:15px;">Thêm Danh Mục</button>
			</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên danh mục</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>


					<tbody>
<?php
// lay danh sach muc tu database
$sql = 'select * from category';
$categoryList = executeResult($sql);

$index = 1;
foreach ($categoryList as $item){
	echo 
	'<tr>
		<td>'.($index++).'</td>
		<td>'.$item['name'].'</td>
		<td>
			<a href="add.php?id='.$item['id'].'">
			<button class="btn btn-warning">Edit</button>
			</a>
		</td>
		<td>
			<button class="btn btn-danger	" onclick="deleteProduct('.$item['id'].')">Xóa</button>
		</td>
	</tr>';
}
?>

<script type="text/javascript">
	function deleteProduct(id){

		var option = confirm('Bạn có chắc chắc muốn xóa danh mục này không ?');
		if (!option){
			return;
		}

		console.log(id);
		//ajax - lenh post
		$.post('ajax.php',{
			'id'    : id,
			'action': 'delete'
		}, function(data){
			location.reload()
		})
	
	}

</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>