@extends('frontend.layouts.master')
@section('title', 'ApplyNow')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <!--Page Title-->

    <!--End Page Title-->


    <!-- support-section -->
    <section class="support-section service-page-1 mt-4 form-container">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <div class="col-lg-7 col-md-6 col-sm-12 inner-column">
                        <div class="inner-box">
                            <div class="sec-title light left">
                                <h5>enquiry</h5>
                                <h2>Contact Us</h2>
                                <p>
                                    If you have any queries related to our service then please
                                    feel free to contact us anytime.
                                </p>
                            </div>

                            <form method="post" action="{{ route('enquiry.post') }}">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach.
                                @csrf
                                <div class="form-group">
                                    <input type="text" placeholder="Your Name" name="name"
                                        class="@error('name') is-invalid @enderror" required />
                                    @error('name')
                                        <small class="form-text text-danger">
                                            {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="Email address" name="email"
                                        class="@error('email') is-invalid @enderror" required />
                                    @error('email')
                                        <small class="form-text text-danger">
                                            {{ $message }}</small>    
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <input type="tel" name="phone" placeholder="Phone" class="@error('phone') is-invalid @enderror" pattern="^[0-9\-\+\(\)\s]+$" required max="10">
                                  @error('phone')
                                  <small class="form-text text-danger">
                                      {{ $message }}</small>
                              @enderror
                              </div>
                                {{-- <div class="form-group">
                                    <input type="text" placeholder="Address"name="address"
                                        class="@error('address') is-invalid @enderror" required />
                                    @error('address')
                                        <small class="form-text text-danger">
                                            {{ $message }}</small>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <select name="university_id" class="@error('university_id') is-invalid @enderror" required>
                                        <option selected value="">Select University</option>
                                        @foreach ($university as $uni)
                                            <option value="{{ $uni->id }}">{{ $uni->uname }}</option>
                                        @endforeach
                                    </select>
                                    @error('university_id')
                                        <small class="form-text text-danger">
                                            {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="level_id" class="@error('level_id') is-invalid @enderror" required>
                                        <option selected value="">Select Level</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('level_id')
                                        <small class="form-text text-danger">
                                            {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="course_id" class="@error('course_id') is-invalid @enderror" required>
                                        <option selected value="">Select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <small class="form-text text-danger">
                                            {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Message" name="message" class="@error('message') is-invalid @enderror" required></textarea>
                                    @error('message')
                                        <small class="form-text text-danger">
                                            {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn style-one">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 info-column">
                        <div class="info-inner">
                            <figure class="image-box">
                                <img src="{{ asset('frontend/images/resource/info-1.jpg') }}" alt="" />
                            </figure>
                            <div class="info-box">
                                <figure class="info-logo">
                                    <img src="{{ asset('frontend/images/icons/info-logo.png') }}" alt="" />
                                </figure>
                                <div class="icon-box"><i class="fas fa-phone"></i></div>
                                <h2><a href="tel:18003698527">(+977) 9841111111</a></h2>
                                <div class="email">
                                    <a href="mailto:support@my-domain.net">support@my-domain.net</a>
                                </div>
                                <ul class="list-item clearfix">
                                    <li>.&nbsp;<a href="index.html">Experienced</a>&nbsp;.</li>
                                    <li><a href="index.html">Specialized</a>&nbsp;.</li>
                                    <li><a href="index.html">Professional</a>&nbsp;.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- support-section end -->
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('success'))
            //  toastr.info("Have fun storming the castle!")
            toastr.success('{{ Session::get('success') }}')
        @endif
    </script>
@endpush
