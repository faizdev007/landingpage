@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="p-0 mb-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add New User
                </button>
            </div>

            <div class="card bg-light-subtle">
                <table id="myTable" class="table table-bordered table-striped border-dark">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <th class="align-content-center" scope="row">{{$key+1}}</th>
                                <td class="align-content-center">{{$user->name ?? '--'}}</td>
                                <td class="align-content-center">{{$user->email ?? '--'}}</td>
                                <td class="align-content-center">{{$user->role ?? '--'}}</td>
                                <td class="align-content-center">{{date('d-m-Y h:i:s',strtotime($user->created_at)) ?? '--'}}</td>
                                <td class="align-content-center">
                                    <div>
                                        <button class="btn btn-dark">Update</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
    </div>
@endsection