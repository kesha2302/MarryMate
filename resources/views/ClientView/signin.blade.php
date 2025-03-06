@extends('ClientView.Layout.main')
@section('main-section')

<style>
    .gradient-custom {
/* fallback for old browsers */
background: #e9f0ea;

/* Chrome 10-25, Safari 5.1-6 */
/* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)); */

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
/* background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)) */
}
</style>

@if(session('error'))
 <div class="alert alert-danger">
     {{ session('error') }}
 </div>
@endif

<section class="" style="background-color: #e9f0ea;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-5">Sign in</h3>

              <form method="POSt" action="{{url('/logindata')}}">
                @csrf

              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX-2">Email</label>
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                  </span>
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Password</label>
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                  </span>
              </div>



              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>

              <hr class="my-4">

              <div>
                <p class="mb-0">Don't have an account? <a href="{{url('/Signup')}}" class="text-dark-50 fw-bold">Sign Up</a>
                </p>
              </div>

              {{-- <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button> --}}

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
