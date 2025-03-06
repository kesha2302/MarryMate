@extends('MainAdminPanel.Layout.main')

@section('main-section')

@if (session('status'))
    <script>
        alert("{{ session('status') }}");
    </script>
@endif

@if (session('status3'))
    <script>
        alert("{{ session('status3') }}");
    </script>
@endif

<h3 class='m-2'>Vendors Detail</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" value="{{$search}}" type="search"  name="search"
                placeholder="Search by name or email" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{url('/VendorsDetail')}}">
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
                            <th>Id</th>
                            <th>User_Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Business Type</th>
                            <th>Business Name</th>
                            <th style="width: 60%;">Description</th>
                            <th>AdharCard</th>
                            <th>PanCard</th>
                            <th>Other Documents</th>
                            <th>Send Password</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor )
                        <tr>
                            <td>{{$vendor->vendor_id}}</td>
                            <td>{{$vendor->user->user_id}}</td>
                            <td>{{$vendor->user->name}}</td>
                            <td>{{$vendor->user->email}}</td>
                             <td>{{$vendor->user->contact}}</td>
                             <td>{{$vendor->business_type}}</td>
                             <td>{{$vendor->business_name}}</td>
                             <td>{{$vendor->description}}</td>
                             <td>
                                @if($vendor->AadharCard)
                                <a href="{{ asset('VendorsDocument/'.$vendor->AadharCard) }}" target="_blank" class="btn btn-info btn-sm">View</a>
                                @else
                                <span>No document</span>
                                @endif
                            </td>
                            <td>
                                @if($vendor->PanCard)
                                <a href="{{ asset('VendorsDocument/'.$vendor->PanCard) }}" target="_blank" class="btn btn-info btn-sm">View</a>
                                @else
                                <span>No document</span>
                                @endif
                            </td>
                            <td>
                                @if($vendor->other_document)
                                <a href="{{ asset('VendorsDocument/'.$vendor->other_document) }}" target="_blank" class="btn btn-info btn-sm">View</a>
                                @else
                                <span>No document</span>
                                @endif
                            </td>
                            {{-- <td><a>Send Password</a></td> --}}
                            <td>
                                @if($vendor->status != 1)
                                <form action="{{ route('vendors.sendPassword', $vendor->vendor_id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">Send Password</button>
                                </form>
                                @else
                                <span class="badge bg-success">Done</span>
                                @endif
                            </td>
                             <td>
                                @if ($vendor->status == 0)
                                <span class="badge text-bg-primary">Pending</span>
                            @elseif ($vendor->status == 1)
                                <span class="badge text-bg-success">Approved</span>
                            @else
                                <span class="badge text-bg-secondary">-</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('vendors.block', $vendor->vendor_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to block this vendor?');">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Block</button>
                            </form>
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
            {{$vendors->links('pagination::bootstrap-4')}}
        </div>
    </div>

   </div>
@endsection
