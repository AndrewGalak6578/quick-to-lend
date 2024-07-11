@extends('loan.layouts.main')
@section('main')

    <main role="main" class="pb-3">



        <div class="hero-main content">
            <div class="container">
                <div class="row">
                    <div class="col12">
                        <h1>Do Not Sell My Personal Information (California Residents)</h1>

                        <a href="apply_for_loan">
                            <div class="gradient-btn">Request funds</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row content">
            <div class="container">
                <h5>
                    Do Not Sell My Personal Information
                </h5>
                <ol class="ccpa-list">
                    <li>
                        <p>
                            If you are a California resident, you have the right to direct us not to sell your personal information at any time. You may submit your request by sending an email with the Subject Line “CCPA Do Not Sell My Information”. In your request, please provide us with enough information to identify you, including
                        <ol class="lower-roman">
                            <li><p>your full name;</p></li>
                            <li><p>physical address;</p></li>
                            <li><p>phone number;</p></li>
                            <li><p> email address;</p></li>
                            <li><p>proof of your identity (e.g. driver’s license or passport); and</p></li>
                            <li><p>a description of what right you want to exercise.</p></li>
                        </ol>
                        <p>Once your request is submitted, we will reach out to you within 2 business days to verify your identity. After we verify your identity, we will send your information to you via an electronic format. Any personal information we collect from you to verify your identity in connection with your request will be used solely for the purposes of verification.</p>
                    </li>
                    <li>
                        <p>However, if you opt-out, please note that we will be unable to help you find a loan or other product or services that may be of interest to you through our Network Partners. In order to opt-in, please resubmit your request, which lets us know that you want to sell your information to deliver the products and services you requested.</p>
                    </li>
                </ol>

                <p>
                    <a href="contact_the_support_team" class="content-link">Contact us</a> for further inquiries.
                </p>
            </div>
        </div>


    </main>

@endsection
