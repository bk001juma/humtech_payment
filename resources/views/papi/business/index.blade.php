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
                            <li class="breadcrumb-item"><a href="index.html"><i class="iconly-Home icli svg-color"></i></a></li>
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
                                <button class="btn btn-primary px-xl-2 px-xxl-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalgetbootstrap" data-whatever="@getbootstrap"><i class="iconly-Plus"></i> Add Business</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive user-datatable">
                                <table class="display" id="basic-12">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Balance</th>
                                        <th>Business Type</th>
                                        <th>Transactions</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($businesses as $business)
                                        <tr>
                                            <td> <img class="img-fluid table-avtar" src="/assets/images/user/2.png" alt="{{$business->name}}">{{$business->name}}</td>
                                            <td>{{$business->phone}}</td>
                                            <td><span class="badge rounded-pill badge-light-success">{{$business->status}}</span></td>
                                            <td>{{$business->balance}}</td>
                                            <td>{{$business->type}}</td>
                                            <td>0</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="{{route('merchant.manage',$business->id)}}"><i class="icon-pencil-alt"></i></a></li>
                                                    <li class="delete"><a href="{{route('merchant.manage',$business->id)}}"><i class="icon-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>TIN</th>
                                        <th>Business Type</th>
                                        <th>Transactions</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-toggle-wrapper social-profile text-start dark-sign-up">
                    <h3 class="modal-header justify-content-center border-0">Create Business</h3>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" method="POST" action="{{route('merchant.store')}}">
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
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Email address</label>
                                    <input class="form-control" type="email" placeholder="humtech@gmail.com" required="required" name="email">
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
    <script src="/assets/js/theme-customizer/customizer.js"></script>
@endsection
