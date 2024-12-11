<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light"  data-sidebar-size="lg" data-sidebar-image="none">
	<head>
		<?php include 'includes/head.php' ?>
		<?php
                   // 分页参数设置
                   $results_per_page = 10;
                   $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

                   // 确保当前页不小于 1
                   $current_page = max(1, $current_page);

                   // 计算数据起始位置
                   $start_from = ($current_page - 1) * $results_per_page;

                   // 获取总记录数
                   $total_results = counting("users", "id");
                   $total_pages = ceil($total_results / $results_per_page);

                   // 获取当前页的数据
				   $users = getOrderByAll("users", "sorting", "ASC", $start_from, $results_per_page);
                   
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
							<h5>新增使用者</h5>
							<div class="list-btn">
								<ul class="filter-list">
									<li>
										<a class="btn btn-primary"  href="add-user.php"   ><i class="fa fa-plus-circle me-2" ></i>新增使用者</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-center table-hover datatable">
											<thead class="thead-light">
												<tr>
													<th>移到首位</th>
													<th>序號</th>
													<th>名稱</th>
													<th>帳號</th>
													<th>權限角色 </th>
													<th Class="no-sort">編輯</th>
												</tr>
											</thead>
											<tbody>
												<?php  if($users) foreach ($users as $key =>  $user): ?>
													<tr>
														<td><a href="includes/updata.php?act=edit&id=<?= $user['id'] ?>&sorting=1&cat=users&page=<?= $current_page ?>" >移到首位</a></td>
														<td><?= $user['sorting'] ?></td>
														<td><?= $user['name']?></td>
														<td><?= $user['username']?></td>
														<td><span class="badge  bg-success-light">1</span></td>
														<td class="d-flex align-items-center">
														
															<a href="edit-user.php?act=edit&id=<?= $user['id']?>&page=<?=$current_page?>" class=" btn-action-icon me-2"  ><i class="fe fe-edit"></i></a>
															<a href="includes/updata.php?act=delete&id=<?= $user['id'] ?>&cat=users&page=<?= $current_page ?>" class="btn-action-icon delete-link" data-bs-toggle="modal" data-bs-target="#delete_modal" data-href="includes/updata.php?act=delete&id=<?= $user['id'] ?>&cat=users&page=<?=$current_page?>" ><i class="fe fe-trash-2"></i></a>
														</td>
													</tr>
												<?php endforeach; ?> 	
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-3"></div>
					
					<?php include 'includes/pagination.php' ?>
				</div>
				
			</div>
			<!-- /Page Wrapper -->
			

		</div>
		<!-- /Main Wrapper -->
	
		
		
		<!-- 底部連結與元件 -->
		<?php include 'includes/footer.php' ?>
		

	</body>
</html>