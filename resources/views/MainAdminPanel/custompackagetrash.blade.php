@extends('MainAdminPanel.Layout.main')

@section('main-section')
    <h3 class='m-2'>Custom Packages Trash Data</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">


            <div class="d-flex">

                <a href="{{ url('/CustomPackageview') }}">
                    <button class="btn btn-danger ml-2" >
                        CuustomPackage Data</button>
                </a>
            </div>

        </div>
    </nav>

    <div class="card mt-2" style="width:62rem;">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($custompackage as $package)
                            <tr>
                                <td>{{ $package->package_name }}</td>
                                <td>
                                    <button class="btn btn-info view-btn" data-id="{{ $package->ap_id }}">View</button>
                                </td>
                                <td>
                                    <a href="{{route('custompackage.forcedelete',['id'=>$package->ap_id])}}">
                                        <button class="btn btn-danger m-2">Delete</button>
                                        </a>

                                        <a href="{{route('custompackage.restore',['id'=>$package->ap_id])}}">
                                          <button class="btn btn-primary">Restore</button>
                                        </a>
                                    </td>
                            </tr>
                            <tr id="details-{{ $package->ap_id }}" class="details-row" style="display: none;">
                                <td colspan="2">
                                    <div class="border p-3">

                                        <p><strong>Description:</strong> {{ $package->description }}</p>
                                        <p><strong>Price:</strong> ₹{{ $package->totalcost }}</p>

                                        @if ($package->packages->isNotEmpty())
                                        <h5>Package Details:</h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Package ID</th>
                                                    <th>Vendor Name</th>
                                                    <th>Package Name</th>
                                                    <th>Service Type</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($package->packages as $pkg)
                                                    <tr>
                                                        <td>{{ $pkg->package_id }}</td>
                                                        <td>{{ $pkg->vendor->user->name ?? 'N/A' }}</td>
                                                        <td>{{ $pkg->package_name}}</td>
                                                        <td>{{ $pkg->service_types}}</td>
                                                        <td>{{ $pkg->description }}</td>
                                                        <td>₹{{ $pkg->price }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif

                                        @if ($package->services->isNotEmpty())
                                        <h5>Service Details:</h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Service ID</th>
                                                    <th>Vendor Name</th>
                                                    <th>Service Type</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($package->services as $service)
                                                    <tr>
                                                        <td>{{ $service->service_id }}</td>
                                                        <td>{{ $service->vendor->user->name ?? 'N/A' }}</td>
                                                        <td>{{ $service->service_type }}</td>
                                                        <td>{{ $service->description }}</td>
                                                        <td>₹{{ $service->price }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $custompackage->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.view-btn').click(function() {
                var packageId = $(this).data('id');
                $('#details-' + packageId).toggle();
            });
        });
    </script>
@endsection
