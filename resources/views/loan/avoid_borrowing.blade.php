@extends('loan.layouts.main')
@section('main')

    <main role="main" class="pb-3">



        <div class="hero-main content">
            <div class="container">
                <div class="row">
                    <div class="col12">
                        <h1>Lending Policy</h1>

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
                    Our lending policy
                </h5>

                <p>
                    Here at Quick2Lend we are dedicated to responsible lending practices. We make sure to carefully review each and every lender in our network to ensure good practices in treating customers fairly and adherence to lending laws.
                </p>
                <h6>TILA (Truth in Lending Act)</h6>
                <p>
                    All of our practices adhere to and are in compliance with the TILA as well as all other laws regarding our services. Prior to electronically signing an agreement to take out a loan, borrowers should thoroughly read all of terms and conditions presented by the lender explaining fees, late penalties, and all other details pertaining to their loan. If borrowers do not receive this, they should firmly request the loan terms from their lenders.
                </p>
                <h6>
                    Fair Lending
                </h6>
                <p>
                    “Fair lending,” as defined by the Consumer Financial Protection Bureau is “fair, equitable, and nondiscriminatory access to credit for both individuals and communities.” This means that cash advances should be fair. If you encounter any problem with a loan obtained with the help of our website, you can file a complaint with the CFPB.
                </p>
                <h6>
                    Collecting Debt Fairly
                </h6>
                <p>
                    Although we are not a lender and we do not collect debt from our users, We want you to be aware that our lenders must abide by the Fair Debt Collection Practices Act. This act prohibits debt collectors from abusing their power to collect debt or from collecting debt in an unreasonable way. This includes:
                </p>
                <div class="check-bullet">
                    <img src={{asset('/loan/Content/images/bullet.png')}} alt="bullet point" /> <p>Not calling consumers between 9 p.m. and 8 a.m.</p>
                </div>
                <div class="check-bullet">
                    <img src={{asset('/loan/Content/images/bullet.png')}} alt="bullet point" /> <p>Not calling consumers just to speak to them inappropriately</p>
                </div>
                <div class="check-bullet">
                    <img src={{asset('/loan/Content/images/bullet.png')}} alt="bullet point" /> <p>Not using deceptive methods to collect debt</p>
                </div>
                <div class="check-bullet">
                    <img src={{asset('/loan/Content/images/bullet.png')}} alt="bullet point" /> <p>Not threatening legal action if legal action is not required</p>
                </div>

                <h6>
                    Reporting Scams
                </h6>
                <p>
                    We are happy to help direct consumers to report any scams. If you have encountered a scam, please report it to an agency that protects consumers such as the Better Business Bureau.
                </p>

            </div>
        </div>


    </main>

@endsection
