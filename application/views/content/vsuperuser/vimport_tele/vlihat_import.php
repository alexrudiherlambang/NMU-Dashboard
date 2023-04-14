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
										Riwayat Upload Utilitas Telemedicine</h1>
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
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                                        <!--begin::Card-->
                                        <div class="card mb-5 mb-xl-8">
                                            <!--begin::Card body-->
                                            <div class="card-body">
                                                <!--begin::Summary-->
                                                <!--begin::User Info-->
                                                <div class="d-flex flex-center flex-column py-5">
                                                    <!--begin::Image input wrapper-->
                                                    <div class="mt-1">
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?=base_url()?>assets/media/images/<?php echo $user->foto;?>"></div>
                                                            <!--end::Preview existing avatar-->
                                                            <!--begin::Edit-->
                                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="foto" onchange="uploadFile()"/>
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Edit-->
                                                            <!--begin::Cancel-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel-->
                                                        </div>
                                                        <!--end::Image input-->
                                                    </div>
                                                    <!--end::Image input wrapper-->
                                                    <!--begin::Name-->
                                                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3"><?php echo $user->nama;?></a>
                                                    <!--end::Name-->
                                                    <!--begin::Position-->
                                                    <div class="mb-9">
                                                        <!--begin::Badge-->
                                                        <div class="badge badge-lg badge-light-primary d-inline"><?php echo $user->tlok;?></div>
                                                        <!--begin::Badge-->
                                                    </div>
                                                    <!--end::Position-->
                                                </div>
                                                <!--end::User Info-->
                                                <!--end::Summary-->
                                                <!--begin::Details toggle-->
                                                <div class="d-flex flex-stack fs-4 py-3">
                                                    <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                                                    <span class="ms-2 rotate-180">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span></div>
                                                </div>
                                                <!--end::Details toggle-->
                                                <div class="separator"></div>
                                                <!--begin::Details content-->
                                                <div id="kt_user_view_details" class="collapse show">
                                                    <div class="pb-5 fs-6">
                                                        <!--begin::Details item-->
                                                        <div class="fw-bold mt-5">Email</div>
                                                        <div class="text-gray-600"><?php echo $user->eemail;?></div>
                                                        <!--begin::Details item-->
                                                        <!--begin::Details item-->
                                                            <!-- <div class="fw-bold mt-5">Email</div>
                                                            <div class="text-gray-600">
                                                                <a href="#" class="text-gray-600 text-hover-primary">info@keenthemes.com</a>
                                                            </div> -->
                                                    </div>
                                                </div>
                                                <!--end::Details content-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Sidebar-->
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid ms-lg-15">
                                        <!--begin:::Tabs-->
                                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4 active" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security">Security</a>
                                            </li>
                                            <!--end:::Tab item-->
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_overview_events_and_logs_tab">File CSV</a>
                                            </li>
                                            <!--end:::Tab item-->
                                            <!--begin:::Tab item-->
                                            <li class="nav-item ms-auto">
                                                <!--begin::Action menu-->
                                                <a href="<?php echo site_url(); ?>SuperUser/cimport_tele" class="btn btn-danger ps-7" data-kt-menu-placement="bottom-end">Close</a>
                                                <!--end::Menu-->
                                            </li>
                                            <!--end:::Tab item-->
                                        </ul>
                                        <!--end:::Tabs-->
                                        <!--begin:::Tab content-->
                                        <div class="tab-content" id="myTabContent">
                                            <!--begin:::Tab pane-->
                                            <div class="tab-pane fade show active" id="kt_user_view_overview_security" role="tabpanel">
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2>Profile</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0 pb-5">
                                                        <!--begin::Table wrapper-->
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                                                <!--begin::Table body-->
                                                                <form method="post" id="form_pass" action="<?php echo site_url(); ?>SuperUser/cuser/cupdate_pass" enctype="multipart/form-data">
                                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $user->id;?>">
                                                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                                                        <tr>
                                                                            <td>Username</td>
                                                                            <td><input type="text" class="form-control" name="username" value="<?php echo $user->username;?>" readonly></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Password</td>
                                                                            <td><input type="text" class="form-control" name="password" value="<?php echo $user->password;?>" readonly></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Level</td>
                                                                            <td><input type="text" class="form-control" name="tlok" value="<?php if ($user->tlok == ""){echo "K.P";}else{echo $user->tlok;}?>" readonly></td>
                                                                        </tr>
                                                                        <tr><td class="text-center" colspan="2">
                                                                            <!-- <center>
                                                                            <label>
                                                                                <input id="cek" type="checkbox" class="flat-red">
                                                                                Yakin data diatas benar
                                                                            </label>
                                                                            </center> -->
                                                                        </td></tr>
                                                                        <tr><td class="text-center" colspan="2">
                                                                            <!-- <button type="submit" name="submit" class="btn btn-sm btn-primary">Update Data</button> -->
                                                                        </td></tr>
                                                                    </tbody>
                                                                </form>
                                                                <!--end::Table body-->
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Table wrapper-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end:::Tab pane-->
                                            <!--begin:::Tab pane-->
                                            <div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2>Dokumen Utilitas Telemedicine <?php echo $import->unit ?></h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                        <!--begin::Card toolbar-->
                                                        <div class="card-toolbar">
                                                            
                                                        </div>
                                                        <!--end::Card toolbar-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0 pb-5">
                                                        <!--begin::Table wrapper-->
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <embed src="<?= base_url() ?>assets/media/csv/<?php echo $import->file; ?>" type="application/csv" width="100%" height="600px" />
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Table wrapper-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end:::Tab pane-->
                                        </div>
                                        <!--end:::Tab content-->
                                    </div>
                                    <!--end::Content-->
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
    <script>
        function uploadFile() {
        var form = document.getElementById('form_upload');
        form.submit();
        }
    </script>
    
    <?php
        $this->load->view('partials/script');
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#form_role").submit(function(e) {
                if (!$('#cek1').is(':checked')) {
                    alert("Mohon centang checkbox 'Yakin data diatas benar' untuk melanjutkan");
                    e.preventDefault();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#form_pass").submit(function(e) {
                if (!$('#cek').is(':checked')) {
                    alert("Mohon centang checkbox 'Yakin data diatas benar' untuk melanjutkan");
                    e.preventDefault();
                }
            });
        });
    </script>
	
</body>
<!--end::Body-->

</html>