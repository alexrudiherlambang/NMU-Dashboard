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
                                        Data Unsafe Action / Unsafe Condition</h1>
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
                                                <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Unsafe Action / Unsafe Condition" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                            <!--begin::Add product-->
                                            <?php echo anchor('SuperUser/cform_HSSE/input_unsafe', '+ Form Unsafe Action / Unsafe Condition', array('class' => 'btn btn-sm btn-success', 'type' => 'button')) ?>
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
                                                    <th class="w-10px pe-2">No</th>
                                                    <th class="text-center min-w-70px">NIP</th>
                                                    <th class="text-center min-w-70px">Nama Pegawai</th>
                                                    <th class="text-center min-w-70px">Status Pegawai</th>
                                                    <th class="text-center min-w-100px">Unit | Fungsi</th>
                                                    <th class="text-center min-w-200px">Kronologi Temuan</th>
                                                    <th class="text-center min-w-200px">Tingkat Keparahan</th>
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
                                                foreach ($unsafe as $unsafe) :
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
                                                    <td class="text-center pe-0" data-kt-ecommerce-order-filter="order_id">
                                                        <a class="text-gray-800 text-hover-primary fw-bold"><?php echo $unsafe->nip ?></a>
                                                    </td>
                                                    <!--end::Order ID=-->
                                                    <!--end::Customer=-->
                                                    <!--begin::Status=-->
                                                    <td class="text-center pe-0" data-order="<?php echo $unsafe->napeg ?>">
                                                        <div class="ms-5">
                                                            <!--begin::Title-->
                                                            <a class="text-gray-800 text-hover-primary fs-5 fw-bold"><?php echo $unsafe->napeg ?></a>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <!--end::Status=-->
                                                    <!--begin::Total=-->
                                                    <td class="text-center pe-0">
                                                        <span class="fw-bold"><?php echo $unsafe->status ?></span>
                                                    </td>
                                                    <!--end::Total=-->
                                                    <!--begin::Date Added=-->
                                                    <td class="text-center" data-order="<?php echo $unsafe->fungsi ?>">
                                                        <div class="badge badge-light-success"><?php echo $unsafe->unit ?></div>
                                                        |
                                                        <span class="fw-bold"><?php echo $unsafe->fungsi ?></span>
                                                    </td>
                                                    <!--end::Date Added=-->
                                                    <!--begin::Date Modified=-->
                                                    <td class="text-center" data-order="<?php echo $unsafe->unit ?>">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <a><b>Kategori:</b> <?php echo $unsafe->sub_jenis ?></a></br>
                                                                <a><b>Jenis temuan:</b> <?php echo $unsafe->jenis_temuan ?></a></br>
                                                                <a><b>Deskripsi:</b> <?php echo $unsafe->deskripsi ?></a></br>
                                                                <a><b>RTL:</b> <?php echo $unsafe->rtl ?></a></br>
                                                                <a><b>PIC:</b> <?php echo $unsafe->pic ?></a></br>
                                                                <a><b>Gambar:</b> <img src="<?= base_url('assets/media/images/ktp/'.$unsafe->bukti); ?>" alt="Gambar" height="100"></a></br>
                                                                <!--end::Title-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--end::Date Modified=-->
                                                    <!--begin::Customer=-->
                                                    <td class="text-center">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <a><b>Lokasi: </b><?php echo $unsafe->lokasi ?></a></br>
                                                                <a><b>Tanggal & Waktu: </b><?php echo $unsafe->tgl_waktu ?></a></br>
                                                                <a><b>Status Validasi: </b>
                                                                <?php if ($unsafe->validasi == "open"){
                                                                    echo '<div class="badge badge-light-success">'.$unsafe->validasi.'</div>';
                                                                }else{
                                                                    echo '<div class="badge badge-light-danger">'.$unsafe->validasi.'</div>';
                                                                }
                                                                ?></br>
                                                                <a>
                                                                    <b>Evidence: </b> 
                                                                    <?php if ($unsafe->evidence === "NULL") {
                                                                        echo 'status masih open!!!';
                                                                    } else {
                                                                        echo '<img src="' . base_url('assets/media/images/ktp/' . $unsafe->evidence) . '" alt="Gambar" height="100">';
                                                                    }
                                                                    ?>
                                                                </a></br>
                                                                <!--end::Title-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--begin::Action=-->
                                                    <td class="text-center">
                                                    <?php if ($unsafe->validasi === "open"): ?>
                                                        <div class="d-flex justify-content-center flex-shrink-0">
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm me-1">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                                <span class="svg-icon svg-icon-2x">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/General/Visible.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                                            <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="currentColor"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                        <div class="d-flex justify-content-center flex-shrink-0">
                                                            <a href="<?php echo site_url("SuperUser/cform_HSSE/edit_unsafe/" . $unsafe->id_unsafe."/unsafe") ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/General/Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                    <rect fill="currentColor" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                                </g>
                                                                </svg></span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </div>
                                                        <div class="d-flex justify-content-center flex-shrink-0">
                                                            <a href="<?php echo site_url("SuperUser/cform_HSSE/delete_unsafe/" . $unsafe->id_unsafe."/unsafe") ?>" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1" onclick="return confirm('Anda yakin hapus pendaftaran ini?');">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/General/Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                    <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="currentColor" opacity="0.3"/>
                                                                </g>
                                                                </svg></span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <!--end::Action=-->
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Judul Popup</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form" method="post" action="<?php echo site_url(); ?>SuperUser/cform_HSSE/validasi_unsafe" id="kt_subscriptions_create_new" enctype="multipart/form-data">
                                                                        <div class="row mb-5">
                                                                            <div class="col-xl-3">
                                                                                <div class="fs-6 fw-semibold mt-2 mb-3">ID</div>
                                                                            </div>
                                                                            <div class="col-xl-9 fv-row">
                                                                                <input type="text" class="form-control form-control-solid" name="id_unsafe" value="<?php echo $unsafe->id_unsafe ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-5">
                                                                            <div class="col-xl-3">
                                                                                <div class="fs-6 fw-semibold mt-2 mb-3">Evidence</div>
                                                                            </div>
                                                                            <div class="col-xl-9 fv-row">
                                                                                <input type="file" name="evidence" id="evidence">
                                                                                <label for="evidence">Pilih File</label>
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
                                                </tr>
                                                <!--end::Table row-->	
                                                <?php
                                                $no++;
                                                endforeach;
                                                ?>
                                                <?php
                                                foreach ($del_unsafe as $unsafe) :
                                                ?>
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Checkbox-->
                                                    <td>
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">

                                                        </div>
                                                    </td>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Order ID=-->
                                                    <td class="text-center pe-0" data-kt-ecommerce-order-filter="order_id">
                                                        <a class="text-gray-800 text-hover-primary fw-bold"><s><?php echo $unsafe->nip ?></s></a>
                                                    </td>
                                                    <!--end::Order ID=-->
                                                    <!--end::Customer=-->
                                                    <!--begin::Status=-->
                                                    <td class="text-center pe-0" data-order="<?php echo $unsafe->napeg ?>">
                                                        <div class="ms-5">
                                                            <!--begin::Title-->
                                                            <a class="text-gray-800 text-hover-primary fs-5 fw-bold"><s><?php echo $unsafe->napeg ?></s></a>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <!--end::Status=-->
                                                    <!--begin::Total=-->
                                                    <td class="text-center pe-0">
                                                        <span class="fw-bold"><s><?php echo $unsafe->status ?></s></span>
                                                    </td>
                                                    <!--end::Total=-->
                                                    <!--begin::Date Added=-->
                                                    <td class="text-center" data-order="<?php echo $unsafe->fungsi ?>">
                                                        <div class="badge badge-light-success"><s><?php echo $unsafe->unit ?></s></div>
                                                        |
                                                        <span class="fw-bold"><s><?php echo $unsafe->fungsi ?></s></span>
                                                    </td>
                                                    <!--end::Date Added=-->
                                                    <!--begin::Date Modified=-->
                                                    <td class="text-center" data-order="<?php echo $unsafe->unit ?>">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <a><s><b>Kategori:</b> <?php echo $unsafe->sub_jenis ?></s></a></br>
                                                                <a><s><b>Jenis temuan:</b> <?php echo $unsafe->jenis_temuan ?></s></a></br>
                                                                <a><s><b>Deskripsi:</b> <?php echo $unsafe->deskripsi ?></s></a></br>
                                                                <a><s><b>RTL:</b> <?php echo $unsafe->rtl ?></s></a></br>
                                                                <a><s><b>PIC:</b> <?php echo $unsafe->pic ?></s></a></br>
                                                                <a><s><b>Gambar:</b> <img src="<?= base_url('assets/media/images/ktp/'.$unsafe->bukti); ?>" alt="Gambar" height="100"></s></a></br>
                                                                <!--end::Title-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--end::Date Modified=-->
                                                    <!--begin::Customer=-->
                                                    <td class="text-center">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <a><s><b>Lokasi: </b><?php echo $unsafe->lokasi ?></s></a></br>
                                                                <a><s><b>Tanggal & Waktu: </b><?php echo $unsafe->tgl_waktu ?></s></a></br>
                                                                <a><s><b>Status Validasi: </b></s>
                                                                <?php if ($unsafe->validasi == "open"){
                                                                    echo '<div class="badge badge-light-success">'.$unsafe->validasi.'</div>';
                                                                }else{
                                                                    echo '<div class="badge badge-light-danger">'.$unsafe->validasi.'</div>';
                                                                }
                                                                ?></br>
                                                                <a>
                                                                    <b><s>Evidence: </s></b> 
                                                                    <?php if ($unsafe->evidence === "NULL") {
                                                                        echo '<s>status masih open!!!</s>';
                                                                    } else {
                                                                        echo '<img src="' . base_url('assets/media/images/ktp/' . $unsafe->evidence) . '" alt="Gambar" height="100">';
                                                                    }
                                                                    ?>
                                                                </a></br>
                                                                <!--end::Title-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--begin::Action=-->
                                                    <td class="text-center">
                                                    
                                                        <div class="d-flex justify-content-center flex-shrink-0">
                                                            
                                                        </div>
                                                        <div class="d-flex justify-content-center flex-shrink-0">
                                                            
                                                        </div>
                                                    </td>
                                                    <!--end::Action=-->
                                                    	
                                                </tr>
                                                <!--end::Table row-->	
                                                <?php
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