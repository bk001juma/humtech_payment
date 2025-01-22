@foreach($transactions->where('type','credit') as $transaction)
    <div id="receipt_{{$transaction->id}}" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="receipt_{{$transaction->id}}" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="mySmallModalLabel">Receipt</h3>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <h2 class="text-center">
                        <img src="/{{$transaction->business->logo}}" alt="{{$transaction->business->name}} Logo" class="img-60 rounded-circle">
                    </h2>
                    <hr class="receipt">

                    <p><strong>Merchant:<br> </strong>{{$transaction->business->name}}</p>
                    <p><strong>Channel:<br> </strong>{{$transaction->operator->name}}</p>
                    <p><strong>Phone:<br> </strong>0{{substr($transaction->phone_number,3)}}</p>
                    <p><strong>Receipt:<br> </strong>{{$transaction->operator_transaction_id}}</p>
                    <p><strong>Service:<br> </strong>{{$transaction->business_product->name}}</p>
                    <p ><strong>Transaction Date:<br> </strong>{{date('d-m-Y H:i:s',strtotime($transaction->created_at))}}</p>

                    <div class="text-center">
                        <img class="text-center" src="/qr.png" alt="qr">
                    </div>

                    <hr class="receipt">

                    <h3 class="pb-20"><strong>Amount: </strong> Tsh. {{number_format($transaction->amount,2)}}</h3>

                 </div>
            </div>
        </div>
    </div>

@endforeach

<style> hr.receipt { border: none; border-top: 5px dotted black; height: 5px; width: 100%; margin: 20px 0; } </style>
