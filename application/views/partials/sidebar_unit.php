<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="#">
            <img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/Dash.png"
                class="h-80px text-center app-sidebar-logo-default"/>
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <a href="#">
            <img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/nmu-bw.png"
                class="h-100px app-sidebar-logo-default" />
        </a>
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
            data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="<?php echo site_url('Unit/Home') ?>">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                            fill="currentColor" />
                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                            fill="currentColor" />
                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Dashboards</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Kinerja</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("tkok1") == "1" | $this->session->userdata("tkok2") == "1" | $this->session->userdata("tkok3") == "1" | $this->session->userdata("tkok4") == "1" | $this->session->userdata("tkok5") == "1" | $this->session->userdata("tkoksk") == "1" | $this->session->userdata("tkoktt") == "1" | $this->session->userdata("tkokhp") == "1" | $this->session->userdata("tkokbor") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 7H2V11H22V7Z" fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">Kinerja Operasional</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkok1") == "1" | $this->session->userdata("tkok2") == "1" | $this->session->userdata("tkok3") == "1" | $this->session->userdata("tkok4") == "1" | $this->session->userdata("tkok5") == "1"): ?>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Kunjungan</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok3") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_RJ') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kunjungan Rawat Jalan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok4") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_RI') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kunjungan Rawat Inap</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok5") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_jangmed') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kegiatan Penunjang Medis</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok1") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_BPJS') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kunjungan BPJS & NON BPJS</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok2") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_persegmen') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kunjungan Per - Segmen</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkoksk") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cSK') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Sensus Kamar</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkoktt") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cTT') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Tempat Tidur</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkokhp") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cHAPER') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">HAPER</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkokbor") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cBOR') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">BOR</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("tkok1") == "1" | $this->session->userdata("tkok2") == "1" | $this->session->userdata("tkok3") == "1" | $this->session->userdata("tkok4") == "1" | $this->session->userdata("tkok5") == "1" | $this->session->userdata("tkoksk") == "1" | $this->session->userdata("tkoktt") == "1" | $this->session->userdata("tkokhp") == "1" | $this->session->userdata("tkokbor") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Chart-bar1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="currentColor" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                                            <rect fill="currentColor" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="currentColor" fill-rule="nonzero"/>
                                            <rect fill="currentColor" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">Grafik Kinerja Operasional</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkok1") == "1" | $this->session->userdata("tkok2") == "1" | $this->session->userdata("tkok3") == "1" | $this->session->userdata("tkok4") == "1" | $this->session->userdata("tkok5") == "1"): ?>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Kunjungan</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok1") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_BPJS/grafik_kunjungan_bpjs') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kunjungan BPJS & NON BPJS</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok2") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_persegmen/grafik_persegmen') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kunjungan Per - Segmen</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok3") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_RJ/grafik_kunjungan_RJ') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kunjungan Rawat Jalan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok4") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_RI/grafik_kunjungan_RI') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kunjungan Rawat Inap</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkok5") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?php echo site_url('Unit/ckunjungan_jangmed/grafik_kunjungan_jangmed') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kegiatan Penunjang Medis</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkoksk") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cSK/grafik_SK') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Sensus Kamar</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkoktt") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cTT/grafik_TT') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Tempat Tidur</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkokhp") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cHAPER/grafik_HAPER') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">HAPER</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkokbor") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cBOR/grafik_BOR') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">BOR</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("tkkp1") == "1" | $this->session->userdata("tkkp2") == "1" | $this->session->userdata("tkkp3") == "1" | $this->session->userdata("tkkb") == "1" | $this->session->userdata("tkklr") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.7 4.19995L4 6.30005V18.8999L8.7 16.8V19L3.1 21.5C2.6 21.7 2 21.4 2 20.8V6C2 5.4 2.3 4.89995 2.9 4.69995L8.7 2.09998V4.19995Z"
                                                fill="currentColor" />
                                            <path
                                                d="M15.3 19.8L20 17.6999V5.09992L15.3 7.19989V4.99994L20.9 2.49994C21.4 2.29994 22 2.59989 22 3.19989V17.9999C22 18.5999 21.7 19.1 21.1 19.3L15.3 21.8998V19.8Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M15.3 7.19995L20 5.09998V17.7L15.3 19.8V7.19995Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M8.70001 4.19995V2L15.4 5V7.19995L8.70001 4.19995ZM8.70001 16.8V19L15.4 22V19.8L8.70001 16.8Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M8.7 16.8L4 18.8999V6.30005L8.7 4.19995V16.8Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">Kinerja Keuangan</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkkp1") == "1" | $this->session->userdata("tkkp2") == "1" | $this->session->userdata("tkkp3") == "1"): ?>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Pendapatan</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkkp1") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/crekap') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Pendapatan BPJS / NON-BPJS</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkkp2") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/cdetail_revenue') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title"> Per-Revenue Stream</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkkp3") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/cdetail_segmen') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Pendapatan Per-Segmen</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkkb") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cbiaya') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Biaya</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkklr") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/claba_rugi') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Laba - Rugi</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("tkkp1") == "1" | $this->session->userdata("tkkp2") == "1" | $this->session->userdata("tkkp3") == "1" | $this->session->userdata("tkkb") == "1" | $this->session->userdata("tkklr") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Chart-bar1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="currentColor" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                                            <rect fill="currentColor" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="currentColor" fill-rule="nonzero"/>
                                            <rect fill="currentColor" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">Grafik Kinerja Keuangan</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkkp1") == "1" | $this->session->userdata("tkkp2") == "1" | $this->session->userdata("tkkp3") == "1"): ?>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Pendapatan</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkkp1") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/crekap/grafik_pendapatan') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Pendapatan BPJS / NON-BPJS</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkkp2") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/cdetail_revenue/grafik_detail_revenue') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title"> Per-Revenue Stream</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("tkkp3") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/cdetail_segmen/grafik_detail_segmen') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Pendapatan Per-Segmen</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkkb") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cbiaya/grafik_biaya') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Biaya</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tkklr") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/claba_rugi/grafik_laba_rugi') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Laba-Rugi</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Telemedicine</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("tid") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?php echo site_url('Unit/cimport_tele') ?>">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
                                        <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/Selected-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="currentcolor" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="currentcolor" fill-rule="nonzero"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </span>
                                <span class="menu-title">Import File CSV</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("ttk") == "1" | $this->session->userdata("ttt") == "1" | $this->session->userdata("ttp") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Layout/Layout-top-panel-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z" fill="currentcolor"/>
                                            <rect fill="currentcolor" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">Tabel Telemedicine</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("ttk") == "1" | $this->session->userdata("ttt") == "1"): ?>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Kunjungan</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("ttk") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/ctele_kunjung') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kunjungan Per-Poli</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("ttt") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/ctele_target') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Target Kunjungan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("ttp") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/ctele_dapat') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Pendapatan</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("gtk") == "1" | $this->session->userdata("gtt") == "1" | $this->session->userdata("gtp") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Chart-bar1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="currentColor" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                                            <rect fill="currentColor" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="currentColor" fill-rule="nonzero"/>
                                            <rect fill="currentColor" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">Grafik Telemedicine</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                                <?php if ($this->session->userdata("gtk") == "1" | $this->session->userdata("gtt") == "1"): ?>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <!--begin:Menu link-->
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Kunjungan</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <!--end:Menu link-->
                                        <!--begin:Menu sub-->
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <!--begin:Menu item-->
                                            <?php if ($this->session->userdata("gtk") == "1"): ?>
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link"
                                                        href="<?php echo site_url('Unit/ctele_kunjung/grafik_kunjungan') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Kunjungan Per-Poli</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            <?php endif; ?>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <?php if ($this->session->userdata("gtt") == "1"): ?>
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link"
                                                        href="<?php echo site_url('Unit/ctele_target/grafik_kunjungan') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Target Kunjungan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            <?php endif; ?>
                                            <!--end:Menu item-->
                                        </div>
                                        <!--end:Menu sub-->
                                    </div>
                                <?php endif; ?>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <?php if ($this->session->userdata("gtp") == "1"): ?>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?php echo site_url('Unit/ctele_dapat/grafik_pendapatan') ?>">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Pendapatan</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                <?php endif; ?>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Akreditasi</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("tmn") == "1" | $this->session->userdata("tmp") == "1" | $this->session->userdata("tmuk") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Chart-bar1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <polygon fill="currentColor" opacity="0.3" points="5 3 19 3 23 8 1 8"/>
                                            <polygon fill="currentColor" points="23 8 12 20 1 8"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">Indikator Mutu</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tmn") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/Blank') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Mutu Nasional</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tmp") == "1"): ?>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Mutu Prioritas</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link"
                                                href="<?php echo site_url('Unit/Blank') ?>">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Prioritas</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tmuk") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/Blank') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Mutu Unit Kerja</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("tdr") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?php echo site_url('Unit/creport') ?>">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"/>
                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"/>
                                                <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </span>
                                <span class="menu-title">Data Report</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">HCIS</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("imp") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?php echo site_url('Unit/Blank') ?>">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
                                        <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Shield-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="currentColor" opacity="0.3"/>
                                            <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="currentColor" opacity="0.3"/>
                                            <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="currentColor" opacity="0.3"/>
                                        </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </span>
                                <span class="menu-title">Master Pekerja</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("tpp") == "1" | $this->session->userdata("gpp") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Chart-bar1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="currentColor" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                                            <rect fill="currentColor" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="currentColor" fill-rule="nonzero"/>
                                            <rect fill="currentColor" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">Report Populasi Pekerja</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tpp") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/Blank') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Tabel Populasi Pekerja</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("gpp") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/Blank') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Grafik Populasi Pekerja</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">HSSE</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("ffl") == "1" | $this->session->userdata("tmh") == "1" | $this->session->userdata("foc") == "1" | $this->session->userdata("fops") == "1" | $this->session->userdata("fon") == "1" | $this->session->userdata("fouac") == "1" | $this->session->userdata("fopd") == "1" ): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Selected-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="currentColor" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Input Form HSSE</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("ffl") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cform_HSSE/limbah') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Limbah</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tmh") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cform_HSSE/man_hour') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Total Man Hour</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("foc") == "1" | $this->session->userdata("fops") == "1" | $this->session->userdata("fon") == "1" | $this->session->userdata("fouac") == "1"): ?>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Kejadian Kecelakaan</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("foc") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/cform_HSSE/clasification') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Clasification</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("fops") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/cform_HSSE/personal_safety') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Personal Safety</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("fon") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/cform_HSSE/nearmiss') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Nearmiss</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <?php if ($this->session->userdata("fouac") == "1"): ?>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link"
                                                    href="<?php echo site_url('Unit/cform_HSSE/unsafe') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Unsafe Action & Unsafe Condition</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        <?php endif; ?>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <?php if ($this->session->userdata("fopd") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/cform_HSSE/property_damage') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Property Damage</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("tpl") == "1" | $this->session->userdata("tpkk") == "1" ): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Layout/Layout-top-panel-1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="currentColor" x="2" y="4" width="19" height="4" rx="1"/>
                                        <path d="M3,10 L6,10 C6.55228475,10 7,10.4477153 7,11 L7,19 C7,19.5522847 6.55228475,20 6,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z M10,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M17,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,11 C16,10.4477153 16.4477153,10 17,10 Z" fill="currentColor" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                                </span>
                            </span>
                            <span class="menu-title">Tabel Performance</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tpl") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/ctabel_HSSE/limbah') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Limbah</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("tpkk") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/ctabel_HSSE/kejadian_kecelakaan') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Kejadian Kecelakaan</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <!-- <?php if ($this->session->userdata("tppd") == "1"): ?>
                                <div class="menu-item"> -->
                                    <!--begin:Menu link-->
                                    <!-- <a class="menu-link" href="<?php echo site_url('Unit/ctabel_HSSE/property_damage') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Property Damage</span>
                                    </a> -->
                                    <!--end:Menu link-->
                                <!-- </div>
                            <?php endif; ?> -->
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("gpl") == "1" | $this->session->userdata("gpkk") == "1" | $this->session->userdata("gppd") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Chart-bar1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="currentColor" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                                            <rect fill="currentColor" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="currentColor" fill-rule="nonzero"/>
                                            <rect fill="currentColor" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">Grafik Performance</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("gpl") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/Blank') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Limbah</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("gpkk") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/Blank') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Kejadian Kecelakaan</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if ($this->session->userdata("gppd") == "1"): ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo site_url('Unit/Blank') ?>">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Property Damage</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Administrator</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--begin:Menu item-->
                    <?php if ($this->session->userdata("tum") == "1"): ?>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?php echo site_url('Unit/cuser') ?>">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">User Management</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    <?php endif; ?>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <?php if ($this->session->userdata("mdr") == "1"): ?>
                    <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="<?php echo site_url('Unit/cmquery') ?>">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"/>
                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"/>
                                                <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                </span>
                                <span class="menu-title">Query Data Report</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                <?php endif; ?>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" target="_blank">
                        
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" target="_blank">
                        
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
            
        </a>
    </div>
    <!--end::Footer-->
</div>
<!--end::Sidebar-->