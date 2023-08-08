<x-layout>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 p-0">
        <div class="swiper swiperHeader">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="/img/vestitiHeader2.jpg">
            </div>
            <div class="swiper-slide">
                <img src="/img/motoriHeader.jpg">
            </div>
            <div class="swiper-slide">
                <img src="/img/musica.jpg">
            </div>
            <div class="swiper-slide">
                <img src="/img/elettronicaHeader3.jpg">
            </div>
            <div class="swiper-slide">
                <img src="/img/sportHeader2.jpg">
            </div>
            <div class="swiper-slide">
                <img src="/img/giochiHeader2.jpg">
            </div>
          </div>
        </div>
        <div class="container-header">
          <div class="content-header watch transition">
            <h1 class="title-header">Trade, Click, Smile: <br> <strong>{{__('ui.home')}}</strong></h1>
            <div class="content-addAds">
              <div class="col-12 col-lg-6">
                <p> {{__('ui.home2')}}<br><strong>{{__('ui.home3')}}</strong></p>
              </div>
              <div class="col-12 col-lg-6 content-btn-header">
                <a href="{{route('announcement.create')}}" class="cta-header"><i class="fa-solid fa-hand-holding-dollar"></i>{{__('ui.home1')}}</a>
              </div>
            </div>
            <form action="{{route('announcements.search')}}" method="GET" class="form-searchbar">
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
  {{-- Start ultimi sei annunci ----------------------------------------------------------------------------------------- --}}
  <div class="container py-5 bg-image">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="display-5 sottotitoli">{{__('ui.allAnnouncement')}}</h2>
      </div>
    </div>
  </div>
  <div class="container py-5">
    <div class="row">
      @php 
      $counter = 1;
      @endphp
      @foreach ($announcements as $announcement)
      @php
      @endphp
      @if($counter == 1)
        <div class="col-12 col-md-6 col-xl-4 p-3 my-3 watch transition-card1 animation1">
          <x-card :announcement="$announcement"></x-card>
          @php
          $counter += 1;
          @endphp
        </div>
        @elseif($counter == 2)
        <div class="col-12 col-md-6 col-xl-4 p-3 my-3 watch transition-card2 animation2">
          <x-card :announcement="$announcement"></x-card>
          @php
          $counter +=1;
          @endphp
        </div>
        
        @elseif($counter == 3)
        <div class="col-12 col-md-6 col-xl-4 p-3 my-3 watch transition-card3 animation3">
          <x-card :announcement="$announcement"></x-card>
          @php
          $counter =1;
          @endphp
        </div>
        @endif
      @endforeach
    </div>
  </div>
  {{-- End ultimi sei annunci ------------------------------------------------------------------------------------------- --}}
</x-layout>