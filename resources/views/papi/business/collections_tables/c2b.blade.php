<div class="card">
    <div class="card-body">
        <div class="table-responsive user-datatable">
            <table class="display" id="basic-4">
                <thead>
                <tr>
                    <th>Merchant</th>
                    <th>Service</th>
                    <th>MSISDN</th>
                    <th>Recipient</th>
                    <th>Channel</th>
                    <th>Amount (TSH)</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Receipt</th>
                </tr>
                </thead>
                <tbody>

                @foreach($transactions->where('type','c2b') as $transaction)
                    <tr>
                        <td>{{$transaction->business->name}}</td>
                        <td>{{$transaction->business_product->name}}</td>
                        <td class="text-center">{{$transaction->phone_number}} </td>
                        <td class="text-center">{{$transaction->note}} </td>
                        <td>{{$transaction->operator->name}}</td>
                        <td class="text-center"><span class="pull-right">{{number_format($transaction->amount,2)}}</span> </td>
{{--                        <td class="text-center"><span class="badge rounded-pill @if($transaction->type == 'credit')badge-light-success @else badge-light-warning @endif  text-capitalize">{{$transaction->type}}</span></td>--}}
                        <td class="text-center"><span class="badge rounded-pill @if($transaction->status == 'success')badge-light-success @else badge-light-danger @endif  text-capitalize">{{$transaction->status}}</span></td>
                        <td class="text-center">
                            {{date('d-m-Y H:i:s',strtotime($transaction->transaction_date))}}
                        </td>
                        <td class="text-center">
                            @if($transaction->status == 'success')<button class="btn btn-xs btn-primary py-0"><i class="icon icon-eye"></i> </button> @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>
