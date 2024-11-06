@extends('layouts.dash')

@section('content')
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    {{ config('app.name', Lang::get('titles.app'))}}
                </h1>
                <!--end::Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">
                            Home </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        Dashboard</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
{{--                <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"--}}
{{--                    class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary d-flex align-items-center px-4">--}}
{{--                    <!--begin::Display range-->--}}
{{--                    <div class="text-gray-600 fw-bold">--}}
{{--                        Loading date range...--}}
{{--                    </div>--}}
{{--                    <!--end::Display range-->--}}

{{--                    <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0"><span class="path1"></span><span--}}
{{--                            class="path2"></span><span class="path3"></span><span class="path4"></span><span--}}
{{--                            class="path5"></span><span class="path6"></span></i>--}}
{{--                </div>--}}
                <!--end::Daterangepicker-->

                <!--begin::Secondary button-->
                <!--end::Secondary button-->

                <!--begin::Primary button-->
{{--                <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"--}}
{{--                    data-bs-target="#kt_modal_new_target">--}}
{{--                    Add Target --}}
{{--                </a>--}}
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-sm-6 col-xl-4 mb-xl-10">

                    <!--begin::Card widget 2-->
                    <div class="card h-lg-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <!--begin::Icon-->
                            <div class="m-0">
                                <i class="ki-duotone ki-compass fs-2hx text-gray-600"><span class="path1"></span><span
                                        class="path2"></span></i>

                            </div>
                            <!--end::Icon-->

                            <!--begin::Section-->
                            <div class="d-flex flex-column my-7">
                                <!--begin::Number-->
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{count($slides)}}</span>
                                <!--end::Number-->

                                <!--begin::Follower-->
                                <div class="m-0">
                                    <span class="fw-semibold fs-6 text-gray-400">
                                        Active Slides </span>

                                </div>
                                <!--end::Follower-->
                            </div>
                            <!--end::Section-->

                            <!--begin::Badge-->
{{--                            <span class="badge badge-light-success fs-base">--}}
{{--                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span--}}
{{--                                        class="path1"></span><span class="path2"></span></i>--}}

{{--                                2.1%--}}
{{--                            </span>--}}
                            <!--end::Badge-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->


                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-sm-6 col-xl-4 mb-xl-10">

                    <!--begin::Card widget 2-->
                    <div class="card h-lg-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <!--begin::Icon-->
                            <div class="m-0">
                                <i class="ki-duotone ki-chart-simple fs-2hx text-gray-600"><span
                                        class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i>

                            </div>
                            <!--end::Icon-->

                            <!--begin::Section-->
                            <div class="d-flex flex-column my-7">
                                <!--begin::Number-->
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{count($cars)}}</span>
                                <!--end::Number-->

                                <!--begin::Follower-->
                                <div class="m-0">
                                    <span class="fw-semibold fs-6 text-gray-400">
                                        Active Cars </span>

                                </div>
                                <!--end::Follower-->
                            </div>
                            <!--end::Section-->


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->


                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-sm-6 col-xl-4 mb-xl-10">

                    <!--begin::Card widget 2-->
                    <div class="card h-lg-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <!--begin::Icon-->
                            <div class="m-0">
                                <i class="ki-duotone ki-abstract-39 fs-2hx text-gray-600"><span
                                        class="path1"></span><span class="path2"></span></i>

                            </div>
                            <!--end::Icon-->

                            <!--begin::Section-->
                            <div class="d-flex flex-column my-7">
                                <!--begin::Number-->
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{count($categories)}}</span>
                                <!--end::Number-->

                                <!--begin::Follower-->
                                <div class="m-0">
                                    <span class="fw-semibold fs-6 text-gray-400">
                                        Active Categories </span>

                                </div>
                                <!--end::Follower-->
                            </div>
                            <!--end::Section-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->


                </div>
                <!--end::Col-->


            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->
@endsection

@section('page_js')
<!--begin::Vendors Javascript(used for this page only)-->
<script src="/office/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="/office/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
<script src="/office/cdn/lib/5/index.js"></script>
<script src="/office/cdn/lib/5/xy.js"></script>
<script src="/office/cdn/lib/5/percent.js"></script>
<script src="/office/cdn/lib/5/radar.js"></script>
<script src="/office/cdn/lib/5/themes/Animated.js"></script>
<script src="/office/cdn/lib/5/map.js"></script>
<script src="/office/cdn/lib/5/geodata/worldLow.js"></script>
<script src="/office/cdn/lib/5/geodata/continentsLow.js"></script>
<script src="/office/cdn/lib/5/geodata/usaLow.js"></script>
<script src="/office/cdn/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="/office/cdn/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(used for this page only)-->
<script src="/office/js/widgets.bundle.js"></script>
<script src="/office/js/custom/widgets.js"></script>
<script src="/office/js/custom/apps/chat/chat.js"></script>
<script src="/office/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="/office/js/custom/utilities/modals/new-target.js"></script>
<script src="/office/js/custom/utilities/modals/new-address.js"></script>
<script src="/office/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
@endsection
