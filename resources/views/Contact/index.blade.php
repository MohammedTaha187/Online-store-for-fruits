@extends('layout')

@section('title')
Contact
@endsection


@section('body')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Get 24/7 Support</p>
                    <h1>Contact us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Have you any question?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est,
                        assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse
                        natus!</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" action="{{ route('message.store') }}" id="fruitkha-contact">
                        @csrf
                        <p>
                            <input type="text" placeholder="Name" name="name" id="name" required>
                            <input type="email" placeholder="Email" name="email" id="email" required>
                        </p>
                        <p>
                            <input type="tel" placeholder="Phone" name="phone" id="phone" required>
                            <input type="text" placeholder="Subject" name="subject" id="subject" required>
                        </p>
                        <p>
                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
                        </p>
                        <p><input type="submit" value="Submit"></p>
                    </form>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Shop Address</h4>
                        <p>{{ $settings->shop_address() }} <br>
                           {{ $settings->country_name ()}}</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Shop Hours</h4>
                        <p>{{ $settings->shop_hours() }}</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: {{ $settings->contact_phone() }} <br>
                           Email: {{ $settings->contact_email() }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="find-location blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
            </div>
        </div>
    </div>
</div>



<div class="embed-responsive embed-responsive-21by9">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26432.42324808999!2d-118.34398767954286!3d34.09378509738966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf07045279bf%3A0xf67a9a6797bdfae4!2sHollywood%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1576846473265!5m2!1sen!2sbd"
        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
        class="embed-responsive-item"></iframe>
</div>
@endsection
