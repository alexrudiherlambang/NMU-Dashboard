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
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
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
                                <!--begin::Products-->
                                <div class="card card-flush">
                                    <!--begin::Card header-->
                                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <!--begin::Search-->
                                            <div class="d-flex align-items-center position-relative my-1">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search User" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                            <!--begin::Add product-->
                                            <?php if ($this->session->userdata("otoritas") == "admin"): ?>
                                                <?php echo anchor('Unit/cuser/ctambah_user', '+ Data User', array('class' => 'btn btn-sm btn-success', 'type' => 'button')) ?>
                                            <?php endif; ?>
                                            <!--end::Add product-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-10px pe-2">No
                                                    </th>
                                                    <th class="min-w-100px">ID</th>
                                                    <th class="min-w-175px">Nama</th>
                                                    <th class="text-center min-w-70px">Level</th>
                                                    <th class="text-center min-w-100px">Username</th>
                                                    <th class="text-center min-w-100px">Password</th>
                                                    <th class="text-center min-w-100px">Email</th>
                                                    <th class="text-center min-w-100px">Actions</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                <?php
                                                $no = 1;
                                                $status = "OK";
                                                foreach ($user as $user) :
                                                ?>
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Checkbox-->
                                                    <td>
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <?php echo $no ?>
                                                        </div>
                                                    </td>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Order ID=-->
                                                    <td data-kt-ecommerce-order-filter="order_id">
                                                        <a class="text-gray-800 text-hover-primary fw-bold">USR<?php echo $user->id ?></a>
                                                    </td>
                                                    <!--end::Order ID=-->
                                                    <!--begin::Customer=-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin:: Avatar -->
                                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                <a>
                                                                    <div class="symbol-label fs-3 bg-light-primary text-primary">
                                                                        <img src='<?=base_url()?>assets/media/images/<?php echo $user->foto;?>' alt="Emma Smith" class="w-100" />
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <a class="text-gray-800 text-hover-primary fs-5 fw-bold"><?php echo $user->nama ?></a>
                                                                <!--end::Title-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--end::Customer=-->
                                                    <!--begin::Status=-->
                                                    <td class="text-center pe-0" data-order="<?php echo $user->tlok ?>">
                                                        <!--begin::Badges-->
                                                        <?php if ($user->tlok == ""){
                                                            echo '<div class="badge badge-light-primary">K.P</div>';
                                                        }else{
                                                            echo '<div class="badge badge-light-success">'.$user->tlok.'</div>';
                                                        }
                                                        ?>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status=-->
                                                    <!--begin::Total=-->
                                                    <td class="text-center pe-0">
                                                        <span class="fw-bold"><?php echo $user->username ?></span>
                                                    </td>
                                                    <!--end::Total=-->
                                                    <!--begin::Date Added=-->
                                                    <td class="text-center" data-order="2022-11-21">
                                                        <!-- <span class="fw-bold"><?php echo $user->password ?></span> -->
                                                    </td>
                                                    <!--end::Date Added=-->
                                                    <!--begin::Date Modified=-->
                                                    <td class="text-center" data-order="2022-11-22">
                                                        <span class="fw-bold"><?php echo $user->eemail ?></span>
                                                    </td>
                                                    <!--end::Date Modified=-->
                                                    <!--begin::Action=-->
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-end flex-shrink-0">
                                                            <a href="<?php echo site_url("Unit/cuser/clihat_user/" . $user->id) ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/General/Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="currentColor" opacity="0.6"/>
                                                                    </g>
                                                                </svg></span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <!--end::Action=-->
                                                </tr>
                                                <!--end::Table row-->	
                                                <?php
                                                $no++;
                                                endforeach;
                                                ?>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Products-->
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
    <script src="<?php echo base_url(); ?>assets/js/custom/apps/ecommerce/sales/listing.js"></script>
	
</body>
<!--end::Body-->

</html>