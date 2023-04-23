@if (count($sliders)>0)
    <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                <style>
                .ec-slide-{{$loop->iteration}}{
                    background-image: url({{asset('storage/'.$slider['image'])}});
                }
                </style>
                    <div class="ec-slide-item swiper-slide d-flex ec-slide-{{$loop->iteration}}">
                        <div class="container align-self-center">
                            <div class="row">
                                <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                    <div class="ec-slide-content slider-animation">
                                        <h1 class="ec-slide-title">{{$slider['title']}}</h1>
                                        <h2 class="ec-slide-stitle">{{$slider['sub_title']}}</h2>
                                        <p>{{$slider['description']}}</p>
                                        <a href="{{$slider['btn_link']}}" class="btn btn-lg btn-secondary">{{$slider['btn_text']}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
@endif