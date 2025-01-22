<div class="card">
    <div class="card-body">
        <div class="table-responsive user-datatable">
            <table class="display" id="basic-1">
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

                @foreach($transactions->where('type','credit') as $transaction)
                    <tr>
                        <td>
                            <h4>
                                {{$transaction->business->name}}
                            </h4>
                        </td>
                        <td>{{$transaction->business_product->name}}</td>
                        <td class="text-center">{{$transaction->phone_number}} </td>
                        <td>{{$transaction->operator->name}}</td>
                        <td class="text-center">{{number_format($transaction->amount)}}</td>
                        <td class="text-center">
                            <span class="badge rounded-pill @if($transaction->status == 'paid')badge-light-success @elseif($transaction->status == 'pending')badge-light-warning @else badge-light-danger @endif  text-capitalize">{{$transaction->status == 'paid' ? 'success' : $transaction->status}}</span></td>
                        <td class="text-center">
                            {{date('d-m-Y H:i:s',strtotime($transaction->transaction_date))}}
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Merchant</th>
                    <th>Service</th>
                    <th>MSNID</th>
                    <th>Channel</th>
                    <th>Amount (TSH)</th>
                    <th>Status</th>
                    <th>Time</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
