@extends('MainAdminPanel.Layout.main')

@section('main-section')
<h3 class='m-2'>Clients Detail</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" value="{{$search}}" type="search"  name="search"
                placeholder="Search by name or email" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{url('/ClientsDetail')}}">
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
                            <th style="width: 15%;">Client Id</th>
                            <th style="width: 15%;">Name</th>
                            <th style="width: 20%;">Email</th>
                            <th style="width: 20%;">Contact</th>
                            <th style="width: 20%;">Address</th>
                            <th style="width: 20%;">Type</th>
                            <th style="width: 10%;">Register Time</th>
                            <th style="width: 10%;">Updated Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client )
                        <tr>
                            <td>{{$client->user_id}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->contact}}</td>
                            <td>{{$client->address ?? '-'}}</td>
                            <td>@if($client->role_as == 'V')
                                Vendor
                            @elseif($client->role_as == 'EM')
                                Event Manager
                            @elseif($client->role_as == 'C')
                                Client
                            @else
                                Unknown
                            @endif</td>
                            <td>{{$client->created_at}}</td>
                            <td>{{$client->updated_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{$clients->links('pagination::bootstrap-4')}}
        </div>
    </div>

   </div>
@endsection
