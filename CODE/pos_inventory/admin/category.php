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
                    <h1 class="page-header">
                        Danh sách loại sản phẩm
                        <span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addcategory"><i class="fa fa-plus-circle"></i> Thêm loại sản phầm</button>
				</span>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                        <thead>
                        <tr>
                            <th>Mã loại hàng</th>
                            <th>Tên loại hàng</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pq=mysqli_query($conn,"select * from category ");
                        while($pqrow=mysqli_fetch_array($pq)){
                            $pid=$pqrow['categoryid'];
                            ?>
                            <tr>
                                <td align="left"><?php echo $pqrow['categoryid']; ?></td>
                                <td align="left"><?php echo $pqrow['category_name']; ?></td>
                                <td align="left">
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
    </div>
</div>
<?php include('script.php'); ?>
<?php include('category1.php'); ?>
<?php include('add_category.php'); ?>
<script src="custom.js"></script>
</body>
</html>