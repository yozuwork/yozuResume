<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light"  data-sidebar-size="lg" data-sidebar-image="none">
	<head>
		<?php include 'includes/head.php' ?>
	
		<?php 
        $act = $_GET['act'];
        if($act == "edit") {
            $id = $_GET['id'];
            $user = getById("users", $id);
            $page = $_GET['page'];
			$users_all = getAll('users');
			}
		?>
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
							<h5>使用者管理</h5>
							<div class="list-btn">
								<ul class="filter-list">
									<li>
										<a class="btn btn-primary"  href="#" id="addUserButton"  ><i class="fa fa-plus-circle me-2" ></i>新增使用者</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<form method="post" action="includes/updata.php" enctype='multipart/form-data'>
						<input name="cat" type="hidden" value="users">
						<input name="act" type="hidden" value="edit">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="page" type="hidden" value="<?=$page?>">
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<div class="input-block mb-3">
										<label class="form-label">資料序號</label>
										<select id="order-select" required="required" class="form-select" name="sorting">
											<?php 
												$total_users = count($users_all); // 获取用户的总数
												for ($i = 1; $i <= $total_users; $i++) : ?>
													<option value="<?= $i ?>" <?= isset($user['sorting']) && $user['sorting'] == $i ? 'selected' : '' ?>>
														<?= $i ?>
													</option>
											<?php endfor; ?>
										</select><br>
									</div>
								</div>
								<div class="col-lg-12 col-sm-12">
									<div class="input-block mb-3">
										<label>名稱</label>
										<input class="form-control" type="text" name="name" value="<?=$user['name']?>" required /><br> 
									</div>
								</div>
								<div class="col-lg-12 col-sm-12">
									<div class="input-block mb-3">
										<label>帳號</label>
										<input class="form-control" type="text" name="username" value="<?=$user['username']?>" required /><br>
									</div>
								</div>
								<div class="col-lg-12 col-sm-12">
									<div class="input-block mb-3">
										<label>密碼<i>(若不更改密碼請留空)</i></label>
										<input class="form-control" type="password" name="password" autocomplete="new-password" />
										<!-- <label>權限角色</label>
										<input class="form-control" type="text" name="role" /><br> -->
									</div>
								</div>
								
							</div>
						</div>
						<div class="modal-footer">
							<a href="users.php" type="button"  class="btn btn-back cancel-btn me-2">取消</a>
							<button type="submit"  class="btn btn-primary paid-continue-btn">更新</button>
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