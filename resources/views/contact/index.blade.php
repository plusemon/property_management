@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <section class="mb-4">
                    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                    <p class="text-center w-responsive mx-auto mb-5 h5">Get in touch</p>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-5">
                            <form action="{{route('contact.admin')}}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="md-form mb-2">
                                            <label for="name" class="">Your name</label>
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="md-form mb-2">
                                            <label for="email" class="">Your email</label>
                                            <input type="text" id="email" name="email" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-2">
                                            <label for="subject" class="">Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <label for="message">Your message</label>
                                            <textarea type="text" id="message" name="message" rows="2"
                                                class="form-control md-textarea"></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="text-center text-md-right mt-3">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>

                        {{-- <div class="col-md-3 text-center">
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                    <p>San Francisco, CA 94126, USA</p>
                                </li>

                                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                    <p>+ 01 234 567 89</p>
                                </li>

                                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                    <p>contact@mdbootstrap.com</p>
                                </li>
                            </ul>
                        </div> --}}

                    </div>

                </section>
            </div>
        </div>
    </div>
</div>


@endsection
