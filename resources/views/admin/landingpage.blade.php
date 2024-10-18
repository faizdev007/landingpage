@extends('layouts.admin')

@section('display')
    <style>
        #imagePreview {
            width: 300px;
            height: 300px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            color: #aaa;
        }

        #imagePreview img {
            max-width: 100%;
            max-height: 100%;
            display: none;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="p-0 mb-4 d-flex justify-content-between">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Create New Landing Page
                </button>

                <a href="{{Route('landingpagerecyclebin')}}" class="btn btn-dark" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                    </svg>
                </a>
            </div>

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
                        @foreach($landingpages as $key=>$landingpage)
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
                                        <a class="btn btn-dark" href="{{Route('visitlandingpage',$landingpage->slug)}}" title="{{Route('visitlandingpage',$landingpage->slug)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"/>
                                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"/>
                                            </svg>
                                        </a>
                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" onclick="currentdata(`{{$landingpage}}`)" data-bs-target="#staticBackdrop" title="Edite">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                                            </svg>
                                        </button>
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

    <!-- Modal -->
    <div class="modal fade modal-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Landing Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('savelandingpage')}}" id="updatecase" method="post" enctype="multipart/form-data">
                        @csrf 
                        @method('post')
                        <div id="imagePreview" class="w-100 mb-4">Image Preview</div>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div  class="form-outline position-relative">
                                    <label class="form-label text-over-border mb-0 top-n-15" for="title">Title of Landing Page <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" class="form-control bg-transparent bg-white-700 fs-5 border-bottom border-0 rounded-0" required/>
                                    <requiredalt></requiredalt>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div  class="form-outline position-relative">
                                    <label class="form-label text-over-border mb-0 top-n-15" for="backgroundimg">LandscapImage <span class="text-danger"></span></label>
                                    <input type="file" id="backgroundimg" name="backgroundimg" class="form-control bg-transparent fs-5 border-1 rounded-0"/>
                                    <requiredalt></requiredalt>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div  class="form-outline position-relative">
                                <label class="form-label text-over-border mb-0 top-n-15" for="description">A short Discribtion<span class="text-danger"></span></label>
                                    <textarea id="description" name="description" class="form-control bg-transparent fs-5 border-bottom border-0 rounded-0"></textarea>
                                    <requiredalt></requiredalt>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div  class="form-outline position-relative">
                                    <label class="form-label text-over-border mb-0 top-n-15" for="sheet_id">Google Sheet ID <span class="text-danger">*</span></label>
                                    <input type="text" id="sheet_id" name="sheet_id" class="form-control bg-transparent bg-white-700 fs-5 border-bottom border-0 rounded-0" required/>
                                    <requiredalt></requiredalt>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div  class="form-outline position-relative">
                                    <label class="form-label text-over-border mb-0 top-n-15" for="sheet_name">Current Sheet Name <span class="text-danger">*</span></label>
                                    <input type="text" id="sheet_name" name="sheet_name" class="form-control bg-transparent bg-white-700 fs-5 border-bottom border-0 rounded-0" required/>
                                    <requiredalt></requiredalt>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-1">
                                <div  class="form-outline">
                                    <button type="submit" class="btn text-bg-success w-100 py-2">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function currentdata(data) {
        // Assuming `data` is a JSON string, you need to parse it first.
        let landingPage = JSON.parse(data);
        
        // Populate the form fields with the current data
        $('#title').val(landingPage.title);
        $('#description').val(landingPage.description);
        $('#sheet_id').val(landingPage.sheet_id);
        $('#sheet_name').val(landingPage.sheet_name);

        // If you have an image URL to show a preview, do that here
        if (landingPage.backgroundimg) {
            $('#imagePreview').html(`<img src="{{url('${landingPage.backgroundimg}')}}" class="img-fluid" alt="Image Preview">`);
            $('#updatecase').append(`<input type="hidden" name="id" value="${landingPage.id}"/>`);
            $('#imagePreview img').show();
        }
    }
</script>

@endsection