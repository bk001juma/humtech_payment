    <div class="modal fade bd-qr-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="mySmallModalLabel">Receipt</h3>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <h2 class="text-center">
                        <img id="logo" src="/logo.png" alt="Logo" class="img-100 rounded-circle">
                    </h2>
                    <hr class="receipt">

                    <p><strong>Merchant:<br> </strong><span id="merchant">  </span></p>
                    <p><strong>Channel:<br> </strong> <span id="operator">  </span></p>
                    <p><strong>Phone:<br> </strong> 0<span id="phone">  </span></p>
                    <p><strong>Receipt:<br> </strong> <span id="receipt"></span> </p>
                    <p><strong>Service:<br> </strong> <span id="service"></span> </p>
                    <p><strong>Transaction Date:<br> </strong> <span id="date"></span> </p>


                    <div class="text-center align-content-center" id="qrcode" style="align-content: center"></div>

                    <hr class="receipt">

                    <h3 class="pb-20"><strong>Amount: </strong> Tsh. <span id="amount">0.00 </span></h3>

                </div>
            </div>
        </div>
    </div>
