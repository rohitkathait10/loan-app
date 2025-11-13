@extends('layouts.public')

@section('content')
    <!-- Banner Area -->
    <section class="banner_area">
        <div class="container">
            <h6>Disclaimer</h6>
            <h2>Disclaimer Statement</h2>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/disclaimer') }}" class="active">Disclaimer</a></li>
            </ol>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Disclaimer Content -->
    <section class="privacy_policy_area section-padding mt-5 mb-5">
        <div class="container">
            <div class="content">
                <h2>Disclaimer – KredifyLoans.com</h2>
                <p>KredifyLoans.com (operated by Kredify Loans and its associated entities) provides this website solely for
                    informational and facilitation purposes. By accessing or using our platform, you acknowledge and agree
                    to the terms outlined in this disclaimer.</p>

                <h5 class="mt-4">1. Loan Facilitation Only</h5>
                <p>KredifyLoans.com is not a lender or financial institution. We are a digital platform that enables users
                    to purchase membership cards, access a personal dashboard, and apply for Personal or Business Loans
                    through our partnered NBFCs (Non-Banking Financial Companies). The final approval, disbursal, interest
                    rate, and terms of any loan are solely at the discretion of the respective NBFCs.</p>

                <h5 class="mt-4">2. No Financial or Legal Advice</h5>
                <p>Any content, tools, or services presented on KredifyLoans.com must not be construed as legal, tax,
                    investment, or financial advice. You are advised to consult with a qualified financial advisor before
                    making any financial decisions. Your use of this website and the services is entirely at your own
                    discretion and risk.</p>

                <h5 class="mt-4">3. Use of Information</h5>
                <p>You are solely responsible for evaluating the accuracy, completeness, and usefulness of any information
                    provided on this website. KredifyLoans.com makes no guarantees or warranties—express or
                    implied—regarding the quality, suitability, accuracy, or legality of the services or content presented.
                </p>

                <h5 class="mt-4">4. No Liability for Third-Party Decisions</h5>
                <p>KredifyLoans.com does not hold any responsibility for the decisions made by any third-party NBFC or
                    financial partner. We do not guarantee loan approval, and we shall not be liable for any rejection,
                    delay, or conditions imposed by lending partners.</p>

                <h5 class="mt-4">5. Data Privacy and Security</h5>
                <p>While we take standard precautions to protect user data, KredifyLoans.com shall not be held responsible
                    for any unauthorized access, data breach, or misuse of information once submitted. By using our
                    services, you acknowledge this risk and waive any claims arising from such incidents.</p>

                <h5 class="mt-4">6. Non-Refundable Charges</h5>
                <p>
                    The membership fee collected for accessing loan services is <strong>generally non-refundable</strong>.
                    However, users may be eligible for a refund if a valid request is submitted within <strong>48
                        hours</strong> of purchase, as outlined in our <a href="{{ url('/refund-policy') }}">Refund
                        Policy</a>. Users are advised to proceed only after fully understanding this condition.
                </p>

                <h5 class="mt-4">7. Jurisdiction</h5>
                <p>All disputes arising from the use of this platform shall be subject to the jurisdiction of competent
                    courts in India only.</p>
            </div>
        </div>
    </section>
    <!-- End Disclaimer Content -->
@endsection
