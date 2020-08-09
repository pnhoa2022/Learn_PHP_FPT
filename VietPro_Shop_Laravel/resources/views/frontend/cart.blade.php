@extends('frontend.layout.master')

@section('title', 'Giỏ hàng')


@section('main')

    <link rel="stylesheet" href="css/cart.css">

    <div id="wrap-inner">
        <div id="list-cart">
            <h3>Giỏ hàng ({{ Cart::count() }} sản phẩm)</h3>

            @if(Cart::count() > 0)
                <form>
                    <table class="table table-bordered .table-responsive text-center">
                        <tr class="active">
                            <td width="11.111%">Ảnh mô tả</td>
                            <td width="22.222%">Tên sản phẩm</td>
                            <td width="22.222%">Số lượng</td>
                            <td width="16.6665%">Đơn giá</td>
                            <td width="16.6665%">Thành tiền</td>
                            <td width="11.112%">Xóa</td>
                        </tr>

                        @foreach($cart_contents as $cart_content)
                            <tr>
                                <td><img width="150" class="img-responsive"
                                         src="{{ asset('asset/img/product_image/' . $cart_content->options->image) }}">
                                </td>
                                <td>{{ $cart_content->name }}</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="number" value="{{ $cart_content->qty }}"
                                               onchange="updateCart(this.value, '{{ $cart_content->rowId }}')">
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="price">{{ number_format($cart_content->price, 0, ',', '.') }} VND
                                    </span>
                                </td>
                                <td>
                                    <span class="price">
                                        {{ number_format($cart_content->price * $cart_content->qty, 0, ',', '.') }} VND
                                    </span>
                                </td>
                                <td><a href="{{ asset('cart/delete/' . $cart_content->rowId) }}"
                                       onclick="return confirm('Xóa sản phẩm  [ {{ $cart_content->name }} ]  khỏi giỏ hàng?')">Xóa</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>

                    <div class="row" id="total-price">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            Tổng thanh toán: <span class="total-price">{{ $cart_total }} VND</span>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <a href="{{ asset('/') }}" class="my-btn btn">Mua tiếp</a>
                            <a href="{{ asset('cart/show#list-cart') }}" class="my-btn btn">Cập nhật</a>
                            <a href="{{ asset('cart/delete/all') }}"
                               onclick="return confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng không?')"
                               class="my-btn btn">Xóa giỏ hàng</a>
                        </div>
                    </div>
                </form>

                <div id="xac-nhan">
                    <h3>Xác nhận mua hàng</h3>
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input required type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="name">Họ và tên:</label>
                            <input required type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input required type="number" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="add">Địa chỉ:</label>
                            <input required type="text" class="form-control" id="add" name="add">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
                        </div>
                    </form>
                </div>
            @else
                <div>
                    <h4>Giỏ hàng của bạn trống. Hãy tiếp tục mua hàng!</h4>
                </div>
            @endif

        </div>
    </div>

    <script type="text/javascript">
        function updateCart(qty, rowId) {

            {{-- url --}}
            {{-- object --}}
            {{-- function --}}

            $.get(
                '{{ asset('cart/update') }}',
                {qty: qty, rowId: rowId},
                function () {
                    location.reload();
                }
            );
        }
    </script>

@endsection
