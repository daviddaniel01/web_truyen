{{-- <form method="post" action="{{ route('process_register') }}">
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
</form> --}}



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="{{ route('process_register') }}">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                            placeholder="Nhập địa chỉ email" name="email" />
                        @if ($errors->has('email'))
                            <span class="error">
                                {{ $errors->first('email') }}
                            </span>
                        @else
                            <label class="form-label" for="form3Example3">Địa chỉ email</label>
                        @endif
                    </div>


                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                            placeholder="Nhập tên hiển thị" name="name" />
                        @if ($errors->has('name'))
                            <span class="error">
                                {{ $errors->first('name') }}
                            </span>
                        @else
                            <label class="form-label" for="form3Example3">Tên hiển thị</label>
                        @endif
                    </div>


                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker mb-4"
                        inline="true">
                        <input placeholder="Select date" type="date" id="example" class="form-control"
                            name="birthday">
                        @if ($errors->has('birthday'))
                            <span class="error">
                                {{ $errors->first('birthday') }}
                            </span>
                        @else
                            <label class="form-label" for="form3Example3">Sinh nhật</label>
                        @endif
                        <i class="fas fa-calendar input-prefix"></i>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="0"
                                checked>
                            <label class="form-check-label" for="gender1">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="1">
                            <label class="form-check-label" for="gender2">
                                Nữ
                            </label>
                        </div>
                        @if ($errors->has('gender'))
                            <span class="error">
                                {{ $errors->first('gender') }}
                            </span>
                        @else
                            <label class="form-label">Giới tính</label>
                        @endif
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                            placeholder="Nhập mật khẩu" name="password" />
                        @if ($errors->has('password'))
                            <span class="error">
                                {{ $errors->first('password') }}
                            </span>
                        @else
                            <label class="form-label" for="form3Example4">Mật khẩu</label>
                        @endif
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
