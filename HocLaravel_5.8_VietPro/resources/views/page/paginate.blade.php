@extends('layout.master')

@section('page_title', 'Phân trang')

@section('body')

    <table class="table table-hover">
        <thead style="background-color: #6f42c1; color: white">
        <tr>
            <th scope="col">id_user</th>
            <th scope="col">email</th>
            <th scope="col">password</th>
            <th scope="col">level</th>
        </tr>
        </thead>

        <tbody>

        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id_user }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->level }}</td>
        </tr>
        @endforeach

        </tbody>
    </table>

    <nav aria-label="Page navigation">
        {{ $users->links() }}
    </nav>
@endsection
