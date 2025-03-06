@extends('SecondAdminPanel.layout.main')

@section('main-container')
      <div class="container" >
<h1 class="pt-3">Vendors and Event Manager Admin Panel</h1>

            <div class="row">
                <div class="col">
                    <div class="card mb-3 mt-3 border  shadow-lg rounded" style="max-width: 600px; height:10rem">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('AdminPanel/assets/images/profile/customer-care.png')}}" class="img-fluid rounded ms-5 me-5 mt-5 mb-5" height="50px" width="60px" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body text-end">
                                    <h3>Total Customers</h3>
                                    {{-- <h4 class="card-text">{{$totalCustomers}}</h4> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 mt-3 border  shadow-lg rounded" style="max-width: 600px; height:10rem">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('AdminPanel/assets/images/profile/infrastructure.png')}}" class="img-fluid rounded ms-5 me-5 mt-5 mb-5" height="50px" width="60px" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body text-end">
                                    <h3>Total Orders</h3>
                                    {{-- <h4 class="card-text">{{$totalOrders}}</h4> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 mt-3 border  shadow-lg rounded" style="max-width: 600px; height:10rem">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('AdminPanel/assets/images/profile/features.png')}}" class="img-fluid rounded ms-5 me-5 mt-5 mb-5" height="50px" width="60px" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body text-end">
                                    <h3>Total Category</h3>
                                    {{-- <h4 class="card-text">{{$totalCategories}}</h4> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                    <div class="card mb-3 mt-3 border  shadow-lg rounded" style="max-width: 600px; height:10rem">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('AdminPanel/assets/images/profile/offer.png')}}" class="img-fluid rounded ms-5 me-5 mt-5 mb-5" height="50px" width="60px" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body text-end">
                                    <h3>Total Products</h3>
                                    {{-- <h4 class="card-text">{{$totalProducts}}</h4> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">

                  </div>
                  <div class="col">

                  </div>

              </div>


                  </div>




  @endsection
