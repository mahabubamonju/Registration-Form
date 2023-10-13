<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
    <div class="container">
        <div class="row py-5">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        <img src="https://images.pexels.com/photos/6794920/pexels-photo-6794920.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample Photo">
                        <h2 class="text-center">Registration Form</h2>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('registererer') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" name="firstname" class="form-control form-control @error('firstname') is-invalid @enderror" id="firstName">
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" name="lastname" class="form-control form-control @error('lastname') is-invalid @enderror" id="lastName">
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control form-control @error('email') is-invalid @enderror" id="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password"  name="password" class="form-control form-control @error('password') is-invalid @enderror" id="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password"  name="password" class="form-control form-control @error('password') is-invalid @enderror" id="confirmPassword">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p class="text-danger" id="errorMessage" hidden></p>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>

    <script>       
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirmPassword");
        const form = document.querySelector("form");
        const errorMessage = document.getElementById("errorMessage");

        form.addEventListener("submit", (e) => {
            const errors = [];

            if(password.value != confirmPassword.value){
                errors.push("Password Didn't Match")
            }            

            if(errors.length > 0){
                e.preventDefault();
                errorMessage.toggleAttribute('hidden');
                errorMessage.innerHTML = errors.join(', ');
            }
        })
    </script>
  </body>
</html>