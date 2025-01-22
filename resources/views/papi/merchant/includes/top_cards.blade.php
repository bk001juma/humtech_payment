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
                        <h5>{{count($transactions->where('type','credit')->where('status','paid'))}}
                            Transactions</h5>
                    </li>
                    <li><i class="iconly-Wallet icli me-1"></i>
                        <h5>{{number_format($transactions->where('type','credit')->where('status','paid')->sum('amount'))}}
                            TZS</h5>
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
                        <h5>{{count($business->disbursements->where('status','success'))}}
                            Transactions</h5>
                    </li>
                    <li><i class="iconly-Wallet icli me-1"></i>
                        <h5>{{number_format($business->disbursements->where('status','success')->sum('amount'))}}
                            TZS</h5>
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
                        <h5>{{count($business->disbursements}}
                            Transactions</h5>
                    </li>
                    <li><i class="iconly-Wallet icli me-1"></i>
                        <h5>{{number_format($business->disbursements->sum('amount'))}}
                            TZS</h5>
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
                        <h5>{{count($business->disbursements->where('status','success'))}}
                            Transactions</h5>
                    </li>
                    <li><i class="iconly-Wallet icli me-1"></i>
                        <h5>{{number_format($business->disbursements->where('status','success')->sum('amount'))}}
                            TZS</h5>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
