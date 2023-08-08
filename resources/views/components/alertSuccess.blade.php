<div class="modal fade" id="alertSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="btn-close btn-close-alert" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="content-icon content-icon-s">
                    <i class="fa-solid fa-check"></i>
                </div>
            </div>
            <div class="modal-body">
                <h1 class="modal-title modal-title-success">{{__('ui.success')}}</h1>
                <p class="modal-message">{{session('message')}}{{session('messageRevisor')}}</p>
            </div>
        </div>
    </div>
</div>