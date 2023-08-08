<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="container-header-secondary bg-show">
                    <div class="content-header watch transition">
                        <h1 class="title-header">{{__('ui.dettaglio')}} <br> <strong>{{$announcement->title}}</strong></h1>
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
    <x-cardShow :announcement="$announcement"></x-cardShow>
</x-layout>