@extends('backend.layout.master')

@section('title', 'Edit Category')

@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Sửa danh mục
                    </div>
                    <div class="panel-body">
                        @include('backend.errors.all_errors')
                        @include('backend.notifications.all_notifications')
                        <form method="post">
                            <div class="form-group">
                                <label for="name">Tên danh mục:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="Tên danh mục..." value="{{ old('name') ?? $category->name }}">
                            </div>
                            <input type="hidden" name="category_id" id="category_id" value="{{ old('category_id') ?? $category->category_id }}">
                            <input type="hidden" name="version" id="version" value="{{ old('version') ?? $category->version }}">
                            <div class="form-group">
                                <input type="submit" id="edit" name="edit" class="form-control btn btn-primary"
                                       value="Lưu">
                            </div>

                            <div class="form-group">
                                <a href="{{ url('admin/category') }}" class="form-control btn btn-danger">Hủy</a>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
@endsection
