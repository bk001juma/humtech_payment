<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="/home">
            <img alt="Logo" src="/img/logo-light.png" class="h-25px app-sidebar-logo-default" />

            <img alt="Logo" src="/img/logo-light.png" class="h-20px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->

        <!--begin::Sidebar toggle-->
        <!--begin::Minimized sidebar setup:
        if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
        1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
        2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
        3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
        4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
        }
        -->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate "
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">

            <i class="ki-duotone ki-double-left fs-2 rotate-180"><span class="path1"></span><span
                    class="path2"></span></i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->

    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link-->
                    <a class="menu-link {{Route::is('public.home') ? 'active' : null}}" href="{{route('public.home')}}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-calendar-8 fs-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                    class="path5"></span><span class="path6"></span></i>
                        </span>
                        <span class="menu-title">Dashboard</span></a><!--end:Menu link-->
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Settings</span></div>
                </div>



                @role('admin', true)
                    <div class="menu-item ">
                        <a href="{{route('admin.categories')}}" class="menu-link {{Route::is('admin.categories') ? 'active' : null}}">
                            <span class="menu-icon"><i class="ki-duotone ki-user-edit fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">
                                Car Categories
                            </span>
                        </a>
                    </div>

                    <div class="menu-item ">
                        <a href="{{route('admin.cars')}}" class="menu-link {{Route::is('admin.cars') ? 'active' : null}}">
                            <span class="menu-icon"><i class="ki-duotone ki-user-edit fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">
                                @role('admin',true) All @else My @endrole Cars
                            </span>
                        </a>
                    </div>

                    <div class="menu-item ">
                        <a href="{{route('admin.slides')}}" class="menu-link {{Route::is('admin.slides') ? 'active' : null}}">
                            <span class="menu-icon"><i class="ki-duotone ki-user-edit fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">
                                Home Slides
                            </span>
                        </a>
                    </div>
                @endrole

                <div class="menu-item ">
                    <a href="{{route('admin.cars.supplies')}}" class="menu-link {{Route::is('admin.cars.supplies') ? 'active' : null}}">
                        <span class="menu-icon"><i class="ki-duotone ki-user-edit fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">
                            Supplied Cars
                        </span>
                    </a>
                </div>

                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
<!--end::Sidebar-->
