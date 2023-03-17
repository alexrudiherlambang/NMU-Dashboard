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
										Dashboard Unit</h1>
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
							<div><marquee><h1>Selamat Datang Di Dashboard NMU</h1></marquee></div>
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Products Documentations-->
									<div class="card mb-1">
										<!--begin::Card body-->
										<div class="card-header pt-7">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold text-gray-800">Grafik Pedapatan</span>
												<span class="text-gray-400 mt-1 fw-semibold fs-6"><?php echo $this->session->userdata("tlok") ?></span>
											</h3>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar">           
												<!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
												<div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">           
													<!--begin::Display range-->
													<div class="text-gray-600 fw-bold">
														<?php
															$start_date = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
															$end_date = date('Y-m-d'); // tanggal hari ini
															setlocale(LC_TIME, 'id_ID');
															echo strftime('%d %b %Y', strtotime($start_date)) . ' - ' . strftime('%d %b %Y', strtotime($end_date));
														?>
													</div>
													<!--end::Display range-->

													<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
													<span class="svg-icon svg-icon-1 ms-2 me-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
													<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
													<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
													</svg>
													</span>
													<!--end::Svg Icon-->          
												</div>
												<button id="show" class="btn btn-sm btn-primary">Show</button>
												<button id="hide" class="btn btn-sm btn-primary" style="display:none;">Hide</button>
												<!--end::Daterangepicker-->
											</div>
											<!--end::Toolbar-->
										</div>
										<div class="table-responsive">
											<table class="table align-middle gs-0 gy-4"> 
												<tbody class="text-gray-600 fw-semibold">
													<tr>
														<td>
														<div id="card_pendapatan" class="card-body">
															<b>(Dalam Juta)</b><br><br>
															<canvas id="pendapatan" width="600" height="200"></canvas><br>
														</div>
													</tr>
												</tbody>
											</table>
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Products Documentations-->
									<!--begin::Products Documentations-->
									<div class="card mb-1">
										<!--begin::Card body-->
										<div class="card-header pt-7">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold text-gray-800">Grafik Laba - Rugi</span>
												<span class="text-gray-400 mt-1 fw-semibold fs-6"><?php echo $this->session->userdata("tlok") ?></span>
											</h3>
											<!--end::Title-->

											<!--begin::Toolbar-->
											<div class="card-toolbar">           
												<!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
												<div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">           
													<!--begin::Display range-->
													<div class="text-gray-600 fw-bold">
														<?php
															$start_date = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
															$end_date = date('Y-m-d'); // tanggal hari ini
															setlocale(LC_TIME, 'id_ID');
															echo strftime('%d %b %Y', strtotime($start_date)) . ' - ' . strftime('%d %b %Y', strtotime($end_date));
														?>
													</div>
													<!--end::Display range-->

													<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
													<span class="svg-icon svg-icon-1 ms-2 me-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
													<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
													<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
													</svg>
													</span>
													<!--end::Svg Icon-->          
												</div>
												<button id="show1" class="btn btn-sm btn-primary">Show</button>
												<button id="hide1" class="btn btn-sm btn-primary" style="display:none;">Hide</button>
												<!--end::Daterangepicker-->
											</div>
											<!--end::Toolbar-->
										</div>
										<div class="table-responsive">
											<table class="table align-middle gs-0 gy-4"> 
												<tbody class="text-gray-600 fw-semibold">
													<tr>
														<td>
														<div id="card_labarugi" class="card-body">
															<b>(Dalam Juta)</b><br><br>
															<canvas id="labarugi" width="600" height="200"></canvas><br>
														</div>
													</tr>
												</tbody>
											</table>
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Products Documentations-->
									<!--begin::Products Documentations-->
									<div class="card mb-1">
										<!--begin::Card body-->
										<div class="card-header pt-7">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold text-gray-800">Grafik Beban</span>
												<span class="text-gray-400 mt-1 fw-semibold fs-6"><?php echo $this->session->userdata("tlok") ?></span>
											</h3>
											<!--end::Title-->

											<!--begin::Toolbar-->
											<div class="card-toolbar">           
												<!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
												<div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">           
													<!--begin::Display range-->
													<div class="text-gray-600 fw-bold">
														<?php
															$start_date = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
															$end_date = date('Y-m-d'); // tanggal hari ini
															setlocale(LC_TIME, 'id_ID');
															echo strftime('%d %b %Y', strtotime($start_date)) . ' - ' . strftime('%d %b %Y', strtotime($end_date));
														?>
													</div>
													<!--end::Display range-->

													<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
													<span class="svg-icon svg-icon-1 ms-2 me-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
													<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
													<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
													</svg>
													</span>
													<!--end::Svg Icon-->          
												</div>
												<button id="show2" class="btn btn-sm btn-primary">Show</button>
												<button id="hide2" class="btn btn-sm btn-primary" style="display:none;">Hide</button>
												<!--end::Daterangepicker-->
											</div>
											<!--end::Toolbar-->
										</div>
										<div class="table-responsive">
											<table class="table align-middle gs-0 gy-4"> 
												<tbody class="text-gray-600 fw-semibold">
													<tr>
														<td>
														<div id="card_beban" class="card-body">
															<b>(Dalam Juta)</b><br><br>
															<canvas id="beban" width="600" height="200"></canvas><br>
														</div>
													</tr>
												</tbody>
											</table>
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Products Documentations-->
									<!--begin::Products Documentations-->
									<div class="card mb-1">
										<!--begin::Card body-->
										<div class="card-header pt-7">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold text-gray-800">Grafik Kunjungan</span>
												<span class="text-gray-400 mt-1 fw-semibold fs-6"><?php echo $this->session->userdata("tlok") ?></span>
											</h3>
											<!--end::Title-->

											<!--begin::Toolbar-->
											<div class="card-toolbar">           
												<!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
												<div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">           
													<!--begin::Display range-->
													<div class="text-gray-600 fw-bold">
													<?php
														$start_date = date('Y') . '-01-01'; // tanggal 1 Januari tahun ini
														$end_date = date('Y-m-d'); // tanggal hari ini
														setlocale(LC_TIME, 'id_ID');
														echo strftime('%d %b %Y', strtotime($start_date)) . ' - ' . strftime('%d %b %Y', strtotime($end_date));
													?>
													</div>
													<!--end::Display range-->

													<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
													<span class="svg-icon svg-icon-1 ms-2 me-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
													<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
													<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
													</svg>
													</span>
													<!--end::Svg Icon-->          
												</div>
												<button id="show3" class="btn btn-sm btn-primary">Show</button>
												<button id="hide3" class="btn btn-sm btn-primary" style="display:none;">Hide</button>
												<!--end::Daterangepicker-->
											</div>
											<!--end::Toolbar-->
										</div>
										<div class="table-responsive">
											<table class="table align-middle gs-0 gy-4"> 
												<tbody class="text-gray-600 fw-semibold">
													<tr>
														<td>
														<div id="card_kunjungan" class="card-body">
															<canvas id="kunjungan" width="600" height="200"></canvas><br>
														</div>
													</tr>
												</tbody>
											</table>
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Products Documentations-->
								</div>
								<!--end::Content container-->
							<!--end::Content container-->
						</div>
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
	<!-- Show hide grafik Pendapatan -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$("#card_pendapatan").hide(); // menyembunyikan grafik secara default
			$("#show").click(function(){
				$("#card_pendapatan").show(); // menampilkan grafik saat tombol "show" diklik
				$(this).hide(); // menyembunyikan tombol "show"
				$("#hide").show(); // menampilkan tombol "hide"
			});
			$("#hide").click(function(){
				$("#card_pendapatan").hide(); // menyembunyikan grafik saat tombol "hide" diklik
				$(this).hide(); // menyembunyikan tombol "hide"
				$("#show").show(); // menampilkan tombol "show"
			});
		});
	</script>

	<!-- Show hide grafik Laba Rugi -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$("#card_labarugi").hide(); // menyembunyikan grafik secara default
			$("#show1").click(function(){
				$("#card_labarugi").show(); // menampilkan grafik saat tombol "show" diklik
				$(this).hide(); // menyembunyikan tombol "show"
				$("#hide1").show(); // menampilkan tombol "hide"
			});
			$("#hide1").click(function(){
				$("#card_labarugi").hide(); // menyembunyikan grafik saat tombol "hide" diklik
				$(this).hide(); // menyembunyikan tombol "hide"
				$("#show1").show(); // menampilkan tombol "show"
			});
		});
	</script>

	<!-- Show hide grafik Biaya -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$("#card_beban").hide(); // menyembunyikan grafik secara default
			$("#show2").click(function(){
				$("#card_beban").show(); // menampilkan grafik saat tombol "show" diklik
				$(this).hide(); // menyembunyikan tombol "show"
				$("#hide2").show(); // menampilkan tombol "hide"
			});
			$("#hide2").click(function(){
				$("#card_beban").hide(); // menyembunyikan grafik saat tombol "hide" diklik
				$(this).hide(); // menyembunyikan tombol "hide"
				$("#show2").show(); // menampilkan tombol "show"
			});
		});
	</script>

	<!-- Show hide grafik Kunjungan -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$("#card_kunjungan").hide(); // menyembunyikan grafik secara default
			$("#show3").click(function(){
				$("#card_kunjungan").show(); // menampilkan grafik saat tombol "show" diklik
				$(this).hide(); // menyembunyikan tombol "show"
				$("#hide3").show(); // menampilkan tombol "hide"
			});
			$("#hide3").click(function(){
				$("#card_kunjungan").hide(); // menyembunyikan grafik saat tombol "hide" diklik
				$(this).hide(); // menyembunyikan tombol "hide"
				$("#show3").show(); // menampilkan tombol "show"
			});
		});
	</script>
	
	<!-- Isi Grafik Pendapatan -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$.ajax({
			url: '<?php echo site_url('SuperUser/Home/pendapatan') ?>',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				var ctx = document.getElementById('pendapatan').getContext('2d');
				var pendapatan = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ['KP', 'RSG', 'RST', 'RSP', 'RSMU', 'URJ'],
						datasets: [{
							label: 'Revenue',
							data: data.realisasi,
							backgroundColor: 'rgba(0, 0, 128, 0.2)',
							borderColor: 'rgba(0, 0, 128, 1)',
							borderWidth: 2
						}, {
							label: 'Potensi',
							data: data.potensi,
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							borderColor: 'rgba(255, 0, 0, 1)',
							borderWidth: 2
						}, {
							label: 'Target',
							data: data.target,
							backgroundColor: 'rgba(50, 205, 50, 0.2)',
							borderColor: 'rgba(50, 205, 50, 1)',
							borderWidth: 3
						}]
					},
					options: {
						scales: {
							x: {
							grid: {
								display: false
							}
							},
							y: {
							grid: {
								display: false
							},
							ticks: {
								callback: function(value, index, values) {
								return 'Rp. ' + (value / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
								}
							}
							}
						},
						plugins: {
							legend: {
							position: 'bottom'
							},
							tooltip: {
								callbacks: {
									label: function(context) {
										var label = context.dataset.label || '';
										if (label) {
										label += ': ';
										}
										label += 'Rp. ' + (context.parsed.y / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0}) + ' ( jt )';
										return label;
									}
								}
							}
						},
						responsive: true
					}
				});
			},
			error: function(xhr, status, error) {
				// Tangani kesalahan jika terjadi
				console.log('Error: ' + error);
			}
			});
		});
	</script>

	<!-- Isi Grafik Laba - Rugi -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
    <script>
		$(document).ready(function(){
			$.ajax({
			url: '<?php echo site_url('SuperUser/Home/labarugi') ?>',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				var ctx = document.getElementById('labarugi').getContext('2d');
				var labarugi = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ['KP', 'RSG', 'RST', 'RSP', 'RSMU', 'URJ'],
						datasets: [{
							label: 'Revenue',
							data: data.realisasi1,
							backgroundColor: 'rgba(0, 0, 128, 0.2)',
							borderColor: 'rgba(0, 0, 128, 1)',
							borderWidth: 2
						}, {
							label: 'Potensi',
							data: data.potensi1,
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							borderColor: 'rgba(255, 0, 0, 1)',
							borderWidth: 2
						}, {
							label: 'Target',
							data: data.target1,
							backgroundColor: 'rgba(50, 205, 50, 0.2)',
							borderColor: 'rgba(50, 205, 50, 1)',
							borderWidth: 3
						}]
					},
					options: {
						scales: {
							x: {
							grid: {
								display: false
							}
							},
							y: {
							grid: {
								display: false
							},
							ticks: {
								callback: function(value, index, values) {
								return 'Rp. ' + (value / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
								}
							}
							}
						},
						plugins: {
							legend: {
							position: 'bottom'
							},
							tooltip: {
								callbacks: {
									label: function(context) {
										var label = context.dataset.label || '';
										if (label) {
										label += ': ';
										}
										label += 'Rp. ' + (context.parsed.y / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0}) + ' ( jt )';
										return label;
									}
								}
							}
						},
						responsive: true
					}
				});
			},
			error: function(xhr, status, error) {
				// Tangani kesalahan jika terjadi
				console.log('Error: ' + error);
			}
			});
		});
	</script>

	<!-- Isi Grafik Biaya -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
    <script>
		$(document).ready(function(){
			$.ajax({
			url: '<?php echo site_url('SuperUser/Home/beban') ?>',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				var ctx = document.getElementById('beban').getContext('2d');
				var beban = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ['KP', 'RSG', 'RST', 'RSP', 'RSMU', 'URJ'],
						datasets: [{
							label: 'Revenue',
							data: data.realisasi2,
							backgroundColor: 'rgba(0, 0, 128, 0.2)',
							borderColor: 'rgba(0, 0, 128, 1)',
							borderWidth: 2
						}, {
							label: 'Potensi',
							data: data.potensi2,
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							borderColor: 'rgba(255, 0, 0, 1)',
							borderWidth: 2
						}, {
							label: 'Target',
							data: data.target2,
							backgroundColor: 'rgba(50, 205, 50, 0.2)',
							borderColor: 'rgba(50, 205, 50, 1)',
							borderWidth: 3
						}]
					},
					options: {
						scales: {
							x: {
							grid: {
								display: false
							}
							},
							y: {
							grid: {
								display: false
							},
							ticks: {
								callback: function(value, index, values) {
								return 'Rp. ' + (value / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
								}
							}
							}
						},
						plugins: {
							legend: {
							position: 'bottom'
							},
							tooltip: {
								callbacks: {
									label: function(context) {
										var label = context.dataset.label || '';
										if (label) {
										label += ': ';
										}
										label += 'Rp. ' + (context.parsed.y / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0}) + ' ( jt )';
										return label;
									}
								}
							}
						},
						responsive: true
					}
				});
			},
			error: function(xhr, status, error) {
				// Tangani kesalahan jika terjadi
				console.log('Error: ' + error);
			}
			});
		});
	</script>

	<!-- Isi Grafik Kunjungan -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
    <script>
		$(document).ready(function(){
			$.ajax({
			url: '<?php echo site_url('SuperUser/Home/kunjungan') ?>',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				var ctx = document.getElementById('kunjungan').getContext('2d');
				var kunjungan = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ['RSG', 'RSMU', 'RSP', 'RST'],
						datasets: [{
							label: 'Realisasi',
							data: data.realisasi3,
							backgroundColor: 'rgba(0, 0, 128, 0.2)',
							borderColor: 'rgba(0, 0, 128, 1)',
							borderWidth: 2
						}, {
							label: 'Potensi',
							data: data.potensi3,
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							borderColor: 'rgba(255, 0, 0, 1)',
							borderWidth: 2
						}, {
							label: 'Target',
							data: data.target3,
							backgroundColor: 'rgba(50, 205, 50, 0.2)',
							borderColor: 'rgba(50, 205, 50, 1)',
							borderWidth: 3
						}]
					},
					options: {
						scales: {
							x: {
							grid: {
								display: false
							}
							},
							y: {
							grid: {
								display: false
							},
							ticks: {
								callback: function(value, index, values) {
									return (value).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
								}
							}
							}
						},
						plugins: {
							legend: {
							position: 'bottom'
							},
							tooltip: {
								callbacks: {
									label: function(context) {
										var label = context.dataset.label || '';
										if (label) {
										label += ': ';
										}
										label += (context.parsed.y).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
										return label;
									}
								}
							}
						},
						responsive: true
					}
				});
			},
			error: function(xhr, status, error) {
				// Tangani kesalahan jika terjadi
				console.log('Error: ' + error);
			}
			});
		});
    </script>

</body>
<!--end::Body-->

</html>