@extends('layout.master')

@section('page_title', 'Home')

@section('body')
    Trạng thái đăng nhập: {{ Auth::check() }}
    <br>
    Xin chào {{ Auth::user()->email ?? '(Bạn chưa đăng nhập)' }}
@endsection
