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
                    $this->load->view('partials/sidebar_unit');
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
										Data User</h1>
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
                                                        <form method="post" id="form_upload" action="<?php echo site_url(); ?>Unit/cuser/cupdate_foto" enctype="multipart/form-data">
                                                            <!--begin::Image input-->
                                                            <input type="hidden" class="form-control" name="id" value="<?php echo $user->id;?>">
                                                            <input type="hidden" class="form-control" name="nama" value="<?php echo $user->nama;?>">
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
                                                        </form>
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
                                                        <div class="text-gray-600">
                                                            <a href="#" class="text-gray-600 text-hover-primary"><?php echo $user->eemail;?></a>
                                                        </div>
                                                        <!--begin::Details item-->
                                                        <div class="fw-bold mt-5">Job Title</div>
                                                        <div class="text-gray-600">
                                                            <a href="#" class="text-gray-600 text-hover-primary"><?php echo $user->job_title;?></a>
                                                        </div>
                                                        <div class="fw-bold mt-5">Phone</div>
                                                        <div class="text-gray-600">
                                                            <a href="#" class="text-gray-600 text-hover-primary"><?php echo $user->phone;?></a>
                                                        </div>
                                                        <div class="fw-bold mt-5">Gender</div>
                                                        <div class="text-gray-600">
                                                            <a href="#" class="text-gray-600 text-hover-primary"><?php if ($user->gender == "L"){echo "Laki - Laki";}else if ($user->gender == "P"){echo "Perempuan";} ?></a>
                                                        </div>
                                                        <div class="fw-bold mt-5">Alamat</div>
                                                        <div class="text-gray-600">
                                                            <a href="#" class="text-gray-600 text-hover-primary"><?php echo $user->alamat;?></a>
                                                        </div>
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
                                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_role_login">Aksesibilitas</a>
                                            </li>
                                            <!--end:::Tab item-->
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_overview_events_and_logs_tab">Events & Logs</a>
                                            </li>
                                            <!--end:::Tab item-->
                                            <!--begin:::Tab item-->
                                            <li class="nav-item ms-auto">
                                                <!--begin::Action menu-->
                                                <a href="<?php echo site_url(); ?>Unit/cuser" class="btn btn-danger ps-7" data-kt-menu-placement="bottom-end">Close</a>
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
                                                                <form method="post" id="form_pass" action="<?php echo site_url(); ?>Unit/cuser/cupdate_pass" enctype="multipart/form-data">
                                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $user->id;?>">
                                                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                                                        <tr>
                                                                            <td>Username</td>
                                                                            <td><input type="text" class="form-control" name="username" value="<?php echo $user->username;?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Password</td>
                                                                            <td><input type="text" class="form-control" name="password" Placeholder="Update Password Disini"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Level</td>
                                                                            <td><input type="text" class="form-control" name="tlok" value="<?php if ($user->tlok == ""){echo "K.P";}else{echo $user->tlok;}?>" readonly></td>
                                                                        </tr>
                                                                        <tr><td class="text-center" colspan="2">
                                                                            <center>
                                                                            <label>
                                                                                <input id="cek" type="checkbox" class="flat-red">
                                                                                Yakin data diatas benar
                                                                            </label>
                                                                            </center>
                                                                        </td></tr>
                                                                        <tr><td class="text-center" colspan="2">
                                                                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Update Data</button>
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
                                                            <h2>10 Login Terakhir</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                        <!--begin::Card toolbar-->
                                                        <div class="card-toolbar">
                                                            <!--begin::Filter-->
                                                            <!-- <button type="button" class="btn btn-sm btn-flex btn-light-primary" id="kt_modal_sign_out_sesions">
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.3" x="4" y="11" width="12" height="2" rx="1" fill="currentColor" />
                                                                    <path d="M5.86875 11.6927L7.62435 10.2297C8.09457 9.83785 8.12683 9.12683 7.69401 8.69401C7.3043 8.3043 6.67836 8.28591 6.26643 8.65206L3.34084 11.2526C2.89332 11.6504 2.89332 12.3496 3.34084 12.7474L6.26643 15.3479C6.67836 15.7141 7.3043 15.6957 7.69401 15.306C8.12683 14.8732 8.09458 14.1621 7.62435 13.7703L5.86875 12.3073C5.67684 12.1474 5.67684 11.8526 5.86875 11.6927Z" fill="currentColor" />
                                                                    <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            Sign out all sessions</button> -->
                                                            <!--end::Filter-->
                                                        </div>
                                                        <!--end::Card toolbar-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0 pb-5">
                                                        <!--begin::Table wrapper-->
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                                                <!--begin::Table head-->
                                                                <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                                    <!--begin::Table row-->
                                                                    <tr class="text-start text-muted text-uppercase gs-0">
                                                                        <th class="text-center w-10px pe-5">No</th>
                                                                        <th class="text-center min-w-70px">Nama</th>
                                                                        <th class="text-center min-w-70px">Platform</th>
                                                                        <th class="text-center min-w-70px">Browser</th>
                                                                        <th class="text-center min-w-100px">IP Address</th>
                                                                        <th class="text-center min-w-110px">Tanggal</th>
                                                                        <th class="text-center min-w-80px">Jam</th>
                                                                        <th class="text-center min-w-70px">Actions</th>
                                                                    </tr>
                                                                    <!--end::Table row-->
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6 fw-semibold text-gray-600">
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($log as $log) :
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center"><?php echo $no ?></td>
                                                                        <td class="text-center"><?php echo $log->nama ?></td>
                                                                        <td class="text-center"><?php echo $log->platform ?></td>
                                                                        <td class="text-center"><?php echo $log->browser ?></td>
                                                                        <td class="text-center"><?php echo $log->ip ?></td>
                                                                        <td class="text-center"><?php echo date('d-m-Y', strtotime($log->lastupdate)) ?></td>
                                                                        <td class="text-center"><?php echo date('h:i A', strtotime($log->lastupdate)) ?></td>
                                                                        <td class="text-center">
                                                                            <div class="badge badge-light-success"><?php echo $log->action ?></div>
                                                                        </td>
                                                                        <!--end::Action=-->
                                                                    </tr>
                                                                    <?php
                                                                    $no++;
                                                                    endforeach;
                                                                    ?>
                                                                </tbody>
                                                                <!--end::Table body-->
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Table wrapper-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2>10 Aktifitas Terakhir</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                        <!--begin::Card toolbar-->
                                                        <div class="card-toolbar">
                                                            <!--begin::Filter-->
                                                            <!-- <button type="button" class="btn btn-sm btn-flex btn-light-primary" id="kt_modal_sign_out_sesions">
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.3" x="4" y="11" width="12" height="2" rx="1" fill="currentColor" />
                                                                    <path d="M5.86875 11.6927L7.62435 10.2297C8.09457 9.83785 8.12683 9.12683 7.69401 8.69401C7.3043 8.3043 6.67836 8.28591 6.26643 8.65206L3.34084 11.2526C2.89332 11.6504 2.89332 12.3496 3.34084 12.7474L6.26643 15.3479C6.67836 15.7141 7.3043 15.6957 7.69401 15.306C8.12683 14.8732 8.09458 14.1621 7.62435 13.7703L5.86875 12.3073C5.67684 12.1474 5.67684 11.8526 5.86875 11.6927Z" fill="currentColor" />
                                                                    <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            Sign out all sessions</button> -->
                                                            <!--end::Filter-->
                                                        </div>
                                                        <!--end::Card toolbar-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0 pb-5">
                                                        <!--begin::Table wrapper-->
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                                                <!--begin::Table head-->
                                                                <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                                    <!--begin::Table row-->
                                                                    <tr class="text-start text-muted text-uppercase gs-0">
                                                                        <th class="text-center w-10px pe-5">No</th>
                                                                        <th class="text-center min-w-70px">Nama</th>
                                                                        <th class="text-center min-w-70px">Unit</th>
                                                                        <th class="text-center min-w-70px">Jenis Uraian</th>
                                                                        <th class="text-center min-w-110px">Tanggal</th>
                                                                        <th class="text-center min-w-80px">Jam</th>
                                                                        <th class="text-center min-w-70px">Actions</th>
                                                                    </tr>
                                                                    <!--end::Table row-->
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6 fw-semibold text-gray-600">
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($activity as $activity) :
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center"><?php echo $no ?></td>
                                                                        <td class="text-center"><?php echo $activity->nama ?></td>
                                                                        <td class="text-center"><?php echo $activity->unit ?></td>
                                                                        <td class="text-center"><?php echo $activity->jenis ?></td>
                                                                        <td class="text-center"><?php echo date('d-m-Y', strtotime($activity->lastupdate)) ?></td>
                                                                        <td class="text-center"><?php echo date('h:i A', strtotime($activity->lastupdate)) ?></td>
                                                                        <td class="text-center">
                                                                            <div class="badge badge-light-primary"><?php echo $activity->action ?></div>
                                                                        </td>
                                                                        <!--end::Action=-->
                                                                    </tr>
                                                                    <?php
                                                                    $no++;
                                                                    endforeach;
                                                                    ?>
                                                                </tbody>
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
                                            <div class="tab-pane fade" id="kt_user_view_role_login" role="tabpanel">
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2>Role Login User</h2>
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
                                                            <?php if ($this->session->userdata("otoritas") == "admin"): ?>
                                                                <form method="post" id="form_role" action="<?php echo site_url(); ?>Unit/cuser/cupdate_role_user" enctype="multipart/form-data">
                                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $user->id;?>">
                                                                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                                                        <!--begin::Table head-->
                                                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                                            <!--begin::Table row-->
                                                                            <tr class="text-start text-muted text-uppercase gs-0">
                                                                                <th class="text-left min-w-70px"><b>Menu</b></th>
                                                                                <th class="text-center min-w-70px"><b>Checklist</b></th>
                                                                            </tr>
                                                                            <!--end::Table row-->
                                                                        </thead>
                                                                        <!--end::Table head-->
                                                                        <!--begin::Table body-->
                                                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                                                            <tr>
                                                                                <td class="text-left">User Management</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tum" <?php 
                                                                                    if ($role->tum == "1") { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan BPJS & NON-BPJS)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok1" <?php
                                                                                    if ($role->tkok1 == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan Per-Segmen)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok2" <?php
                                                                                    if ($role->tkok2 == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan Rawat Jalan)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok3" <?php
                                                                                    if ($role->tkok3 == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan Rawat Inap)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok4" <?php
                                                                                    if ($role->tkok4 == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan Penunjang Medis)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok5" <?php
                                                                                    if ($role->tkok5 == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Sensus Kamar)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkoksk" <?php
                                                                                    if ($role->tkoksk == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Tempat Tidur)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkoktt" <?php
                                                                                    if ($role->tkoktt == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (HAPER)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkokhp" <?php
                                                                                    if ($role->tkokhp == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (BOR)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkokbor" <?php
                                                                                    if ($role->tkokbor == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Pendapatan BPJS & NON-BPJS)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkkp1" <?php
                                                                                    if ($role->tkkp1 == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Per-Revenue Stream)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkkp2" <?php
                                                                                    if ($role->tkkp2 == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Pendapatan Per-Segmen)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkkp3" <?php
                                                                                    if ($role->tkkp3 == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Biaya)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkkb" <?php
                                                                                    if ($role->tkkb == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Laba-Rugi)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkklr" <?php
                                                                                    if ($role->tkklr == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Input Data Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tid" <?php
                                                                                    if ($role->tid == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Tabel Kunjungan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="ttk" <?php
                                                                                    if ($role->ttk == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Target Kunjungan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="ttt" <?php
                                                                                    if ($role->ttt == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Tabel Pendapatan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="ttp" <?php
                                                                                    if ($role->ttp == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Grafik Kunjungan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gtk" <?php
                                                                                    if ($role->gtk == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Grafik Target Kunjungan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gtt" <?php
                                                                                    if ($role->gtt == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Grafik Pendapatan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gtp" <?php
                                                                                    if ($role->gtp == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Indikasi Mutu Nasional</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tmn" <?php
                                                                                    if ($role->tmn == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Indikasi Mutu Prioritas</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tmp" <?php
                                                                                    if ($role->tmp == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Indikasi Mutu Unit Kerja</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tmuk" <?php
                                                                                    if ($role->tmuk == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Data Report</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tdr" <?php
                                                                                    if ($role->tdr == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Input Master Pekerja</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="imp" <?php
                                                                                    if ($role->imp == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Tabel Populasi Pekerja</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tpp" <?php
                                                                                    if ($role->tpp == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Grafik Populasi Pekerja</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gpp" <?php
                                                                                    if ($role->gpp == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Form Limbah</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="ffl" <?php
                                                                                    if ($role->ffl == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Total Man Hour</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tmh" <?php
                                                                                    if ($role->tmh == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Form Other Clasification</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="foc" <?php
                                                                                    if ($role->foc == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Form Other Personal Safety</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="fops" <?php
                                                                                    if ($role->fops == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Form Other Nearmiss</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="fon" <?php
                                                                                    if ($role->fon == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Form Other Unsave Action & Unsave Condition</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="fouac" <?php
                                                                                    if ($role->fouac == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Form Other Property Damage</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="fopd" <?php
                                                                                    if ($role->fopd == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Tabel Performance Limbah</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tpl" <?php
                                                                                    if ($role->tpl == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Tabel Performance Kejadian Kecelakaan</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tpkk" <?php
                                                                                    if ($role->tpkk == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <!-- <tr>
                                                                                <td class="text-left">Tabel Performance Property Damage</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tppd" <?php
                                                                                    if ($role->tppd == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr> -->
                                                                            <tr>
                                                                                <td class="text-left">Grafik Performance Limbah</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gpl" <?php
                                                                                    if ($role->gpl == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Grafik Performance Kejadian Kecelakaan</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gpkk" <?php
                                                                                    if ($role->gpkk == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Grafik Performance Property Damage</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gppd" <?php
                                                                                    if ($role->gppd == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Master Query Data Report</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="mdr" <?php
                                                                                    if ($role->mdr == '1') { echo 'checked';}?>>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <!--end::Table body-->
                                                                    </table>
                                                                    <center>
                                                                    <label>
                                                                        <input id="cek1" type="checkbox" class="flat-red">
                                                                        Yakin data diatas benar
                                                                    </label>
                                                                    </center>
                                                                    <center>
                                                                        <button type="submit" name="submit" class="btn btn-sm btn-primary">Update Data</button>
                                                                    </center>
                                                                </form>
                                                            <?php endif; ?>
                                                            <?php if ($this->session->userdata("otoritas") == "non"): ?>
                                                                <form method="post" id="form_role" action="<?php echo site_url(); ?>Unit/cuser/cupdate_role_user" enctype="multipart/form-data">
                                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $user->id;?>">
                                                                    <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                                                        <!--begin::Table head-->
                                                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                                            <!--begin::Table row-->
                                                                            <tr class="text-start text-muted text-uppercase gs-0">
                                                                                <th class="text-left min-w-70px"><b>Menu</b></th>
                                                                                <th class="text-center min-w-70px"><b>Checklist</b></th>
                                                                            </tr>
                                                                            <!--end::Table row-->
                                                                        </thead>
                                                                        <!--end::Table head-->
                                                                        <!--begin::Table body-->
                                                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                                                            <tr>
                                                                                <td class="text-left">User Management</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tum" <?php 
                                                                                    if ($role->tum == "1") { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan BPJS & NON-BPJS)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok1" <?php
                                                                                    if ($role->tkok1 == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan Per-Segmen)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok2" <?php
                                                                                    if ($role->tkok2 == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan Rawat Jalan)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok3" <?php
                                                                                    if ($role->tkok3 == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan Rawat Inap)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok4" <?php
                                                                                    if ($role->tkok4 == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Kunjungan Penunjang Medis)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkok5" <?php
                                                                                    if ($role->tkok5 == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Sensus Kamar)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkoksk" <?php
                                                                                    if ($role->tkoksk == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (Tempat Tidur)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkoktt" <?php
                                                                                    if ($role->tkoktt == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (HAPER)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkokhp" <?php
                                                                                    if ($role->tkokhp == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Operasional (BOR)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkokbor" <?php
                                                                                    if ($role->tkokbor == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Pendapatan BPJS & NON-BPJS)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkkp1" <?php
                                                                                    if ($role->tkkp1 == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Per-Revenue Stream)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkkp2" <?php
                                                                                    if ($role->tkkp2 == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Pendapatan Per-Segmen)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkkp3" <?php
                                                                                    if ($role->tkkp3 == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Biaya)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkkb" <?php
                                                                                    if ($role->tkkb == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Kinerja Keuangan (Laba-Rugi)</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tkklr" <?php
                                                                                    if ($role->tkklr == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Input Data Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tid" <?php
                                                                                    if ($role->tid == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Tabel Kunjungan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="ttk" <?php
                                                                                    if ($role->ttk == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Target Kunjungan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="ttt" <?php
                                                                                    if ($role->ttt == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Tabel Pendapatan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="ttp" <?php
                                                                                    if ($role->ttp == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Grafik Kunjungan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gtk" <?php
                                                                                    if ($role->gtk == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Grafik Target Kunjungan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gtt" <?php
                                                                                    if ($role->gtt == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Grafik Pendapatan Telemedicine</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="gtp" <?php
                                                                                    if ($role->gtp == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Indikasi Mutu Nasional</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tmn" <?php
                                                                                    if ($role->tmn == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Indikasi Mutu Prioritas</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tmp" <?php
                                                                                    if ($role->tmp == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Indikasi Mutu Unit Kerja</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tmuk" <?php
                                                                                    if ($role->tmuk == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Data Report</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="tdr" <?php
                                                                                    if ($role->tdr == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-left">Master Query Data Report</td>
                                                                                <td class="text-center">
                                                                                <input type="checkbox" value="1" name="mdr" <?php
                                                                                    if ($role->mdr == '1') { echo 'checked';}?> disabled>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <!--end::Table body-->
                                                                    </table>
                                                                </form>
                                                            <?php endif; ?>
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
                if (!$('#cek').is(':checked')) {
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