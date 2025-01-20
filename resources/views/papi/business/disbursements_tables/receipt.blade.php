@foreach($disbursements->where('status','success') as $disbursement)
    <div id="receipt_{{$disbursement->id}}" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="receipt_{{$disbursement->id}}" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="mySmallModalLabel">Receipt</h3>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body dark-modal">
                    <h2 class="text-center">Disbursement Receipt</h2>
                    <hr class="receipt">

                    <p><strong>Merchant:<br> </strong>{{$disbursement->business->name}}</p>
                    <p><strong>Requested Date:<br> </strong>{{date('d-m-Y H:i:s',strtotime($disbursement->created_at))}}</p>
                    <p><strong>Approved Date:<br> </strong>{{date('d-m-Y H:i:s',strtotime($disbursement->created_at))}}</p>
                    <p><strong>Approved By:<br> </strong>{{$disbursement->approver->first_name}} {{$disbursement->approver->last_name}}</p>


                    <hr class="receipt">

                    <h3 class="pb-20"><strong>Amount: </strong>{{number_format($disbursement->amount)}}TZS</h3>

                 </div>
            </div>
        </div>
    </div>

@endforeach

<style> hr.receipt { border: none; border-top: 5px dotted black; height: 5px; width: 100%; margin: 20px 0; } </style>
