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
                                                        <form method="post" id="form_upload" action="<?php echo site_url(); ?>SuperUser/cuser/cupdate_foto" enctype="multipart/form-data">
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
                                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_overview_events_and_logs_tab">Events & Logs</a>
                                            </li>
                                            <!--end:::Tab item-->
                                            <!--begin:::Tab item-->
                                            <li class="nav-item ms-auto">
                                                <!--begin::Action menu-->
                                                <a href="<?php echo site_url(); ?>SuperUser/cuser" class="btn btn-danger ps-7" data-kt-menu-placement="bottom-end">Close</a>
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
                                                                <tbody class="fs-6 fw-semibold text-gray-600">
                                                                    <tr>
                                                                        <td>Username</td>
                                                                        <td><?php echo $user->username;?></td>
                                                                        <td class="text-end">
                                                                            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_email">
                                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                                <span class="svg-icon svg-icon-3">
                                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Password</td>
                                                                        <td><?php echo $user->password;?></td>
                                                                        <td class="text-end">
                                                                            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
                                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                                <span class="svg-icon svg-icon-3">
                                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Level</td>
                                                                        <td><?php echo $user->tlok;?></td>
                                                                        <td class="text-end">
                                                                            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">
                                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                                <span class="svg-icon svg-icon-3">
                                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </button>
                                                                        </td>
                                                                    </tr>
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
                                            <div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2>Login Sessions</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                        <!--begin::Card toolbar-->
                                                        <div class="card-toolbar">
                                                            <!--begin::Filter-->
                                                            <button type="button" class="btn btn-sm btn-flex btn-light-primary" id="kt_modal_sign_out_sesions">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr077.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.3" x="4" y="11" width="12" height="2" rx="1" fill="currentColor" />
                                                                    <path d="M5.86875 11.6927L7.62435 10.2297C8.09457 9.83785 8.12683 9.12683 7.69401 8.69401C7.3043 8.3043 6.67836 8.28591 6.26643 8.65206L3.34084 11.2526C2.89332 11.6504 2.89332 12.3496 3.34084 12.7474L6.26643 15.3479C6.67836 15.7141 7.3043 15.6957 7.69401 15.306C8.12683 14.8732 8.09458 14.1621 7.62435 13.7703L5.86875 12.3073C5.67684 12.1474 5.67684 11.8526 5.86875 11.6927Z" fill="currentColor" />
                                                                    <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Sign out all sessions</button>
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
                                                                        <th class="min-w-100px">Location</th>
                                                                        <th>Device</th>
                                                                        <th>IP Address</th>
                                                                        <th class="min-w-125px">Time</th>
                                                                        <th class="min-w-70px">Actions</th>
                                                                    </tr>
                                                                    <!--end::Table row-->
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6 fw-semibold text-gray-600">
                                                                    <tr>
                                                                        <!--begin::Invoice=-->
                                                                        <td>Australia</td>
                                                                        <!--end::Invoice=-->
                                                                        <!--begin::Status=-->
                                                                        <td>Chome - Windows</td>
                                                                        <!--end::Status=-->
                                                                        <!--begin::Amount=-->
                                                                        <td>207.26.24.365</td>
                                                                        <!--end::Amount=-->
                                                                        <!--begin::Date=-->
                                                                        <td>23 seconds ago</td>
                                                                        <!--end::Date=-->
                                                                        <!--begin::Action=-->
                                                                        <td>Current session</td>
                                                                        <!--end::Action=-->
                                                                    </tr>
                                                                    <tr>
                                                                        <!--begin::Invoice=-->
                                                                        <td>Australia</td>
                                                                        <!--end::Invoice=-->
                                                                        <!--begin::Status=-->
                                                                        <td>Safari - iOS</td>
                                                                        <!--end::Status=-->
                                                                        <!--begin::Amount=-->
                                                                        <td>207.11.39.370</td>
                                                                        <!--end::Amount=-->
                                                                        <!--begin::Date=-->
                                                                        <td>3 days ago</td>
                                                                        <!--end::Date=-->
                                                                        <!--begin::Action=-->
                                                                        <td>
                                                                            <a href="#" data-kt-users-sign-out="single_user">Sign out</a>
                                                                        </td>
                                                                        <!--end::Action=-->
                                                                    </tr>
                                                                    <tr>
                                                                        <!--begin::Invoice=-->
                                                                        <td>Australia</td>
                                                                        <!--end::Invoice=-->
                                                                        <!--begin::Status=-->
                                                                        <td>Chrome - Windows</td>
                                                                        <!--end::Status=-->
                                                                        <!--begin::Amount=-->
                                                                        <td>207.22.20.44</td>
                                                                        <!--end::Amount=-->
                                                                        <!--begin::Date=-->
                                                                        <td>last week</td>
                                                                        <!--end::Date=-->
                                                                        <!--begin::Action=-->
                                                                        <td>Expired</td>
                                                                        <!--end::Action=-->
                                                                    </tr>
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
                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2>Logs</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                        <!--begin::Card toolbar-->
                                                        <div class="card-toolbar">
                                                            <!--begin::Button-->
                                                            <button type="button" class="btn btn-sm btn-light-primary">
                                                            <!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="currentColor" />
                                                                    <path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="currentColor" />
                                                                    <path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Download Report</button>
                                                            <!--end::Button-->
                                                        </div>
                                                        <!--end::Card toolbar-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body py-0">
                                                        <!--begin::Table wrapper-->
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <table class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5" id="kt_table_users_logs">
                                                                <!--begin::Table body-->
                                                                <tbody>
                                                                    <!--begin::Table row-->
                                                                    <tr>
                                                                        <!--begin::Badge=-->
                                                                        <td class="min-w-70px">
                                                                            <div class="badge badge-light-success">200 OK</div>
                                                                        </td>
                                                                        <!--end::Badge=-->
                                                                        <!--begin::Status=-->
                                                                        <td>POST /v1/invoices/in_5068_2104/payment</td>
                                                                        <!--end::Status=-->
                                                                        <!--begin::Timestamp=-->
                                                                        <td class="pe-0 text-end min-w-200px">24 Jun 2022, 8:43 pm</td>
                                                                        <!--end::Timestamp=-->
                                                                    </tr>
                                                                    <!--end::Table row-->
                                                                    <!--begin::Table row-->
                                                                    <tr>
                                                                        <!--begin::Badge=-->
                                                                        <td class="min-w-70px">
                                                                            <div class="badge badge-light-warning">404 WRN</div>
                                                                        </td>
                                                                        <!--end::Badge=-->
                                                                        <!--begin::Status=-->
                                                                        <td>POST /v1/customer/c_637dcb9edc0c6/not_found</td>
                                                                        <!--end::Status=-->
                                                                        <!--begin::Timestamp=-->
                                                                        <td class="pe-0 text-end min-w-200px">24 Jun 2022, 11:30 am</td>
                                                                        <!--end::Timestamp=-->
                                                                    </tr>
                                                                    <!--end::Table row-->
                                                                    <!--begin::Table row-->
                                                                    <tr>
                                                                        <!--begin::Badge=-->
                                                                        <td class="min-w-70px">
                                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                                        </td>
                                                                        <!--end::Badge=-->
                                                                        <!--begin::Status=-->
                                                                        <td>POST /v1/invoice/in_7036_6144/invalid</td>
                                                                        <!--end::Status=-->
                                                                        <!--begin::Timestamp=-->
                                                                        <td class="pe-0 text-end min-w-200px">10 Mar 2022, 10:30 am</td>
                                                                        <!--end::Timestamp=-->
                                                                    </tr>
                                                                    <!--end::Table row-->
                                                                    <!--begin::Table row-->
                                                                    <tr>
                                                                        <!--begin::Badge=-->
                                                                        <td class="min-w-70px">
                                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                                        </td>
                                                                        <!--end::Badge=-->
                                                                        <!--begin::Status=-->
                                                                        <td>POST /v1/invoice/in_7036_6144/invalid</td>
                                                                        <!--end::Status=-->
                                                                        <!--begin::Timestamp=-->
                                                                        <td class="pe-0 text-end min-w-200px">20 Dec 2022, 5:30 pm</td>
                                                                        <!--end::Timestamp=-->
                                                                    </tr>
                                                                    <!--end::Table row-->
                                                                    <!--begin::Table row-->
                                                                    <tr>
                                                                        <!--begin::Badge=-->
                                                                        <td class="min-w-70px">
                                                                            <div class="badge badge-light-warning">404 WRN</div>
                                                                        </td>
                                                                        <!--end::Badge=-->
                                                                        <!--begin::Status=-->
                                                                        <td>POST /v1/customer/c_637dcb9edc0c6/not_found</td>
                                                                        <!--end::Status=-->
                                                                        <!--begin::Timestamp=-->
                                                                        <td class="pe-0 text-end min-w-200px">20 Jun 2022, 2:40 pm</td>
                                                                        <!--end::Timestamp=-->
                                                                    </tr>
                                                                    <!--end::Table row-->
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
	
</body>
<!--end::Body-->

</html>