@extends('SecondAdminPanel.Layout.main')

@section('main-section')

<div class='mt-3 container'>
    <h3>Services Trash Data</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="d-flex">

                <a href="{{ url('/Services') }}">
                    <button class="btn btn-danger ml-2" >
                        View Services Data</button>
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
                                <a href="{{route('services.forcedelete',['id'=>$service->service_id])}}">
                                    <button class="btn btn-danger m-2">Delete</button>
                                    </a>

                                    <a href="{{route('services.restore',['id'=>$service->service_id])}}">
                                      <button class="btn btn-primary">Restore</button>
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
