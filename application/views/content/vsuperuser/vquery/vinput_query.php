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
										Master Data Query</h1>
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
                        
						<!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-lg-row">
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                                        <!--begin::Form-->
                                        <form class="form" method="post" action="<?php echo site_url(); ?>SuperUser/cmquery/cinsert_query" id="kt_subscriptions_create_new" enctype="multipart/form-data">
                                            <!--begin::Card-->
                                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                                <!--begin::Card body-->
                                                <div class="card-body pt-0">
                                                    <div class="d-flex flex-column mb-15 fv-row">
                                                        <!--begin::Label-->
                                                        <div class="fs-5 fw-bold form-label mb-3">Pilih Master Data Query
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Tambahkan data user dengan benar"></i></div>
                                                        <!--end::Label-->
                                                    </div>                                                        
                                                    <!--begin::Invoice footer-->
                                                    <div class="d-flex flex-column mb-10 fv-row">
                                                        <div class="row mb-8">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Unit</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <select class="form-select form-select-solid select2" name="unit" >
                                                                    <option selected="selected">-</option>
                                                                    <option>RSG</option>
                                                                    <option>RST</option>
                                                                    <option>RSP</option>
                                                                    <option>RSMU</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-8">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Jenis Report</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <select class="form-control form-control-solid select2" name="kdjns" >
                                                                <option value="&nbsp">-</option>
                                                                <?php foreach ($mquery as $key) : ?>
                                                                    <option value="<?php echo $key->kdjns ?>"><?php echo $key->jenis ?></option>
                                                                <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Invoice footer-->
                                                    <!-- /.box-body -->
                                                    <div class="box-footer">
                                                        <center>
                                                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                                            <?php echo anchor('SuperUser/cmquery', 'Batal', array('class' => 'btn btn-danger')) ?>
                                                        </center>
                                                    </div>
                                                    <!-- /.box-footer -->
                                                </div>
                                                <!--end::Card body-->
                                            </div>
                                            <!--end::Card-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
                                        <!--begin::Card-->
                                        <div class="card card-flush pt-3 mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <!--begin::Card title-->
                                                <div class="card-title">
                                                    <h2><?php echo date("Y-m-d"); ?></h2>
                                                </div>
                                                <!--end::Card title-->
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0 fs-6">
                                                <!--begin::Seperator-->
                                                <div class="separator separator-dashed mb-7"></div>
                                                <!--end::Seperator-->
                                                <!--begin::Section-->
                                                <div class="mb-7">
                                                    <!--begin::Title-->
                                                    <h5 class="mb-3"><?php echo $this->session->userdata("eemail") ?></h5>
                                                    <!--end::Title-->
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center mb-1">
                                                        <!--begin::Name-->
                                                        <a class="fw-bold text-gray-800 text-hover-primary me-2"><?php echo $this->session->userdata("nama") ?></a>
                                                        <!--end::Name-->
                                                        <!--begin::Status-->
                                                        <span class="badge badge-light-success">Active</span>
                                                        <!--end::Status-->
                                                    </div>
                                                    <!--end::Details-->
                                                    <!--begin::Email-->
                                                    <!-- <a href="#" class="fw-semibold text-gray-600 text-hover-primary">sean@dellito.com</a> -->
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Seperator-->
                                                <div class="separator separator-dashed mb-7"></div>
                                                <!--end::Seperator-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Sidebar-->
                                </div>
                                <!--end::Layout-->
                            </div>
                            <!--end::Content container-->
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