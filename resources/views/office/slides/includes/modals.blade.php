<!--begin::Modal - Add Payment-->
<div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Loan Payment</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div id="kt_modal_add_payment_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="" class="form" method="post" action="{{route('loan.pay',$loan->id)}}">
                    @csrf
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-semibold form-label mb-2">Payment Method</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <select class="form-select form-select-solid fw-bold" name="payment_method" required data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                            <option></option>
                            <option value="Mobile">Mobile</option>
                            <option value="Bank">Bank</option>
                            <option value="Cash">Cash</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-semibold form-label mb-2">Paid Amount</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="amount" required/>
                        <span class="text-warning">Balance ({{number_format($loan->balance)}})</span>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-15">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">Transaction ID</span>

                            <span class="ms-2" data-bs-toggle="tooltip" title="Unique transaction details/ID.">
                                <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                        </label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <textarea class="form-control form-control-solid rounded-3" required name="transaction_id"></textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_add_payment_cancel" class="btn btn-light me-3">
                            Discard
                        </button>

                        <button type="submit" onclick="btn()" id="sbm_btn" class="btn btn-primary">
                                        <span class="indicator-label">
                                            Submit
                                        </span>
                            <span class="indicator-progress">
                                            Please wait... <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->

<style>
    function btn(){
    x = document.getElementById('sbm_btn")
     x.dissable;
    }
</style>
