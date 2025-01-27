@php

    use SimpleSoftwareIO\QrCode\Facades\QrCode;$receipt_data = [
        $transaction->business->name,
        number_format($transaction->amount),
        substr($transaction->phone_number,3),
        $transaction->operator_transaction_id,
        $transaction->business_product->name,
        date('d-m-Y H:i:s',strtotime($transaction->created_at)),
        ];

$png = QrCode::format('png')->size(100)->generate("Receipt:\nMerchant: ".$transaction->business->name."\nPhone: 0".substr($transaction->phone_number,3)."\nTrans ID: ".$transaction->operator_transaction_id."\nDate: ".date('d-m-Y H:i:s',strtotime($transaction->created_at)));
$png = base64_encode($png);
@endphp


<div style="border-bottom: 1px dashed #000; text-align: center; justify-content: center; padding: 10px;">
    <h3 class="modal-title fs-5" id="mySmallModalLabel" style="font-weight: bold;">Receipt</h3>
</div>
<div class="modal-body"
     style="font-family: 'Courier New', Courier, monospace; font-size: 14px; padding: 10px;">
    <h2 class="text-center mb-3">
    </h2>
    <hr class="receipt" style="border-top: 1px dashed #000; margin: 10px 0;">

    <p><strong>Merchant:</strong><br> {{$transaction->business->name}} </p>
    <p><strong>Channel:</strong><br> {{$transaction->business->name}} </p>
    <p><strong>Phone:</strong><br> 0{{substr($transaction->phone_number,3)}}</p>
    <p><strong>Receipt:</strong><br> {{$transaction->operator_transaction_id}}</p>
    <p><strong>Service:</strong><br> {{$transaction->business_product->name}}</p>
    <p><strong>Transaction Date:</strong><br> {{date('d-m-Y H:i:s',strtotime($transaction->created_at))}}
    </p>

    <hr class="receipt" style="border-top: 1px dashed #000; margin: 10px 0;">

    <div class="text-center" id="qrcode" style="margin: 10px 0;"></div>

    <img src='data:image/png;base64,{{$png}}'>

    <div class="d-flex justify-content-center align-items-center mt-3">
        {{--                    <img src="{!! QrCode::size(100)->generate() !!}">--}}

    </div>

    <hr class="receipt" style="border-top: 1px dashed #000; margin: 10px 0;">

    <h3 class="text-center pb-20" style="font-weight: bold; margin-top: 15px;"><strong>Amount:</strong> Tsh.
        <span id="amount">{{number_format($transaction->amount,2)}}</span></h3>
</div>
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

<script>
    var user = {!! json_encode($receipt_data) !!};


    document.addEventListener('DOMContentLoaded', function () {
        const qrcode = new QRCode(document.getElementById('qrcode'), {
            text: "Receipt:" + "\nMerchant: " + user[0] + "\nPhone: 0" + user[2] + "\nTrans ID: " + user[3] + "\nDate: " + user[5],
            width: 100,
            height: 100,
            colorDark: '#000',
            colorLight: '#fff',
            correctLevel: QRCode.CorrectLevel.H
        });
    });
</script>
