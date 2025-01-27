@extends('layouts.papi_pages')

@section('page_css')
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/owlcarousel.css"/>

    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/datatables.css">


@endsection

@section('template_title')
    Collections
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <h2>Collections</h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="iconly-Home icli svg-color"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Collections</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div>
                <div class="row product-page-main p-0">

                    @include('papi.business.includes.admin_top_cards')


                    <div class="card">
                        <div class="row product-page-main">
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs border-tab nav-primary mb-0" id="top-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">
                                            All
                                        </a>
                                        <div class="material-border"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact"
                                           aria-selected="true">
                                            Push
                                        </a>
                                        <div class="material-border"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="brand-top-tab" data-bs-toggle="tab" href="#top-C2B" role="tab" aria-controls="top-C2B" aria-selected="true">
                                            C2B
                                        </a>
                                        <div class="material-border"></div>
                                    </li>
                                </ul>

                                <div class="tab-content" id="top-tabContent">

                                    <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">

                                        @include('papi.business.collections_tables.all')

                                    </div>
                                    <div class="tab-pane fade" id="top-C2B" role="tabpanel" aria-labelledby="C2B-top-tab">

                                        @include('papi.business.collections_tables.c2b')

                                    </div>

                                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">

                                        @include('papi.business.collections_tables.push')
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
                            <input hidden="hidden" name="business_id" value="">
                            <div class="col-md-12">
                                <label class="form-label">Product Name</label>
                                <input class="form-control" type="text" placeholder="Sherehe SDigital" required="required" name="name">
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


    <div class="modal fade" id="request_des_modal" tabindex="-1" role="dialog" aria-labelledby="request_des_modal"
         aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-toggle-wrapper social-profile text-start dark-sign-up">
                    <h3 class="modal-header justify-content-center border-0">Create Disbursements Request</h3>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" method="POST" action="{{route('merchant.store')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-6">
                                <label class="form-label" for="select">Channel</label>
                                <select class="form-control" id="select" name="category">
                                    <option>Bank</option>
                                    <option>Mobile Money</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="select">Company</label>
                                <select class="form-control" id="select" name="category">
                                    <option>NMB</option>
                                    <option>CRDB</option>
                                    <option>M-Pesa</option>
                                    <option>Mixx</option>
                                    <option>Airtel</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Account Number</label>
                                    <input class="form-control" type="text" required="required" name="account"
                                           placeholder="0J4534343">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Amount</label>
                                    <input class="form-control" type="number" required="required" name="amount"
                                           placeholder="50000">
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

    <div class="modal fade" id="bulk_pay_request" tabindex="-1" role="dialog" aria-labelledby="bulk_pay_request"
         aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-toggle-wrapper social-profile text-start dark-sign-up">
                    <h3 class="modal-header justify-content-center border-0">Create Disbursements Request</h3>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" method="POST" action="{{route('merchant.store')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-6">
                                <label class="form-label" for="select">Channel</label>
                                <select class="form-control" id="select" name="category">
                                    <option>Mobile Money</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="select">Company</label>
                                <select class="form-control" id="select" name="category">
                                    <option>M-Pesa</option>
                                    <option>Mixx</option>
                                    <option>Airtel</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Phone Number</label>
                                    <input class="form-control" type="text" required="required" name="account"
                                           placeholder="07335234532">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Amount</label>
                                    <input class="form-control" type="number" required="required" name="amount"
                                           placeholder="50000">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="align-content-center">
                                    <button class="btn btn-primary pull-left" type="submit">Upload File</button>
                                </div>
                            </div>

                            <div class="col-md-6">
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

    @include('papi.business.collections_tables.collection_receipt')

@endsection


@section('page_js')
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

    <script>
        // Get the modal
        var modal = document.getElementById("mySmallModalLabel");

        // Get the button that opens the modal

        var btn = document.getElementById("myBtn");

        var logo = document.getElementById('logo');
        var merchant = document.getElementById('merchant');
        var operator = document.getElementById('operator');
        var phone = document.getElementById('phone');
        var receipt = document.getElementById('receipt');
        var service = document.getElementById('service');
        var date = document.getElementById('date');

        var amount = document.getElementById('amount');

        var a = document.getElementById('download-receipt');

        var qr_code = document.getElementById('imgcontainer');
        var qr_code2 = document.getElementById('qr_code2');

        function getReceipt(user) {
            logo.src = '/'+user[6];
            merchant.textContent = user[0];
            operator.textContent = user[0];
            amount.textContent = user[1];
            phone.textContent = user[2];
            receipt.textContent = user[3];
            service.textContent = user[4];
            date.textContent = user[5];
            a.href = user[7];

            console.log(user[1]);

            document.getElementById('qrcode').innerHTML = '';

            const qrcode = new QRCode(document.getElementById('qrcode'), {
                text: "Receipt:" + "\nMerchant: "+user[0]+"\nPhone: 0" + user[2] +"\nTrans ID: " + user[3] +"\nDate: "+user[5],
                width: 100,
                height: 100,
                colorDark : '#000',
                colorLight : '#fff',
                correctLevel : QRCode.CorrectLevel.H
            });

        }
    </script>

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
