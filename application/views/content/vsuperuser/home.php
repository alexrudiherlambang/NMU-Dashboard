<!DOCTYPE html>
<html lang="en">

<?php
    $this->load->view('partials/head');
?>

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
	data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
	data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
	data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
	
	<!--begin::App-->
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <?php
                $this->load->view('partials/header');
            ?>
			<!--begin::Wrapper-->
			<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <?php
                    $this->load->view('partials/sidebar_superuser');
                ?>
				<!--begin::Main-->
				<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
					<!--begin::Content wrapper-->
					<div class="d-flex flex-column flex-column-fluid">

						<!--begin::Toolbar-->
						<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
							<!--begin::Toolbar container-->
							<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
									<!--begin::Title-->
									<h1
										class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
										Dashboard SuperUser</h1>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<?php
										$this->load->view('partials/breadcrumb');
									?>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Toolbar container-->
						</div>
						<!--end::Toolbar-->
                        <!--begin::Content container-->
						<div id="kt_app_content_container" class="app-container container-xxl">
							<!--begin::Row-->
							<div class="row g-5 g-xl-10 mb-xl-10">
								<!--begin::Col-->
								<div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
									<!--begin::Card widget 16-->
									<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10" style="background-color: #080655">
										<!--begin::Header-->
										<div class="card-header pt-5">
											<!--begin::Title-->
											<div class="card-title d-flex flex-column">
												<!--begin::Amount-->
												<span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">99</span>
												<!--end::Amount-->
												<!--begin::Subtitle-->
												<span class="text-white opacity-50 pt-1 fw-semibold fs-6">Jumlah Rekanan</span>
												<!--end::Subtitle-->
											</div>
											<!--end::Title-->
										</div>
										<!--end::Header-->
										<!--begin::Card body-->
										<div class="card-body d-flex align-items-end pt-0">
											<!--begin::Progress-->
											<div class="d-flex align-items-center flex-column mt-3 w-100">
												<div class="d-flex justify-content-between fw-bold fs-6 text-white w-100 mt-auto mb-2">
													<span class="badge badge-light-danger fs-base">Penyedia Jasa : 1</span>
													<span class="badge badge-light-primary fs-base">Pemberi Jasa : 1</span>
													</span>
												</div>
												<div class="h-8px mx-3 w-100 bg-light-danger rounded">
													<div class="bg-danger rounded h-8px" role="progressbar" style="width: 20%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<!--end::Progress-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card widget 16-->
									<!--begin::Card widget 7-->
									<div class="card card-flush h-md-50 mb-5 mb-xl-10">
										<!--begin::Header-->
										<div class="card-header pt-5">
											<!--begin::Title-->
											<div class="card-title d-flex flex-column">
												<!--begin::Amount-->
												<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2</span>
												<!--end::Amount-->
												<!--begin::Subtitle-->
												<span class="text-gray-400 pt-1 fw-semibold fs-6">Jumlah User</span>
												<!--end::Subtitle-->
											</div>
											<!--end::Title-->
										</div>
										<!--end::Header-->
										<!--begin::Card body-->
										<div class="card-body d-flex flex-column justify-content-end pe-0">
											<!--begin::Title-->
											<span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Users Active</span>
											<!--end::Title-->
											<!--begin::Users group-->
											
											<div class="symbol-group symbol-hover flex-nowrap">
												<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Super User">
													<span class="symbol-label bg-warning text-inverse-warning fw-bold">S</span>
												</div>
												<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Legal">
													<img alt="Pic" src="<?php echo base_url(); ?>assets/media/avatars/300-11.jpg" />
												</div>
												<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Pimpinan">
													<span class="symbol-label bg-primary text-inverse-primary fw-bold">P</span>
												</div>
												<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Rekanan">
													<img alt="Pic" src="<?php echo base_url(); ?>assets/media/avatars/300-2.jpg" />
												</div>
												<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Unit">
													<span class="symbol-label bg-danger text-inverse-danger fw-bold">U</span>
												</div>
												<a href="<?php echo site_url('SuperUser/cuser') ?>" class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+5</span>
												</a>
											</div>
											<!--end::Users group-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card widget 7-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
									<!--begin::Card widget 17-->
									<div class="card card-flush h-md-50 mb-5 mb-xl-10">
										<!--begin::Header-->
										<div class="card-header pt-5">
											<!--begin::Title-->
											<div class="card-title d-flex flex-column">
												<!--begin::Info-->
												<div class="d-flex align-items-center">
													<!--begin::Amount-->
													<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2</span>
													<!--end::Amount-->
													<!--begin::Badge-->
													<span class="badge badge-light-primary fs-base">
														<span class="svg-icon svg-icon-5 svg-icon-primary ms-n1">PKS</span>
													</span>
													<!--end::Badge-->
												</div>
												<!--end::Info-->
												<!--begin::Subtitle-->
												<span class="text-gray-400 pt-1 fw-semibold fs-6">Jumlah PKS</span>
												<!--end::Subtitle-->
											</div>
											<!--end::Title-->
										</div>
										<!--end::Header-->
										<!--begin::Card body-->
										<div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
											<!--begin::Chart-->
											<div class="d-flex flex-center me-5 pt-2">
												<div id="kt_card_widget_19_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11"></div>
											</div>
											<!--end::Chart-->
											<!--begin::Labels-->
											<div class="d-flex flex-column content-justify-center flex-row-fluid">
												<!--begin::Label-->
												<div class="d-flex fw-semibold align-items-center">
													<!--begin::Bullet-->
													<div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
													<!--end::Bullet-->
													<!--begin::Label-->
													<div class="text-gray-500 flex-grow-1 me-4">IJIN BERJALAN</div>
													<!--end::Label-->
													<!--begin::Stats-->
													<div class="fw-bolder text-gray-700 text-xxl-end">2</div>
													<!--end::Stats-->
												</div>
												<!--end::Label-->
												<!--begin::Label-->
												<div class="d-flex fw-semibold align-items-center my-3">
													<!--begin::Bullet-->
													<div class="bullet w-8px h-3px rounded-2 me-3"></div>
													<!--end::Bullet-->
													<!--begin::Label-->
													<div class="text-gray-500 flex-grow-1 me-4">IJIN BERAKHIR</div>
													<!--end::Label-->
													<!--begin::Stats-->
													<div class="fw-bolder text-gray-700 text-xxl-end">2</div>
													<!--end::Stats-->
												</div>
												<!--end::Label-->
												<!--begin::Label-->
												<div class="d-flex fw-semibold align-items-center">
													<!--begin::Bullet-->
													<div class="bullet w-8px h-3px rounded-2 bg-danger me-3"></div>
													<!--end::Bullet-->
													<!--begin::Label-->
													<div class="text-gray-500 flex-grow-1 me-4">IJIN EXPIRED</div>
													<!--end::Label-->
													<!--begin::Stats-->
													<div class="fw-bolder text-gray-700 text-xxl-end">2</div>
													<!--end::Stats-->
												</div>
												<!--end::Label-->
											</div>
											<!--end::Labels-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card widget 17-->
									<!--begin::Card widget 17-->
									<div class="card card-flush h-md-50 mb-5 mb-xl-10">
										<!--begin::Header-->
										<div class="card-header pt-5">
											<!--begin::Title-->
											<div class="card-title d-flex flex-column">
												<!--begin::Info-->
												<div class="d-flex align-items-center">
													<!--begin::Currency-->
													<span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">Rp. </span>
													<!--end::Currency-->
													<!--begin::Amount-->
													<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">69,700</span>
													<!--end::Amount-->
													<!--begin::Badge-->
													<span class="badge badge-light-success fs-base">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
													<span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
															<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->2.2%</span>
													<!--end::Badge-->
												</div>
												<!--end::Info-->
												<!--begin::Subtitle-->
												<span class="text-gray-400 pt-1 fw-semibold fs-6">Projects Earnings in April</span>
												<!--end::Subtitle-->
											</div>
											<!--end::Title-->
										</div>
										<!--end::Header-->
										<!--begin::Card body-->
										<div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
											<!--begin::Chart-->
											<div class="d-flex flex-center me-5 pt-2">
												<div id="kt_card_widget_17_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11"></div>
											</div>
											<!--end::Chart-->
											<!--begin::Labels-->
											<div class="d-flex flex-column content-justify-center flex-row-fluid">
												<!--begin::Label-->
												<div class="d-flex fw-semibold align-items-center">
													<!--begin::Bullet-->
													<div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
													<!--end::Bullet-->
													<!--begin::Label-->
													<div class="text-gray-500 flex-grow-1 me-4">Leaf CRM</div>
													<!--end::Label-->
													<!--begin::Stats-->
													<div class="fw-bolder text-gray-700 text-xxl-end">$7,660</div>
													<!--end::Stats-->
												</div>
												<!--end::Label-->
												<!--begin::Label-->
												<div class="d-flex fw-semibold align-items-center my-3">
													<!--begin::Bullet-->
													<div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
													<!--end::Bullet-->
													<!--begin::Label-->
													<div class="text-gray-500 flex-grow-1 me-4">Mivy App</div>
													<!--end::Label-->
													<!--begin::Stats-->
													<div class="fw-bolder text-gray-700 text-xxl-end">$2,820</div>
													<!--end::Stats-->
												</div>
												<!--end::Label-->
												<!--begin::Label-->
												<div class="d-flex fw-semibold align-items-center">
													<!--begin::Bullet-->
													<div class="bullet w-8px h-3px rounded-2 me-3" style="background-color: #E4E6EF"></div>
													<!--end::Bullet-->
													<!--begin::Label-->
													<div class="text-gray-500 flex-grow-1 me-4">Others</div>
													<!--end::Label-->
													<!--begin::Stats-->
													<div class="fw-bolder text-gray-700 text-xxl-end">$45,257</div>
													<!--end::Stats-->
												</div>
												<!--end::Label-->
											</div>
											<!--end::Labels-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card widget 17-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Content container-->
						<!--begin::Content-->
						<div id="kt_app_content" class="app-content flex-column-fluid">
							
						</div>
						<!--end::Content-->
					</div>
					<!--end::Content wrapper-->
					<?php
                        $this->load->view('partials/footer');
                    ?>
				</div>
				<!--end:::Main-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::App-->
	
	
	<?php
        $this->load->view('partials/scroltop');
    ?>
	<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
									transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
									fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="<?php echo base_url("clogin/logout") ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php
        $this->load->view('partials/script');
    ?>
	
</body>
<!--end::Body-->

</html>