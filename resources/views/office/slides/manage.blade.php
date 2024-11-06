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
                    Loan Details
                </h1>
                <!--end::Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/home" class="text-muted text-hover-primary">
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
                        <a href="{{route('applications')}}" class="text-muted text-hover-primary">
                            Loans </a>
                    </li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">


                @include('office.includes.customer_sidebar')

                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_tab">Loan Overview</a>
                        </li>
                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_events_and_logs_tab">Loan Details</a>
                        </li>
                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#kt_customer_view_overview_statements">Payments</a>
                        </li>
                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <li class="nav-item ms-auto">
                            <!--begin::Action menu-->
                            <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                                data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                Actions
                                <i class="ki-duotone ki-down fs-2 me-0"></i> </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">
                                        Loan Actions
                                    </div>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                @if($loan->approved)
                                    <div class="menu-item px-5">
                                        <a class="menu-link text-success flex-stack px-5">
                                            Add Payment
                                            <span class="ms-2" data-bs-toggle="tooltip" title="This action will approve this Loan">
                                            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                        </a>
                                    </div>
                                @else
                                    <div class="menu-item px-5">
                                        <a href="{{route('loan.approve',$loan->id)}}" class="menu-link text-success flex-stack px-5">
                                            Approve Loan
                                            <span class="ms-2" data-bs-toggle="tooltip" title="This action will approve this Loan">
                                            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                        </a>
                                    </div>
                                @endif

                                <!--end::Menu item-->


                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="#" class="menu-link text-danger px-5">
                                        Reject Loan
                                    </a>
                                </div>
                                <!--end::Menu item-->


                                <!--begin::Menu separator-->
                                <div class="separator my-3"></div>
                                <!--end::Menu separator-->

                            </div>
                            <!--end::Menu-->
                            <!--end::Menu-->
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->

                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Loan Details</h2>
                                    </div>
                                    <!--end::Card title-->

                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        @if($loan->status === 1)
                                            <button type="button" class="btn btn-sm btn-flex btn-light-success" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                                                Make Payment
                                            </button>
                                        @elseif($loan->status === 0)
                                            <button type="button" class="btn btn-sm btn-flex btn-light-warning" disabled>
                                                Waiting Approval
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-flex btn-light-primary" disabled>
                                                Loan Paid
                                            </button>
                                        @endif
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <div class="col-xl-12">
                                        <!--begin::Charts Widget 2-->
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold fs-3 mb-1">Loan Progress</span>

                                                    <span class="text-muted fw-semibold fs-7">{{count($loan->loan_installments)}} Installment</span>
                                                </h3>

                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <!--begin::Chart-->
                                                <div id="felix_loan_chart" style="height: 350px"></div>
                                                <!--end::Chart-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Charts Widget 2-->
                                    </div>

                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2 class="fw-bold">Loan Requested</h2>
                                    </div>
                                    <!--end::Card title-->

                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_adjust_balance">
                                            <i class="ki-duotone ki-pencil fs-3"><span class="path1"></span>
                                                <span class="path2"></span></i>
                                            Adjust Loan
                                        </a>
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="fw-bold fs-2">
                                        {{number_format($loan->amount)}} <span class="text-muted fs-4 fw-semibold">TZS</span>
                                        <div class="fs-7 fw-normal text-muted">Balance will increase the amount due on
                                            the customer's next invoice.</div>
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">

                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Requested Loan</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <!--begin::Card body-->
                        <div class="card-body p-10">
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <!--begin::Label-->
                                <label class="form-label fw-bold fs-6 text-gray-700">Loan Details</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed mb-5"></div>
                            <!--end::Separator-->

                            <!--begin::Input group-->
                            <div class="mb-8">
                                <!--begin::Option-->
                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Loan Amount
                                    </span>
                                    <span id="c_loan">{{number_format($loan->amount)}} TZS</span>
                                </label>
                                <!--end::Option-->

                                <!--begin::Option-->
                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Tenure
                                    </span>
                                    <span id="c_loan">{{number_format($loan->tenure)}} TZS</span>
                                </label>
                                <!--end::Option-->

                                <!--begin::Option-->
                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Loan Period
                                    </span>
                                    <span id="c_period">{{$loan->duration}} Days</span>
                                </label>
                                <!--end::Option-->

                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Installments
                                    </span>
                                    <span id="c_plan">{{$loan->installments}}</span>
                                </label>

                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Date Approved
                                    </span>
                                    @isset($loan->approved_date)
                                        <span id="c_plan">{{date('d M Y',strtotime($loan->approved_date))}}</span>
                                    @else
                                        <span id="c_plan">Not Approved</span>
                                    @endisset
                                </label>

                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Approved By
                                    </span>
                                    @isset($loan->approved_by)
                                        <span id="c_plan">{{$loan->approver->first_name}} {{$loan->approver->last_name}}</span>
                                    @else
                                        <span id="c_plan">Not Approved</span>
                                    @endisset
                                </label>

                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Paid Amount
                                    </span>
                                    <span id="c_plan">{{number_format($loan->loan_installments->sum('paid_amount'))}}</span>
                                </label>

                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Unpaid Amount
                                    </span>
                                    <span id="c_plan">{{number_format($loan->loan_installments->sum('amount') - $loan->loan_installments->sum('paid_amount'))}}</span>
                                </label>

                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Next Payment Date
                                    </span>
                                    @isset($loan->loan_installments->where('status',0)->first()->due_date)
                                        <span id="c_plan">{{date('d M Y',strtotime($loan->loan_installments->where('status',0)->first()->due_date))}}</span>
                                    @endisset
                                </label>

                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                    <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                        Loan Due Date
                                    </span>
                                    <span id="c_plan">{{date('d M Y',strtotime($loan->due_date))}}</span>
                                </label>



                            </div>
                            <!--end::Input group-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed mb-8"></div>
                            <!--end::Separator-->

                        </div>
                        <!--end::Card body-->
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">

                            <!--begin::Statements-->
                            <div class="card mb-6 mb-xl-9">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <!--begin::Title-->
                                    <div class="card-title">
                                        <h2>Payments History</h2>
                                    </div>
                                    <!--end::Title-->

                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Tab nav-->
                                        <ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs nav-line-tabs-2x border-transparent"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary active" data-bs-toggle="tab"
                                                    role="tab" href="#kt_customer_view_statement_1">
                                                    This Loan
                                                </a>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab"
                                                    role="tab" href="#kt_customer_view_statement_2">
                                                    All Payments
                                                </a>
                                            </li>

                                        </ul>
                                        <!--end::Tab nav-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->

                                <!--begin::Card body-->
                                <div class="card-body pb-5">
                                    <!--begin::Tab Content-->
                                    <div id="kt_customer_view_statement_tab_content" class="tab-content">
                                        <!--begin::Tab panel-->
                                        <div id="kt_customer_view_statement_1" class="py-0 tab-pane fade show active"
                                            role="tabpanel">
                                            <!--begin::Table-->
                                            <table id="kt_customer_view_statement_table_1"
                                                class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4">
                                                <thead class="border-bottom border-gray-200">
                                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="w-150px">Payment Time</th>
                                                        <th class="w-100px">Payment Method</th>
                                                        <th class="w-150px">Transaction Details</th>
                                                        <th class="w-150px">Amount</th>
                                                        <th class="w-150px">Loan Balance</th>
                                                        <th class="w-70px text-end pe-7">Invoice</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($loan->payments->reverse() as $payment)
                                                    <tr>
                                                        <td>{{date('H:i M d, Y',strtotime($payment->created_at))}}</td>
                                                        <td>{{$payment->payment_method}}</td>
                                                        <td>{{$payment->transaction_id}}</td>
                                                        <td class="text-success" style="text-align: right">{{number_format($payment->amount)}} TZS</td>
                                                        <td class="text-danger" style="text-align: right">{{number_format($payment->loan_balance)}} TZS</td>
                                                        <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tab panel-->
                                        <!--begin::Tab panel-->
                                        <div id="kt_customer_view_statement_2" class="py-0 tab-pane fade "
                                            role="tabpanel">
                                            <!--begin::Table-->
                                            <table id="kt_customer_view_statement_table_2"
                                                   class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4">
                                                <thead class="border-bottom border-gray-200">
                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-150px">Payment Time</th>
                                                    <th class="w-100px">Payment Method</th>
                                                    <th class="w-150px">Transaction Details</th>
                                                    <th class="w-150px">Amount</th>
                                                    <th class="w-150px">Loan Balance</th>
                                                    <th class="w-70px text-end pe-7">Invoice</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($loan->user->payments->reverse() as $payment)
                                                    <tr>
                                                        <td>{{date('H:i M d, Y',strtotime($payment->created_at))}}</td>
                                                        <td>{{$payment->payment_method}}</td>
                                                        <td>{{$payment->transaction_id}}</td>
                                                        <td class="text-success" style="text-align: right">{{number_format($payment->amount)}} TZS</td>
                                                        <td class="text-danger" style="text-align: right">{{number_format($payment->loan_balance)}} TZS</td>
                                                        <td class="text-end"><a href="{{route('loan.details',$payment->loan->id)}}" class="btn btn-sm btn-light btn-active-light-primary">Go To Loan</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tab panel-->

                                    </div>
                                    <!--end::Tab Content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Statements-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->

            @include('office.loan.includes.modals')

            <!--begin::Modal - Adjust Balance-->
            <div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Adjust Balance</h2>
                            <!--end::Modal title-->

                            <!--begin::Close-->
                            <div id="kt_modal_adjust_balance_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->

                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <!--begin::Balance preview-->
                            <div class="d-flex text-center mb-9">
                                <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                    <div class="fs-6 fw-semibold mb-2 text-muted">Current Balance</div>
                                    <div class="fs-2 fw-bold" kt-modal-adjust-balance="current_balance">US$ 32,487.57
                                    </div>
                                </div>
                                <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                    <div class="fs-6 fw-semibold mb-2 text-muted">
                                        New Balance

                                        <span class="ms-2" data-bs-toggle="tooltip"
                                            title="Enter an amount to preview the new balance.">
                                            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span></i> </span>
                                    </div>
                                    <div class="fs-2 fw-bold" kt-modal-adjust-balance="new_balance">--</div>
                                </div>
                            </div>
                            <!--end::Balance preview-->

                            <!--begin::Form-->
                            <form id="kt_modal_adjust_balance_form" class="form" action="#">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold form-label mb-2">Adjustment type</label>
                                    <!--end::Label-->

                                    <!--begin::Dropdown-->
                                    <select class="form-select form-select-solid fw-bold" name="adjustment"
                                        aria-label="Select an option" data-control="select2"
                                        data-dropdown-parent="#kt_modal_adjust_balance"
                                        data-placeholder="Select an option" data-hide-search="true">
                                        <option></option>
                                        <option value="1">Credit</option>
                                        <option value="2">Debit</option>
                                    </select>
                                    <!--end::Dropdown-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold form-label mb-2">Amount</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input id="kt_modal_inputmask" type="text" class="form-control form-control-solid"
                                        name="amount" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold form-label mb-2">Add adjustment note</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Disclaimer-->
                                <div class="fs-7 text-muted mb-15">
                                    Please be aware that all manual balance changes will be audited by the financial
                                    team every fortnight. Please maintain your invoices and receipts until then. Thank
                                    you.
                                </div>
                                <!--end::Disclaimer-->

                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="reset" id="kt_modal_adjust_balance_cancel" class="btn btn-light me-3">
                                        Discard
                                    </button>

                                    <button type="submit" id="kt_modal_adjust_balance_submit" class="btn btn-primary">
                                        <span class="indicator-label">
                                            Submit
                                        </span>
                                        <span class="indicator-progress">
                                            Please wait... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - New Card--><!--begin::Modal - New Address-->
            <div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <form class="form" action="#" id="kt_modal_update_customer_form">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_update_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Update Customer</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div id="kt_modal_update_customer_close"
                                    class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                                    data-kt-scroll-wrappers="#kt_modal_update_customer_scroll"
                                    data-kt-scroll-offset="300px">
                                    <!--begin::Notice-->

                                    <!--begin::Notice-->
                                    <div
                                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-information fs-2tx text-primary me-4"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span></i> <!--end::Icon-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 ">
                                            <!--begin::Content-->
                                            <div class=" fw-semibold">

                                                <div class="fs-6 text-gray-700 ">Updating customer details will receive
                                                    a privacy audit. For more info, please read our <a href="#">Privacy
                                                        Policy</a></div>
                                            </div>
                                            <!--end::Content-->

                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                    <!--end::Notice-->

                                    <!--begin::User toggle-->
                                    <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                                        href="#kt_modal_update_customer_user_info" role="button" aria-expanded="false"
                                        aria-controls="kt_modal_update_customer_user_info">
                                        User Information
                                        <span class="ms-2 rotate-180">
                                            <i class="ki-duotone ki-down fs-3"></i> </span>
                                    </div>
                                    <!--end::User toggle-->

                                    <!--begin::User form-->
                                    <div id="kt_modal_update_customer_user_info" class="collapse show">
                                        <!--begin::Input group-->
                                        <div class="mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span>Update Avatar</span>

                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Allowed file types: png, jpg, jpeg.">
                                                    <i class="ki-duotone ki-information fs-7"><span
                                                            class="path1"></span><span class="path2"></span><span
                                                            class="path3"></span></i> </span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Image input wrapper-->
                                            <div class="mt-1">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('../../assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url(../../assets/media/avatars/300-1.jpg)">
                                                    </div>
                                                    <!--end::Preview existing avatar-->

                                                    <!--begin::Edit-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="ki-duotone ki-pencil fs-7"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Edit-->

                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="ki-duotone ki-cross fs-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </span>
                                                    <!--end::Cancel-->

                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="ki-duotone ki-cross fs-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                            </div>
                                            <!--end::Image input wrapper-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Name</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="name" value="Sean Bean" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span>Email</span>

                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Email address must be active">
                                                    <i class="ki-duotone ki-information fs-7"><span
                                                            class="path1"></span><span class="path2"></span><span
                                                            class="path3"></span></i> </span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="email" class="form-control form-control-solid" placeholder=""
                                                name="email" value="sean@dellito.com" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Description</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="description" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::User form-->

                                    <!--begin::Billing toggle-->
                                    <div class="fw-bold fs-3 rotate collapsible collapsed mb-7"
                                        data-bs-toggle="collapse" href="#kt_modal_update_customer_billing_info"
                                        role="button" aria-expanded="false"
                                        aria-controls="kt_modal_update_customer_billing_info">
                                        Shipping Information
                                        <span class="ms-2 rotate-180">
                                            <i class="ki-duotone ki-down fs-3"></i> </span>
                                    </div>
                                    <!--end::Billing toggle-->

                                    <!--begin::Billing form-->
                                    <div id="kt_modal_update_customer_billing_info" class="collapse">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Address Line 1</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder=""
                                                name="address1" value="101, Collins Street" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Address Line 2</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder=""
                                                name="address2" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Town</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="" name="city"
                                                value="Melbourne" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-7">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">State / Province</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="state" value="Victoria" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">Post Code</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="postcode" value="3000" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span>Country</span>

                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Country of origination">
                                                    <i class="ki-duotone ki-information fs-7"><span
                                                            class="path1"></span><span class="path2"></span><span
                                                            class="path3"></span></i> </span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <select name="country" aria-label="Select a Country" data-control="select2"
                                                data-placeholder="Select a Country..."
                                                data-dropdown-parent="#kt_modal_update_customer"
                                                class="form-select form-select-solid fw-bold">
                                                <option value="">Select a Country...</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia, Plurinational State of</option>
                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Côte d'Ivoire</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">Curaçao</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="HT">Haiti</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran, Islamic Republic of</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PS">Palestinian Territory, Occupied</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten (Dutch part)</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="KR">South Korea</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syrian Arab Republic</option>
                                                <option value="TW">Taiwan, Province of China</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                <option value="VN">Vietnam</option>
                                                <option value="VI">Virgin Islands</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack">
                                                <!--begin::Label-->
                                                <div class="me-5">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold">Use as a billing adderess?</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <div class="fs-7 fw-semibold text-muted">If you need more info,
                                                        please check budget planning</div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Label-->

                                                <!--begin::Switch-->
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input" name="billing" type="checkbox"
                                                        value="1" id="kt_modal_update_customer_billing"
                                                        checked="checked" />
                                                    <!--end::Input-->

                                                    <!--begin::Label-->
                                                    <span class="form-check-label fw-semibold text-muted"
                                                        for="kt_modal_update_customer_billing">
                                                        Yes
                                                    </span>
                                                    <!--end::Label-->
                                                </label>
                                                <!--end::Switch-->
                                            </div>
                                            <!--begin::Wrapper-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Billing form-->
                                </div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Modal body-->

                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-light me-3">
                                    Discard
                                </button>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" id="kt_modal_update_customer_submit" class="btn btn-primary">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Modal - New Address--><!--begin::Modal - New Card-->
            <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2>Add New Card</h2>
                            <!--end::Modal title-->

                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->

                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <!--begin::Form-->
                            <form id="kt_modal_new_card_form" class="form" action="#">
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Name On Card</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Specify a card holder's name">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i></span> </label>
                                    <!--end::Label-->

                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="card_name" value="Max Doe" />
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>
                                    <!--end::Label-->

                                    <!--begin::Input wrapper-->
                                    <div class="position-relative">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Enter card number" name="card_number"
                                            value="4111 1111 1111 1111" />
                                        <!--end::Input-->

                                        <!--begin::Card logos-->
                                        <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                            <img src="/office/media/svg/card-logos/visa.svg" alt=""
                                                class="h-25px" />
                                            <img src="/office/media/svg/card-logos/mastercard.svg" alt=""
                                                class="h-25px" />
                                            <img src="/office/media/svg/card-logos/american-express.svg" alt=""
                                                class="h-25px" />
                                        </div>
                                        <!--end::Card logos-->
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-10">
                                    <!--begin::Col-->
                                    <div class="col-md-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Expiration Date</label>
                                        <!--end::Label-->

                                        <!--begin::Row-->
                                        <div class="row fv-row">
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <select name="card_expiry_month" class="form-select form-select-solid"
                                                    data-control="select2" data-hide-search="true"
                                                    data-placeholder="Month">
                                                    <option></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <select name="card_expiry_year" class="form-select form-select-solid"
                                                    data-control="select2" data-hide-search="true"
                                                    data-placeholder="Year">
                                                    <option></option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                    <option value="2031">2031</option>
                                                    <option value="2032">2032</option>
                                                    <option value="2033">2033</option>
                                                </select>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">CVV</span>


                                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter a card CVV code">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i></span> </label>
                                        <!--end::Label-->

                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" minlength="3"
                                                maxlength="4" placeholder="CVV" name="card_cvv" />
                                            <!--end::Input-->

                                            <!--begin::CVV icon-->
                                            <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                <i class="ki-duotone ki-credit-cart fs-2hx"><span
                                                        class="path1"></span><span class="path2"></span></i>
                                            </div>
                                            <!--end::CVV icon-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="fs-6 fw-semibold form-label">Save Card for further
                                            billing?</label>
                                        <div class="fs-7 fw-semibold text-muted">If you need more info, please check
                                            budget planning</div>
                                    </div>
                                    <!--end::Label-->

                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                        <span class="form-check-label fw-semibold text-muted">
                                            Save Card
                                        </span>
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->


                                <!--begin::Actions-->
                                <div class="text-center pt-15">
                                    <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">
                                        Discard
                                    </button>

                                    <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                        <span class="indicator-label">
                                            Submit
                                        </span>
                                        <span class="indicator-progress">
                                            Please wait... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - New Card--><!--end::Modals-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->
@endsection

@section('page_js')
    <script>
        var initLoanChart = function() {
        var element = document.getElementById("felix_loan_chart");

        if ( !element ) {
            return;
        }

        var chart = {
            self: null,
            rendered: false
        };

        var initChart = function() {
            {{--console.log({{$jj}})--}}

            var height = parseInt(KTUtil.css(element, 'height'));
            var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
            var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
            var baseColor = KTUtil.getCssVariableValue('--bs-warning');
            var secondaryColor = KTUtil.getCssVariableValue('--bs-green');

            var options = {
                series: [{
                    name: 'Amount',
                    data: {{$loan->loan_installments->pluck('amount')}}
                }, {
                    name: 'Paid',
                    data: {{$loan->loan_installments->pluck('paid_amount')}}
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'bar',
                    height: height,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: ['30%'],
                        borderRadius: 4
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories:  {{$jj}},
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    }
                },
                fill: {
                    opacity: 1
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function (val) {
                            return val + " TZS"
                        }
                    }
                },
                colors: [baseColor, secondaryColor],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                }
            };

            chart.self = new ApexCharts(element, options);
            chart.self.render();
            chart.rendered = true;
        }

        // Init chart
        initChart();

        // Update chart on theme mode change
        KTThemeMode.on("kt.thememode.change", function() {
            if (chart.rendered) {
                chart.self.destroy();
            }

            initChart();
        });
    }
    </script>
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="/office/js/custom/apps/chat/chat.js"></script>
    <script src="/office/js/custom/apps/customers/view/add-payment.js"></script>
    <script src="/office/js/custom/apps/customers/view/adjust-balance.js"></script>
    <script src="/office/js/custom/apps/customers/view/invoices.js"></script>
    <script src="/office/js/custom/apps/customers/view/payment-method.js"></script>
    <script src="/office/js/custom/apps/customers/view/payment-table.js"></script>
    <script src="/office/js/custom/apps/customers/view/statement.js"></script>
    <script src="/office/js/custom/apps/customers/update.js"></script>
    <script src="/office/js/widgets.bundle.js"></script>
    <script src="/office/js/custom/widgets.js"></script>
    <script src="/office/js/custom/apps/chat/chat.js"></script>
    <script src="/office/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="/office/js/custom/utilities/modals/create-app.js"></script>
    <script src="/office/js/custom/utilities/modals/new-card.js"></script>
    <script src="/office/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
@endsection
