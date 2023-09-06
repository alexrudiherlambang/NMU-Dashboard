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
										Data Rekap Kunjungan Rawat Jalan</h1>
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
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-body border-0 pt-10">
                                        <!--begin::Card title-->
                                        <div class="card-title"><center>
                                            <form method="post" action="<?php echo site_url(); ?>SuperUser/ckunjungan_RJ/kunjungan" enctype="multipart/form-data">
                                                <div class="row mb-4">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-5">
                                                        <div class="fs-6 fw-semibold mt-2 mb-3">Unit Kerja</div>
                                                    </div>
                                                    <div class="col-xl-5 fv-row">
                                                        <select class="form-control form-control-solid select2" name="lokasi">
                                                            <option <?php if ($lokasi == "") echo "selected"; ?> value="">KONSOLIDASI</option>
                                                            <option <?php if ($lokasi == "K.P") echo "selected"; ?>>K.P</option>
                                                            <option <?php if ($lokasi == "RSG") echo "selected"; ?>>RSG</option>
                                                            <option <?php if ($lokasi == "RST") echo "selected"; ?>>RST</option>
                                                            <option <?php if ($lokasi == "RSP") echo "selected"; ?>>RSP</option>
                                                            <option <?php if ($lokasi == "RSMU") echo "selected"; ?>>RSMU</option>
                                                            <option <?php if ($lokasi == "URJ") echo "selected"; ?>>URJ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-xl-5">
                                                        <div class="fs-6 fw-semibold mt-2 mb-3">Filter By Unit</div>
                                                    </div>
                                                    <div class="col-xl-5 fv-row">
                                                        <select class="form-control form-control-solid" id="unit" name="unit">
                                                            <option><?php echo $unit;?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-xl-5">
                                                        <div class="fs-6 fw-semibold mt-2 mb-3">Filter By Sub-Unit</div>
                                                    </div>
                                                    <div class="col-xl-5 fv-row">
                                                        <select class="form-control form-control-solid" id="subunit" name="subunit">
                                                            <option><?php echo $subunit;?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-5">
                                                        <div class="fs-6 fw-semibold mt-2 mb-3">Periode</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-5 fv-row">
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
                                                            <input class="form-control form-control-solid ps-12" type="month" name="periode" placeholder="Pick a date" id="periode" required="required" value="<?php echo $periode;?>"/>
                                                        </div>
                                                    </div>
                                                    <!--begin::Col-->
                                                </div>
                                                <div class="row mb-8">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-5">
                                                        <div class="fs-6 fw-semibold mt-2 mb-3">Range Tanggal</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-5 fv-row">
                                                        <div class="position-relative d-flex align-items-center">
                                                            <input class="form-control form-control-solid ps-12" type="date" name="tglawal" placeholder="Pick a date" id="tglawal" required="required" value="<?php echo $tglawal;?>"/>
                                                            <div class="fs-60 fw-semibold mt-2 mb-3"> s.d </div>
                                                            <input class="form-control form-control-solid ps-12" type="date" name="tglakhir" placeholder="Pick a date" id="tglakhir" required="required" value="<?php echo $tglakhir;?>"/>
                                                        </div>
                                                    </div>
                                                    <!--begin::Col-->
                                                </div>
                                                <center>
                                                    <button type="submit" name="submit" class="btn btn-sm btn-success">Tampilkan</button>
                                                </center>
                                            </form>
                                            </center>
                                        </div>
                                        <!--begin::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body border-0 pt-10">
                                    <!-- <canvas id="myChart" width="300" height="80"></canvas><br> -->
                                        <div class="table-responsive">
                                        <!--begin::Table-->
                                            <form method="post" action="<?php echo site_url(); ?>SuperUser/ckunjungan_RJ/export_xls">
                                                <input class="form-control form-control-solid ps-12" type="hidden" name="unit" placeholder="Pick a date" id="unit" required="required" value="<?php echo $unit;?>" readonly/>
                                                <input class="form-control form-control-solid ps-12" type="hidden" name="subunit" placeholder="Pick a date" id="subunit" required="required" value="<?php echo $subunit;?>" readonly/>
                                                <input class="form-control form-control-solid ps-12" type="hidden" name="tglawal" placeholder="Pick a date" id="tglawal" required="required" value="<?php echo $tglawal;?>" readonly/>
                                                <input class="form-control form-control-solid ps-12" type="hidden" name="tglakhir" placeholder="Pick a date" id="tglakhir" required="required" value="<?php echo $tglakhir;?>" readonly/>
                                                <input class="form-control form-control-solid ps-12" type="hidden" name="lokasi" required="required" value="<?php echo $lokasi;?>" readonly/>
                                                <button type="submit" name="exportType" value="detail" class="btn btn-sm btn-light-primary">Export Detail</button>
                                                <button type="submit" name="exportType" value="tabel" class="btn btn-sm btn-light-info">Export Tabel</button>
                                                <button type="submit" name="exportType" value="potensi" class="btn btn-sm btn-light-success">Export Potensi</button>
                                                <div style="text-align:right"></div><br>
                                                <table class="table align-middle gs-0 gy-4">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <!--begin::Table row-->
                                                        <tr style="background-color: #000080;" class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                            <th style="color: #ffffff; vertical-align: middle;" class="text-center w-10px pe-5"></th>
                                                            <th style="color: #ffffff; vertical-align: middle;" class="text-center w-10px pe-5">
                                                                Export<br><input type="checkbox" id="CheckAll">
                                                            </th>
                                                            <th style="color: #ffffff; vertical-align: middle;" class="min-w-125px">Uraian</th>
                                                            <th style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px">Kunjungan yang Lalu</th>
                                                            <th style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px">Kunjungan Periode Saat Ini</th>
                                                            <th style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px">Total Kunjungan s/d saat ini</th>
                                                            <th style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px">Potensial Kunjungan</th>
                                                            <th style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px">Estimasi Total Kunjungan</th>
                                                            <th style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px">Target Kunjungan</th>
                                                            <th style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px">Prosentase</th>
                                                        </tr>
                                                        <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="text-gray-600 fw-semibold">
                                                        <?php
                                                        $no = 1;
                                                        $total_rsaldolalu = 0;
                                                        $total_rsaldosaatini = 0;
                                                        $total_rsaldosampai = 0;
                                                        $total_rsaldopotensi = 0;
                                                        $total_jmltarget = 0;
                                                        $total_jmlprosen = 0;
                                                        
                                                        $rsaldolalu_ugd = 0;
                                                        $rsaldosaatini_ugd = 0;
                                                        $rsaldosampai_ugd = 0;
                                                        $rsaldopotensi_ugd = 0;
                                                        $jmltarget_ugd = 0;
                                                        $jmlprosen_ugd = 0;
                                                        foreach ($kunjung as $k) :
                                                            $total_rsaldolalu += $k->rsaldolalu;
                                                            $total_rsaldosaatini += $k->rsaldosaatini;
                                                            $total_rsaldosampai += $k->rsaldosampai;
                                                            $total_rsaldopotensi += $k->rsaldopotensi;
                                                            $total_jmltarget += $k->jmltarget;
                                                            $total_jmlprosen += $k->jmlprosen;

                                                            if($k->ket == "UGD"):
                                                                $rsaldolalu_ugd += $k->rsaldolalu;
                                                                $rsaldosaatini_ugd += $k->rsaldosaatini;
                                                                $rsaldosampai_ugd += $k->rsaldosampai;
                                                                $rsaldopotensi_ugd += $k->rsaldopotensi;
                                                                $jmltarget_ugd += $k->jmltarget;
                                                                $jmlprosen_ugd += $k->jmlprosen;
                                                            endif;
                                                        ?>
                                                        <tr>    
                                                            <td class="text-center w-10px pe-5">
                                                                <a class="btn btn-icon btn-light-warning btn-sm <?php echo str_replace(' ', '_', $k->ket) ?>" href="javascript:void(0)" onclick="toggleTable('<?php echo str_replace(' ', '_', $k->ket) ?>')">
                                                                <span class="svg-icon svg-icon-primary svg-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Navigation/Sign-in.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <rect fill="#000000" opacity="0.3" transform="translate(9.000000, 12.000000) rotate(-270.000000) translate(-9.000000, -12.000000) " x="8" y="6" width="2" height="12" rx="1"/>
                                                                        <path d="M20,7.00607258 C19.4477153,7.00607258 19,6.55855153 19,6.00650634 C19,5.45446114 19.4477153,5.00694009 20,5.00694009 L21,5.00694009 C23.209139,5.00694009 25,6.7970243 25,9.00520507 L25,15.001735 C25,17.2099158 23.209139,19 21,19 L9,19 C6.790861,19 5,17.2099158 5,15.001735 L5,8.99826498 C5,6.7900842 6.790861,5 9,5 L10.0000048,5 C10.5522896,5 11.0000048,5.44752105 11.0000048,5.99956624 C11.0000048,6.55161144 10.5522896,6.99913249 10.0000048,6.99913249 L9,6.99913249 C7.8954305,6.99913249 7,7.89417459 7,8.99826498 L7,15.001735 C7,16.1058254 7.8954305,17.0008675 9,17.0008675 L21,17.0008675 C22.1045695,17.0008675 23,16.1058254 23,15.001735 L23,9.00520507 C23,7.90111468 22.1045695,7.00607258 21,7.00607258 L20,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.000000, 12.000000) rotate(-90.000000) translate(-15.000000, -12.000000) "/>
                                                                        <path d="M16.7928932,9.79289322 C17.1834175,9.40236893 17.8165825,9.40236893 18.2071068,9.79289322 C18.5976311,10.1834175 18.5976311,10.8165825 18.2071068,11.2071068 L15.2071068,14.2071068 C14.8165825,14.5976311 14.1834175,14.5976311 13.7928932,14.2071068 L10.7928932,11.2071068 C10.4023689,10.8165825 10.4023689,10.1834175 10.7928932,9.79289322 C11.1834175,9.40236893 11.8165825,9.40236893 12.2071068,9.79289322 L14.5,12.0857864 L16.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.500000, 12.000000) rotate(-90.000000) translate(-14.500000, -12.000000) "/>
                                                                    </g>
                                                                </svg><!--end::Svg Icon--></span>
                                                                </a>                                                      
                                                            </td>
                                                            <td class="text-center w-10px pe-5"> <input type="checkbox" id="Check" value="<?php echo $k->ket ?>" name="pilihan[]"></td>
                                                            <td class="min-w-125px"><?php echo $k->ket ?></td>
                                                            <td class="text-center min-w-100px"><?php echo number_format($k->rsaldolalu, 0, ',', '.')?></td>
                                                            <td class="text-center min-w-100px"><?php echo number_format($k->rsaldosaatini, 0, ',', '.')?></td>
                                                            <td class="text-center min-w-100px"><?php echo number_format($k->rsaldosampai, 0, ',', '.')?></td>
                                                            <td class="text-center min-w-100px"><?php echo number_format($k->rsaldopotensi, 0, ',', '.')?></td>
                                                            <td class="text-center min-w-100px"><?php echo number_format($k->rsaldosampai+$k->rsaldopotensi, 0, ',', '.')?></td>
                                                            <td class="text-center min-w-100px"><?php echo number_format($k->jmltarget, 0, ',', '.')?></td>
                                                            <td class="text-center min-w-100px"><?php echo $k->jmlprosen*100;?>%</td>
                                                        </tr>
                                                        <tr class="detail-<?php echo str_replace(' ', '_', $k->ket) ?> d-none">
                                                        <!-- <tr> -->
                                                            <td colspan="2"></td>
                                                            <td colspan="8">
                                                                <table class="table table-row-dashed table-row-gray-500 gy-5 gs-5 mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="min-w-125px">Sub Unit</th>
                                                                            <th class="text-center min-w-100px">Kunjungan yang Lalu</th>
                                                                            <th class="text-center min-w-100px">Kunjungan Periode Saat Ini</th>
                                                                            <th class="text-center min-w-100px">Total Kunjungan s/d saat ini</th>
                                                                            <th class="text-center min-w-100px">Potensial Kunjungan</th>
                                                                            <th class="text-center min-w-100px">Estimasi Total Kunjungan</th>
                                                                            <th class="text-center min-w-100px"></th>
                                                                            <th class="text-center min-w-100px"></th>
                                                                        </tr>
                                                                        <?php
                                                                        foreach ($detail_kunjung as $dk) :
                                                                        if ($dk->ket == $k->ket) :
                                                                        ?>
                                                                        <tr>
                                                                            <td class=" min-w-125px"><?php echo $dk->sub_unit ?></td>
                                                                            <td class="text-center min-w-100px"><?php echo number_format($dk->rsaldolalu, 0, ',', '.')?></td>
                                                                            <td class="text-center min-w-100px"><?php echo number_format($dk->rsaldosaatini, 0, ',', '.')?></td>
                                                                            <td class="text-center min-w-100px"><?php echo number_format($dk->rsaldosampai, 0, ',', '.')?></td>
                                                                            <td class="text-center min-w-100px"><?php echo number_format($dk->rsaldopotensi, 0, ',', '.')?></td>
                                                                            <td class="text-center min-w-100px"><?php echo number_format($dk->rsaldosampai+$k->rsaldopotensi, 0, ',', '.')?></td>
                                                                            <td class="text-center min-w-100px"></td>
                                                                            <td class="text-center min-w-100px"></td>
                                                                        </tr>
                                                                        <tr>

                                                                        </tr>
                                                                        <?php
                                                                        endif;
                                                                        endforeach;
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $no++;
                                                        endforeach;
                                                        ?>
                                                        <?php
                                                            if ($unit == "SEMUA") :
                                                        ?>
                                                            <tr style="background-color: #000080;">
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-125px" colspan="3"><b>TOTAL KUNJ. R. JALAN</b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldolalu-$rsaldolalu_ugd, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldosaatini-$rsaldosaatini_ugd, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldosampai-$rsaldosampai_ugd, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldopotensi-$rsaldopotensi_ugd, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format(($total_rsaldosampai-$rsaldosampai_ugd)+($total_rsaldopotensi-$rsaldopotensi_ugd), 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_jmltarget-$jmltarget_ugd, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format(($total_rsaldosampai-$rsaldosampai_ugd)/($total_jmltarget-$jmltarget_ugd)*100, 0, ',', '.');?>%</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center w-10px pe-5"></td>
                                                                <td class="min-w-125px"><b></b></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                            </tr>
                                                            <tr style="background-color: #000080;">
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-125px" colspan="3"><b>TOTAL KUNJ. RJ & UGD</b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldolalu, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldosaatini, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldosampai, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldopotensi, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldosampai+$total_rsaldopotensi, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_jmltarget, 0, ',', '.')?></b></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><b><?php echo number_format($total_rsaldosampai/$total_jmltarget*100, 0, ',', '.');?>%</b></td>
                                                            </tr>
                                                        <?php
                                                          endif
                                                        ?>
                                                        <tr>
                                                                <td class="text-center w-10px pe-5"></td>
                                                                <td class="min-w-125px"><b></b></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                                <td class="text-center min-w-100px"></td>
                                                            </tr>
                                                        <?php
                                                            foreach ($rekap as $r) :
                                                            if ($r->kelsegmen_sub == "Total") :
                                                        ?>
                                                            <tr style="background-color: #000080;">
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center w-10px pe-5">
                                                                    <a class="btn btn-icon btn-light-info btn-sm rekap" href="javascript:void(0)" onclick="toggleTable2('rekap')">
                                                                    <span class="svg-icon svg-icon-primary svg-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Navigation/Sign-in.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <rect fill="#000000" opacity="0.3" transform="translate(9.000000, 12.000000) rotate(-270.000000) translate(-9.000000, -12.000000) " x="8" y="6" width="2" height="12" rx="1"/>
                                                                            <path d="M20,7.00607258 C19.4477153,7.00607258 19,6.55855153 19,6.00650634 C19,5.45446114 19.4477153,5.00694009 20,5.00694009 L21,5.00694009 C23.209139,5.00694009 25,6.7970243 25,9.00520507 L25,15.001735 C25,17.2099158 23.209139,19 21,19 L9,19 C6.790861,19 5,17.2099158 5,15.001735 L5,8.99826498 C5,6.7900842 6.790861,5 9,5 L10.0000048,5 C10.5522896,5 11.0000048,5.44752105 11.0000048,5.99956624 C11.0000048,6.55161144 10.5522896,6.99913249 10.0000048,6.99913249 L9,6.99913249 C7.8954305,6.99913249 7,7.89417459 7,8.99826498 L7,15.001735 C7,16.1058254 7.8954305,17.0008675 9,17.0008675 L21,17.0008675 C22.1045695,17.0008675 23,16.1058254 23,15.001735 L23,9.00520507 C23,7.90111468 22.1045695,7.00607258 21,7.00607258 L20,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.000000, 12.000000) rotate(-90.000000) translate(-15.000000, -12.000000) "/>
                                                                            <path d="M16.7928932,9.79289322 C17.1834175,9.40236893 17.8165825,9.40236893 18.2071068,9.79289322 C18.5976311,10.1834175 18.5976311,10.8165825 18.2071068,11.2071068 L15.2071068,14.2071068 C14.8165825,14.5976311 14.1834175,14.5976311 13.7928932,14.2071068 L10.7928932,11.2071068 C10.4023689,10.8165825 10.4023689,10.1834175 10.7928932,9.79289322 C11.1834175,9.40236893 11.8165825,9.40236893 12.2071068,9.79289322 L14.5,12.0857864 L16.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.500000, 12.000000) rotate(-90.000000) translate(-14.500000, -12.000000) "/>
                                                                        </g>
                                                                    </svg><!--end::Svg Icon--></span>
                                                                    </a>                                                      
                                                                </td>
                                                                <!-- <td class="text-center w-10px pe-5"> <input type="checkbox" id="Check" value="<?php echo $k->ket ?>" name="pilihan[]"></td> -->
                                                                <td style="color: #ffffff; vertical-align: middle;" class="min-w-125px" colspan="2">Rekap Kunj. Telemed, Homecare</td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><?php echo number_format($r->rsaldolalu, 0, ',', '.')?></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><?php echo number_format($r->rsaldosaatini, 0, ',', '.')?></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><?php echo number_format($r->rsaldosampai, 0, ',', '.')?></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><?php echo number_format($r->rsaldopotensi, 0, ',', '.')?></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><?php echo number_format($r->rsaldosampai+$r->rsaldopotensi, 0, ',', '.')?></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><?php echo number_format($r->jmltarget, 0, ',', '.')?></td>
                                                                <td style="color: #ffffff; vertical-align: middle;" class="text-center min-w-100px"><?php echo $r->jmlprosen*100;?> %</td>
                                                            </tr>
                                                        <?php
                                                            endif;
                                                            endforeach;
                                                        ?>
                                                        <tr class="detail-rekap d-none">
                                                            <td colspan="2"></td>
                                                            <td colspan="8">
                                                                <table class="table table-row-dashed table-row-gray-500 gy-5 gs-5 mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="min-w-125px">Uraian</th>
                                                                            <th class="text-center min-w-100px">Kunjungan yang Lalu</th>
                                                                            <th class="text-center min-w-100px">Kunjungan Periode Saat Ini</th>
                                                                            <th class="text-center min-w-100px">Total Kunjungan s/d saat ini</th>
                                                                            <th class="text-center min-w-100px">Potensial Kunjungan</th>
                                                                            <th class="text-center min-w-100px">Estimasi Total Kunjungan</th>
                                                                            <th class="text-center min-w-100px">Target Kunjungan</th>
                                                                            <th class="text-center min-w-100px">Prosentase</th>
                                                                        </tr>
                                                                        <?php
                                                                            foreach ($rekap as $r) :
                                                                            if ($r->kelsegmen_sub != "Total") :
                                                                        ?>
                                                                        <tr>
                                                                            <td class="min-w-125px"><i><?php echo $r->kelsegmen_sub ?></i></td>
                                                                            <td class="text-center min-w-100px"><i><?php echo number_format($r->rsaldolalu, 0, ',', '.')?></i></td>
                                                                            <td class="text-center min-w-100px"><i><?php echo number_format($r->rsaldosaatini, 0, ',', '.')?></i></td>
                                                                            <td class="text-center min-w-100px"><i><?php echo number_format($r->rsaldosampai, 0, ',', '.')?></i></td>
                                                                            <td class="text-center min-w-100px"><i><?php echo number_format($r->rsaldopotensi, 0, ',', '.')?></i></td>
                                                                            <td class="text-center min-w-100px"><i><?php echo number_format($r->rsaldosampai+$r->rsaldopotensi, 0, ',', '.')?></i></td>
                                                                            <td class="text-center min-w-100px"><i><?php echo number_format($r->jmltarget, 0, ',', '.')?></i></td>
                                                                            <td class="text-center min-w-100px"><i><?php echo $r->jmlprosen*100;?> %</i></td>
                                                                        </tr>
                                                                        <?php
                                                                            endif;
                                                                            endforeach;
                                                                        ?>
                                                                        <tr>
                                                                            
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </form>
                                        </div>
                                        <div style="text-align:left"><b>Ket :</b><br>
                                            <i><b>Potensial Kunjungan</b> = Pasien RJ atau RI yang sudah close bill</i><br>
                                            <i><b>Estimasi Total Kunjungan</b> = Penjumlahan total kunjungan saat ini dengan potensial kunjungan</i><br>
                                            <i><b>Prosentase</b> = Total Kunjungan / Target Kunjungan</i><br>
                                            <i><b>Export Detail</b> digunakan untuk export data detail per uraian yang dipilih</i><br>
                                            <i><b>Export Tabel</b> digunakan untuk export data tabel yang tampil</i><br>
                                            <i><b>Export Potensi</b> digunakan untuk export detail data potensi</i><br>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
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
       document.addEventListener("DOMContentLoaded", function() {
            let checkboxes = document.querySelectorAll("#Check");
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true; // Menandai kotak centang sebagai checked secara default
            });
            let checkAll = document.querySelector("#CheckAll");
            checkAll.checked = true; // Menandai kotak centang "CheckAll" sebagai checked secara default
            
            document.querySelector("#CheckAll").addEventListener("change", function() {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = this.checked;
                }, this);
            });
        });
    </script>
    <?php
        $this->load->view('partials/script');
    ?>
    <script>
        $(document).ready(function() {
            var unitSelect = $("#unit");
            // Inisialisasi elemen "unit" dengan data saat halaman dimuat
            $.ajax({
                url: '<?php echo base_url(); ?>SuperUser/ckunjungan_RJ/get_unit',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    unitSelect.empty();
                    unitSelect.append('<option><?php echo $unit;?></option>');
                    unitSelect.append('<option>SEMUA</option>');
                    for (var i = 0; i < len; i++) {
                        var value = response[i]['kelunit'];
                        unitSelect.append('<option value="' + response[i]['kelunit'] + '">' + value + '</option>');
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#unit').on('change', function() {
                var optionSelected = $(this).val();
                $.ajax({
                    url: '<?php echo base_url(); ?>SuperUser/ckunjungan_RJ/get_subunit',
                    type: 'post',
                    data: { optionSelected: optionSelected },
                    dataType: 'json',
                    success: function(response) {
                        var len = response.length;
                        $("#subunit").empty();
                        $("#subunit").append('<option><?php echo $subunit;?></option>');
                        $("#subunit").append('<option>SEMUA</option>');
                        for (var i = 0; i < len; i++) {
                            var value = response[i]['nama_unit'];
                            $("#subunit").append('<option value="' + response[i]['nama_unit'] + '">' + value + '</option>');
                        }
                        $("#subunit").append('<option>Homecare</option>');
                        $("#subunit").append('<option>Telemedicine</option>');
                        $("#subunit").append('<option>MCU</option>');
                    }
                });
            });
        });

    </script>
    <script>
        function toggleTable(ket) {
            // Ganti spasi dengan karakter garis bawah
            ket = ket.replace(/\s/g, '_');
            var tableRow = document.querySelector('.detail-' + ket);
            if (tableRow) {
                if (tableRow.classList.contains('d-none')) {
                    tableRow.classList.remove('d-none');
                } else {
                    tableRow.classList.add('d-none');
                }
            }
        }
    </script>
    <script>
        function toggleTable2() {
            var tableRow = document.querySelector('.detail-rekap');
            if (tableRow) {
                if (tableRow.classList.contains('d-none')) {
                    tableRow.classList.remove('d-none');
                } else {
                    tableRow.classList.add('d-none');
                }
            }
        }
    </script>
	
</body>
<!--end::Body-->

</html>