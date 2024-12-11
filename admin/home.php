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
				<div class="content container-fluid pb-0">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="content-page-header">
							<h5>首頁</h5>
						</div>
					</div>
					<!-- /Page Header -->	
					<div class="super-admin-dashboard">
						<div class="row">
							
							<div class="col-xl-7 d-flex p-0">
								<div class="row dash-company-row w-100 m-0">
									<div class="col-lg-3 col-sm-6 d-flex">
										<div class="company-detail-card w-100">
											<div class="company-icon">
												<img src="assets/img/icons/dash-card-icon-01.svg" alt="">
											</div>
											<div class="dash-comapny-info">
												<h6>管理員管理</h6>
												<h5><?=counting("users", "id")?></h5>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 d-flex">
										<div class="company-detail-card bg-info-light w-100">
											<div class="company-icon">
												<img src="assets/img/icons/dash-card-icon-02.svg" alt="">
											</div>
											<div class="dash-comapny-info">
												<h6>客戶表單管理</h6>
												<h5><?=counting("contact_forms", "id")?></h5>
											
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 d-flex">
										<div class="company-detail-card bg-pink-light w-100">
											<div class="company-icon">
												<img src="assets/img/icons/dash-card-icon-03.svg" alt="">
											</div>
											<div class="dash-comapny-info">
												<h6>最新消息管理</h6>
												<h5><?=counting("news", "id")?></h5>
											
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 d-flex">
										<div class="company-detail-card bg-success-light w-100">
											<div class="company-icon">
												<img src="assets/img/icons/dash-card-icon-04.svg" alt="">
											</div>
											<div class="dash-comapny-info">
												<h6>工程實績管理</h6>
												<h5><?=counting("works", "id")?></h5>
												
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 d-flex">
										<div class="company-detail-card bg-success-light w-100">
											<div class="company-icon">
												<img src="assets/img/icons/dash-card-icon-04.svg" alt="">
											</div>
											<div class="dash-comapny-info">
												<h6>分類管理</h6>
												<h5><?=counting("categories", "id")?></h5>
												
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 d-flex">
										<div class="company-detail-card bg-success-light w-100">
											<div class="company-icon">
												<img src="assets/img/icons/dash-card-icon-04.svg" alt="">
											</div>
											<div class="dash-comapny-info">
												<h6>職缺管理</h6>
												<h5><?=counting("recruits", "id")?></h5>
												
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 d-flex">
										<div class="company-detail-card bg-success-light w-100">
											<div class="company-icon">
												<img src="assets/img/icons/dash-card-icon-04.svg" alt="">
											</div>
											<div class="dash-comapny-info">
												<h6>頁面介紹管理</h6>
												<h5><?=counting("page_configs", "id")?></h5>
												
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 d-flex">
										<div class="company-detail-card bg-success-light w-100">
											<div class="company-icon">
												<img src="assets/img/icons/dash-card-icon-04.svg" alt="">
											</div>
											<div class="dash-comapny-info">
												<h6>頁面內容管理</h6>
												<h5><?=counting("page_contents", "id")?></h5>
												
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 d-flex">
										<div class="company-detail-card bg-success-light w-100">
											<div class="company-icon">
												<img src="assets/img/icons/dash-card-icon-04.svg" alt="">
											</div>
											<div class="dash-comapny-info">
												<h6>頁面資訊管理</h6>
												<h5><?=counting("site_configs", "id")?></h5>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Wrapper -->
			

		</div>
		<!-- /Main Wrapper -->

		<!-- 底部連結與元件 -->
		<?php include 'includes/footer.php' ?>
		

	</body>
</html>