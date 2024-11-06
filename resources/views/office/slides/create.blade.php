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
                        {{$slide->title}}
                    </h1>
                    <!--end::Title-->

                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('public.home')}}" class="text-muted text-hover-primary">
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
                            Edit Slide
                        </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
                    <div class="m-0">
                        <!--begin::Menu toggle-->
                        <a href="#"
                           class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"
                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-6 text-muted me-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                            Filter
                        </a>
                        <!--end::Menu toggle-->


                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                             id="kt_menu_646218549a7d3">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->

                            <!--begin::Form-->
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Status:</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <div>
                                        <select class="form-select form-select-solid" data-kt-select2="true"
                                                data-placeholder="Select option"
                                                data-dropdown-parent="#kt_menu_646218549a7d3"
                                                data-allow-clear="true">
                                            <option></option>
                                            <option value="1">Approved</option>
                                            <option value="2">Pending</option>
                                            <option value="2">In Process</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Member Type:</label>
                                    <!--end::Label-->

                                    <!--begin::Options-->
                                    <div class="d-flex">
                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" value="1"/>
                                            <span class="form-check-label">
                                            Author
                                        </span>
                                        </label>
                                        <!--end::Options-->

                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2"
                                                   checked="checked"/>
                                            <span class="form-check-label">
                                            Customer
                                        </span>
                                        </label>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Notifications:</label>
                                    <!--end::Label-->

                                    <!--begin::Switch-->
                                    <div
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" name="notifications"
                                               checked/>
                                        <label class="form-check-label">
                                            Enabled
                                        </label>
                                    </div>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                            data-kt-menu-dismiss="true">Reset
                                    </button>

                                    <button type="submit" class="btn btn-sm btn-primary"
                                            data-kt-menu-dismiss="true">Apply
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                    </div>
                    <!--end::Filter menu-->


                    <!--begin::Secondary button-->
                    <!--end::Secondary button-->

                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                       data-bs-target="#kt_modal_create_app">
                        Create </a>
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
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body p-12">
                                <!--begin::Form-->
                                <form action="{{route('admin.slide.update',$slide->id)}}" method="post" enctype="multipart/form-data" id="kt_invoice_form">
                                    @csrf
                                    <!--begin::Wrapper-->
                                    <div class="mb-0">
                                        <!--begin::Row-->
                                        <div class="row gx-10 mb-5">
                                            <!--begin::Col-->
                                            <h3 class=" fw-bold text-gray-700 mb-3">Edit Slide</h3>
                                            <div class="separator separator-dashed"></div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 mb-1">Slide Title*</label>
                                                    <input type="text" value="{{old('title') ?  : $slide->title}}"
                                                           name="title" class="form-control form-control-solid"/>
                                                    @if($errors->has('title'))
                                                        <p style="color: red">{{ $errors->first('title') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 mb-1">Button Text</label>
                                                    <input value="{{old('button_text') ?  : $slide->button_text}}" type="text" name="button_text" class="form-control form-control-solid" placeholder="Learn More"/>
                                                     @if($errors->has('button_text'))
                                                        <p style="color: red">{{ $errors->first('button_text') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 mb-1">Button Url</label>
                                                    <input value="{{old('button_url') ?  : $slide->button_url}}" type="text" name="button_url" class="form-control form-control-solid" placeholder="google.com"/>
                                                     @if($errors->has('button_url'))
                                                        <p style="color: red">{{ $errors->first('button_url') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 mb-1">Video URL</label>
                                                    <input value="{{old('video_url') ?  : $slide->video_url}}" type="text" name="video_url" class="form-control form-control-solid" placeholder="yotube.com"/>
                                                     @if($errors->has('video_url'))
                                                        <p style="color: red">{{ $errors->first('video_url') }}</p>
                                                    @endif
                                                </div>


                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bold text-gray-700">Notes (Optional)</label>

                                            <textarea name="description" class="form-control form-control-solid" rows="3"
                                                      placeholder="Thanks for your business">{{old('description') ?  : $slide->description}}</textarea>
                                        </div>

                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 mb-1">Image</label><br>
                                                    <img src="/{{$slide->image}}" alt="{{$slide->title}}" style="width: 150px"/>
                                                    <input  type="file" name="file" class="form-control form-control-solid" placeholder="yotube.com"/>
                                                     @if($errors->has('file'))
                                                        <p style="color: red">{{ $errors->first('file') }}</p>
                                                    @endif
                                                </div>
                                        <!--end::Notes-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Notes-->

                                    </div>
                                        <button type="submit" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Update</button>
                                    <!--end::Wrapper-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
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
@endsection

@section('page_js')
    <script>
        var format = wNumb({
            //prefix: '$ ',
            decimals: 0,
            thousand: ','
        });

        function getTenure() {
            var loan = document.getElementById('loan')
            var tenure = document.getElementById('tenure')
            var c_loan = document.getElementById('c_loan')
            var c_period = document.getElementById('c_period')
            var c_plan = document.getElementById('c_plan')

            var c_installments = document.getElementById('c_installments')
            var c_per_installments = document.getElementById('c_per_installments')

            var pay_plan = document.getElementsByName('payment_recurrence_days')
            var pay_period = document.getElementsByName('loan_duration_days')

            for (var i = 0, length = pay_plan.length; i < length; i++) {
                if (pay_plan[i].checked) {
                    var plan = pay_plan[i].value;
                    break;
                }
            }

            for (var x = 0, len = pay_period.length; x < len; x++) {
                if (pay_period[x].checked) {
                    var period = pay_period[x].value;
                    break;
                }
            }

            var loan_amount = format.from(loan.value);
            loan_amount = (!loan_amount || loan_amount < 0) ? 0 : loan_amount;

            // console.log(plan)
            c_period.innerText = period + " Days";
            c_plan.innerText = plan + " Days";
            c_installments.innerText = format.to(format.from(period) / format.from(plan));
            c_per_installments.innerText = format.to(loan_amount * 1.25 / (format.from(period) / format.from(plan)));


            loan.value = format.to(loan_amount);
            c_loan.innerText = format.to(loan_amount);
            tenure.value = format.to(loan_amount * .25);
        }

    </script>
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="/office/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="/office/js/custom/apps/contacts/edit-contact.js"></script>
    <script src="/office/js/custom/apps/invoices/create.js"></script>
    <script src="/office/js/widgets.bundle.js"></script>
    <script src="/office/js/custom/widgets.js"></script>
    <script src="/office/js/custom/apps/chat/chat.js"></script>
    <script src="/office/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="/office/js/custom/utilities/modals/create-app.js"></script>
    <script src="/office/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
@endsection
