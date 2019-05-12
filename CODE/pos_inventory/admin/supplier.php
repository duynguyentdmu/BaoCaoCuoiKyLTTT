<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách Nhà cung cấp
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addsupplier"><i class="fa fa-plus-circle"></i> Thêm nhà cung cấp</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="supTable">
                <thead>
                    <tr>
                        <th>Tên công ty</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
						<th>Địa chỉ</th>
                        <th>Thông tin liên lạc</th>
						<th>Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sq=mysqli_query($conn,"select * from supplier left join user on user.userid=supplier.userid");
					while($sqrow=mysqli_fetch_array($sq)){
					?>
						<tr>
							<td><?php echo $sqrow['company_name']; ?></td>
							<td><?php echo $sqrow['username']; ?></td>
							<td>*****</td>
							<td><?php echo $sqrow['company_address']; ?></td>
							<td><?php echo $sqrow['contact']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $sqrow['userid']; ?>"><i class="fa fa-edit"></i> Sửa</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $sqrow['userid']; ?>"><i class="fa fa-trash"></i> Xóa</button>
								<?php include('supp_butt.php'); ?>
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
</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>