@extends('loan.layouts.main')
@section('main')

    <main role="main" class="pb-3">



        <div class="hero-main content">
            <div class="container">
                <div class="row">
                    <div class="col12">
                        <h1>Fraud</h1>

                        <a href="{{asset('apply/')}}">
                            <div class="gradient-btn">Request funds</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row content">
            <div class="container">
                <h5>
                    Your Security
                </h5>
                <p>
                    Keep a lookout for Scams and Fraud
                </p>
                <p>PingYo! takes the safety and privacy of its customers seriously, we provide this page to help forewarn our customers and provide some guidance if you think you may have become a victim of fraud.</p>

                <h6>Top tips</h6>
                <div class="warning-block">
                    <div class="warning-bullet">
                        <img src={{asset('loan/Content/images/warning.png')}} alt="warning" />
                        <p>Never pay in advance for the promise of a loan</p>
                    </div>

                    <div class="warning-bullet">
                        <img src={{asset('loan/Content/images/warning.png')}} alt="warning" />
                        <p>Never give out personal information if you cannot verify the identity of the person or company contacting you</p>
                    </div>

                    <div class="warning-bullet">
                        <img src={{asset('loan/Content/images/warning.png')}} alt="warning" />
                        <p> Never send money to a person or company if you don’t recall taking a loan from them</p>
                    </div>
                </div>





                <p>
                    Fraud is sometimes difficult to spot: some fraudsters take the name of genuine companies and pose as them sending letters or making cold telephone calls to their victims promising loan deals that don’t really exist. They invite the victim to part with the cash on the promise that a loan will follow. Be aware of these types of scams.
                </p>
                <p>
                    Below are just two examples of scams where fraudsters have impersonated lenders or credit brokers, please read the details and learn how to protect yourself.
                </p>

                <h6>Advanced fee loan scam</h6>
                <p>
                    The fraudsters responsible for this scam demand upfront payment of various “fees,” requesting payment via money, wire or cash transfers, or via prepaid debit cards like Green Dot.
                </p>
                <p>
                    The people that run these scams are skilled and experienced at persuading their targets to part with their money.
                </p>
                <p>
                    These scammers are not affiliated with PingYo LLC or anyone associated with us. PingYo LLC does not require upfront payment on any of its loans and does not charge request fees. These scammers often attempt to copy legitimate lenders’ licenses or use fake loan confirmations or approval letters.
                </p>

                <h6>
                    Warning Signs
                </h6>
                <div class="warning-block">
                    <div class="warning-bullet">
                        <img src={{asset('loan/Content/images/warning.png')}} alt="warning" />
                        <p>They ask for payment in advance</p>
                    </div>

                    <div class="warning-bullet">
                        <img src={{asset('loan/Content/images/warning.png')}} alt="warning" />
                        <p>They ask for a prepaid debit card like Green Dot</p>
                    </div>

                    <div class="warning-bullet">
                        <img src={{asset('loan/Content/images/warning.png')}} alt="warning" />
                        <p>They ask you to wire them money</p>
                    </div>
                </div>

                <h6>Debt collection scam</h6>
                <p>
                    These scammers make telephone calls impersonating legitimate collectors or lenders. In these calls, they fraudulently attempt to collect actual and phantom debts.
                </p>
                <p>
                    These calls are not being made by PingYo LLC or anyone affiliated with us. These fraudulent debt collectors call to harass and threaten consumers in an effort to intimidate or con people into making payments for debts, including debts that do not actually exist, that have previously been paid, or that are owed to a different collection agency.
                </p>
                <h6>
                    Warning Signs
                </h6>
                <div class="warning-block">
                    <div class="warning-bullet">
                        <img src={{asset('loan/Content/images/warning.png')}} alt="warning" />
                        <p>They threaten you with violence, arrest or wage garnishment</p>
                    </div>

                    <div class="warning-bullet">
                        <img src={{asset('loan/Content/images/warning.png')}} alt="warning" />
                        <p>They refuse to provide you with your loan agreement or history</p>
                    </div>

                    <div class="warning-bullet">
                        <img src={{asset('loan/Content/images/warning.png')}} alt="warning" />
                        <p>They attempt to collect an amount that is different than what you owe</p>
                    </div>
                </div>

            </div>
        </div>

    </main>

@endsection
