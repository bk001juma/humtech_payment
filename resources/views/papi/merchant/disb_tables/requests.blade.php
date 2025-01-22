<div class="card">

    <div class="card-body">
        <div class="table-responsive user-datatable">

            <table class="display" id="basic-4">
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
                        <td>{{number_format($disbursement->amount,2)}} TZS</td>
                        <td>
                            <span class="badge rounded-pill @if($disbursement->status == 'success')badge-light-success @elseif($disbursement->status == 'rejected') badge-light-danger @else badge-light-warning @endif  text-capitalize">{{$disbursement->status}}</span>
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
