@extends('layouts.papi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <h2>{{ config('app.name', 'POS') }} Dashboard</h2>
                        <p class="mb-0 text-title-gray">"Welcome back to {{ config('app.name', 'POS') }}!"</p>
                    </div>
                    <div class="col-sm-6 col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="iconly-Home icli svg-color"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid dashboard-3">
            <div class="row">

                <div class="col-sm-6 col-xl-3 box-col-6">
                    <div class="card graphic-design overflow-hidden">
                        <div class="card-header card-no-border pb-0" style="background-color: rgba(48, 142, 135, 0.2)">
                            <div class="header-top">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-grow-1">
                                        <h5>Total Collections</h5>
                                        <p class="mb-0">Last 30 Days</p>
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

                <div class="col-sm-6 col-xl-3 box-col-6" >
                    <div class="card graphic-design overflow-hidden" >
                        <div class="card-header card-no-border pb-0" style="background-color: rgba(48, 142, 135, 0.2)">
                            <div class="header-top">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-grow-1">
                                        <h5>Total Disbursements</h5>
                                        <p class="mb-0">Last 30 Days</p>
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
                        <div class="card-header card-no-border pb-0" style="background-color: rgba(48, 142, 135, 0.2)">
                            <div class="header-top">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-grow-1">
                                        <h5>Total Transactions</h5>
                                        <p class="mb-0">Last 30 Days</p>
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
                        <div class="card-header card-no-border pb-0" style="background-color: rgba(48, 142, 135, 0.2)">
                            <div class="header-top">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="flex-grow-1">
                                        <h5>Total Failed</h5>
                                        <p class="mb-0">Last 30 Days</p>
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

                <div class="col-xl-6 order-xxl-0 order-xl-4 col-lg-12 box-col-7">
                    <div class="card performance-card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>Collections</h3>
                                <div class="d-flex">
                                    <ul class="performance-header">
                                        <li class="me-3"><span class="circle bg-primary me-1"> </span>
                                            <p class="mb-0">Success</p>
                                        </li>
                                        <li class="me-3"><span class="circle bg-secondary me-1"></span>
                                            <p class="mb-0">Failed</p>
                                        </li>
                                    </ul>
                                    <ul class="simple-wrapper nav nav-pills" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link" id="home-tab" data-bs-toggle="tab" href="dashboard-03.html#yearly" role="tab" aria-selected="true">Yearly</a></li>
                                        <li class="nav-item"><a class="nav-link" id="profile-tabs" data-bs-toggle="tab" href="dashboard-03.html#monthly" role="tab" aria-selected="false">Monthly</a></li>
                                        <li class="nav-item"><a class="nav-link active" id="contact-tab" data-bs-toggle="tab" href="dashboard-03.html#weekly" role="tab" aria-selected="false">Weekly</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div id="groupBarChart"></div>
                        </div>
                    </div>
                </div>


                <div class="col-xxl-6 col-xl-7 order-xxl-0 order-xl-1 col-sm-6 box-col-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <h3>Transactions</h3>
                        </div>
                        <div class="card-body pt-0 details-table">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table display table-bordernone mt-0" id="student-detail" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Trans ID</th>
                                        <th>Channel</th>
                                        <th>Time</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @for ($i = 0; $i < 5; $i++)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="flex-grow-1"><a href="product-page.html">
                                                            <h6>@php
                                                                    $names = ['Gary Goodwin', 'Ralph Venter', 'Edwin Deo', 'Aaron Hors', 'Fenter Jessy', 'Alice Hogan'];
                                                                    $randomNames = array_rand(array_flip($names), 2);
                                                                @endphp
                                                                {{ $randomNames[1] }}</h6></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="f-w-600">25,000</h6>
                                            </td>
                                            <td class="f-w-600">{{ 'CA' . str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT) }}</td>
                                            <td class="f-w-600 text-center">M-Pesa</td>
                                            <td class="f-w-600 text-center">{{ \Illuminate\Support\Carbon::create(2025, rand(1, 12), rand(1, 28), rand(0, 23), rand(0, 59), rand(0, 59)) }}</td>
                                            <td class="text-end">
                                                <div class="btn bg-light-success border-light-success text-success">
                                                    Success
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 box-col-6 xl-50">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>Merchant (Collections)</h3>
                                <div class="card-header-right-icon">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown">Today</button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="chart-widget.html#">Today</a><a class="dropdown-item" href="chart-widget.html#">Tomorrow</a><a class="dropdown-item" href="chart-widget.html#">Yesterday</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container progress-chart">
                                <div id="progress1"></div>
                                <div id="progress2"></div>
                                <div id="progress3"></div>
                                <div id="progress4"></div>
                                <div id="progress5"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-6 order-xxl-0 order-xl-4 col-lg-6 col-md-7 box-col-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>Disbursements</h3>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn" id="userdropdown7" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown7"><a class="dropdown-item" href="dashboard-03.html#">Weekly</a><a class="dropdown-item" href="dashboard-03.html#">Monthly</a><a class="dropdown-item" href="dashboard-03.html#">Yearly</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body course-table pt-0">
                            <div class="table-responsive">
                                <table class="table table-bordernone">
                                    <thead>
                                    <tr>
                                        <td>Merchant</td>
                                        <td>Amount</td>
                                        <td>Date</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>KMJ</h5></a>
                                                    <p>M-Pesa</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>60,000</h5>
                                            <p class="text-success">Success</p>
                                        </td>
                                        <td>2025-01-10<br>11:34:66</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Sherehe Digital</h5></a>
                                                    <p>M-Pesa</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>90,000</h5>
                                            <p class="text-success">Success</p>
                                        </td>
                                        <td>2025-01-10<br>11:34:66</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Shririkisho</h5></a>
                                                    <p>Mixx</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>640,000</h5>
                                            <p class="text-success">Success</p>
                                        </td>
                                        <td>2025-01-14<br>11:34:66</td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Garab</h5></a>
                                                    <p>Mixx</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>640,000</h5>
                                            <p class="text-success">Success</p>
                                        </td>
                                        <td>2025-01-14<br>11:34:66</td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Humtech</h5></a>
                                                    <p>Mixx</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>640,000</h5>
                                            <p class="text-success">Success</p>
                                        </td>
                                        <td>2025-01-14<br>11:34:66</td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Kazimoto</h5></a>
                                                    <p>Mixx</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>640,000</h5>
                                            <p class="text-success">Success</p>
                                        </td>
                                        <td>2025-01-14<br>11:34:66</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-5 order-xxl-0 order-xl-2 col-lg-6 col-md-5 col-sm-6 box-col-6">
                    <div class="card pie-card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>Operators</h3>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn" id="userdropdown8" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown8"><a class="dropdown-item" href="dashboard-03.html#">Weekly</a><a class="dropdown-item" href="dashboard-03.html#">Monthly</a><a class="dropdown-item" href="dashboard-03.html#">Yearly</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body revenue-category">
                            <div class="pie-chart" id="pie-chart-2"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    var options = {
                                        series: [44, 33, 23, 15, 10], // Replace these with your data values
                                        chart: {
                                            type: 'pie',
                                            height: 350
                                        },
                                        labels: ['M-Pesa', 'Mixx', 'Airtme Money', 'Halotel', 'Bank'], // Replace with your data labels
                                        legend: {
                                            position: 'bottom'
                                        },
                                        responsive: [{
                                            breakpoint: 480,
                                            options: {
                                                chart: {
                                                    width: 200
                                                },
                                                legend: {
                                                    position: 'bottom'
                                                }
                                            }
                                        }]
                                    };

                                    var chart = new ApexCharts(document.querySelector("#pie-chart-2"), options);
                                    chart.render();
                                });
                            </script>
                            <div class="donut-legend" id="legend"></div>
                        </div>
                    </div>
                </div>

                <!-- status widget Start-->
              <div class="col-xl-5 col-lg-12 box-col-12">
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <h3>Collections (Live)</h3>
                  </div>
                  <div class="card-body">
                    <div class="chart-container column-container">
                      <div id="columnchart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-7 col-lg-12 box-col-6">
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <h3>Collections (Live)</h3>
                  </div>
                  <div class="card-body">
                    <div class="chart-container">
                      <div id="linechart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- status widget Ends-->
            </div>
        </div>
    </div>
@endsection


@section('page_js')
    <!-- theme_customizer-->
{{--    <script src="/assets/js/theme-customizer/customizer.js"></script>--}}
    <!-- prism-->
    <script src="/assets/js/prism/prism.min.js"></script>
    <!-- clipboard-->
    <script src="/assets/js/clipboard/clipboard.min.js"></script>
    <!-- customcard-->
    <script src="/assets/js/custom-card/custom-card.js"></script>
    <!-- chart_widget-->
    <script src="/assets/js/chart-widget.js"></script>
@endsection
