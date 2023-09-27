<form method="post" action="{{ route('process_register') }}">
    @csrf
    Email
    <input type="email" name="email">
    <br>

    Name
    <input type="text" name="name">
    <br>

    Birthday
    <input type="date" name="birthday">
    <br>

    Gender
    <input type="radio" name="gender" value="0" checked>Nam
    <input type="radio" name="gender" value="1">Nữ
    <br>

    Password
    <input type="password" name="password">
    <br>
    <button>Register</button>
</form>
