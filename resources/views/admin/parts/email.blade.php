<div id="bulkEmailModal" class="modal fade" tabindex="-1" aria-labelledby="bulkEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulkEmailLabel">{{ __('admin.bulk-email') }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="modal-bulkEmail-form" class="modal-bulkEmail-form">
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button class="bulkEmail-close btn btn-secondary" data-bs-dismiss="modal">Close<i
                        class="fa fa-cancel ms-2"></i></button>
                <button type="submit" class="bulkEmail-save btn btn-primary">Save changes<i
                        class="fa fa-save ms-2"></i></button>
            </div>
        </div>
    </div>
</div>