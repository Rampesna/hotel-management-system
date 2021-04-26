<div class="modal fade" id="CreateReceiptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="CreateReceiptForm">
                <div class="modal-header">
                    <h5 class="modal-title">Yeni Fiş Oluştur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="create_receipt_direction">Gelir/Gider</label>
                                <select class="form-control" id="create_receipt_direction">
                                    <option value="1">Gelir Fişi</option>
                                    <option value="0">Gider Fişi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="create_receipt_date">Fiş Tarihi</label>
                                <input type="datetime-local" id="create_receipt_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="create_receipt_price">Fiş Tutarı</label>
                                <input type="text" id="create_receipt_price" class="form-control decimal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="create_receipt_description">Açıklamalar</label>
                                <textarea class="form-control" id="create_receipt_description" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="createReceiptButton">Oluştur</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
                </div>
            </form>
        </div>
    </div>
</div>