@extends('SecondAdminPanel.Layout.main')

@section('main-section')

@if(session('error'))
 <div class="alert alert-danger">
     {{ session('error') }}
 </div>
@endif

<h3 class='m-2'>Edit Profile</h3>
    <hr>

    @if(session('successmessage'))
  <script>
    alert(
        {{ session('successmessage') }}
        )
    </script>
@endif

<p class="m-3"><span class="text-danger">Note:</span> To edit the data, make the necessary changes and press the submit button.</p>
        <div class="card mt-2" style="width:62rem;">
            <div class="card-body">

                <form class="row g-3" action="{{ url('/editprofile') }}" method="POST">
                    @csrf
                    <table class="table table-bordered text-center">
                        <tr>
                            <td><label class="form-label"> Full Name:</label></td>
                            <td>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Full Name"/>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label class="form-label">Email:</label></td>
                            <td>
                                <input type="email" name="email" class="form-control" value="{{ $user->email}}" placeholder="example@gmail.com"/>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td><label class="form-label">Contact:</label></td>
                            <td>
                                <input type="text" name="contact" class="form-control" value="{{$user->contact}}" placeholder="1234567890"/>
                                @error('contact')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td><label class="form-label">Business Name:</label></td>
                            <td>
                                <input type="text" name="business_name" class="form-control"
                                value="{{
                                $user->vendors()->exists() ? $user->vendors->first()->business_name :
                                ($user->eventManagers()->exists() ? $user->eventManagers->first()->business_name : '')
                             }}"
                                placeholder="Business Name"/>
                                @error('business_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td><label class="form-label">Description:</label></td>
                            <td>

                                <textarea name="description" class="form-control" placeholder="Description" rows="3">
                                    {{
                                        $user->vendors()->exists() ? $user->vendors->first()->description :
                                        ($user->eventManagers()->exists() ? $user->eventManagers->first()->description : '')
                                     }}
                                </textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>

                    </table>
                    <div class="col-12 text-center mt-4 " style="margin-bottom: 20px;">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>

@endsection
