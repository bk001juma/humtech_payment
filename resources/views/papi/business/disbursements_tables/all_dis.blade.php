<div class="card">

    <div class="card-body">
        <div class="table-responsive user-datatable">
            <table class="display" id="basic-3">
                <thead>
                <tr>
                    <th>Merchant</th>
                    <th>Channel</th>
                    <th>Company</th>
                    <th>Account/Phone</th>
                    <th>Amount (TSH)</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Action</th>
                    <th>Receipt</th>
                </tr>
                </thead>
                <tbody>

                @foreach($disbursements as $disbursement)
                    <tr>
                        <td>{{$disbursement->business->name}}</td>
                        <td>{{$disbursement->channel}}</td>
                        <td>{{$disbursement->company}}</td>
                        <td>{{$disbursement->account_number}}</td>
                        <td>{{number_format($disbursement->amount)}} TZS</td>
                        <td>
                            <span class="badge rounded-pill @if($disbursement->status == 'success')badge-light-success @elseif($disbursement->status == 'rejected') badge-light-danger @else badge-light-warning @endif  text-capitalize">{{$disbursement->status}}</span>
                        </td>
                        <td>{{date('d-m-Y H:i:s',strtotime($disbursement->request_date))}}</td>
                        <td>
                            @if($disbursement->status == 'pending')
                            <button class="btn-xs btn-primary"
                                    type="button" data-bs-toggle="modal" data-bs-target="#approve_{{$disbursement->id}}" data-whatever="@getbootstrap"><i class="icon icon-thumb-up"></i> </button>
                            <button class="btn-xs btn-warning"
                                    type="button" data-bs-toggle="modal" data-bs-target="#reject_{{$disbursement->id}}" data-whatever="@getbootstrap"><i class="icon icon-thumb-down"></i> </button>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($disbursement->status == 'success')
                                <button class="btn btn-xs btn-primary py-0"
                                type="button" data-bs-toggle="modal" data-bs-target="#receipt_{{$disbursement->id}}"><i class="icon icon-eye"></i> </button>
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


@foreach($disbursements as $disbursement)
    <div class="modal fade" id="approve_{{$disbursement->id}}" tabindex="-1" role="dialog" aria-labelledby="approve_{{$disbursement->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-toggle-wrapper">
                        <ul class="modal-img">
                            <li> <img src="../assets/images/gif/approve.gif" alt="error"></li>
                        </ul>
                        <h3 class="text-center pb-2">Approve {{number_format($disbursement->amount)}} TZS <br> to {{$disbursement->business->name}}?</h3>
                        <p class="text-center"><strong> {{number_format($disbursement->amount)}} </strong> TZS will be sent to <br>
                            <strong>{{$disbursement->company}}</strong>  acount <strong>{{$disbursement->account_number}}</strong></p>
                        <div class="col-md-12">
                            <div class="align-content-center">
                                <button class="btn btn-secondary pull-left" type="button" data-bs-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary pull-right" href="{{route('disbursement.approve',$disbursement->id)}}">Approve</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach($disbursements as $disbursement)
    <div class="modal fade" id="reject_{{$disbursement->id}}" tabindex="-1" role="dialog" aria-labelledby="approve_{{$disbursement->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-toggle-wrapper">
                        <ul class="modal-img">
                            <li> <img src="../assets/images/gif/danger.gif" alt="error"></li>
                        </ul>
                        <h3 class="text-center pb-2">Reject {{number_format($disbursement->amount)}} TZS <br> to {{$disbursement->business->name}}?</h3>
                      <hr>
                        <div class="col-md-12">
                            <div class="align-content-center">
                                <button class="btn btn-secondary pull-left" type="button" data-bs-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger pull-right" href="{{route('disbursement.reject',$disbursement->id)}}">Reject</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
