@extends('layouts.papi_pages')

@section('page_css')
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/owlcarousel.css"/>

    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/datatables.css">
@endsection

@section('template_title')
    Manage {{$business->name}}
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <h2>Manage: {{$business->name}}</h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="iconly-Home icli svg-color"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('merchants')}}">Merchants</a> </li>
                            <li class="breadcrumb-item active">Manage {{$business->name}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div>
                <div class="row product-page-main p-0">
                    <div class="col-xxl-6 box-col-6 order-xxl-0 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="profile-title">
                                                <div class="d-flex gap-3">
                                                    <img class="img-70 rounded-circle" alt="" src="/{{$business->logo}}"/>
                                                    <div class="flex-grow-1">
                                                        <h3 class="mb-1">{{$business->name}}</h3>
                                                        <p>{{$business->category}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="product-page-details">
                                            <h3>Balance.</h3>
                                        </div>
                                        <div class="product-price">{{number_format($business->balance)}} TZS
{{--                                            <del>$350.00 </del>--}}
                                        </div>

                                    </div>

                                </div>
{{--                                <hr/>--}}
{{--                                <p>Rock Paper Scissors Various Dots Half Sleeves Girl’s Regular Fit T-Shirt I 100% Cotton T Shirt with Half Sleeve Round Neck I Regular Wear Solid Kids Tees and Black Sleeve.</p>--}}
{{--                                <hr/>--}}
{{--                                <div>--}}
{{--                                    <table class="product-page-width">--}}
{{--                                        <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td> <b>Brand &nbsp;&nbsp;&nbsp;:</b></td>--}}
{{--                                            <td>Pixelstrap</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td> <b>Availability &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>--}}
{{--                                            <td class="font-success">In stock</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td> <b>Seller &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>--}}
{{--                                            <td>ABC</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td> <b>Fabric &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>--}}
{{--                                            <td>Cotton</td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
                                <hr/>

                                <div class="m-t-15 btn-showcase">
                                    <a class="btn btn-primary" href="" title=""> <i class="fa-solid fa-check me-1"></i>Activate</a>
                                    <a class="btn btn-success" href="" title=""> <i class="fa-solid fa-cancel me-1"></i>Suspend</a>
                                    <a class="btn btn-secondary" href=""> <i class="fa-solid fa-cancel me-1"></i>Block Merchant</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 box-col-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- side-bar colleps block stat-->
                                <div class="filter-block">
                                    <h4>Brand</h4>
                                    <ul>
                                        <li>Clothing</li>
                                        <li>Bags</li>
                                        <li>Footwear</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 box-col-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- side-bar colleps block stat-->
                                <div class="filter-block">
                                    <h4>Brand</h4>
                                    <ul>
                                        <li>Clothing</li>
                                        <li>Bags</li>
                                        <li>Footwear</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="row product-page-main">
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs border-tab nav-primary mb-0" id="top-tab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="product-page.html#top-home" role="tab" aria-controls="top-home" aria-selected="false">Products</a>
                                        <div class="material-border"></div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="product-page.html#top-contact" role="tab" aria-controls="top-contact" aria-selected="true">Transactions</a>
                                        <div class="material-border"></div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" id="brand-top-tab" data-bs-toggle="tab" href="product-page.html#top-brand" role="tab" aria-controls="top-brand" aria-selected="true">Activities</a>
                                        <div class="material-border"></div>
                                    </li>
                                </ul>

                                <div class="tab-content" id="top-tabContent">

                                  <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">

                                        <div class="card">
                                            <div class="card-header pb-0 card-no-border">
                                                <h2>{{$business->name}} - Products</h2>
                                                <div class="pull-right">
                                                    <button class="btn btn-primary px-xl-2 px-xxl-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalgetbootstrap" data-whatever="@getbootstrap"><i class="iconly-Plus"></i> Add Product</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive user-datatable">
                                                    <table class="display" id="basic-12">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Balance</th>
                                                            <th>Status</th>
                                                            <th>Transactions</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($business->products as $product)
                                                            <tr>
                                                                <td>
                                                                    <h4>
                                                                        <img class="img-fluid table-avtar" style="height: 100px" src="/{{$product->logo}}" alt="{{$product->name}}">{{$product->name}}
                                                                    </h4>
                                                                </td>
                                                                <td>{{number_format($product->balance)}} TZS</td>
                                                                <td><span class="badge rounded-pill @if($product->status == 'active')badge-light-success @else badge-light-danger @endif  text-capitalize">{{$product->status}}</span></td>
                                                                <td>{{number_format(count($product->transactions))}}</td>
                                                                <td>
                                                                    <ul class="action">
                                                                        <li class="edit"> <a href="{{route('merchant.manage',$product->id)}}"><i class="icon-pencil-alt"></i></a></li>
                                                                        <li class="delete"><a href="{{route('merchant.manage',$product->id)}}"><i class="icon-trash"></i></a></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Balance</th>
                                                            <th>Status</th>
                                                            <th>Transactions</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                        <p class="mb-0 mt-3">Rock Paper Scissors Various Dots Half Sleeves Girl’s Regular Fit T-Shirt I 100% Cotton<br/>T Shirt with Half Sleeve Round Neck I Regular Wear Solid Kids Tees and Black Sleeve.</p>
                                    </div>
                                    <div class="tab-pane fade" id="top-brand" role="tabpanel" aria-labelledby="brand-top-tab">
                                        <p class="mb-0 mt-3"><b>Product Dimensions :</b>18 x 18 x 4 cm<br/><b>Date First Available :</b>31 March 2024<br/><b>Manufacturer :</b>Tee Stores<br/><b>Item part number :</b>TS-WT721-XS-WHITE</p>
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

    <div class="modal fade" id="exampleModalgetbootstrap" tabindex="-1" role="dialog" aria-labelledby="exampleModalgetbootstrap" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-toggle-wrapper social-profile text-start dark-sign-up">
                    <h3 class="modal-header justify-content-center border-0">Create Business Product</h3>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <input hidden="hidden" name="business_id" value="{{$business->id}}">
                            <div class="col-md-12">
                                <label class="form-label" >Product Name</label>
                                <input class="form-control" type="text" placeholder="Sherehe SDigital" required="required" name="name">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" >Logo</label>
                                <div class="input-group">
                                    <button class="btn btn-outline-success" id="inputGroupFileAddon03" type="button"><i class="fa-solid fa-file"></i></button>
                                    <input class="form-control" id="inputGroupFile03" type="file" aria-describedby="inputGroupFileAddon03" aria-label="Upload" name="image" accept="image/*">
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
    <script src="/assets/js/owlcarousel/owl-custom.js"> </script>
    <!-- ecommerce-->
    <script src="/assets/js/ecommerce.js"></script>
    <!-- theme_customizer-->
{{--    <script src="/assets/js/theme-customizer/customizer.js"></script>--}}
@endsection
