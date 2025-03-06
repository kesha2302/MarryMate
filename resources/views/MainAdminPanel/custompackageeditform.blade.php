@extends('MainAdminPanel.Layout.main')

@section('main-section')
<div class="card  mt-3 mx-auto" style="width:50rem;">

    <div class="card-header mt-2">
        <h3>Update Custom Package</h3>
    </div>


        <div class="card-body">

                <form action="{{route('custompackage.update', ['id' => $custompackage->ap_id])}}" method="POST" >
                @csrf


                <div class="mb-3">
                    <label class="form-label">Package Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$custompackage->package_name}}"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <input type="text" name="video1" class="form-control" value="{{$custompackage->description}}"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">TotalCost:</label>
                    <input type="text" name="video2" class="form-control" value="{{$custompackage->totalcost}}"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Services:</label>
                    <select name="service_ids[]" class="form-select" multiple>
                        <option disabled>Select Services</option>
                        @foreach($services as $service)
                        <option value="{{ $service->service_id }}">
                            {{ $service->service_type }} - ₹{{ $service->price }} ({{ $service->vendor->user->name ?? 'N/A' }})
                        </option>
                    @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Packages:</label>
                    <select name="package_ids[]" class="form-select" multiple>
                        <option disabled>Select Packages</option>
                        @foreach($packages as $package)
                        <option value="{{ $package->package_id }}">
                            {{ $package->package_name }} - ₹{{ $package->price }} ({{ $package->vendor->user->name ?? 'N/A' }})
                        </option>
                    @endforeach

                    </select>
                </div>


        {{--     <div class="mb-3">
                <label class="form-label">Services:</label>
                <select name="service_ids[]" class="form-select" multiple>
                    <option disabled>Select Services</option>
                    @foreach($services as $service)
                        <option value="{{ $service->service_id }}"
                            {{ in_array($service->service_id, $selectedServices) ? 'selected' : '' }}>
                            {{ $service->service_type }} - ₹{{ $service->price }} ({{ $service->vendor->user->name ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Packages:</label>
                <select name="package_ids[]" class="form-select" multiple>
                    <option disabled>Select Packages</option>
                    @foreach($packages as $package)
                        <option value="{{ $package->package_id }}"
                            {{ in_array($package->package_id, $selectedPackages) ? 'selected' : '' }}>
                            {{ $package->package_name }} - ₹{{ $package->price }} ({{ $package->vendor->user->name ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div> --}}


                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
            </form>
        </div>


</div>
@endsection
