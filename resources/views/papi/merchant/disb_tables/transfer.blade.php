<div class="card">

    <div class="card-body">

        <div class="table-responsive user-datatable">
            <div class="card-header pb-0 card-no-border">
                <h2>{{$business->name}} - Bulk Payments</h2>
                <div class="pull-right">
                    <button class="btn btn-primary px-xl-2 px-xxl-3" type="button" data-bs-toggle="modal" data-bs-target="#request_des_modal" data-whatever="@getbootstrap">
                        <i class="iconly-Plus"></i> Create Disbursements Request
                    </button>
                </div>
            </div>

            <table class="display" id="basic-5">
                <thead>
                <tr>
                    <th>Merchant</th>
                    <th>Channel</th>
                    <th>Company</th>
                    <th>Account/Phone</th>
                    <th>Amount (TSH)</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Receipt</th>
                </tr>
                </thead>
                <tbody>

                @foreach($business->disbursements as $disbursement)
                    <tr>
                        <td>{{$business->name}}</td>
                        <td>{{$disbursement->channel}}</td>
                        <td>{{$disbursement->company}}</td>
                        <td>{{$disbursement->account_number}}</td>
                        <td>{{number_format($disbursement->amount)}} TZS</td>
                        <td>
                            <span class="badge rounded-pill @if($disbursement->status == 'success')badge-light-success @else badge-light-warning @endif  text-capitalize">pending</span>
                        </td>
                        <td>{{date('d-m-Y H:i:s',strtotime($disbursement->request_date))}}</td>
                        <td class="text-center">
                            @if($disbursement->status == 'success')
                                <button class="btn btn-xs btn-primary py-0"><i class="icon icon-eye"></i> </button>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                </tfoot>
            </table>
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
                    <form class="row g-3 needs-validation" method="POST" action="{{route('disbursements.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input hidden="hidden" value="{{$business->id}}" name="business_id">
                        <div class="col-md-6">
                            <label class="form-label" for="select">Channel</label>
                            <select class="form-control" id="select" name="channel" required>
                                <option>Bank</option>
                                <option>Mobile Money</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="select">Company</label>
                            <select class="form-control" id="select" name="company" required>
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
                                <input class="form-control" type="text" required="required" name="account_number"
                                       placeholder="0J4534343" >
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
