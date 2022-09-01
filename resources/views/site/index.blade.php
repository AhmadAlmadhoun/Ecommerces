@extends('site.master')

@section('content')
<!-- Start Feature Product -->
<section class="categories-slider-area bg__white">
    <div class="container">
        <div class="row">
            <!-- Start Left Feature -->
            <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                <!-- Start Slider Area -->
                <div class="slider__container slider--one">
                    <div class="slider__activation__wrap owl-carousel owl-theme">
                        @foreach ($latest_products as $l_product)
                            <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url({{ $l_product->image }}) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>{{ $l_product->name}} <span class="text--theme">{{ $l_product->category->name }}</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href="{{ route('site.product-details', $l_product->id) }}">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                        @endforeach


                    </div>
                </div>
                <!-- Start Slider Area -->
            </div>
            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                <div class="categories-menu mrg-xs">
                    <div class="category-heading">
                        <h3> Browse Categories</h3>
                    </div>
                    <div class="category-menu-list">
                        <ul>
                            @foreach ($main_categories as $m_category)
                            @php
                                $has_dropdown = false;
                            @endphp
                            @if ($m_category->children->count() > 0)
                                @php
                                    $has_dropdown = true;
                                @endphp
                            @endif

                            <li><a href="{{ route('site.category', $m_category->id) }}"><img alt="" src="{{ $m_category->image }}"> {{ $m_category->name }}

                            @if ($has_dropdown)
                                <i class="zmdi zmdi-chevron-right"></i>
                            @endif

                            </a>
                                @if ($has_dropdown)
                                <div class="category-menu-dropdown">
                                    <div class="category-part-1 category-common mb--30">
                                        <ul>
                                            @foreach ($m_category->children as $child)
                                            <li><a href="{{ route('site.category', $child->id) }}"> {{ $child->name }}</a></li>
                                            @endforeach


                                        </ul>
                                    </div>

                                </div>
                                @endif

                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Left Feature -->
        </div>
    </div>
</section>
<!-- End Feature Product -->
<div class="only-banner ptb--100 bg__white">
    <div class="container">
        <div class="only-banner-img">
            <a href="#"><img src="{{ asset('siteasset/images/4.png') }}" alt="new product"></a>
        </div>
    </div>
</div>
        <!-- End Feature Product -->
        <!-- Start Our Product Area -->

        @foreach ($cild_categories as $c_categories )
        @php
            $has_dropdown = false;
        @endphp
        @if ($c_categories->children->count() > 0)
            @php
                $has_dropdown = true;
            @endphp
        @endif
        @if ($has_dropdown)
        <section class="htc__product__area bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="product-categories-all">
                            <div class="product-categories-title">
                                <h3>{{ $c_categories->name }}</h3>
                            </div>

                            <div class="product-categories-menu">
                                <ul>
                                    @foreach ($c_categories->children  as $ch_categories)

                                    <li><a href="{{ route('site.category',$ch_categories->id) }}">{{ $ch_categories->name }}</a></li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style" role="tablist">
                                    <li class="active">
                                        <a href="#home1" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>latest </h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#home2" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>best sale </h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#home3" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>top rated</h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#home4" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>on sale</h4>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="home1">
                                    <div class="row">
                                        <div class="product-slider-active owl-carousel">
                                            @foreach ($c_categories->children as $ch_categories)

                                            <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                <div class="product">
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
                                                            <a href="{{ route('site.category',$ch_categories->id) }}">
                                                                <img src="{{ $ch_categories->image }}" alt="product images">
                                                            </a>
                                                        </div>
                                                        <div class="product__hover__info">
                                                            <ul class="product__action">
                                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                                <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                                <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product__details">
                                                        <h2><a href="product-details.html">{{ $ch_categories->name }}</a></h2>

                                                        {{-- <ul class="product__price">

                                                            <li class="old__price">${{ $c_categories->products->price }}</li>
                                                            <li class="new__price">{{ $c_categories->products->sale_price }}</li>

                                                        </ul> --}}

                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <div class="only-banner ptb--100 bg__white">
            <div class="container">
                <div class="only-banner-img">
                    <a href="{{ route('site.category',$ch_categories->id) }}"><img src="{{ asset('siteasset/images/4.png') }}" alt="new product"></a>
                </div>
            </div>
        </div>
        @endif
        @endforeach




        @stop
