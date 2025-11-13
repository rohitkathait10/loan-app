@extends('layouts.public')

@section('content')
    <!-- Banner Area -->
    <section class="banner_area">
        <div class="container">
            <h6>Policy</h6>
            <h2>Cancellation & Refund Policy</h2>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('cancellation-policy') }}" class="active">Cancellation Policy</a></li>
            </ol>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Policy Content -->
    <section class="privacy_policy_area section-padding mt-5 mb-5">
        <div class="container">
            <div class="content">
                <h2 class="mb-4">Cancellation & Refund Policy – KredifyLoans.com</h2>

                <p class="mb-4">Thank you for choosing KredifyLoans.com. We are committed to providing transparent and
                    fair services to all our customers. Please read our cancellation and refund policy carefully before
                    purchasing any membership.</p>

                <h5 class="mt-5 mb-3">1. Refund Eligibility</h5>
                <p class="mb-2">You may be eligible for a refund if:</p>
                <ul class="mb-4">
                    <li>You submit a refund request within <strong>48 hours</strong> of purchasing the membership.</li>
                    <li>The refund request is made from your <strong>registered email ID</strong> and sent to <a
                            href="mailto:info@kredifyloans.com">info@kredifyloans.com</a>.</li>
                    <li>The original payment will be refunded to the same payment method used during the transaction.</li>
                    <li>Refunds are processed within <strong>7–8 working days</strong> (as per standard banking timelines).
                    </li>
                </ul>

                <h5 class="mt-5 mb-3">2. Language Barrier</h5>
                <p class="mb-4">If you are unable to communicate in English, Hindi, or any other supported regional
                    language, you can request a refund within 48 hours of purchase.</p>

                <h5 class="mt-5 mb-3">3. Service Availability</h5>
                <p class="mb-4">If your location falls under a non-serviceable area where KredifyLoans.com does not
                    operate, and you’ve already purchased a membership, you are eligible to apply for a refund within 48
                    hours of purchase.</p>

                <h5 class="mt-5 mb-3">4. Non-Refundable Charges</h5>
                <p class="mb-4">Please note that <strong>after 48 hours, all membership charges (including the ₹500 fee)
                        are strictly non-refundable</strong>, irrespective of service usage or application outcome.</p>

                <h5 class="mt-5 mb-3">Need Help?</h5>
                <p class="mb-2">If you have any questions regarding this policy, please reach out to us:</p>
                <ul>
                    <li>Email: <a href="mailto:info@kredifyloans.com">info@kredifyloans.com</a></li>
                    <li>Phone: <a href="tel:+919876543210">+91–9876543210</a> (Monday to Friday, 10 AM – 5 PM)</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- End Policy Content -->
@endsection
