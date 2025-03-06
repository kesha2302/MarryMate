@extends('ClientView.Layout.main')
@section('main-section')

<style>
    .gradient-custom {
/* fallback for old browsers */
background: #e9f0ea;
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
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 ">Business Registration Form</h3>
              <form action="{{url('/store2')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12 mb-4">

                    <label  class="form-label"> Register as</label>
                    <select class="form-select form-select-lg mb-3" name='role_as' aria-label="Large select example">
                        <option value="V">Vendor</option>
                        <option value="EM">Event Manager</option>
                      </select>
                      <span class="text-danger">
                        @error('role_as')
                            {{$message}}
                        @enderror
                      </span>

                  </div>

                </div>

                <div class="row">
                    <div class="col-12 mb-4">

                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="firstName">Business Type</label>
                            <select class="form-select form-select-lg mb-3" name="business_type" aria-label="Default select example">
                                <option value="Wedding Hall">Wedding Hall</option>
                                <option value="'DJ & Sound System">DJ & Sound System</option>
                                <option value="Saloon">Saloon</option>
                                <option value="Transportation">Transportation</option>
                                <option value="Decorator">Decorator</option>
                                <option value="Catering">Catering</option>
                                <option value="Pandit">Pandit</option>
                              </select>
                             <span class="text-danger">
                                @error('business_type')
                                    {{$message}}
                                @enderror
                              </span>
                           </div>
                        </div>

                </div>

                <div class="row">
                    <div class="col-12 mb-4">

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

                </div>

                <div class="row">
                    <div class="col-12 mb-4 pb-2">
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

                  <div class="col-12 mb-4 pb-2">

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
                  <div class="col-12 mb-4 pb-2">

                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label">Business Name</label>
                        <input type="text" name="business_name" class="form-control form-control-lg" />
                        <span class="text-danger">
                            @error('business_name')
                                {{$message}}
                            @enderror
                          </span>
                      </div>

                  </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4 pb-2">

                      <div data-mdb-input-init class="form-outline">
                          <label class="form-label">Description</label>
                          <input type="text" name="description" class="form-control form-control-lg" />
                          <span class="text-danger">
                            @error('description')
                                {{$message}}
                            @enderror
                          </span>
                        </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 mb-4 pb-2">

                      <div data-mdb-input-init class="form-outline">
                          <label class="form-label">Aadhar Card</label>
                          <input type="file" name="AadharCard" class="form-control form-control-lg" />
                          <span class="text-danger">
                            @error('AadharCard')
                                {{$message}}
                            @enderror
                          </span>
                        </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 mb-4 pb-2">

                      <div data-mdb-input-init class="form-outline">
                          <label class="form-label">Pan Card</label>
                          <input type="file" name="PanCard" class="form-control form-control-lg" />
                          <span class="text-danger">
                            @error('PanCard')
                                {{$message}}
                            @enderror
                          </span>
                        </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 mb-4 pb-2">

                      <div data-mdb-input-init class="form-outline">
                          <label class="form-label">Other Documents (Business papers)</label>
                          <input type="file" name="othdoc" class="form-control form-control-lg" />
                          <span class="text-danger">
                            @error('othdoc')
                                {{$message}}
                            @enderror
                          </span>
                        </div>

                    </div>
                  </div>

                  <p class="text-danger">Note: You will receive an email confirming your business registration status.</p>



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
