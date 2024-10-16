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
                                        <button class="btn btn-danger"
                                            onclick="event.preventDefault();
                                                        if(confirm('Delete Current landing page {{$landingpage->title}} ( {{$landingpage->sheet_id}} )')){
                                                         document.getElementById('delete-lpage-form_{{$key}}').submit();}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                            </svg>
                                            <form id="delete-lpage-form_{{$key}}" action="{{ route('deleteLpage') }}" method="POST" class="d-none">
                                                <input type="hidden" name="id" value="{{$landingpage->id}}">
                                                @csrf
                                            </form>
                                        </button>
                                        <button class="btn btn-success" title="Recover from Recycle Bin"
                                           onclick="event.preventDefault();
                                                        if(confirm('Recovery landing page {{$landingpage->title}} ( {{$landingpage->sheet_id}} )')){
                                                         document.getElementById('recover-lpage-form_{{$key}}').submit();}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                                                <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.5.5 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244z"/>
                                            </svg>
                                            <form id="recover-lpage-form_{{$key}}" action="{{ route('recoverLpage') }}" method="POST" class="d-none">
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