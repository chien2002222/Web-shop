@extends('main')

@section('content')
@include('header')
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".women">Women’s</li>
                    <li data-filter=".men">Men’s</li>
                    <li data-filter=".kid">Kid’s</li>
                    <li data-filter=".accessories">Accessories</li>
                    <li data-filter=".cosmetic">Cosmetics</li>
                </ul>
            </div>
        </div>
        <div class="row property__gallery" id="loadProduct">
            @include('product.product')
        </div>
    </div>
</section>
<!-- Product Section End -->

<div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
    <input type="hidden" value="1" id="page">
    <a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
        Load More
    </a>
</div>

<!-- Banner Section Begin -->

    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <style>
                    .banner__item {
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        width: 100%;
                        height: 400px; /* Chiều cao cố định cho các ảnh trong slider, bạn có thể điều chỉnh tùy ý */
                    }

                    .banner__slider .owl-carousel .owl-item img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                </style>
                <div class="banner__slider owl-carousel">
                    @foreach ($sliders as $slider)
                    <div class="banner__item" style="background-image: url('{{ $slider->image }}');">
                        <div class="banner__text">
                            <span>{{ $slider->name }}</span>
                            <h1>{{ $slider->url }}</h1>
                            <a href="{{ $slider->url }}">Shop now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<!-- Banner Section End -->

@endsection