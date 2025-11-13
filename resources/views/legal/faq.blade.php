@extends('layouts.public')

@section('content')
    <!-- Banner Area -->
    <section class="banner_area">
        <div class="container">
            <h6>Faq</h6>
            <h2>Frequently ask question</h2>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('faq') }}" class="active">Faq</a></li>
            </ol>
        </div>
    </section>
    <!-- Banner Area -->

    <!-- Faq Area -->
    <section class="faq_area">
        <h2>Frequently ask question</h2>
        <div class="container">

            <div class="faq_accordion">
                <div class="row">
                    <div class="col-md-6">
                        <div class="item">
                            <a href="#" data-toggle="collapse" data-target="#faq1">When can I opt for a Personal
                                Loan?</a>
                            <div id="faq1" class="collapse show" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>You can apply for a personal loan whenever you need quick funds for things like
                                        weddings, education, travel, medical needs, or emergencies. It’s a flexible loan for
                                        any personal expense without needing to give a reason.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" data-toggle="collapse" class="collapsed" data-target="#faq2">What are the
                                mandatory documents required in applying for a Personal Loan?</a>
                            <div id="faq2" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>You’ll need:</p>
                                    <ul>
                                        <li>Last 3 months’ bank statements</li>
                                        <li>Last 3 months’ salary slips</li>
                                        <li>Valid ID proof and address proof (like Aadhaar, PAN, or passport)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq3">Do I need to
                                provide any security or collateral or guarantors?</a>
                            <div id="faq3" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p> No, personal loans are unsecured — you don’t need to provide any security,
                                        collateral, or guarantor. </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq4">What are the
                                benefits of a Personal Loan?</a>
                            <div id="faq4" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>Personal Loans come with several key advantages:</p>
                                    <ul>
                                        <li>Quick and hassle-free disbursal</li>
                                        <li>No requirement for collateral or guarantors</li>
                                        <li>Simple and minimal documentation process</li>
                                        <li>Flexible repayment tenure with convenient EMI options</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq5">What is the
                                minimum and maximum loan amount?</a>
                            <div id="faq5" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>You can avail a Personal Loan ranging from ₹5,000 to ₹15,00,000, subject to your
                                        eligibility and credit profile. </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq6">What are the
                                tenure options for a Personal Loan?</a>
                            <div id="faq6" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>Personal Loans offer flexible tenure options. You can choose a repayment plan that
                                        suits your financial situation — whether it’s fixed EMIs throughout or customized
                                        plans with higher or lower EMIs during different phases of the loan, based on your
                                        income and preferences.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq7">Can I get a
                                Personal Loan with a low CIBIL Score?</a>
                            <div id="faq7" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>While a good CIBIL score improves your chances, you can still apply for a Personal
                                        Loan with a lower score. Loan approval primarily depends on your repayment capacity,
                                        income stability, and overall financial profile.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq8">Will I get a loan
                                with a low CIBIL Score?</a>
                            <div id="faq8" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>Having a low CIBIL score may affect your loan eligibility, but it doesn't
                                        automatically disqualify you. You can consider applying with a co-applicant, such as
                                        a spouse or parent, to strengthen your application. Ultimately, approval depends on
                                        your repayment capacity and financial stability.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq9">How does credit
                                report impact Personal Loan approval process?</a>
                            <div id="faq9" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>Your credit report reflects your financial history and repayment behavior. It plays a
                                        key role in evaluating your loan eligibility. A strong credit score—typically 750 or
                                        above—can significantly improve your chances of quick approval and better loan
                                        terms.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <a href="#" data-toggle="collapse" class="collapsed" data-target="#faq10">What is a
                                Business Loan?</a>
                            <div id="faq10" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>A Business Loan is a financing solution designed to support various business
                                        needs—such as managing cash flow, purchasing equipment, hiring staff, or expanding
                                        operations. Whether you're a startup or an established enterprise, Business Loans
                                        provide quick access to funds tailored to your goals.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" data-toggle="collapse" class="collapsed" data-target="#faq11">What are the
                                documents required for a Business Loan?</a>
                            <div id="faq11" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>We require minimal documentation to process your Business Loan. Typically, you’ll
                                        need:</p>
                                    <ul>
                                        <li>PAN card and Aadhaar card of the business owner</li>
                                        <li>Business registration documents</li>
                                        <li>Bank statements for the last 6–12 months</li>
                                        <li>Income tax returns or financial statements (if applicable)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq12">Who can get
                                a Business Loans?</a>
                            <div id="faq12" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>Business Loans are available to both self-employed professionals and
                                        non-professionals. We also offer exclusive loan options for doctors with quick
                                        approval and competitive interest rates. Eligible entities include: </p>
                                    <ul>
                                        <li>Sole Proprietorships</li>
                                        <li>Partnership Firms</li>
                                        <li>Private Limited Companies</li>
                                        <li>Closely Held Public Limited Companies</li>
                                        <li>Societies and Trusts</li>
                                        <li>Hospitals, Nursing Homes, Diagnostic Centers, and Pathology Labs</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq13">Can I get a
                                Business Loan without collateral?</a>
                            <div id="faq13" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>Yes, Business Loans are available without the need for any collateral or security.
                                        These unsecured loans are approved based on your credit profile, business
                                        performance, and repayment capacity.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq14">Am I
                                eligible for a Business Loan?</a>
                            <div id="faq14" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>You may be eligible for a Business Loan if you meet the following criteria: </p>
                                    <ul>
                                        <li>You are between 25 and 65 years of age</li>
                                        <li>Your business has been profitable for the last three consecutive financial years
                                        </li>
                                        <li>Your business shows a consistent upward turnover trend</li>
                                        <li>Your financials are audited by a registered Chartered Accountant</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq15">What is the
                                maximum amount can I take through a Business Loan?</a>
                            <div id="faq15" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>You can avail a Business Loan of up to ₹1 crore, subject to your credit score,
                                        business performance, and overall eligibility.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#faq16">Is the
                                interest rate fixed or floating?</a>
                            <div id="faq16" class="collapse" data-parent=".faq_accordion">
                                <div class="accordion_content">
                                    <p>Business Loan interest rates can be either fixed or floating, depending on the
                                        lender’s terms and the loan product you choose. Fixed rates remain the same
                                        throughout the loan tenure, while floating rates may vary based on market
                                        conditions. </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>

        </div>
    </section>
    <!-- End Faq Area -->

    <!-- Get started -->
    <section class="get_started_area">
        <div class="container">
            <h2>Ready to get started?</h2>
            <p>Would recommend Money Me to a friend</p>
            <a href="{{ url('/personal-loan') }}" class="theme_btn">Apply for personal loan </a>
        </div>
    </section>
    <!-- End get started -->
@endsection
