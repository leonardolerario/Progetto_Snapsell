<x-layout>
    <div class="container py-5 mt-5">
        <div class="row justify-content-center p-3 p-md-0">
            <div class="row col-12 col-xl-10 rl-content">
                <div class="panels-container col-12 col-md-5">
                    <div class="panel">
                        <div class="text-white">
                            <h3>{{__('ui.home1')}}</h3>
                            <p class="m-0">{{__('ui.Create2')}} </p>
                            <p class="m-0 pt-0">{{__('ui.Create3')}}</p>
                            <a href="{{route('announcement.index')}}" class="btn-rl">{{__('ui.Annunci')}}</a>
                        </div>
                        <img src="/media/createAds.svg" alt="image create ads" class="image">
                    </div>
                </div>
                <div class="col-12 col-md-7 p-0">
                    <livewire:create-announcement/>
                </div>
            </div>
        </div>
    </div>
</x-layout>