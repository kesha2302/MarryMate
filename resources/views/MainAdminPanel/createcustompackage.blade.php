@extends('MainAdminPanel.Layout.main')

@section('main-section')
    <h3 class='m-2'>Create Custom Package</h3>
    <hr>

    @if(count($detailedPackage) > 0)
    <div class="card mt-2" style="width:62rem;">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Service/Package Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailedPackage as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>₹{{ number_format($item['price'], 2) }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm remove-from-package"
                                        data-id="{{ $item['id'] }}">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h4 class="text-end">Total Price: ₹<span id="totalPrice">{{ number_format($totalPrice, 2) }}</span></h4>

            <button class="btn btn-primary" id="proceedButton">Proceed with Custom Package</button>

            {{-- Form Display --}}
            <div id="customPackageForm" style="display: none; margin-top: 20px;">
                <form action="{{ route('custom-package.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="packageName" class="form-label">Package Name</label>
                        <input type="text" class="form-control" id="packageName" name="package_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="packageDescription" class="form-label">Package Description</label>
                        <textarea class="form-control" id="packageDescription" name="package_description" rows="3" required></textarea>
                    </div>

                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <input type="hidden" name="items" value="{{ json_encode($detailedPackage) }}">

                    <button type="submit" class="btn btn-dark">Submit Package</button>
                </form>
            </div>

        </div>
    </div>
    @else
        <p>No items in custom package.</p>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".remove-from-package").click(function () {
                var itemId = $(this).data("id");
                console.log("Removing item:", itemId);

                $.ajax({
                    url: "{{ route('custom-package.remove') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: itemId
                    },
                    success: function (response) {
                        console.log(response);
                        $("#totalPrice").text(response.totalPrice.toFixed(2));
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

             // Showing form

            $("#proceedButton").click(function () {
                $("#customPackageForm").slideDown();
            });

        });
    </script>
@endsection
