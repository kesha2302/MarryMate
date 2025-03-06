@extends('SecondAdminPanel.Layout.main')

@section('main-section')

<div class='mt-3 container'>
    <h3>Services Data</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">

                <input class="form-control me-5 mr-sm-2" type="search" value="{{$search}}" name="search"
                placeholder="Search by name" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{url('/Services')}}">
                        <button class="btn btn-dark" type="button">Reset</button>
                    </a>
                </span>
            </form>
            <div class="d-flex">
                <button type="button" onclick="window.location='{{ url('/Serviceform') }}'" class="btn btn-dark btn-circle font-rights me-md-2">
                    </i> Add
                </button>
                <a href="{{ url('/Servicetrash') }}">
                    <button class="btn btn-danger ml-2" >
                        Trashed Data</button>
                </a>
            </div>
        </div>
    </nav>


    <div class="card mt-2" style="width:60rem;">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th colspan="6">Images</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service )
                        <tr>
                            <td>{{$service->service_type ?: '-'}}</td>
                            <td>{{$service->description ?: '-'}}</td>
                            <td>{{$service->price ?: '-'}}</td>
                            <td>
                                @if (!empty($service->images))
                                    @php
                                        $images = explode(',', $service->images);
                                    @endphp

                                    <div style="display: flex; align-items: center; gap: 10px;  white-space: nowrap; max-width: 300px;">
                                        @foreach ($images as $image)
                                            <img src="{{ asset('ServicesImage/' . trim($image)) }}" class="rounded"
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
                            <td>
                                <a href="{{route('services.delete',['id'=>$service->service_id])}}">
                                <button class="btn btn-danger m-2">Trash</button>
                                </a>

                                <a href="{{route('services.edit',['id'=>$service->service_id])}}">
                                  <button class="btn btn-primary">Update</button>
                                </a>
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
            {{$services->links('pagination::bootstrap-4')}}
        </div>
    </div>

   </div>

@endsection
