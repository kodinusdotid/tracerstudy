<x-layouts.auth title="Masuk">
    <x-push stack="styles">
        <style>
            .invalid-tooltip {
                position: absolute;
                top: 100%;
                z-index: 5;
                display: none;
                max-width: 100%;
                padding: .25rem .5rem;
                margin-top: .1rem;
                font-size: .875rem;
                color: #fff;
                background-color: rgba(220, 53, 69, 0.9);
                border-radius: .25rem;
            }

            .was-validated .form-control:invalid ~ .invalid-tooltip,
            .form-control.is-invalid ~ .invalid-tooltip {
                display: block;
            }

            .form-group.position-relative {
                margin-bottom: 1.5rem !important;
            }
        </style>
    </x-push>

    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Selamat Datang Kembali!</h1>
        </div>
        <form class="user needs-validation" action="{{ route('auth.login') }}" method="post" novalidate>
            @csrf
            <div class="form-group position-relative mb-3">
                <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                    id="exampleInputEmail" aria-describedby="emailHelp"
                    placeholder="Masukkan Alamat Surel..." value="{{ old('email') }}" required>
                <div class="invalid-tooltip">
                    @error('email')
                        {{ $message }}
                    @else
                        Alamat email tidak valid
                    @enderror
                </div>
            </div>
            <div class="form-group position-relative mb-3">
                <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                    id="exampleInputPassword" placeholder="Kata Sandi" required minlength="6">
                <div class="invalid-tooltip">
                    @error('password')
                        {{ $message }}
                    @else
                        Kata sandi harus minimal 6 karakter
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Masuk
            </button>
            <hr>
            <a href="index.html" class="btn btn-google btn-user btn-block">
                <i class="fab fa-google fa-fw"></i> Masuk dengan Google
            </a>
            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> Masuk dengan Facebook
            </a>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="forgot-password.html">Lupa Kata Sandi?</a>
        </div>
        <div class="text-center">
            <a class="small" href="register.html">Buat Akun!</a>
        </div>
    </div>

    <x-push stack="scripts">
        <script>
            // Validasi form saat submit
            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                // Validasi tambahan untuk email
                const emailInput = document.querySelector('#exampleInputEmail');
                const emailValue = emailInput.value.trim();
                const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

                if (!emailRegex.test(emailValue)) {
                    emailInput.classList.add('is-invalid');
                    event.preventDefault();
                }

                // Validasi tambahan untuk password
                const passwordInput = document.querySelector('#exampleInputPassword');
                const passwordValue = passwordInput.value;

                if (passwordValue.length < 6) {
                    passwordInput.classList.add('is-invalid');
                    event.preventDefault();
                }

                // Tambahkan class was-validated untuk aktivasi validation styles
                form.classList.add('was-validated');
            });

            // Reset validasi saat input
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        this.classList.remove('is-invalid');
                    }
                });
            });
        </script>
    </x-push>
</x-layouts.auth>

