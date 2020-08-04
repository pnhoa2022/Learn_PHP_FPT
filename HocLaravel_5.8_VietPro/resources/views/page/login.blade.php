@extends('layout.master')

@section('page_title', 'Login')

@section('body')
<div>

    @if(session('thongBao'))
        <b>{{ session('thongBao') }}</b>
    @endif

    @if(count($errors) > 0)
        <div style="color: red">
            <h3>ERROR:</h3>
            @foreach($errors->all('') as $error)

            <ul>
                <li><b>{{ $error }}</b></li>
            </ul>

            @endforeach
        </div>
    @endif

    <form action="" method="POST">
        @csrf

        <label for="id">Email</label>
        <input type="text" name="id" placeholder="Email" value="{{ old('id') }}">
        <br>

        @if($errors->has('id'))
            <div style="color: red">
                <b>{{ $errors->first('id') }}</b>
            </div>
        @endif

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
        <br>

        @if($errors->has('password'))
            <div style="color: red">
                <b>{{ $errors->first('password') }}</b>
            </div>
        @endif

        <button type="submit">Submit</button>
    </form>
</div>
@endsection
