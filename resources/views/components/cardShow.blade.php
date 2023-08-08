<div class="container py-5">
    <div class="row p-3 justify-content-center">
        <div class="col-12 col-xxl-8 row content-show">
            <div class="col-12 col-md-6 swiperContent">
                <div class="swiper swiperMain ">
                    <div class="swiper-wrapper">
                        @if (!$announcement->images->isEmpty())
                            @foreach ($announcement->images as $image)
                                <div class="swiper-slide">
                                    {{-- <img src="{{Storage::url($image->path)}}"> --}}
                                    <img src="{{$image->getUrl(600, 600)}}">
                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-2.jpg">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        @endif
                    </div>
                    <div class="swiper-button-next"></div> 
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper swiperThumbs">
                    <div class="swiper-wrapper">
                        @if (!$announcement->images->isEmpty())
                            @foreach ($announcement->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{$image->getUrl(600, 600)}}">
                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-2.jpg">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 card-container-show">
                @if (Route::currentRouteName() == 'revisor.index')
                    <div class="card-content card-content-show card-content-show-p">
                @else
                    <div class="card-content card-content-show">
                @endif
                    <div>
                        <div class="auth-content-show">
                            <p>{{$announcement->user->name ?? ''}}</p>
                        </div>
                        <div class="pro-cat-content">
                            <div class="link-category-content">
                                <a href="{{route('category.show', $announcement->category)}}" class="pro-cat">{{$announcement->category->name}}</a>
                                <div class="evidenziatore"></div>
                            </div>
                            <h6 class="pro-cat">{{$announcement->created_at->format('d/m/Y')}}</h6>
                        </div>
                        <h2 class="pro-name-show">{{$announcement->title}}</h2>
                    </div>
                    <textarea readonly class="pro-des-show">{{$announcement->description}}</textarea readonly>
                    <div>
                        <div class="price">
                            <p class="current-price">€ {{$announcement->formatPrice()}}</p>
                        </div>
                        @if (Route::currentRouteName() != 'revisor.index')
                            <a href="{{url()->previous()}}" class="cta"><i class="fa-solid fa-arrow-right-from-bracket"></i>Torna indietro</a>
                        @endif
                    </div>
                    @if (Route::currentRouteName() == 'revisor.index')
                        <div class="row content-choose">
                            <div class="col-6 p-0">
                                {{-- <p class="acce-reje">Accetta</p> --}}
                                <form action="{{route('revisor.accept_announcement', ['announcement' => $announcement])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-revisor-accepted" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Accetta" data-bs-custom-class="tooltip-revisor-accepted" ><i class="fa-solid fa-check"></i></button>
                                </form>
                            </div>
                            <div class="col-6 p-0">
                                {{-- <p class="acce-reje">Rifiuta</p> --}}
                                <form action="{{route('revisor.reject_announcement', ['announcement' => $announcement])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-revisor-reject" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Rifiuta" data-bs-custom-class="tooltip-revisor-reject"><i class="fa-solid fa-xmark"></i></button>
                                </form>
                            </div>
                            <div class="content-btn-show col-12">
                                <button class="btn btn-show dropdown-toggle" type="button">Mostra report AI</button>
                            </div>
                            <div class="containerAI col-12">
                                <div class="contentReportAI">
                                    <div class="scroll">
                                        <div class="column-category">
                                            <div class="opacity-0">Categorie</div>
                                            <div>Adulti:</div>
                                            <div>Satira:</div>
                                            <div>Medicina:</div>
                                            <div>Violenza:</div>
                                            <div>Provocatorio:</div>
                                        </div>
                                        <div class="table-value">
                                            @foreach ($announcement->images as $key => $image)
                                            <div onclick="showTag({{$key}})" class="column-value">
                                                <div class="content-foto">Foto {{$key + 1}}</div>
                                                <div class="{{$image->adult}}"></div>
                                                <div class="{{$image->spoof}}"></div>
                                                <div class="{{$image->medical}}"></div>
                                                <div class="{{$image->violence}}"></div>
                                                <div class="{{$image->racy}}"></div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="content-tags">
                                    @foreach ($announcement->images as $key => $image)
                                        @if ($image->labels)
                                            <div class="tag-{{$key}}">
                                                <p class="acce-reje">Tags foto {{$key + 1}}</p>
                                                @foreach ($image->labels as $label)
                                                    <p class="d-inline">{{$label}},</p>  
                                                @endforeach  
                                            </div>                              
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function showTag(id){
            let tag = document.querySelector(`.tag-${id}`);
            let tags = document.querySelectorAll('[class^="tag-"]');
            
            tags.forEach((tag) => {
                tag.classList.add('d-none');
            });
            tag.classList.remove('d-none');
            tag.classList.add('d-block');
        }
        let btnShow = document.querySelector('.btn-show');
        let containerAI = document.querySelector('.containerAI');

        btnShow.addEventListener('click', ()=>{
            containerAI.classList.toggle('showAI');
        });
    </script>
</div>