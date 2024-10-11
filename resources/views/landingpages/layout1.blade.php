@extends('layouts.landingplayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="position-relative">
                <div class="card h-75 overflow-hidden rounded-5 shadow-sm position-relative">
                    <div class="card-body p-0 m-0">
                        <img src="{{asset('/img/beautiful.jpeg')}}" class="w-100 bg-cover" alt="">
                    </div>
                    <div class="position-absolute top-0 bottom-0 start-0 end-0 d-flex flex-column justify-content-center z-10 text-center">
                        <h2 class="fs-50 text-white fw-bold">EXPLORE THE</h2>
                        <h1 class="fs-100 text-white-50 fw-bold">WORLD</h1>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="card rounded-5 top-n-5 shadow col-10 mx-auto position-relative overflow-hidden">
                        <h2 class="text-center mt-3 fw-bold fs-50">Travel Junky Bali Inquiry Form</h2>
                        <div class="my-4">
                            <div class="d-flex justify-content-center gap-5 text-dark">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-box2-heart-fill" viewBox="0 0 16 16">
                                            <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zM8.5 4h6l.5.667V5H1v-.333L1.5 4h6V1h1zM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                                        </svg>
                                    </div>
                                    <strong class="fs-5 mt-2">Custom-made</strong>
                                    <strong class="fs-5">Itineraries</strong>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                        </svg>
                                    </div>
                                    <strong class="fs-5 mt-2">Unforgettable</strong>
                                    <strong class="fs-5">Memories</strong>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                                            <path d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0M4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5m7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                        </svg>
                                    </div>
                                    <strong class="fs-5 mt-2">Best</strong>
                                    <strong class="fs-5">Prices</strong>
                                </div>
                            </div>
                        </div>
                        <img src="{{asset('/img/aircraft_route.png')}}" class="w-100 background-image bg-cover item-align-center position-absolute top-0 bottom-0 start-0 end-0" alt="">
                        <div class="card-body p-5 position-relative z-10">
                            <form>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-5">
                                    <div class="col">
                                        <div  class="form-outline">
                                            <label class="form-label text-over-border mb-0" for="fullname">Your Full Name <span class="text-danger">*</span></label>
                                            <input type="text" id="fullname" class="form-control bg-transparent bg-white-700 py-1 fs-5 border-bottom border-0 rounded-0" required/>
                                            <requiredalt></requiredalt>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div  class="form-outline">
                                            <label class="form-label text-over-border mb-0" for="phone">Phone Number <span class="text-danger">*</span></label>
                                            <input type="text" id="phone" class="form-control bg-transparent py-1 fs-5 border-bottom border-0 rounded-0" required/>
                                            <requiredalt></requiredalt>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col">
                                        <div  class="form-outline">
                                            <label class="form-label text-over-border mb-0" for="email">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" id="email" class="form-control bg-transparent py-1 fs-5 border-bottom border-0 rounded-0" required/>
                                            <requiredalt></requiredalt>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col">
                                        <div  class="form-outline">
                                            <label class="form-label" for="triptype">Type of trip you looking for ? <span class="text-danger">*</span></label>
                                            <select name="triptype" id="triptype" class="form-select py-2 fs-4" required>
                                                <option value="">Choose *</option>
                                                <option value="honeymoon">Honeymoon Trip</option>
                                                <option value="family">Family/Friends Trip</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <requiredalt></requiredalt>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div  class="form-outline">
                                            <label class="form-label" for="tripmonth">Which month you plan to Travel? <span class="text-danger">*</span></label>
                                            <select name="tripmonth" id="tripmonth" class="form-select py-2 fs-4" required>
                                                <option value="">Choose *</option>
                                                <option value="honeymoon">Honeymoon Trip</option>
                                                <option value="family">Family/Friends Trip</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <requiredalt></requiredalt>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col">
                                        <div  class="form-outline">
                                            <p class="form-label pb-2">Have you booked the flights? <span class="text-danger">*</span></p>
                                            <div class="row g-2 form-control d-flex">
                                                <div class="col-12 col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tripbook" id="tripbook1" value="yes" required>
                                                        <label class="form-check-label" for="tripbook1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tripbook" id="tripbook2" value="no" required>
                                                        <label class="form-check-label" for="tripbook2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <requiredalt></requiredalt>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div  class="form-outline">
                                            <p class="form-label pb-2" for="form3Example4">What is your Package Budget? <span class="text-danger">*</span></p>
                                            <div class="row g-2 form-control d-flex">
                                                <div class="col-12 col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tripcost" id="tripcost1" value="1_to_1.5" required>
                                                        <label class="form-check-label" for="tripcost1">
                                                            1 Lakh - 1.5 Lakh
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tripcost" id="tripcost2" value="2_to_2.5" required>
                                                        <label class="form-check-label" for="tripcost2">
                                                            2 Lakh - 2.5 Lakh
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tripcost" id="tripcost3" value="2.5_+" required>
                                                        <label class="form-check-label" for="tripcost3">
                                                            2.5 Lakh +
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <requiredalt></requiredalt>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col">
                                        <div  class="form-outline">
                                            <button type="button" class="btn text-bg-success w-100 py-2">Submit</button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div  class="form-outline">
                                            <button type="button" class="btn text-bg-dark w-100 py-2">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div>
                    
                </div>

                <div class="card h-400px overflow-hidden rounded-5 shadow-sm position-relative">
                    <div class="card-body p-0 m-0">
                        <img src="{{asset('/img/mounten.webp')}}" class="w-100 bg-cover" alt="">
                    </div>
                    <div class="position-absolute top-0 bottom-0 start-0 end-0 d-flex flex-column justify-content-center z-10 text-center">
                        <h2 class="fs-50 text-white fw-bold">TRAVEL</h2>
                        <h1 class="fs-100 text-white-50 fw-bold mb-4">WITH US</h1>
                        <div>
                            <div class="d-flex justify-content-center gap-5 text-white">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.5.5 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.5.5 0 0 0-.196 0zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1z"/>
                                        </svg>
                                    </div>
                                    <p class="fs-5 mt-2">Created Experience</p>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-raised-hand" viewBox="0 0 16 16">
                                            <path d="M6 6.207v9.043a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H6.236a1 1 0 0 1-.447-.106l-.33-.165A.83.83 0 0 1 5 2.488V.75a.75.75 0 0 0-1.5 0v2.083c0 .715.404 1.37 1.044 1.689L5.5 5c.32.32.5.754.5 1.207"/>
                                            <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                                        </svg>
                                    </div>
                                    <p class="fs-5 mt-2">Personalize Services</p>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
                                            <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                        </svg>
                                    </div>
                                    <p class="fs-5 mt-2">Unbeatable Rates</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
