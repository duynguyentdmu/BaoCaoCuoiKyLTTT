<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus-circle"></i> Thêm sản phẩm</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán</th>
						<th>Số lượng</th>
						<th>Ảnh</th>
						<th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$pq=mysqli_query($conn,"select * from product left join category on category.categoryid=product.categoryid where supplierid='".$_SESSION['id']."'");
					while($pqrow=mysqli_fetch_array($pq)){
						$pid=$pqrow['productid'];
					?>
						<tr>
							<td><?php echo $pqrow['product_name']; ?></td>
							<td><?php echo $pqrow['product_price']; ?></td>
							<td><?php echo $pqrow['product_qty']; ?></td>
							<td><img src="../<?php if(empty($pqrow['photo'])){echo "upload/noimage.jpg";}else{echo $pqrow['photo'];} ?>" height="50px" width="50px;"></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editprod_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Sửa</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delproduct_<?php echo $pid; ?>"><i class="fa fa-trash"></i> Xóa</button>
								<?php include('product_button.php'); ?>
							</td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>