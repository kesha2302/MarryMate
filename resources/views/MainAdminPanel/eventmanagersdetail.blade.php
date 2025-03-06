@extends('MainAdminPanel.Layout.main')

@section('main-section')
    @if (session('status2'))
        <script>
            alert("{{ session('status2') }}");
        </script>
    @endif

    <h3 class='m-2'>Event Managers Detail</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" value="{{ $search }}" type="search" name="search"
                    placeholder="Search by name or email" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{ url('/EventManagersDetail') }}">
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
                            <th style="width: 40%; word-wrap: break-word; white-space: normal;">Description</th>
                            <th>AdharCard</th>
                            <th>PanCard</th>
                            <th>Other Documents</th>
                            <th>Send Password</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventmanagers as $em)
                            <tr>
                                <td>{{ $em->em_id }}</td>
                                <td>{{ $em->user->user_id }}</td>
                                <td>{{ $em->user->name }}</td>
                                <td>{{ $em->user->email }}</td>
                                <td>{{ $em->user->contact }}</td>
                                <td>{{$em->business_type}}</td>
                                <td>{{ $em->business_name }}</td>
                                <td style="word-wrap: break-word; white-space: normal; width: 40%;">{{ $em->description }}
                                </td>

                                <td>
                                    @if ($em->AadharCard)
                                        <a href="{{ asset('EventManagersDocument/' . $em->AadharCard) }}" target="_blank"
                                            class="btn btn-info btn-sm">View</a>
                                    @else
                                        <span>No document</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($em->PanCard)
                                        <a href="{{ asset('EventManagersDocument/' . $em->PanCard) }}" target="_blank"
                                            class="btn btn-info btn-sm">View</a>
                                    @else
                                        <span>No document</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($em->other_document)
                                        <a href="{{ asset('EventManagersDocument/' . $em->other_document) }}" target="_blank"
                                            class="btn btn-info btn-sm">View</a>
                                    @else
                                        <span>No document</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($em->status != 1)
                                        <form action="{{ route('em.sendPassword', $em->em_id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">Send Password</button>
                                        </form>
                                    @else
                                        <span class="badge bg-success">Done</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($em->status == 0)
                                        <span class="badge text-bg-primary">Pending</span>
                                    @elseif ($em->status == 1)
                                        <span class="badge text-bg-success">Approved</span>
                                    @else
                                        <span class="badge text-bg-secondary">-</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('eventmanagers.block', $em->em_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to block this eventmanager?');">
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
            {{$eventmanagers->links('pagination::bootstrap-4')}}
        </div>
    </div>


    </div>
@endsection
