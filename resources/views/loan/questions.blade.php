@extends('loan.layouts.main')
@section('main')

    <main role="main" class="pb-3">



        <div class="hero-main content">
            <div class="container">
                <div class="row">
                    <div class="col12">
                        <h1>Frequently Asked Questions</h1>
                        <p>Have a question? We've got answers!</p>

                        <a href="{{asset('apply/')}}">
                            <div class="gradient-btn">Request funds</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row content">
            <div class="container">

                <div class="accordion">
                    <div class="accordion-item" id="question1">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>What does www.quick2lend.com do?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p> www.quick2lend.com is a loan introduction service which attempts to introduce your request details with a lender willing to lend to you. This service is FREE to the customer requesting. www.quick2lend.com may receive a commission from the lender for introducing the customer to the lender.</p>
                        </div>
                    </div>
                    <div class="accordion-item" id="question2">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>What is the minimum requirement for a loan?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <ol>
                                <li>At least 18 years old</li>
                                <li>A bank account with direct deposit</li>
                                <li>
                                    A regular source of income
                                </li>
                            </ol>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question3">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>Can I request over the phone or in person?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                We're so sorry we can’t take calls. We don’t operate a call center because they are very expensive to staff and we want this service to be <strong>FREE</strong> of charge to you. We have made the form very simple to use and what's more is it's very discreet so please do go ahead and request a loan with complete confidence that we will look after your information and our mission is to introduce you to a loan offer quickly and efficiently.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question4">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>I have terrible credit can I still request a loan?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                Yes, we have many lenders in our panel that work with customers who have less than perfect credit or no credit at all. What's more, by accepting a loan offer you may improve your credit score when you make your repayments on time. Many of our lenders report to the main credit reference agencies who will report your on time payments. Be aware though that they will also report bad repayment payments so please don’t request a loan if you can not afford to repay your loan.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question5">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>What is a personal installment loan?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                A personal loan is a fixed term loan that can be used for a variety of purposes such as home improvements or vehicle repairs. The terms vary from 1-5 years. Rather than repaying this type of loan in one single installment, they are typically repaid over a set number of monthly installments.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question6">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>How much can I borrow?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                This amount depends on the lender who issues the loan but typically amounts range from $250 to $3,000.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question7">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>What can I use the loan for?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                There are no limitations for what you can do with your personal loan! You can use the funds for anything from debt consolidation to vacations.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question8">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>What are the fees for your service?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                There are no fees to request a loan at <a title="Quick2Lend" href="start_your_loan">www.quick2lend.com</a>. Simply complete some information about yourself using the online form and get an answer within 3 minutes.
                                <br />
                                The only cost you are responsible for comes after you review and agree to a lender’s terms, by signing a loan contract. Fees associated with the loan will vary depending on your state, the lender, and the amount of your personal loan.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question9">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>What is the APR?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                The FEES and APR INTEREST RATES you will be charged are provided to you in a written document by the lender after you submit a loan request but before you are requested to digitally sign a loan agreement.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question10">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>How will I know if i'm approved?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                Within a few minutes, you will receive a notification from a <a title="Quick2Lend" href="{{asset('start/')}}">www.quick2lend.com</a> approved lender letting you know if you’re approved! If you are presented with a loan offer, you will have the option to review the terms of the loan, which you may approve or declined. Remember, this is a FREE loan quoting service, there is no obligation until after you have agreed to receive a loan from one of our panel of lenders.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question11">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>How will I recieve the funds?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                After a lender approves your personal loan, the funds will be transferred into your bank account.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question12">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>How and when do I repay my loan?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                That depends upon the lender you choose. Generally, you and the approved lender will have an agreed amount deducted directly from your account on a date and time specified in your loan agreement.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question13">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>What if i'm late on a payment?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                Lenders in the <a title="Quick2Lend" href="{{asset('start/')}}">www.quick2lend.com</a> network follow different policies regarding late payments. Most lenders apply a late fee for missing the loan payment deadline or asking to skip a payment. You should review and understand the late payment policy specified in the lender’s loan documents before accepting the loan terms and signing the loan agreement.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question14">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>How do you protect my information?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                Your privacy and security are of the utmost importance to <a title="Quick2Lend" href="{{asset('start/')}}">www.quick2lend.com</a>! Our site offers encryption technology that allows you to use <a title="Quick2Lend" href="{{asset('start/')}}">www.quick2lend.com</a> with confidence. See our privacy policy for further details about our security.
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="accordion-item" id="question15">
                        <div class="accordion-link">
                            <div class="flex">
                                <h3>How long will it take for the funds to transfer to my bank account?</h3>
                            </div>
                            <div class="icon ion-md-arrow-forward"></div>
                            <div class="icon ion-md-arrow-down"></div>
                        </div>
                        <div class="answer">
                            <p>
                                Once approved, funds can be transferred into your account. Depending on your banks processing time, funds will be transferred into your checking account as soon as the next business day after approval.
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
