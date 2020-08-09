@extends('frontend.layout.master')

@section('title', 'Chi tiết sản phẩm')

@section('main')

    <link rel="stylesheet" href="css/details.css">

    <div id="wrap-inner">
        <div id="product-info">
            <div class="clearfix"></div>
            <h3>{{ $product->name }}</h3>
            <div class="row">
                <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                    <img width="250" src="{{ asset('asset\img\product_image\\' . $product->image) }}">
                </div>
                <div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                    <p>Giá: <span class="price">{{ number_format($product->price, 0, ',', '.') }}</span></p>
                    <p>Bảo hành: {{ $product->warranty }}</p>
                    <p>Phụ kiện: {{ $product->accessories }}</p>
                    <p>Tình trạng: {{ $product->condition }}</p>
                    <p>Khuyến mại: {{ $product->promotion }}</p>
                    <p>Còn hàng: {{ $product->status == 1 ? 'Còn hàng' : 'Hết hàng' }}</p>
                    <p class="add-cart text-center"><a href="{{ asset('cart/add/' . $product->product_id) }}">Đặt hàng online</a></p>
                </div>
            </div>
        </div>

        <div id="product-detail">
            <h3>Chi tiết sản phẩm</h3>
            <p class="text-justify">{!! $product->description  !!}</p>
        </div>

        <div id="comment">
            <h3>Bình luận</h3>
            <div class="col-md-9 comment">
                @include('errors.all_errors')
                @include('notifications.all_notifications')
                <form method="post"
                      action="{{ url('details/post-comment/' . $product->product_id . '/' . $product->slug . '.html') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="comment_email"
                               value="{{ old('comment_email') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input type="text" class="form-control" id="name" name="comment_name"
                               value="{{ old('comment_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="cm">Bình luận:</label>
                        <textarea rows="3" id="cm" class="form-control"
                                  name="comment_content">{{ old('comment_content') }}</textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-default">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="comment-list">
            @foreach($product->comments as $comment)
                <ul>
                    <li class="com-title">
                        {{ $comment->name }}
                        <br>
                        <span>{{ date_format($comment->created_at, 'd-m-Y H:i') }}</span>
                    </li>
                    <li class="com-details">
                        {{ $comment->content }}
                    </li>
                </ul>
            @endforeach
        </div>
    </div>

@endsection
