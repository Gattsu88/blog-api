@extends('layouts.app')

@section('title', '| Contact')

@section('content')
    <div class="col-sm-12 col-md-8 col-lg-5 offset-md-3">

        @include('partials._flash')

        <h3>Contact Us</h3><br>

        <form action="{{ route('contact.store') }}" method="post" id="contact-form">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="contact_us-name">Name:</label>
              <input type="text" class="form-control" name="name" id="contact_us-name" placeholder="Your name..">
            </div>

            <div class="form-group">
              <label for="contact_us-email">Email:</label>
              <input type="text" class="form-control" name="email" id="contact_us-email" placeholder="Your email..">
            </div>

            <div class="form-group">
              <label for="contact_us-message">Message:</label>
              <textarea rows="5" class="form-control" name="message" id="contact_us-message" placeholder="Your message.."></textarea>
            </div>

            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-success text-white btn-block">
            </div>
        </form>
    </div>
    </div>
    <div class="col-md-5 col-lg-5 offset-md-2">

    </div>
@endsection
