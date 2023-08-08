<div class="modal fade" id="alertDanger" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="btn-close btn-close-alert" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="content-icon content-icon-d">
                    <i class="fa-solid fa-land-mine-on"></i>
                </div>
            </div>
            <div class="modal-body">
                <h1 class="modal-title modal-title-danger">{{__('ui.danger')}}</h1>
                <p class="modal-message">{{session('access.denied')}}</p>
            </div>
        </div>
    </div>
</div>