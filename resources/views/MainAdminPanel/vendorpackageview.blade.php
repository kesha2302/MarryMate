@extends('MainAdminPanel.Layout.main')

@section('main-section')
    <h3 class='m-2'>
        Vendors Packages Detail</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" value="{{ $search }}" type="search" name="search"
                    placeholder="Search by name" aria-label="Search" style="width: 500px;">

                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{ url('/VendorsPackagesDetail') }}">
                        <button class="btn btn-dark" type="button">Reset</button>
                    </a>
                </span>
            </form>

        </div>
    </nav>


    <div class="card mt-2" style="width:62rem;">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Vendor Name</th>
                            <th>Status</th>
                            <th>Package Name</th>
                            <th>packages Included</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Images</th>

                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $printedVendors = [];
                        @endphp

                        @foreach ($packages as $package)
                            <tr>

                                @if (!in_array($package->vendor_id, $printedVendors))
                                    <td rowspan="{{ $packages->where('vendor_id', $package->vendor_id)->count() }}">
                                        {{ $package->vendor->user->name ?? 'No Vendor' }}
                                    </td>
                                    <td rowspan="{{ $packages->where('vendor_id', $package->vendor_id)->count() }}">
                                        @if ($package->status == 1)
                                            <span class="badge text-bg-success">Approved</span>
                                        @else
                                            <span class="badge text-bg-primary">Blocked</span>
                                        @endif
                                    </td>

                                    @php
                                        $printedVendors[] = $package->vendor_id;
                                    @endphp
                                @endif

                                <td>{{ $package->package_name }}</td>
                                <td>{{ $package->service_types }}</td>
                                <td>{{ $package->description }}</td>
                                <td>{{ $package->price }}</td>

                                <td>
                                    @if (!empty($package->images))
                                        @php
                                            $images = explode(',', $package->images);
                                        @endphp

                                        <div style="display: flex; align-items: center; gap: 10px;  white-space: nowrap; max-width: 300px;">
                                            @foreach ($images as $image)
                                                <img src="{{ asset('PackageImages/' . trim($image)) }}" class="rounded"
                                                    alt="Image" style="width: 120px; height: 70px; flex-shrink: 0;">
                                            @endforeach
                                        </div>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                {{-- <td>
                                    <button class="btn btn-sm btn-primary add-to-package"
                                        data-id="{{ $package->package_id }}"
                                        data-name="{{ $package->package_name }}"
                                        data-type="package">
                                        Add to Custom Package
                                    </button>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $packages->links('pagination::bootstrap-4') }}
        </div>
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- <script>
        $(document).ready(function () {
            $(".add-to-package").click(function () {
                var itemId = $(this).data("id");
                var itemName = $(this).data("name");
                var itemType = $(this).data("type");

                $.ajax({
                    url: "{{ route('custom-package.add') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: itemId,
                        name: itemName,
                        type: itemType
                    },
                    success: function (response) {
                        alert(response.message);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script> --}}

@endsection
