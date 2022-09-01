@extends('site.master')
@section('content')

        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('siteasset/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">{{ $categories->name }}</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">{{ $categories->name }}</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Our Product Area -->
        <section class="htc__product__area shop__page ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">

                    <div class="row">
                        <div class="product__list another-product-style">
                            <!-- Start Single Product -->
                            @foreach ($categories->products as $product)
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="{{ route('site.product-details', $product->id) }}">
                                                <img src="{{$product->image }}" alt="product images">
                                            </a>
                                        </div>

                                    </div>
                                    <div class="product__details">
                                        <h2><a href="{{ route('site.product-details', $product->id) }}">{{ $product->name }}</a></h2>
                                        <ul class="product__price">
                                            @if ($product->sale_price)
                                            <li class="old__price">${{ $product->price }}</li>
                                            <li class="new__price">${{ $product->sale_price }}</li>
                                            @else
                                            <li class="new__price">${{ $product->price }}</li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Single Product -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
@stop
