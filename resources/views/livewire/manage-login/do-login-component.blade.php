<div>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header text-center">
                    <h3>ورود</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-icon"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" wire:model="data.userName" class="form-control" id="txt-username" placeholder="admin">
                        </div>
                        @error('data.userName')
                        <small>{{$message}}</small>
                        @enderror
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-icon"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" wire:model="data.password" class="form-control" id="txt-password" placeholder="admin">
                            <i class="far fa-eye" id="togglePassword"></i>

                        </div>
                        @error('data.password')
                        <small>{{$message}}</small>
                        @enderror
                        <div class="row align-items-center remember">
                            <input type="checkbox" wire:model="data.remember">مرا بخاطر بسپار
                        </div>
                        <div class="form-group btn_div">
                            <input type="button" wire:click="login" value="ورود" class="btn float-right login_btn">
                        </div>
                        @if(Session::has('message'))
                            <div class="row" style="justify-content: center">
                                <div class="alert alert-danger" style="direction: rtl">
                                    {{Session::get('message')}}
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
                {{--            <div class="card-footer">--}}
                {{--                <div class="d-flex justify-content-center">--}}
                {{--                    <a href="#">بازگردانی رمز عبور!</a>--}}
                {{--                </div>--}}
                {{--            </div>--}}
            </div>
        </div>
    </div>
</div>
    <script>

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#txt-password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
