@extends('backend.layout.master')

@section('title', 'Danh sách sản phẩm')

@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm</h1>
                @include('errors.all_errors')
                @include('notifications.all_notifications')
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách sản phẩm</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{ url('admin/product/add') }}" class="btn btn-primary">Thêm sản phẩm</a>
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th width="30%">Tên Sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th width="20%">Ảnh sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <!-- item product -->
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->product_id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                                            <td>
                                                <img height="100"
                                                     src="../img/product_image/{{ $product->image }}"
                                                     class="thumbnail center-block">
                                            </td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>
                                                <a href="{{ url('admin/product/edit/' . $product->product_id) }}"
                                                   class="btn btn-warning"><i
                                                        class="fa fa-pencil"
                                                        aria-hidden="true"></i> Sửa</a>
                                                <a href="{{ url('admin/product/delete/' . $product->product_id) }}"
                                                   class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm [{{ $product->name }}]')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="pagination">
                            <ul class="pagination pagination-lg justify-content-center">

                                {{ $products->links() }}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--/.row-->



    </div>    <!--/.main-->
@endsection
