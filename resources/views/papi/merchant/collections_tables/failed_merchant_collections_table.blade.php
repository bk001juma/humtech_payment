<div class="card">

    <div class="card-body">
        <div class="table-responsive user-datatable">
            <table class="display" id="basic-7">
                <thead>
                <tr>
                    <th>Merchant</th>
                    <th>Service</th>
                    <th>MSNID</th>
                    <th>Channel</th>
                    <th>Amount (TSH)</th>
                    <th>Status</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>

                @foreach($business->transactions->where('type','credit')->where('status','Like','failed') as $transaction)
                    <tr>
                        <td>
                            {{$transaction->business->name}}
                        </td>
                        <td>{{$transaction->business_product->name}}</td>
                        <td class="text-center">{{$transaction->phone_number}} </td>
                        <td>{{$transaction->operator->name}}</td>
                        <td class="text-center"><span class="pull-right">{{number_format($transaction->amount)}}</span> </td>
                        <td class="text-center"><span class="badge rounded-pill @if($transaction->status == 'success') badge-light-success @elseif($transaction->status == 'failed') badge-light-danger @else badge-light-warning @endif  text-capitalize">{{$transaction->status}}</span></td>
                        <td class="text-center">
                            {{date('d-m-Y H:i:s',strtotime($transaction->transaction_date))}}
                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>
