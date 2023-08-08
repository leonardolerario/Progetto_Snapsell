<div class="container-form-createAds">
    <form wire:submit.prevent="store">
        @csrf
        <div class="input-field @error('title') is-invalid @enderror">
            <div class="content-icon-formAds">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
            <input type="text" placeholder="{{__('ui.placeholderCreate')}}" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.lazy="title">
        </div>
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="input-field-textarea @error('description') is-invalid @enderror">
            <div class="content-icon-formAds">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <textarea type="text" rows="3" placeholder="{{__('ui.placeholderCreate2')}}" class="form-control @error('description') is-invalid @enderror" id="description" wire:model.lazy="description">
            </textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="input-field @error('price') is-invalid @enderror">
            <div class="content-icon-formAds">
                <i class="fa-solid fa-euro-sign"></i>
            </div>
            <input type="number" placeholder="{{__('ui.placeholderCreate3')}}" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.lazy="price">
        </div>
        @error('price')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="input-field  @error('category') is-invalid @enderror">
            <div class="content-icon-formAds">
                <i class="fa-solid fa-list"></i>
            </div>
            <select id="category" role="button" class="form-control @error('category') is-invalid @enderror" wire:model.defer="category">
                <option value="">{{__('ui.Create4')}}</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        @error('category')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror


        <div class="input-field-file @error('temporary_images.*') is-invalid @enderror">
            <label class="cover-file" for="file"><i class="fa-solid fa-file-image"></i></label>
            <input id="file" wire:model="temporary_images" type="file" name="images" multiple class=" form-control @error('temporary_images.*') is-invalid @enderror">
        </div>
        @error('temporary_images.*')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        @if (!empty($images))
            <div class="content-uploadForce">
                <p>{{__('ui.Create5')}}</p>
                <button type="button" class="btn" onclick="initializeSwiper()">
                    <i class="fa-solid fa-arrow-rotate-right"></i>
                </button>
            </div>
            <div class="container-swiperCreateAds">
                <div thumbsSlider="" class="swiper swiperCreateAds">
                    <div class="swiper-wrapper">
                        @foreach ($images as $key => $image)
                            <div class="swiper-slide">
                                <img class="imgCreate" src="{{$image->temporaryUrl()}}" onload="checkAllImagesLoaded()">
                                <button type="button" class="btn btn-deleteImage" wire:click="removeImage({{$key}})"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <button type="submit" class="btn-createAds">{{__('ui.create')}}</button>
    </form>

    <script>
        window.addEventListener('onContentChanged', () => {
            initializeSwiper();
        });
        let imagesLoaded = false;
        function checkAllImagesLoaded() {
            let images = document.querySelectorAll('.imgCreate');

            images.forEach((num) => {
                if(!num.complete){
                    return;
                }
            });
           
            if (!imagesLoaded) {
                initializeSwiper()
                imagesLoaded = true; 
            }
        }
        function initializeSwiper() {
            let swiperCreateAds = new Swiper(".swiperCreateAds", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,

                mousewheel: {
                releaseOnEdges: true,
                },
            });
        }
    </script>

    @if (session()->has('message'))
        <script>
                let messageModal = new bootstrap.Modal(document.querySelector('#alertSuccess'));
                messageModal.show();
                
                messageModal._element.addEventListener('hide.bs.modal', function() {
                    location.reload();
                });
        </script>
    @endif
    <x-alertSuccess></x-alertSuccess>
</div>