<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light"  data-sidebar-size="lg" data-sidebar-image="none">
	<head>
		<?php include 'includes/head.php' ?>
	
	</head>
	<body>
	
	
		<!-- Main Wrapper -->
		<div class="main-wrapper">
			<!-- 側邊攔與頂部 -->
			<?php include 'includes/navbar.php' ?>

			<!-- Page Wrapper -->
			<div class="page-wrapper">
			<div class="content container-fluid">				
					<!-- Page Header -->
					<div class="page-header">
						<div class="content-page-header ">
							<h5>新增使用者</h5>
							
						</div>
					</div>
					<!-- /Page Header -->
					
					<form method="post" action="includes/updata.php" enctype='multipart/form-data'>
						<input name="cat" type="hidden" value="users">
						<input name="act" type="hidden" value="add">
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<div class="input-block mb-3">
										<label>名稱</label>
										<input class="form-control" type="text" name="name" required /><br>  
									</div>
								</div>
								<div class="col-lg-12 col-sm-12">
									<div class="input-block mb-3">
										<label>帳號</label>
										<input class="form-control" type="text" name="username"  required/><br>
									</div>
								</div>
								<div class="col-lg-12 col-sm-12">
									<div class="input-block mb-3">
										<label>密碼</label>
										<input class="form-control" type="password" name="password" required />
										<!-- <label>權限角色</label>
										<input class="form-control" type="text" name="role" /><br> -->
									</div>
								</div>
								
							</div>
						</div>
						<div class="modal-footer">
							<a href="users.php" type="button"  class="btn btn-back cancel-btn me-2">取消</a>
							<button type="submit"  class="btn btn-primary paid-continue-btn">建立</button>
						</div>
					</form>
					
				
				</div>
				
			</div>
			<!-- /Page Wrapper -->
			

		</div>
		<!-- /Main Wrapper -->

		
		<!-- 底部連結與元件 -->
		<?php include 'includes/footer.php' ?>
		

	</body>
</html>