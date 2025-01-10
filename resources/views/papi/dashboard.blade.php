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
                        <div class="card-header card-no-border pb-0">
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

                <div class="col-sm-6 col-xl-3 box-col-6">
                    <div class="card graphic-design overflow-hidden">
                        <div class="card-header card-no-border pb-0">
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
                        <div class="card-header card-no-border pb-0">
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
                        <div class="card-header card-no-border pb-0">
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

                <div class="col-xxl-3 col-xl-4 col-sm-6 order-sm-1 order-xl-0 box-col-5">
                    <div class="card upcoming-card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>Upcoming Classes</h3>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn" id="userdropdown4" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown4"><a class="dropdown-item" href="dashboard-03.html#">Weekly</a><a class="dropdown-item" href="dashboard-03.html#">Monthly</a><a class="dropdown-item" href="dashboard-03.html#">Yearly</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body upcoming-class pt-0">
                            <div class="activity-day">
                                <h6>15 march</h6>
                            </div>
                            <ul>
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0">
                                        <h5>09:00</h5>
                                    </div>
                                    <div class="flex-grow-1 border-2 b-l-primary">
                                        <h6>GDM 2nd semester</h6>
                                        <p>One-line Drawing Method</p>
                                    </div><i class="fa-solid fa-circle circle-dot-primary pull-right"></i>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0">
                                        <h5>10:00</h5>
                                    </div>
                                    <div class="flex-grow-1 border-2 b-l-secondary">
                                        <h6>GDM 2nd semester</h6>
                                        <p>Continuous Line Drawing</p>
                                    </div><i class="fa-solid fa-circle circle-dot-secondary pull-right"></i>
                                </li>
                            </ul>
                            <div class="activity-day">
                                <h6>17 march</h6>
                            </div>
                            <ul>
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0">
                                        <h5>12:00</h5>
                                    </div>
                                    <div class="flex-grow-1 border-2 b-l-primary">
                                        <h6>GDM 2nd semester</h6>
                                        <p>One-line Drawing Method</p>
                                    </div><i class="fa-solid fa-circle circle-dot-primary pull-right"></i>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0">
                                        <h5>08:00</h5>
                                    </div>
                                    <div class="flex-grow-1 border-2 b-l-secondary">
                                        <h6>GDM 2nd semester</h6>
                                        <p>Continuous Line Drawing</p>
                                    </div><i class="fa-solid fa-circle circle-dot-secondary pull-right"></i>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0">
                                        <h5>11:00</h5>
                                    </div>
                                    <div class="flex-grow-1 border-2 b-l-primary">
                                        <h6>GDM 2nd semester</h6>
                                        <p>Continuous Line Drawing</p>
                                    </div><i class="fa-solid fa-circle circle-dot-primary pull-right"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 order-xxl-0 order-xl-4 col-lg-12 box-col-7">
                    <div class="card performance-card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>School Performance</h3>
                                <div class="d-flex">
                                    <ul class="performance-header">
                                        <li class="me-3"><span class="circle bg-primary me-1"> </span>
                                            <p class="mb-0">Students</p>
                                        </li>
                                        <li class="me-3"><span class="circle bg-secondary me-1"></span>
                                            <p class="mb-0">Teachers</p>
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
                <div class="col-xxl-3 col-xl-4 col-sm-6 box-col-5 box-order-1">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>Notice Board</h3>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn" id="userdropdown5" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown5"><a class="dropdown-item" href="dashboard-03.html#">Weekly</a><a class="dropdown-item" href="dashboard-03.html#">Monthly</a><a class="dropdown-item" href="dashboard-03.html#">Yearly</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body notice-board">
                            <ul>
                                <li class="d-flex gap-2">
                                    <div class="flex-shrink-0"><img class="img-fluid" src="/assets/images/dashboard-1/news-update/1.png" alt=""/></div>
                                    <div class="flex-grow-1">
                                        <h6>Virtual STEM Clubs for 4-8 with Destina...</h6>
                                        <p class="text-truncate">Wed, Feb 24,2022; 12:00 pm-1:00pm</p>
                                    </div>
                                </li>
                                <li class="d-flex gap-2">
                                    <div class="flex-shrink-0"><img class="img-fluid" src="/assets/images/dashboard-1/news-update/2.png" alt=""/></div>
                                    <div class="flex-grow-1">
                                        <h6>Art Now Series Presents Catherine...</h6>
                                        <p class="text-truncate">Wed, Feb 24,2022; 12:00 pm-1:00pm</p>
                                    </div>
                                </li>
                                <li class="d-flex gap-2">
                                    <div class="flex-shrink-0"><img class="img-fluid" src="/assets/images/dashboard-1/news-update/3.png" alt=""/></div>
                                    <div class="flex-grow-1">
                                        <h6>Artistic Challenges For Your Creatie...</h6>
                                        <p class="text-truncate">Wed, Feb 24,2022; 12:00 pm-1:00pm</p>
                                    </div>
                                </li>
                                <li class="d-flex gap-2">
                                    <div class="flex-shrink-0"><img class="img-fluid" src="/assets/images/dashboard-1/news-update/4.png" alt=""/></div>
                                    <div class="flex-grow-1">
                                        <h6>Weekly Photo Challenge & Critique...</h6>
                                        <p class="text-truncate">Wed, Feb 24,2022; 12:00 pm-1:00pm</p>
                                    </div>
                                </li>
                                <li class="d-flex gap-2">
                                    <div class="flex-shrink-0"><img class="img-fluid" src="/assets/images/dashboard-1/news-update/5.png" alt=""/></div>
                                    <div class="flex-grow-1">
                                        <h6>Art Now Series Presents Catherine...</h6>
                                        <p class="text-truncate">Wed, Feb 24,2022; 12:00 pm-1:00pm</p>
                                    </div>
                                </li>
                                <li class="d-flex gap-2">
                                    <div class="flex-shrink-0"><img class="img-fluid" src="/assets/images/dashboard-1/news-update/6.png" alt=""/></div>
                                    <div class="flex-grow-1">
                                        <h6>Virtual STEM Clubs for 4-8 with Destina...</h6>
                                        <p class="text-truncate">Wed, Feb 24,2022; 12:00 pm-1:00pm</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-7 order-xxl-0 order-xl-1 col-sm-6 box-col-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <h3>Student Details</h3>
                        </div>
                        <div class="card-body pt-0 details-table">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table display table-bordernone mt-0" id="student-detail" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Poduct</th>
                                        <th>QTY</th>
                                        <th>Attendance</th>
                                        <th class="text-center">rating</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="flex-shrink-0 comman-round"><img src="/assets/images/dashboard-3/user/7.png" alt=""/></div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h6>Gary Goodwin</h6></a>
                                                    <p>2019</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="f-w-600">Dedoh5@error.com</h6>
                                        </td>
                                        <td class="f-w-600">QTY:12</td>
                                        <td class="f-w-600 text-center">51</td>
                                        <td class="text-end">
                                            <div class="btn bg-light-success border-light-success text-success">45/50</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="flex-shrink-0 comman-round"><img src="/assets/images/dashboard-3/user/8.png" alt=""/></div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h6>Ralph Venter</h6></a>
                                                    <p>2019</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="f-w-600">Norog95@fada.com</h6>
                                        </td>
                                        <td class="f-w-600">QTY:14</td>
                                        <td class="f-w-600 text-center">95</td>
                                        <td class="text-end">
                                            <div class="btn bg-light-success border-light-success text-success">30/100</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="flex-shrink-0 comman-round"><img src="/assets/images/dashboard-3/user/9.png" alt=""/></div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h6>Edwin Deo</h6></a>
                                                    <p>2019</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="f-w-600">Mopot43@fada.com</h6>
                                        </td>
                                        <td class="f-w-600">QTY:16</td>
                                        <td class="f-w-600 text-center">94</td>
                                        <td class="text-end">
                                            <div class="btn bg-light-warning border-light-warning text-warning">45/60</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="flex-shrink-0 comman-round"><img src="/assets/images/dashboard-3/user/10.png" alt=""/></div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h6>Aaron Hors</h6></a>
                                                    <p>2019</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="f-w-600">Fafiya34@fada.com</h6>
                                        </td>
                                        <td class="f-w-600">QTY:18</td>
                                        <td class="f-w-600 text-center">62</td>
                                        <td class="text-end">
                                            <div class="btn bg-light-danger border-light-danger text-danger">26/50</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="flex-shrink-0 comman-round"><img src="/assets/images/dashboard-3/user/11.png" alt=""/></div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h6>Fenter Jessy</h6></a>
                                                    <p>2019</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="f-w-600">Rewox6@erroe.com</h6>
                                        </td>
                                        <td class="f-w-600">QTY:20</td>
                                        <td class="f-w-600 text-center">91</td>
                                        <td class="text-end">
                                            <div class="btn bg-light-success border-light-success text-success">80/100</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="flex-shrink-0 comman-round"><img src="/assets/images/dashboard-3/user/12.png" alt=""/></div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h6>Alice Hogan</h6></a>
                                                    <p>2019</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="f-w-600">Alice345@fada.com</h6>
                                        </td>
                                        <td class="f-w-600">QTY:22</td>
                                        <td class="f-w-600 text-center">93</td>
                                        <td class="text-end">
                                            <div class="btn bg-light-success border-light-success text-success">45/50</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-6 order-xxl-0 order-xl-4 col-lg-6 col-md-7 box-col-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h3>New Courses</h3>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn" id="userdropdown7" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown7"><a class="dropdown-item" href="dashboard-03.html#">Weekly</a><a class="dropdown-item" href="dashboard-03.html#">Monthly</a><a class="dropdown-item" href="dashboard-03.html#">Yearly</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body course-table pt-0">
                            <div class="table-responsive">
                                <table class="table table-bordernone">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-shrink-0 comman-round">
                                                    <div class="icon"><img class="img-fluid" src="/assets/images/dashboard-3/user/13.png" alt="chair"/></div>
                                                </div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Gary Goodwin</h5></a>
                                                    <p>Elementary</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>30 class</h5>
                                            <p>60 hours</p>
                                        </td>
                                        <td>5 days left</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-shrink-0 comman-round">
                                                    <div class="icon"><img class="img-fluid" src="/assets/images/dashboard-3/user/14.png" alt="chair"/></div>
                                                </div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Ralph Venter</h5></a>
                                                    <p>Advanced</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>34 class</h5>
                                            <p>45 hours</p>
                                        </td>
                                        <td>2 days left</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-shrink-0 comman-round">
                                                    <div class="icon"><img class="img-fluid" src="/assets/images/dashboard-3/user/15.png" alt="chair"/></div>
                                                </div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Edwin Deo</h5></a>
                                                    <p>Advanced</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>87 class</h5>
                                            <p>23 hours</p>
                                        </td>
                                        <td>4 days left</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-shrink-0 comman-round">
                                                    <div class="icon"><img class="img-fluid" src="/assets/images/dashboard-3/user/16.png" alt="chair"/></div>
                                                </div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Aaron Hors</h5></a>
                                                    <p>Elementary</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>12 class</h5>
                                            <p>56 hours</p>
                                        </td>
                                        <td>9 days left</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-shrink-0 comman-round">
                                                    <div class="icon"><img class="img-fluid" src="/assets/images/dashboard-3/user/17.png" alt="chair"/></div>
                                                </div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Fenter Jessy</h5></a>
                                                    <p>Art.3748979</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>65 class</h5>
                                            <p>60 hours</p>
                                        </td>
                                        <td>1 days left</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-shrink-0 comman-round">
                                                    <div class="icon"><img class="img-fluid" src="/assets/images/dashboard-3/user/18.png" alt="chair"/></div>
                                                </div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Alice Hogan</h5></a>
                                                    <p>Art.2738979</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>43 class</h5>
                                            <p>78 hours</p>
                                        </td>
                                        <td>6 days left</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="flex-shrink-0 comman-round">
                                                    <div class="icon"><img class="img-fluid" src="/assets/images/dashboard-3/user/19.png" alt="chair"/></div>
                                                </div>
                                                <div class="flex-grow-1"><a href="product-page.html">
                                                        <h5>Aaron Hors</h5></a>
                                                    <p>Art.7438378</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>20 class</h5>
                                            <p>40 hours</p>
                                        </td>
                                        <td>5 days left</td>
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
                                <h3>Time Spent on Learning</h3>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn" id="userdropdown8" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown8"><a class="dropdown-item" href="dashboard-03.html#">Weekly</a><a class="dropdown-item" href="dashboard-03.html#">Monthly</a><a class="dropdown-item" href="dashboard-03.html#">Yearly</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body revenue-category">
                            <div class="pie-chart" id="pie-chart"></div>
                            <div class="donut-legend" id="legend"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
