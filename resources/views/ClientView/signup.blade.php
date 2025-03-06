@extends('ClientView.Layout.main')
@section('main-section')

<style>
    .gradient-custom {
/* fallback for old browsers */
background: #e9f0ea;

/* Chrome 10-25, Safari 5.1-6 */
/* background: -webkit-linear-gradient(to bottom right, rgb(14, 172, 56), rgb(208, 222, 58)); */

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
/* background: linear-gradient(to bottom right, rgb(23, 181, 36), rgb(220, 240, 42)) */
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
margin-bottom: 20px;
}
</style>

<section class=" gradient-custom ">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 ">Registration Form</h3>
              <form action="{{url('/store')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div data-mdb-input-init class="form-outline">
                     <label class="form-label" for="firstName">Full Name</label>
                      <input type="text" name="name" class="form-control form-control-lg" />
                      <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                      </span>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="emailAddress">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg" />
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                          </span>
                      </div>

                  </div>
                </div>


                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div data-mdb-input-init class="form-outline">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control form-control-lg" />
                      <span class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                      </span>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4 pb-2">

                    <div data-mdb-input-init class="form-outline">
                      <label class="form-label" for="contact">Contact</label>
                      <input type="text" name="contact" class="form-control form-control-lg" />
                      <span class="text-danger">
                        @error('contact')
                            {{$message}}
                        @enderror
                      </span>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-12">

                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control form-control-lg" />
                        <span class="text-danger">
                            @error('address')
                                {{$message}}
                            @enderror
                          </span>
                      </div>


                  </div>
                </div>

                <div>
                    <p class="mb-0 mt-3">Already have an account? <a href="{{url('/Signin')}}" class="text-dark-50 fw-bold">Sign In</a>
                    </p>
                  </div>

                <div class="mt-4 pt-2">
                  <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>



              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
