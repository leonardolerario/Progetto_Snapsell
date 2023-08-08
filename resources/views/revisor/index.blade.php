<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="container-header-secondary bg-revisor">
                    <div class="content-header watch transition">
                        @if ($announcement_to_check)
                            <h1 class="title-header">{{ __('ui.revisor') }}<br> <strong>{{$announcement_to_check->title}}</strong></h1>
                        @else
                            <h1 class="title-header">{{ __('ui.revisor') }}<br> <strong>{{ __('ui.revisor2') }}</strong></h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($announcement_to_check)
        <x-cardShow :announcement="$announcement_to_check"></x-cardShow>
    @endif

    <div class="toast-container" data-bs-delay="10000">
        <div id="liveToast" class="toast toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
            @if ($ultimo)
                <form action="{{route('revisor.null_announcement', ['announcement' => $ultimo])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-toast"><i class="fa-solid fa-share fa-rotate-180"></i></button>
                </form>
            @endif
            <div class="body-toast">
                <p><strong>{{ __('ui.annulla') }}</strong></p>
                <p>{{ __('ui.annulla2') }}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            <div class="progress"></div>
        </div>
    </div>
</x-layout>
