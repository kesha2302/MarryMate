@extends('SecondAdminPanel.Layout.main')

@section('main-section')

<div class="card  mt-3 mx-auto" style="width:50rem;">

    <div class="card-header mt-2">
        <h3>{{$title}}</h3>
    </div>


        <div class="card-body">

                <form action="{{url($url)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Service Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$services->service_type}}"
                    placeholder="DJ/Catering"/>
                    @error('name')
                    {{ $message }}
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <input type="text" name="description" class="form-control" value="{{$services->description}}"
                    placeholder="Desccription"/>
                    @error('description')
                    {{ $message }}
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Price:</label>
                    <input type="text" name="price" class="form-control" value="{{$services->price}}"
                    placeholder="Price"/>
                    @error('price')
                    {{ $message }}
                @enderror
                </div>

                {{-- <div class="mb-3">
                    <label class="form-label">Upload Images (Max 4):</label>
                    <p class="text-danger">Note:Each image size should be less than 2.5MB</p>
                    <input class="form-control" type="file" name="images[]" multiple>
                </div> --}}
                <div class="mb-3">
                    <label class="form-label">Current Images:</label>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        @foreach ($existingImages as $image)
                            <div style="position: relative; display: inline-block;">
                                <img src="{{ asset('ServicesImage/' . trim($image)) }}" class="rounded" alt="Image"
                                    style="width: 120px; height: 70px;">
                                <button type="button" class="btn btn-danger btn-sm remove-image" data-image="{{ trim($image) }}">X</button>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Upload New Images (Max 4):</label>
                    <p class="text-danger">Note: Each image size should be less than 2.5MB</p>
                    <input class="form-control" type="file" name="images[]" multiple>
                    @error('images')
                    {{ $message }}
                @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
            </form>
        </div>


</div>
@endsection
