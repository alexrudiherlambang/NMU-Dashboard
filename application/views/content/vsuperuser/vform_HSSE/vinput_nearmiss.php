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
										Form Input HSSE</h1>
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
                                        <form class="form" method="post" action="<?php echo site_url(); ?>SuperUser/cform_HSSE/insert_other" id="kt_subscriptions_create_new" enctype="multipart/form-data">
                                            <!--begin::Card-->
                                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                                <!--begin::Card body-->
                                                <div class="card-body pt-0">
                                                    <div class="d-flex flex-column mb-2 fv-row">
                                                        <!--begin::Label-->
                                                        <div class="fs-5 fw-bold form-label mb-3">Input Data Nearmiss
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Tambahkan data nearmiss dengan benar"></i></div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <input type="hidden" class="form-control form-control-solid" name="jenis" value="other">                                                   
                                                    <!--begin::Invoice footer-->
                                                    <div class="d-flex flex-column mb-10 fv-row">
                                                        <hr class="my-3">
                                                        <div class="fs-5 fw-bold form-label mb-3">Data Diri Pelapor
                                                        <hr class="my-3"></div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Email</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <input type="email" class="form-control form-control-solid" name="email" placeholder="Input Email">
                                                            </div>
                                                        </div>
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
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">NIP</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <input type="number" class="form-control form-control-solid" name="nip" placeholder="Input NIP">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Nama Pegawai</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <input type="text" class="form-control form-control-solid" name="napeg" placeholder="Input Nama">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Status Pegawai</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <select class="form-control form-control-solid select2" name="status" >
                                                                    <option selected="selected">-</option>
                                                                    <option>PWT</option>
                                                                    <option>PWTT</option>
                                                                    <option>OS</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Bagian/Fungsi/Nama Klinik</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <input type="text" class="form-control form-control-solid" name="fungsi" placeholder="Input Text">
                                                            </div>
                                                        </div>
                                                        <hr class="my-3">
                                                        <div class="fs-5 fw-bold form-label mb-3">Biodata Korban
                                                        <hr class="my-3"></div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Kategori</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                                    <input class="form-check-input" type="checkbox" name="sub_jenis" value="Nearmiss" id="flexRadioLg"/>
                                                                    <label class="form-check-label" for="flexRadioLg">
                                                                    Nearmiss
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Nama Korban</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <input type="text" class="form-control form-control-solid" name="nama_korban" placeholder="Input Nama Korban">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Status Korban</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <select class="form-control form-control-solid select2" name="status_korban" >
                                                                    <option selected="selected">-</option>
                                                                    <option>PWT</option>
                                                                    <option>PWTT</option>
                                                                    <option>OS</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Foto KTP</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <input type="file" name="ktp" id="ktp">
                                                                <label for="ktp">Pilih File</label>
                                                            </div>
                                                        </div>
                                                        <hr class="my-3">
                                                        <div class="fs-5 fw-bold form-label mb-3">Kronologi Kejadian
                                                        <hr class="my-3"></div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Aktifitas</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <input type="text" class="form-control form-control-solid" name="aktifitas" placeholder="Input Aktifitas">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Potensi Kejadian</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <select class="form-control form-control-solid select2" name="incident" >
                                                                    <option selected="selected">-</option>
                                                                    <option>Fatality/ Kematian</option>
                                                                    <option>P3K</option>
                                                                    <option>Medical Treatment Case atau Tindakan lebih dari P3K</option>
                                                                    <option>Kerusakan Property/ Lingkungan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" class="form-control form-control-solid" name="tindakan" value="-">
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Deskripsi Kejadian</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <textarea class="form-control form-control-solid" rows="3" name="deskripsi" placeholder="Input Deskripsi Kejadian"></textarea>
                                                            </div>
                                                        </div>
                                                        <hr class="my-3">
                                                        <div class="fs-5 fw-bold form-label mb-3">Tingkat Keparahan
                                                        <hr class="my-3"></div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Lokasi Kejadian</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <input type="text" class="form-control form-control-solid" name="lokasi" placeholder="Input Lokasi Kejadian">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Tanggal & Waktu Kejadian</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-9 fv-row">
                                                                <div class="position-relative d-flex align-items-center">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                                    <span class="svg-icon position-absolute ms-4 mb-1 svg-icon-2">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                                                            <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                                                            <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                    <input class="form-control form-control-solid ps-12" type="datetime-local" name="tgl_waktu" placeholder="Pick a date" id="tglawal" required="required"/>
                                                                </div>
                                                            </div>
                                                            <!--begin::Col-->
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-xl-3">
                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Gambar Kejadian</div>
                                                            </div>
                                                            <div class="col-xl-9 fv-row">
                                                                <input type="file" name="bukti" id="bukti">
                                                                <label for="bukti">Pilih File</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Invoice footer-->
                                                    <!-- /.box-body -->
                                                    <div class="box-footer">
                                                        <center>
                                                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                                            <?php echo anchor('SuperUser/cform_HSSE/nearmiss', 'Batal', array('class' => 'btn btn-danger')) ?>
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