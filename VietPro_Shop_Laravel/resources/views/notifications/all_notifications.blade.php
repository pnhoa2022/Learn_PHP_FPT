@if(Session::has('notification'))
    <div class="alert alert-success" role="alert">
        <ul>
            <li>{{ Session::get('notification') }}</li>
        </ul>
    </div>
@endif
