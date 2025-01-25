<div class="card">

    <div class="card-body">
        <div class="table-responsive user-datatable">
            <table class="display" id="basic-3">
                <thead>
                <tr>
                    <th>Merchant</th>
                    <th>Service</th>
                    <th>MSNID</th>
                    <th>Channel</th>
                    <th>Amount (TSH)</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Receipt</th>
                </tr>
                </thead>
                <tbody>

                @foreach($business->transactions->where('type','credit') as $transaction)
                    @php
                        $receipt_data = [
                            $transaction->business->name,
                            number_format($transaction->amount),
                            substr($transaction->phone_number,3),
                            $transaction->operator_transaction_id,
                            $transaction->business_product->name,
                            date('d-m-Y H:i:s',strtotime($transaction->created_at)),
                            route('admin.transaction.qr',$transaction->id)
                            ];

                    @endphp
                    <tr>
                        <td>
                            {{$transaction->business->name}}
                        </td>
                        <td>{{$transaction->business_product->name}}</td>
                        <td class="text-center">{{$transaction->phone_number}} </td>
                        <td>{{$transaction->operator->name}}</td>
                        <td class="text-center"><span class="pull-right">{{number_format($transaction->amount,2)}}</span> </td>
                        <td class="text-center">
                            <span class="badge rounded-pill @if($transaction->status == 'paid')badge-light-success @elseif($transaction->status == 'pending')badge-light-warning @else badge-light-danger @endif  text-capitalize">{{$transaction->status == 'paid' ? 'success' : $transaction->status}}</span></td>
                        <td class="text-center">
                            {{date('d-m-Y H:i:s',strtotime($transaction->transaction_date))}}
                        </td>
                        <td class="text-center">
                            <button onclick="getReceipt({{json_encode($receipt_data)}})" class="btn btn-xs btn-primary" id="myBtn" type="button" data-bs-toggle="modal" data-bs-target=".bd-qr-modal-sm">Open</button>

                            @if($transaction->status == 'paid')<button class="btn btn-xs btn-primary py-0"
                                type="button" data-bs-toggle="modal" data-bs-target="#receipt_{{$transaction->id}}"><i class="icon icon-eye"></i> </button> @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>
