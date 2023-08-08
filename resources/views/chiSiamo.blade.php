<x-layout>
    
    <section class="container-fluid vh-100 bg-chiSiamo">
        <div class="row h-100">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center h-custom ">
                <div class="circle">
                    <div class="opener">
                        <i class="fa-solid fa-plus fa-3x"></i>
                    </div>   
                </div>   
            </div>
            
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-md-center h-custom">
                <div id="div-sovrapposto">
                    <div class="content-header watch transition d-flex flex-column align-items-center">
                        <i id="arrow-up" class="fa-solid fa-arrow-up fa-4x d-none" style="color: #00afb9;"></i>
                        <h2 class="h2-chiSiamo">{{__('ui.chiSiamo')}}</h2>
                        <i id="arrow-left" class="fa-solid fa-arrow-left fa-5x d-none" style="color: #00afb9;"></i>
                    </div>
                </div>
                <div class="programmers-card d-none" id="transparent">
                    <div class="inner">
                        <div class="inner-face"></div>
                        <div class="inner-back container-fluid p-0">
                            <div class="row">
                                <div class="col-12 d-flex flex-column justify-content-around align-items-center z-5">
                                    <img src="/img/logo4.png" class="custom-backface-img" alt="">
                                    <p class="nome-card" id="programmer-name"></p>
                                    <p class="description-card" id="programmer-description"></p>
                                    <a id="programmer-linkedin" target="_blank" href=""><i class="fa-brands fa-3x fa-linkedin" style="color: #00afb9;"></i></a>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</x-layout>