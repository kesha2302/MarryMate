{{-- @extends('MainAdminPanel.Layout.main')

@section('main-section')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="card mt-3 mx-auto" style="width:50rem;">
    <div class="card-header mt-2">
        <h3>Custom Package Form</h3>
    </div>

    <div class="card-body">
        <form action="{{ url('/custompackagestore') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Package Name:</label>
                <input type="text" name="name" class="form-control" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Description:</label>
                <input type="text" name="description" class="form-control" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Select Service:</label>
                <select name="service_id" id="services" class="form-control">
                    <option value="">Select Service</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Select Package:</label>
                <select name="package_id" id="packages" class="form-control">
                    <option value="">Select Package</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    fetchServices();
    fetchPackages();
});

function fetchServices() {
    $.ajax({
        url: "{{ route('get.services') }}",
        type: "GET",
        success: function(response) {
            let options = '<option value="">Select Service</option>';
            response.services.forEach(service => {
                options += `<option value="${service.service_id}">
                    ${service.service_type} - ₹${service.price} (${service.vendor?.user?.name ?? 'N/A'})
                </option>`;
            });
            $("#services").html(options);
        },
        error: function(xhr, status, error) {
            console.error("Failed to fetch services:", error);
        }
    });
}

function fetchPackages() {
    $.ajax({
        url: "{{ route('get.packages') }}",
        type: "GET",
        success: function(response) {
            let options = '<option value="">Select Package</option>';
            response.packages.forEach(pack => {
                options += `<option value="${pack.package_id}">
                    ${pack.package_name} - ₹${pack.price} (${pack.vendor?.user?.name ?? 'N/A'})
                </option>`;
            });
            $("#packages").html(options);
        },
        error: function(xhr, status, error) {
            console.error("Failed to fetch packages:", error);
        }
    });
}
</script>

@endsection --}}
@extends('MainAdminPanel.Layout.main')

@section('main-section')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<div class="card mt-3 mx-auto" style="width:50rem;">
    <div class="card-header mt-2">
        <h3>Custom Package Form</h3>
    </div>

    <div class="card-body">
        <form action="{{ url('/custompackagestore') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Package Name:</label>
                <input type="text" name="name" class="form-control" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Description:</label>
                <input type="text" name="description" class="form-control" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Select Service:</label>
                <select name="service_id[]" id="services" class="form-control select2" multiple>
                    <option value="">Select Service</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Select Package:</label>
                <select name="package_id[]" id="packages" class="form-control select2" multiple>
                    <option value="">Select Package</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
</div>



<script>
 $(document).ready(function () {
        setTimeout(function () {
            console.log("jQuery version:", $.fn.jquery);
            console.log("Select2:", $.fn.select2);
            console.log($.fn.select2);
            console.log(window.jQuery.fn.select2);


            if ($.fn.select2 === undefined) {
                console.error("Select2 is not loaded!");
            } else {
                $(".select2").select2();
            }
        }, 500);
    });


$(document).ready(function() {
            fetchServices();
            fetchPackages();
});


function fetchServices() {
    $.ajax({
        url: "{{ route('get.services') }}",
        type: "POST",
        data: { _token: "{{ csrf_token() }}" },
        success: function(response) {
            let options = '';
            if (response.services && response.services.length > 0) {
                response.services.forEach(service => {
                    options += `<option value="${service.service_id}">
                        ${service.service_type} - ₹${service.price} (${service.vendor?.user?.name ?? 'N/A'})
                    </option>`;
                });
            } else {
                options += '<option value="">No services available</option>';
            }
            $("#services").html(options);
        },
        error: function(xhr, status, error) {
            console.error("Failed to fetch services:", error);
        }
    });
}

function fetchPackages() {
    $.ajax({
        url: "{{ route('get.packages') }}",
        type: "POST",
        data: { _token: "{{ csrf_token() }}" },
        success: function(response) {
            let options = '';
            if (response.packages && response.packages.length > 0) {
                response.packages.forEach(pack => {
                    options += `<option value="${pack.package_id}">
                        ${pack.package_name} - ₹${pack.price} (${pack.vendor?.user?.name ?? 'N/A'})
                    </option>`;
                });
            } else {
                options += '<option value="">No packages available</option>';
            }
            $("#packages").html(options);
        },
        error: function(xhr, status, error) {
            console.error("Failed to fetch packages:", error);
        }
    });
}
</script>

@endsection

