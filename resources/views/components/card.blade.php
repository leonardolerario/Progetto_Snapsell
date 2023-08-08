<div class="container-card">
    <div class="img">
        {{-- <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://digitshack.com/codepen/mentor13/image-product-desktop.jpg'}}" alt="foto card"> --}}
        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(600, 600) : 'https://digitshack.com/codepen/mentor13/image-product-desktop.jpg'}}" alt="foto card">
        @if (Route::currentRouteName() == 'announcement.index')
            <div class="auth-content">
                <p>{{$announcement->user->name ?? ''}}</p>
            </div>
        @endif
    </div>
    <div class="card-content">
        <div class="pro-cat-content">
            <div class="link-category-content">
                <a href="{{route('category.show', $announcement->category)}}" class="pro-cat">{{$announcement->category->name}}</a>
                <div class="evidenziatore"></div>
            </div>
            <h6 class="pro-cat">{{$announcement->created_at->format('d/m/Y')}}</h6>
        </div>
        <h2 class="pro-name">{{$announcement->titlSubstr()}}</h2>
        <div class="des-content">
            <p class="pro-des">{{$announcement->descSubstr()}}</p>
        </div>
        <div class="price">
            <p class="current-price">€ {{$announcement->formatPrice()}}</p>
        </div>
        <a href="{{route('announcement.show',compact('announcement'))}}" class="cta"><i class="fa-solid fa-paper-plane"></i>{{__('ui.card')}}</a>
    </div>
</div>