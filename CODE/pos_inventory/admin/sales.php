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
            <h1 class="page-header">Báo cáo bán hàng</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="salesTable">
                <thead>
                    <tr>
						<th class="hidden"></th>
                        <th>Ngày bán hàng</th>
						<th>khách hàng</th>
                        <th>Tổng số mua</th>
						<th>Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sq=mysqli_query($conn,"select * from sales left join customer on customer.userid=sales.userid order by sales_date desc");
					while($sqrow=mysqli_fetch_array($sq)){
					?>
						<tr>
							<td class="hidden"></td>
							<td><?php echo date('M d, Y h:i A',strtotime($sqrow['sales_date'])); ?></td>
							<td><?php echo $sqrow['customer_name']; ?></td>
							<td align="right"><?php echo number_format($sqrow['sales_total'],2); ?></td>
							<td>
								<a href="#detail<?php echo $sqrow['salesid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> Xem chi tiết đầy đủ</a>
								<?php include ('full_details.php'); ?>
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