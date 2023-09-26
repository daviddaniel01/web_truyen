<form method="post" action="{{ route('process_login') }}">


    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger"> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('status'))
        <ul>
            <li class="text-danger"> {{ session('status') }}</li>
        </ul>
    @endif
    @csrf
    Email
    <input type="email" name="email">
    <br>
    Password
    <input type="password" name="password">
    <br>
    <button>Login</button>
</form>
