@extends('layouts.admin')

@section('display')
    <div class="container">
        <div class="row">
            <div class="card bg-light-subtle overflow-hidden scroll-x">
                <table id="myTable" class="table table-bordered table-striped border-dark table-group-divider">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Discribtion</th>
                        <th scope="col">Background Image</th>
                        <th scope="col">Google Sheet ID</th>
                        <th scope="col">Google Sheet Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recycledata as $key=>$landingpage)
                            <tr>
                                <th class="align-content-center" scope="row">{{$key+1}}</th>
                                <td class="align-content-center">{{$landingpage->title ?? '--'}}</td>
                                <td class="align-content-center">{{$landingpage->description ?? '--'}}</td>
                                <td class="align-content-center">
                                    <div class="d-flex justify-content-center">
                                        <img class="border-0 w-auto rounded-0 image-popup" src="{{url($landingpage->backgroundimg)}}" alt="bg">
                                    </div>
                                </td>
                                <td class="align-content-center">{{$landingpage->sheet_id ?? '--'}}</td>
                                <td class="align-content-center">{{$landingpage->sheet_name ?? '--'}}</td>
                                <td class="align-content-center">
                                    <div>
                                        <button class="btn btn-dark">Update</button>
                                        <button class="btn btn-danger" title="Move to Recycle Bin"
                                           onclick="event.preventDefault();
                                                         document.getElementById('delete-lpage-form_{{$key}}').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                            </svg>
                                            <form id="delete-lpage-form_{{$key}}" action="{{ route('deleteLpage') }}" method="POST" class="d-none">
                                                <input type="hidden" name="id" value="{{$landingpage->id}}">
                                                @csrf
                                            </form>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection