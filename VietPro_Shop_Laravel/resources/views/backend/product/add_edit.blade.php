@extends('backend.layout.master')

@section('title', 'Add Product')

@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                @include('errors.all_errors')
                @include('notifications.all_notifications')

                <div class="panel panel-primary">
                    <div class="panel-heading">{{ request()->segment(3) == 'add' ? 'Thêm' : 'Sửa' }} sản phẩm</div>
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="version" id="version" value="{{ old('version') ?? $product->version ?? '' }}">
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">

                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input {{-- required --}} type="text" name="name"
                                               value="{{ old('name') ?? $product->name ?? '' }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input {{-- required --}} type="number" name="price"
                                               value="{{ old('price') ?? $product->price  ?? '' }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input {{-- required --}} id="image" type="file" name="image"
                                               class="form-control hidden"
                                               onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="300px"
                                             src="{{ asset('asset/img/product_image/' . (old('image') ?? $product->image ?? 'new_seo-10-512.png' )) }}">
                                        <input type="hidden" name="image_old" value="{{ old('image') ?? $product->image ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Phụ kiện</label>
                                        <input {{-- required --}} type="text" name="accessories"
                                               value="{{ old('accessories') ?? $product->accessories  ?? '' }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Bảo hành</label>
                                        <input {{-- required --}} type="text" name="warranty"
                                               value="{{ old('warranty') ?? $product->warranty  ?? '' }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Khuyến mãi</label>
                                        <input {{-- required --}} type="text" name="promotion"
                                               value="{{ old('promotion') ?? $product->promotion  ?? '' }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Tình trạng</label>
                                        <input {{-- required --}} type="text" name="condition"
                                               value="{{ old('condition') ?? $product->condition  ?? '' }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select {{-- required --}} name="status" class="form-control">
                                            <option
                                                {{ (old('status') ?? $product->status  ?? 1) == 1 ? 'selected' : '' }} value=1>
                                                Còn hàng
                                            </option>
                                            <option
                                                {{ (old('status') ?? $product->status  ?? 1) == 0 ? 'selected' : '' }} value=0>
                                                Hết hàng
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea class="ckeditor" {{-- required --}} name="description">
                                            {{ old('description') ?? $product->description  ?? '' }}
                                        </textarea>
                                    </div>

                                    <!-- CKEDITOR -->
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('description', {
                                            language: 'vi',
                                            filebrowserImageBrowseUrl: 'ckfinder_php_3.5.1.1/ckfinder.html?Type=Images',
                                            filebrowserFlashBrowseUrl: 'ckfinder_php_3.5.1.1/ckfinder.html?Type=Flash',
                                            filebrowserImageUploadUrl: 'ckfinder_php_3.5.1.1/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: 'public/ckfinder_php_3.5.1.1/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                        });
                                    </script>

                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select {{-- required --}} name="category_id" class="form-control">
                                            <option value="">-- Chọn danh mục --</option>
                                            @foreach($categories as $category)
                                                <option
                                                    {{ (old('category_id') ?? $product->category->category_id  ?? '') == $category->category_id ? 'selected' : '' }}
                                                    value="{{ $category->category_id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sản phẩm nổi bật</label><br>
                                        Có: <input
                                            {{ (old('featured') ?? $product->featured  ?? '') == 1 ? 'checked' : '' }} type="radio"
                                            name="featured" value=1>
                                        <br>
                                        Không: <input
                                            {{ (old('featured') ?? $product->featured  ?? '') == 0 ? 'checked' : '' }} type="radio"
                                            name="featured" value=0>
                                    </div>

                                    <input type="submit" name="submit" value="{{ request()->segment(3) == 'add' ? 'Thêm' : 'Sửa' }}" class="btn btn-primary">
                                    <a href="{{ url('admin/product') }}" class="btn btn-danger">Hủy bỏ</a>
                                </div>
                            </div>
                            @csrf
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
@endsection
