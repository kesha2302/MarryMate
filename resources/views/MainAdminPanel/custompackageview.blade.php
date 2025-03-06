@extends('MainAdminPanel.Layout.main')

@section('main-section')

@if (session('remove'))
    <script>
        alert("{{ session('remove') }}");
    </script>
@endif

@if (session('notfound'))
    <script>
        alert("{{ session('notfound') }}");
    </script>
@endif


    <h3 class='m-2'>Custom Packages Detail</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" value="{{ $search }}" type="search" name="search"
                    placeholder="Search by package name" aria-label="Search" style="width: 500px;">

                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{ url('/CustomPackageview') }}">
                        <button class="btn btn-dark" type="button">Reset</button>
                    </a>
                </span>
            </form>

            <div class="d-flex">

                <button type="button" onclick="window.location='{{ url('/CustomPackageform') }}'" class="btn btn-dark btn-circle font-rights me-md-2">
                </i> Add
            </button>
                <a href="{{ url('/CustomPackagetrash') }}">
                    <button class="btn btn-danger ml-2" >
                        Trashed Data</button>
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
                                    <a href="{{route('custompackage.delete',['id'=>$package->ap_id])}}">
                                    <button class="btn btn-danger m-2">Trash</button>
                                    </a>

                                    <a href="{{route('custompackage.edit',['id'=>$package->ap_id])}}">
                                      <button class="btn btn-primary">Edit</button>
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
                                        <table class="table table-responsive  table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Package ID</th>
                                                    <th>Vendor Name</th>
                                                    <th>Package Name</th>
                                                    <th>Service Type</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
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
                                                        <td>
                                                            <a class="btn btn-danger" href="{{ route('custompackage.removePackage', ['adminPackageId' => $package->ap_id, 'packageId' => $pkg->package_id]) }}"
                                                               onclick="return confirm('Are you sure you want to remove this package?');">
                                                                Remove
                                                            </a>
                                                        </td>
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
                                                    <th>Action</th>

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
                                                        <td>
                                                            <a class="btn btn-danger" href="{{ route('custompackage.removeService', ['adminPackageId' => $package->ap_id, 'serviceId' => $service->service_id]) }}"
                                                               onclick="return confirm('Are you sure you want to remove this service?');">
                                                                Remove
                                                            </a>
                                                        </td>
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
