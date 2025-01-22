<div class="card">
    <div class="card-body">
        <div class="table-responsive user-datatable">
            <table class="display" id="basic-6">
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

                @foreach($disbursements->where('status','success') as $disbursement)
                    <tr>
                        <td>{{$disbursement->business->name}}</td>
                        <td>{{$disbursement->channel}}</td>
                        <td>{{$disbursement->company}}</td>
                        <td>{{$disbursement->account_number}}</td>
                        <td>{{number_format($disbursement->amount,2)}} TZS</td>

                        <td>
                            <span class="badge rounded-pill @if($disbursement->status == 'success')badge-light-success @else badge-light-warning @endif  text-capitalize">{{$disbursement->status}}</span>
                        </td>
                        <td>{{date('d-m-Y H:i:s',strtotime($disbursement->request_date))}}</td>

                        <td class="text-center">
                            @if($disbursement->status == 'success')
                                <button class="btn btn-xs btn-primary py-0" type="button" data-bs-toggle="modal" data-bs-target="#receipt_{{$disbursement->id}}"><i class="icon icon-eye"></i> </button>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
