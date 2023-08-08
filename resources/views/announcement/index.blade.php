<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="container-header-secondary bg-allAds">
                    <div class="content-header watch transition">
                        <h1 class="title-header">{{ __('ui.TuttiGliAnnunci') }} <br> <strong>{{ __('ui.TuttiGliAnnunci2') }}</strong></h1>
                        <form action="{{route('announcements.search')}}" method="GET" class="form-searchbar mt-4">
                            @csrf
                            <div class="content-input-btn">
                            <div>
                                <button class="btn btn-searchbar" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div>
                                <input name="searched" class="form-control" placeholder="{{__('ui.placeholderSearch')}}..." aria-label="search" type="search">
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-6 col-xl-4 p-3">
                    <x-card :announcement="$announcement"></x-card>
                </div>
            @endforeach
            {{$announcements->links()}}
        </div>
    </div>
</x-layout>
