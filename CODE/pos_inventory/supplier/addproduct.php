<?php
	include('session.php');
	
	$name=$_POST['name'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$qty=$_POST['qty'];
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Ảnh không được thêm. Vui lòng chỉ tải lên ảnh JPG hoặc PNG!');
				</script>
			<?php
		}
	}
	
	mysqli_query($conn,"insert into product (product_name, categoryid, product_price, product_qty, photo, supplierid) values ('$name','$category','$price','$qty','$location', '".$_SESSION['id']."')");
	$pid=mysqli_insert_id($conn);
	
	mysqli_query($conn,"insert into inventory (userid, action, productid, quantity, inventory_date) values ('".$_SESSION['id']."', 'Thêm sản phẩm', '$pid', '$qty', NOW())");
	
	?>
		<script>
			window.alert('Đã thêm sản phẩm thành công!');
			window.history.back();
		</script>
	<?php
?>