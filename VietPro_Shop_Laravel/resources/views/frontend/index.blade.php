@extends('frontend.layout.master')

@section('title', 'Trang chủ')

@section('main')

    <div id="wrap-inner">
        <div class="products">
            <h3>sản phẩm nổi bật</h3>
            <div class="product-list row">

                @foreach($featured_products as $featured_product)
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="#"><img
                                src="{{ asset('asset/img/product_image/' . $featured_product->image) }}"
                                class="img-thumbnail"></a>
                        <p><a href="#">{{ $featured_product->name }}</a></p>
                        <p class="price">{{ number_format($featured_product->price, 0, ',', '.') }}</p>
                        <div class="marsk">
                            <a href="{{ asset('details/' . $featured_product->product_id . '/' . $featured_product->slug . '.html') }}">Xem
                                chi tiết</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="products">
            <h3>sản phẩm mới</h3>
            <div class="product-list row">
                @foreach($new_products as $new_product)
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="#">
                            <img src="{{ asset('asset/img/product_image/' . $new_product->image) }}"
                                 class="img-thumbnail">
                        </a>
                        <p><a href="#">{{ $new_product->name }}</a></p>
                        <p class="price">{{ number_format($new_product->price, 0, ',', '.') }}</p>
                        <div class="marsk">
                            <a href="{{ asset('details/' . $new_product->product_id . '/' . $new_product->slug . '.html') }}">Xem
                                chi tiết</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
