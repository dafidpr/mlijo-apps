<div class="modal fade text-left" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="status-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="status-modal">Status Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="status-form" action="" method="POST" data-request="ajax"
                data-success-callback="{{ route('seller.orders') }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="activity-timeline timeline-left list-unstyled" id="status-body"></ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
