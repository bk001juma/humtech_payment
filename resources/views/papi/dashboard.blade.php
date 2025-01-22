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

                @include('papi.business.includes.admin_top_cards')

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

                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div id="moneyBarChart"></div>
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
                                        <th>Amount (TZS)</th>
                                        <th>Trans ID</th>
                                        <th>Channel</th>
                                        <th>Time</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($recent_transactions as $transaction)
                                        <tr>
                                            <td>{{$transaction->business->name}}</td>
                                            <td>
                                                <h6 class="f-w-600">{{number_format($transaction->amount)}}</h6>
                                            </td>
                                            <td class="f-w-600">{{ $transaction->operator_transaction_id }}</td>
                                            <td class="f-w-600 text-center">{{$transaction->operator->name}}</td>
                                            <td class="f-w-600 text-center">{{date('d-m-Y H:i:s',strtotime($transaction->transaction_date))}}</td>
                                            <td class="text-end">
                                                <span class="badge rounded-pill @if($transaction->status == 'paid')badge-light-success @elseif($transaction->status == 'pending')badge-light-warning @else badge-light-danger @endif  text-capitalize">{{$transaction->status == 'paid' ? 'success' : $transaction->status}}</span></td>
                                        </tr>
                                    @endforeach

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
{{--                                    <div class="dropdown">--}}
{{--                                        <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown">Today</button>--}}
{{--                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="chart-widget.html#">Today</a><a class="dropdown-item" href="chart-widget.html#">Tomorrow</a><a class="dropdown-item" href="chart-widget.html#">Yesterday</a></div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container progress-chart">
                                @foreach($merchants as $merchant)
                                    <h4>{{$merchant->name}} {{number_format(($merchant->balance / $merchants->sum('balance')*100))}}%</h4>
                                    <div class="progress sm-progress-bar overflow-visible mt-4">
                                        <div class="progress-bar-animated small-progressbar bg-primary rounded-pill progress-bar-striped" role="progressbar" style="width: {{($merchant->balance / $merchants->sum('balance')*100)}}%" aria-valuenow="{{($merchant->balance - $merchants->sum('balance')/1000)}}" aria-valuemin="0" aria-valuemax="100"><span class="text-primary progress-label">{{number_format($merchant->balance/1000)}}K TZS</span><span class="animate-circle"></span></div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-6 order-xxl-0 order-xl-4 col-lg-6 col-md-7 box-col-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>Disbursements</h3>

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

                                    @foreach($recent_disbursements as $disbursement)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-grow-1">
                                                            <h5>{{$disbursement->business->name}}</h5>
                                                        <p>{{$disbursement->company}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>{{number_format($disbursement->amount)}}</h5>
                                                <span class="badge rounded-pill @if($disbursement->status == 'success')badge-light-success @elseif($disbursement->status == 'rejected') badge-light-danger @else badge-light-warning @endif  text-capitalize">{{$disbursement->status}}</span>
                                            </td>
                                            <td>{{date('d-m-Y H:i:s',strtotime($disbursement->request_date))}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-5 order-xxl-0 order-xl-2 col-lg-6 col-md-5 col-sm-6 box-col-6">
                    <div class="card pie-card">
                        <div class="card-header card-no-border pb-0">

                        </div>
                        <div class="card-body revenue-category">
                            <div class="pie-chart" id="pie-chart-2"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    var options = {
                                        series: @json($operator_percent), // Replace these with your data values
                                        chart: {
                                            type: 'pie',
                                            height: 350
                                        },
                                        labels: @json($operator_name), // Replace with your data labels
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

    @include('papi.merchant.collections_tables.merchant_collection_receipt')

@endsection


@section('page_js')
    <script>
        const groupChartOption2 = {
            series: [
                {
                    name: "Good",
                    data: @json($success),
                },
                {
                    name: "Very Good",
                    data: @json($failed),
                },
            ],
            colors: [AdmiroAdminConfig.primary, AdmiroAdminConfig.secondary],
            chart: {
                type: "bar",
                height: 325,
                offsetX: 0,
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                },
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            grid: {
                show: true,
                borderColor: "#E5E5E5",
                position: "back",
            },
            dataLabels: {
                enabled: false,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "40%",
                },
            },
            tooltip: {
                enabled: false,
            },

            yaxis: {
                show: true,
                labels: {
                    show: true,
                    style: {
                        fontWeight: 500,
                        colors: "#AAA3A0",
                    },
                    formatter: (value) => {
                        return `${value}k`;
                    },
                },
            },
            xaxis: {
                show: true,
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                labels: {
                    show: true,
                    style: {
                        fontWeight: 500,
                        colors: "#AAA3A0",
                    },
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            legend: {
                show: false,
            },

            responsive: [
                {
                    breakpoint: 1600,
                    options: {
                        chart: {
                            height: 360,
                        },
                        series: [
                            {
                                name: "Good",
                                data: [0, 250, 350, 150, 230, 120, 330, 350, 280],
                            },
                            {
                                name: "Very Good",
                                data: [290, 180, 120, 290, 370, 250, 230, 200, 140],
                            },
                        ],
                    },
                },
                {
                    breakpoint: 531,
                    options: {
                        chart: {
                            height: 200,
                        },
                        series: [
                            {
                                name: "Good",
                                data: [170, 250, 350, 150, 230, 120, 330],
                            },
                            {
                                name: "Very Good",
                                data: [290, 180, 120, 290, 370, 250, 230],
                            },
                        ],
                    },
                },
            ],
        };
        const groupBarChartEl2 = new ApexCharts(
            document.querySelector("#moneyBarChart"),
            groupChartOption2
        );

        // groupBarChartEl2.render();
    </script>
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
