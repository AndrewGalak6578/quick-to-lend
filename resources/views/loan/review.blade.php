@extends('loan.layouts.main')
@section('main')

    <main role="main" class="pb-3">



        <div class="hero-main content">
            <div class="container">
                <div class="row">
                    <div class="col12">
                        <h1>Annual Percentage Rate (APR)</h1>

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
                    Annual Percentage Rate (APR) Disclosure & Range (Qualified Customers)
                </h5>

                <p>
                    Quick2Lend™ is&nbsp;<span style="font-weight: 400;">is not a lender. Because of this, we are not able to confirm the exact APR rate that you will be charged. Should you have reached our site via a paid Google advert, you will have seen repayment terms ranging from 3 to 24 months, together with illustrated rates of 4.95% to 35.99% for qualified customers (calculation consistent with the Truth In Lending Act, TILA). Although some providers offer rates from 4.95% up to 35.99% APR rates that low are only available to certain customers. The repayment terms are for close end loan products, and is not reflective of all loan products offered in our network.</span><span style="font-weight: 400;">
                <br>
            </span><span style="font-weight: 400;">
                <br>
            </span><span style="font-weight: 400;">To apply for a loan, you will need to be 18 years or older. The rate of APR you will be charged will be set by the lender. The figure can vary and, will be based both on the information that you provide to the lender within your loan request and the information the lender supplied to you. The lender will always notify you of the APR they can offer you.</span><span style="font-weight: 400;">
                <br>
            </span><span style="font-weight: 400;">
                <br>
            </span><span style="font-weight: 400;">APR rates are based on how creditworthy you are, the rates are subject to change without notice which could result in the rate and amount you pay back varying.</span><span style="font-weight: 400;">
                <br>
            </span><span style="font-weight: 400;">
                <br>
            </span><span style="font-weight: 400;">Once your application has been accepted by a lender, they will provide you with all the facts associated with the loan. This will include the APR, any associated loan finance charges and all of the terms you will be agreeing to. It is prudent that you read all information submitted to you by the lender to ensure that you can make an informed decision prior to accepting a loan offer.</span>
                </p>
                <p>
                    <span style="font-weight: 400;">&nbsp;Quick2Lend™ refers consumers to trusted, reputable lenders who are able to provide loan information and advice – we do not charge for this service.</span><span style="font-weight: 400;">
                <br>
            </span><span style="font-weight: 400;"><br> </span>
                </p>
                <h5>
                    Representative Examples of APR, Total Loan Costs & Fee (Qualified Customers)
                </h5>
                <table>
                    <tr>
                        <td>Amount</td>
                        <td>Period</td>
                        <td>APR</td>
                        <td>Monthly</td>
                        <td>Total Paid</td>
                    </tr>
                    <tr>
                        <td>$1,000</td>
                        <td>12 mo</td>
                        <td>29.82%</td>
                        <td>$94.56</td>
                        <td>$1,134.72</td>
                    </tr>
                    <tr>
                        <td>$2,000</td>
                        <td>12 mo</td>
                        <td>24%</td>
                        <td>$189.12</td>
                        <td>$2,269.44</td>
                    </tr>
                    <tr>
                        <td>$4,000</td>
                        <td>24 mo</td>
                        <td>12%</td>
                        <td>$188.29</td>
                        <td>$4,518.96</td>
                    </tr>
                </table>
            </div>
        </div>

    </main>

@endsection
