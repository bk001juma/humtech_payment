@extends('layouts.papi_pages')

@section('page_css')
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/owlcarousel.css"/>

    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/datatables.css">
@endsection

@section('template_title')
    Disbursements Requests
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <h2>Disbursements Requests</h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="iconly-Home icli svg-color"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Disbursements Requests</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div>
                <div class="row product-page-main p-0">
                    <div class="row container-fluid dashboard-3">
                        <div class="col-sm-6 col-xl-3 box-col-6">
                            <div class="card graphic-design overflow-hidden">
                                <div class="card-header card-no-border pb-0"
                                     style="background-color: rgba(48, 142, 135, 0.2)">
                                    <div class="header-top">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-grow-1">
                                                <h5>Total Collections</h5>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body pb-10">
                                    <ul>
                                        <li><i class="iconly-Document icli me-1"></i>
                                            <h5>10 Transactions</h5>
                                        </li>
                                        <li><i class="iconly-Wallet icli me-1"></i>
                                            <h5>12,000,000 TZS</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 box-col-6">
                            <div class="card graphic-design overflow-hidden">
                                <div class="card-header card-no-border pb-0"
                                     style="background-color: rgba(48, 142, 135, 0.2)">
                                    <div class="header-top">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-grow-1">
                                                <h5>Total Disbursements</h5>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pb-10">
                                    <ul>
                                        <li><i class="iconly-Document icli me-1"></i>
                                            <h5>10 Transactions</h5>
                                        </li>
                                        <li><i class="iconly-Wallet icli me-1"></i>
                                            <h5>12,000,000 TZS</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 box-col-6">
                            <div class="card graphic-design overflow-hidden">
                                <div class="card-header card-no-border pb-0"
                                     style="background-color: rgba(48, 142, 135, 0.2)">
                                    <div class="header-top">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-grow-1">
                                                <h5>Total Requests</h5>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body pb-10">
                                    <ul>
                                        <li><i class="iconly-Document icli me-1"></i>
                                            <h5>10 Transactions</h5>
                                        </li>
                                        <li><i class="iconly-Wallet icli me-1"></i>
                                            <h5>12,000,000 TZS</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 box-col-6">
                            <div class="card graphic-design overflow-hidden">
                                <div class="card-header card-no-border pb-0"
                                     style="background-color: rgba(48, 142, 135, 0.2)">
                                    <div class="header-top">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-grow-1">
                                                <h5>Total Transfer</h5>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body pb-10">
                                    <ul>
                                        <li><i class="iconly-Document icli me-1"></i>
                                            <h5>10 Transactions</h5>
                                        </li>
                                        <li><i class="iconly-Wallet icli me-1"></i>
                                            <h5>12,000,000 TZS</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="row product-page-main">
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs border-tab nav-primary mb-0" id="top-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                           href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">
                                            Requests
                                        </a>
                                        <div class="material-border"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="brand-top-tab" data-bs-toggle="tab" href="#top-brand" role="tab" aria-controls="top-brand" aria-selected="true">
                                            Transfers
                                        </a>
                                        <div class="material-border"></div>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#bulk_pay" role="tab" aria-controls="bulk_pay" aria-selected="true">
                                            Bulk Payments
                                        </a>
                                        <div class="material-border"></div>
                                    </li>

                                </ul>

                                <div class="tab-content" id="top-tabContent">

                                    <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">

                                        @include('papi.business.disbursements_tables.all_dis')

                                    </div>
                                    <div class="tab-pane fade" id="top-brand" role="tabpanel" aria-labelledby="brand-top-tab">

                                        @include('papi.business.disbursements_tables.transfers')
                                    </div>

                                    {{--                                    Requests--}}
                                    <div class="tab-pane fade" id="top-contact" role="tabpanel"
                                         aria-labelledby="contact-top-tab">

                                        <div class="card">
                                            <div class="card-header pb-0 card-no-border">
                                                <h2>{{ config('app.name', 'POS') }} - Disbursements Requests</h2>
                                                <div class="pull-right">
                                                    <button class="btn btn-primary px-xl-2 px-xxl-3" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#request_des_modal"
                                                            data-whatever="@getbootstrap">
                                                        <i class="iconly-Plus"></i> Create Request
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <h4>
                                                Disbursement Request:
                                            </h4>
                                            <p>
                                                Transfer a specific amount of money from Collection Account to Bank
                                                Account in a single transaction.
                                            </p>
                                        </div>
                                    </div>

                                    {{--                                    Bulk Payments--}}
                                    <div class="tab-pane fade" id="bulk_pay" role="tabpanel"
                                         aria-labelledby="contact-top-tab">

                                        <div class="card">
                                            <div class="card-header pb-0 card-no-border">
                                                <h2>Comming Soon</h2>
{{--                                                <div class="pull-right">--}}
{{--                                                    <button class="btn btn-primary px-xl-2 px-xxl-3" type="button"--}}
{{--                                                            data-bs-toggle="modal" data-bs-target="#bulk_pay_request"--}}
{{--                                                            data-whatever="@getbootstrap">--}}
{{--                                                        <i class="iconly-Plus"></i> Create Bulk Payment--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <hr>
{{--                                        <div class="card-body">--}}
{{--                                            <h4>--}}
{{--                                                Bulk Payment:--}}
{{--                                            </h4>--}}
{{--                                            <p>--}}
{{--                                                Making multiple payments to various recipients simultaneously through a--}}
{{--                                                single transaction--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    Modals   --}}

    <div class="modal fade" id="exampleModalgetbootstrap" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalgetbootstrap" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-toggle-wrapper social-profile text-start dark-sign-up">
                    <h3 class="modal-header justify-content-center border-0">Create Business Product</h3>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" method="POST" action="{{route('product.store')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label">Product Name</label>
                                <input class="form-control" type="text" placeholder="Sherehe SDigital"
                                       required="required" name="name">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Logo</label>
                                <div class="input-group">
                                    <button class="btn btn-outline-success" id="inputGroupFileAddon03" type="button"><i
                                            class="fa-solid fa-file"></i></button>
                                    <input class="form-control" id="inputGroupFile03" type="file"
                                           aria-describedby="inputGroupFileAddon03" aria-label="Upload" name="image"
                                           accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="align-content-center">
                                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('papi.business.disbursements_tables.receipt')
@endsection


@section('page_js')
    <script src="/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <!-- page_datatable-->
    <script src="/assets/js/js-datatables/datatables/datatable.custom.js"></script>
    <!-- page_datatable-->
    <script src="/assets/js/datatable/datatables/datatable.custom.js"></script>
    <!-- owlcarousel-->
    <script src="/assets/js/owlcarousel/owl.carousel.js"></script>
    <!-- page_owlcarousel-->
    <script src="/assets/js/owlcarousel/owl-custom.js"></script>
    <!-- ecommerce-->
    <script src="/assets/js/ecommerce.js"></script>
@endsection
