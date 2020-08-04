<?php

?>
{{--Thừa kế từ app.blade template--}}
@extends('layouts.app')

{{--Nội dung trang con--}}
{{--Dùng app.css--}}
@section('content')

    {{-- Định nghĩa phần nội dung của trang task--}}
    <div class="panel-body container">
        {{--Hiện các thông báo lỗi ở đây--}}
        @include('errors.503')

        {{--Form nhập thông tin tast mới--}}
        <form action="{{url('task')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            {{--Tên task--}}
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="tank-name" class="form-control">
                </div>
            </div>

            {{--Nút add task--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-outline-success">
                        <i class="fa fa-plus"></i>
                        Add task
                    </button>
                </div>
            </div>
        </form>

        {{--Hiện thị Task hiện tại--}}
        @if(count($tasks) > 0)
            <div class="container">
                <div class="card-header">
                    Current Task
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover table-striped">
                        <thead>
                            <th>Task</th>
                            <th>Function</th>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>
                                        {{$task->Name}}
                                    </td>
                                    <td>
                                        <form action="/task/{{$task->ID}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>
@endsection
