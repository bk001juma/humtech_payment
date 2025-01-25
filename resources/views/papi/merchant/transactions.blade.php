@extends('layouts.papi_pages')

@section('page_css')
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/owlcarousel.css"/>

    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/datatables.css">
@endsection

@section('template_title')
    Tansactions {{$business->name}}
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <h2>Transactions: {{$business->name}}</h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="iconly-Home icli svg-color"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Transactions {{$business->name}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div>
                <div class="row product-page-main p-0">
                    @include('papi.merchant.includes.top_cards')


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
                                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="true">
                                            Successful
                                        </a>
                                        <div class="material-border"></div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" id="brand-top-tab" data-bs-toggle="tab" href="#top-brand" role="tab" aria-controls="top-brand" aria-selected="true">
                                            Failed
                                        </a>
                                        <div class="material-border"></div>
                                    </li>

                                </ul>

                                <div class="tab-content" id="top-tabContent">

                                    <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">

                                        @include('papi.merchant.collections_tables.all_merchant_collections_table')

                                    </div>

                                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">

                                        @include('papi.merchant.collections_tables.success_merchant_collections_table')

                                    </div>
                                    <div class="tab-pane fade" id="top-brand" role="tabpanel" aria-labelledby="brand-top-tab">

                                        @include('papi.merchant.collections_tables.failed_merchant_collections_table')

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
                            <input hidden="hidden" name="business_id" value="{{$business->id}}">
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

    @include('papi.merchant.collections_tables.merchant_collection_receipt')


    <div class="modal fade bd-qr-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="mySmallModalLabel">Receipt</h3>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <h2 class="text-center">
                        <img src="/{{$business->logo}}" alt="{{$business->name}} Logo" class="img-100 rounded-circle">
                    </h2>
                    <hr class="receipt">

                    <p><strong>Merchant:<br> </strong>{{$business->name}}</p>
                    <p><strong>Channel:<br> </strong> <span id="operator">  </span></p>
                    <p><strong>Phone:<br> </strong> 0<span id="phone">  </span></p>
                    <p><strong>Receipt:<br> </strong> <span id="receipt"></span> </p>
                    <p><strong>Service:<br> </strong> <span id="service"></span> </p>
                    <p ><strong>Transaction Date:<br> </strong> <span id="date"></span> </p>

                    <div class="text-center">
                        <img class="text-center img-100" src="/qr.png" alt="qr">
                    </div>
                    <div id="qr_code">

                    </div>

                    <hr class="receipt">

                    <h3 class="pb-20"><strong>Amount: </strong> Tsh. <span id="amount">0.00 </span></h3>

                 </div>
            </div>
        </div>
    </div>

@endsection


@section('page_js')
    <script>

        // Get the modal
        var modal = document.getElementById("mySmallModalLabel");

        // Get the button that opens the modal

        var btn = document.getElementById("myBtn");

        var operator = document.getElementById('operator');
        var phone = document.getElementById('phone');
        var receipt = document.getElementById('receipt');
        var service = document.getElementById('service');
        var date = document.getElementById('date');

        var amount = document.getElementById('amount');

        var qr_code = document.getElementById('qr_code');

        function getReceipt(user) {
            operator.textContent = user[0];
            amount.textContent = user[1];
            phone.textContent = user[2];
            receipt.textContent = user[3];
            service.textContent = user[4];
            date.textContent = user[5];

            console.log(user[1]);

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open( "GET", user[6], false ); // false for synchronous request
            xmlHttp.send( null );
            qr_code.innerHTML = xmlHttp.response;
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
