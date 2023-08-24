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
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1
                                        class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        Data Log Get API Data Pegawai</h1>
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
                                                <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search mt_pekerja" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                            <!--begin::Add product-->
                                            <?php echo anchor('SuperUser/cHCIS/Master_pekerja', 'Close', array('class' => 'btn btn-sm btn-danger', 'type' => 'button')) ?>
                                            <?php if ($this->session->userdata("otoritas") == "admin"): ?>
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-success">Get All Data Pegawai</a>
                                            <?php endif; ?>
                                            <!--end::Add product-->
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Pilih Range Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form" method="post" action="<?php echo site_url(); ?>SuperUser/cHCIS/insert_mtpeg" id="kt_subscriptions_create_new" enctype="multipart/form-data">
                                                                <div class="row mb-5">
                                                                    <div class="col-xl-3">
                                                                        <div class="fs-6 fw-semibold mt-2 mb-3">Unit Kerja</div>
                                                                    </div>
                                                                    <div class="col-xl-9 fv-row">
                                                                    <select class="form-control form-control-solid select2" name="unit" >
                                                                        <option selected="selected">-</option>
                                                                        <option value="KP">Kantor Pusat</option>
                                                                        <option value="RSG">Rumah Sakit Gatoel</option>
                                                                        <option value="RSP">Rumah Sakit Perkebunan</option>
                                                                        <option value="RST">Rumah Sakit Toelongredjo</option>
                                                                        <option value="RSMU">Rumah Sakit Medika Utama</option>
                                                                        <option value="URJ">URJ / KLINIK</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-5">
                                                                    <div class="col-xl-3">
                                                                        <div class="fs-6 fw-semibold mt-2 mb-3">Periode</div>
                                                                    </div>
                                                                    <div class="col-xl-9 fv-row">
                                                                        <input class="form-control form-control-solid ps-12" type="month" name="periode" placeholder="Pick a date" id="periode" required="required"/>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Modal-->
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
                                                    <th class="text-left min-w-100px">ID User</th>
                                                    <th class="text-left min-w-130px">Nama User</th>
                                                    <th class="text-left min-w-70px">Unit Import</th>
                                                    <th class="text-left min-w-100px">Periode</th>
                                                    <th class="text-left min-w-100px">Jam Transaksi</th>
                                                    <th class="text-left min-w-100px">Tanggal Transaksi</th>
                                                    <th class="text-left min-w-100px">Status</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                <?php
                                                $no = 1;
                                                foreach ($mt_import as $mt_import) :
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
                                                    <td class="text-left pe-0" data-kt-ecommerce-order-filter="order_id">
                                                        <a class="text-gray-800 text-hover-primary fw-bold">USR<?php echo $mt_import->id ?></a>
                                                    </td>
                                                    <!--end::Order ID=-->
                                                    <!--end::Customer=-->
                                                    <!--begin::Status=-->
                                                    <td class="text-left pe-0" data-order="<?php echo $mt_import->nama ?>">
                                                        <!-- <div class="ms-5"> -->
                                                        <span class="d-flex align-items-left">
                                                            <!--begin::Title-->
                                                            <a class="text-gray-800 text-hover-primary fs-5 fw-bold"><?php echo $mt_import->nama ?></a>
                                                            <!--end::Title-->
                                                        </span>
                                                        <!-- </div> -->
                                                    </td>
                                                    <!--end::Status=-->
                                                    <!--begin::Total=-->
                                                    <td class="text-left pe-0">
                                                        <span class="d-flex align-items-left">
                                                            <?php echo $mt_import->unit ?> 
                                                        </span>
                                                    </td>
                                                    <!--end::Total=-->
                                                    <!--begin::Date Added=-->
                                                    <td class="text-left" data-order="<?php echo $mt_import->bulan ?>">
                                                        <span class="d-flex align-items-left">
                                                            <?php echo date('M Y', strtotime($mt_import->tahun . '-' . $mt_import->bulan . '-01')); ?>
                                                        </span>
                                                    </td>
                                                    <!--end::Date Added=-->
                                                    <!--begin::Date Modified=-->
                                                    <td class="text-left" data-order="<?php echo $mt_import->lastupdate ?>">
                                                        <span class="d-flex align-items-left">
                                                            <?php echo (new DateTime($mt_import->lastupdate))->format('H:i:s'); ?>
                                                        </span>
                                                    </td>
                                                    <!--end::Date Modified=-->
                                                    <!--begin::Customer=-->
                                                    <td class="text-left">
                                                        <div class="d-flex align-items-left">
                                                            <!--begin:: Avatar -->
                                                            <!-- <div class="ms-5"> -->
                                                            <?php echo (new DateTime($mt_import->lastupdate))->format('d M Y'); ?>                                              
                                                            <!-- </div> -->
                                                        </div>
                                                    </td>
                                                    <!--begin::Action=-->
                                                    <td class="text-left">
                                                        <div class="d-flex justify-content-left flex-shrink-0">
                                                                <div class="badge badge-light-success">done</div>
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