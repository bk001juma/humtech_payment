@extends('layouts.papi_pages')

@section('template_title')
    Busniesses
@endsection


@section('page_css')
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/datatables.css">
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <h2>Businesses</h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a ><i class="iconly-Home icli svg-color"></i></a></li>
                            <li class="breadcrumb-item">Data Tables</li>
                            <li class="breadcrumb-item active">Basic DataTables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">

                <!-- Scroll - vertical dynamic Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 card-no-border">
                            Registered Businesses
                            <div class="pull-right">
                                <button class="btn btn-primary px-xl-2 px-xxl-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalgetbootstrap" data-whatever="@getbootstrap"><i class="iconly-Plus"></i>
                                    Add Merchant
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive user-datatable">
                                <table class="display" id="basic-3">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Merchant ID</th>
                                        <th>Balance (Tsh)</th>
                                        <th>Business Type</th>
                                        <th>Products</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($businesses as $business)
                                        <tr>
                                            <td>
                                                {{$business->name}}
                                            </td>
                                            <td>{{$business->phone}}</td>
                                            <td>{{$business->id}}</td>
                                            <td> <p class="pull-right">{{number_format($business->balance,2)}}</p> </td>
                                            <td>{{$business->category}}</td>
                                            <td>{{count($business->products)}}</td>
                                            <td><span class="badge rounded-pill badge-light-success text-capitalize">{{$business->status}}</span></td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a class="btn btn-primary" href="{{route('merchant.manage',$business->id)}}"> View</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Scroll - vertical dynamic Ends-->
                <!-- Container-fluid Ends-->
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalgetbootstrap" tabindex="-1" role="dialog" aria-labelledby="exampleModalgetbootstrap" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-toggle-wrapper social-profile text-start dark-sign-up">
                    <h3 class="modal-header justify-content-center border-0">Create Business</h3>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" method="POST" action="{{route('merchant.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" >Business Name</label>
                                <input class="form-control" type="text" placeholder="HUMTECH ICT Solutions" required="required" name="name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" >Phone Number</label>
                                <input class="form-control" type="text" placeholder="0785008133" required="required" name="phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">TIN Number</label>
                                <input class="form-control" id="validationCustom01" type="text" placeholder="125######" required="required" name="tin">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="select">Business Type</label>
                                <select class="form-control" id="select" name="category">
                                    <option>Finance</option>
                                    <option>Loan</option>
                                    <option>Banking</option>
                                    <option>Microfinance</option>
                                    <option>Law</option>
                                </select>
{{--                                <label class="form-label" for="validationCustom02">Business Type</label>--}}
{{--                                <input class="form-control" id="validationCustom02" type="text" placeholder="Enter your surname" required="required" name="type">--}}
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Email address</label>
                                    <input class="form-control" type="email" placeholder="humtech@gmail.com" required="required" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
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
<!-- jquery-->
    <script src="/assets/js/vendors/jquery/jquery.min.js"></script>
    <!-- bootstrap js-->
    <script src="/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
    <script src="/assets/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script>
    <!--fontawesome-->
    <script src="/assets/js/vendors/font-awesome/fontawesome-min.js"></script>
    <!-- sidebar -->
    <script src="/assets/js/sidebar.js"></script>
    <!-- scrollbar-->
    <script src="/assets/js/scrollbar/simplebar.js"></script>
    <script src="/assets/js/scrollbar/custom.js"></script>
    <!-- slick-->
    <script src="/assets/js/slick/slick.min.js"></script>
    <script src="/assets/js/slick/slick.js"></script>
    <!-- datatable-->
    <script src="/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <!-- page_datatable-->
    <script src="/assets/js/js-datatables/datatables/datatable.custom.js"></script>
    <!-- page_datatable-->
    <script src="/assets/js/datatable/datatables/datatable.custom.js"></script>
    <!-- theme_customizer-->
{{--    <script src="/assets/js/theme-customizer/customizer.js"></script>--}}
@endsection
