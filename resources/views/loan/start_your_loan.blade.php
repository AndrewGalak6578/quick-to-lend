@extends('loan.layouts.main')
@section('main')

    <main role=main class=pb-3>
        <div class=hero-color>
            <div class=hero-main>
                <div class=container>
                    <div class=row>
                        <div class=col12><h1>Online Personal Loans Processed <span>Quickly</span></h1>
                            <div class=hero-bullets>
                                <div class=row>
                                    <div class=bullet-content><span>All FICO Scores Welcome</span></div>
                                    <div class=bullet-content><span>Quick Loans of $250 to $3000</span></div>
                                    <div class=bullet-content><span>Borrow from 3 to 36 months</span></div>
                                    <div class=bullet-content><span>Zero up front fees or costs</span></div>
                                </div>
                            </div>
                            <h5>Let’s Get You Connected To A Direct Lender Who Can Deliver Funds Today!</h5><a
                                href="apply_for_loan">
                                <div class=gradient-btn>Request funds</div>
                            </a></div>
                    </div>
                </div>
            </div>
            <div class=blue-section>
                <div class=container>
                    <div class=row>
                        <div class=col6><h3>We’re here because you need a fast lender who can deliver. That is exactly
                                what we do for thousands of customers like you, every single day!</h3></div>
                        <div class=col6>
                            <div class=bg-white><p><span>Representative Example: </span>$1,000 loan over a 12-month term
                                    would have a total cost, including interest, a total payback amount of $1,134.72.
                                    APR 29.82%. Rates between 5.99% APR and 35.99% APR for qualified customers***. Loan
                                    term lengths from 3 to 36 months for qualified consumers.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=multigradient-section>
                <div class=container>
                    <div class=row>
                        <div class=col4><img class=lazy data-src={{asset('loan/Content/images/quick2lend-06.svg')}} height=70 width=61
                                             alt="Loans For Everyone"><h4>Loans For Everyone</h4>
                            <p>You’re welcome no matter what your credit score is. You can use the funds for any
                                purpose.</div>
                        <div class=col4><img class=lazy data-src={{asset('loan/Content/images/quick2lend-07.svg')}} height=70 width=56
                                             alt="You’re In A Rush!"><h4>You’re In A Rush!</h4>
                            <p>We value your time greatly. We will take your application and process it quickly. You
                                could have your funds in as little as 15 mins. (**)</div>
                        <div class=col4><img class=lazy data-src={{asset('loan/Content/images/quick2lend-08.svg')}} height=70 width=70
                                             alt="Direct Deposit"><h4>Direct Deposit</h4>
                            <p>No waiting around or lining up. You can have your funds deposited direct to your bank
                                account. (**)</div>
                    </div>
                </div>
            </div>
        </div>
        <div class=multigradient-section-border></div>
        <div class=container>
            <div class="row large-bullets-section">
                <div class=col7><img class=lazy data-src={{asset('loan/Content/images/hero3.png')}} alt=hero></div>
                <div class=col5>
                    <div class=large-bullet>
                        <ul>
                            <li>Simple loan quote of $250 to $3000
                            <li>Paid directly to your bank account fast
                            <li>All credit histories considered
                            <li>Quick, secure, and hassle-free online form
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row steps-section">
                <div class=col7>
                    <div class=steps><h5><span>Step 1</span></h5><h4>We need to know a little about you</h4>
                        <p>Complete the 2min online application with your basic information. We will search our highly
                            specialized lending panel for a good match. Your personal data is safe with us.<h5><span>Step 2</span>
                        </h5><h4>Get Approved Within 3mins</h4>
                        <p>Review the offer presented. Check the loan value, the period you have to pay back the loan
                            and the APR terms. If the loan suits your needs, you can accept and have the funds deposited
                            quickly.<h5><span>Step 3</span></h5><h4>Receive The Cash Loan</h4>
                        <p>Once approved, you can finish up your acceptance with the lender and have your funds
                            deposited directly to your bank account.</div>
                </div>
                <div class=col5><img class=lazy data-src={{asset('loan/Content/images/hero4.png')}} alt="hero 2"></div>
            </div>
        </div>
        <div class=purplegradient-section>
            <div class=container>
                <div class=row>
                    <div class=col12><h4>To Give You Total Peace Of Mind</h4><h5>If you are applying for a loan online,
                            it is important that you choose a reputable company. Before you apply, here's a little bit
                            of information to put your mind at ease.</h5><a href="apply_for_loan">
                            <div class=gradient-btn>Request funds</div>
                        </a></div>
                </div>
            </div>
        </div>
        <div class=container>
            <div class="row security-section">
                <div class=col4><img class=lazy data-src={{asset('loan/Content/images/ola.png')}} height=50 width=102
                                     alt="We Are OLA By Accredited"><h4>We Are OLA Accredited</h4>
                    <p>Quick2lend has been a member of the Online lenders Alliance since 2005</div>
                <div class=col4><img class=lazy data-src={{asset('loan/Content/images/quick2lend-09.svg')}} height=50 width=51
                                     alt="Your Data Is Secure"><h4>Your Data Is Secure</h4>
                    <p>We are always clear and transparent with regards to how your data is processed</div>
                <div class=col4><img class=lazy data-src={{asset('loan/Content/images/quick2lend-11.svg')}} height=50 width=46
                                     alt="We don't charge fees"><h4>We don't charge fees</h4>
                    <p>Quick2lend is FREE loan matching service. There is no charge to obtain a quote</div>
            </div>
            <div class="row content"><h5>Annual Percentage Rate (APR) Disclosure & Range (Qualified Customers***)</h5>
                <p>Annual percentage rate (APR) refers to the yearly interest generated by a sum that's charged to
                    borrowers. APR is expressed as a percentage that represents the actual yearly cost of funds over the
                    term of a loan. This includes any fees or additional costs associated with the transaction. The APR
                    provides consumers with a bottom-line number they can compare among lenders, credit cards, or
                    investment products. Quick2Lend cannot guarantee any APR since we are not a lender ourselves. An APR
                    can generally run between 5.99% up to 35.99%. Loan products general have a 61-day minimum repayment
                    term and a 72-month maximum repayment term. Before accepting a loan from a lender within our
                    network, please read the loan agreement carefully as the APR and repayment terms may differ from
                    what is listed on this site.<h5>Representative Examples of APR, Total Loan Costs & Fee (Qualified
                    Customers***)</h5>
                <table>
                    <thead>
                    <tr>
                        <th>Amount
                        <th>Period
                        <th>APR
                        <th>Monthly
                        <th>Total Paid
                    <tbody>
                    <tr>
                        <td>$1,000
                        <td>12 mo
                        <td>29.82%
                        <td>$94.56
                        <td>$1,134.72
                    <tr>
                        <td>$2,000
                        <td>12 mo
                        <td>24%
                        <td>$189.12
                        <td>$2,269.44
                    <tr>
                        <td>$4,000
                        <td>24 mo
                        <td>12%
                        <td>$188.29
                        <td>$4,518.96
                </table>
                <h5>Financial Implications (Interest & Finance Charges)</h5>
                <p>Quick2Lend is not a lender, and we cannot predict what fees and interest rates will be applied to any
                    loan you may be offered. Your lender will provide all the necessary information about the associated
                    costs of a loan they wish to offer you. You are responsible for reviewing the loan agreement
                    carefully and accepting the offer only if you agree to all the terms. Quick2Lend does not charge you
                    for its loan matching service, and you are under no obligation to accept the terms that the lender
                    offers you.<h5>Late Or Non-Payment Implications</h5>
                <p>By accepting the terms and conditions for a personal loan, you essentially agree to repay the loan
                    both: 1) with interest and 2) in the time frame specified in the loan agreement. In most cases,
                    failure to repay the loan in full, or making a late payment, can result in additional
                    charges.Quick2Lend.com has NO ability to predict or estimate what supplemental charges will be
                    incurred in the event of late, partial, or non-payment. Quick2Lend.com also has NO control or
                    knowledge of any loan agreements or details between you and your lender.
                <p>Please carefully review the late, partial, and non-payment policies that your lender provides with
                    your loan agreement. Quick2Lend.com works hard to partner with only the most trustworthy and
                    reputable lenders who pursue the collection of past-due loan accounts in a fair and reasonable
                    manner.<h5>Potential Impact to Credit Score</h5>
                <p>Our lenders may perform credit checks to determine your credit worthiness, credit standing and/or
                    credit capacity. By submitting your request you agree to allow our lenders to verify your personal
                    information and check your credit. Please be aware that missing a payment or making a late payment
                    can negatively impact your credit score.<h5>Collection Practices</h5>
                <p>Quick2Lend.com is not a lender and, because of this, we have NO involvement in the debt collection
                    process. As part of the lending agreement provided to you by the lender, they will disclose their
                    debt collection practices. If you have any collection questions, please contact the lender for
                    complete details. Quick2Lend.com only works with reputable lenders who use fair collection
                    practices.
                <p><strong>Legal Disclaimer</strong>: Quick2Lend.com connects borrowers with lenders or lending partners
                    and thus the specific terms and conditions of the specific lender or lending partner will apply to
                    any loan a borrower takes out. We are compensated by these lenders or lending partners for
                    connecting you with them, and the compensation received may affect which offer you are presented
                    with. Any display of APR, loan amounts, interest or other loan details are estimations only, and
                    actual amounts will vary by lender or lending partner and by borrower. Please note that some lenders
                    or lending partners may perform credit checks as part of their credit transaction approval process.
                    The lender or lending partner you connect with may not offer the best possible terms and borrowers
                    should always compare all available options before making any decisions. In addition, you may be
                    connected with a tribal lender. Tribal lenders’ rates and fees may be higher than state-licensed
                    lenders, and are subject to federal and tribal laws, not state laws. THE OWNERS AND OPERATORS OF
                    THIS WEBSITE ARE NOT LENDERS, they do not broker loans and they do not make loans or credit
                    decisions. Nothing on this website is an offer or a solicitation to lend. Any information you submit
                    to this site will be provided to a lender or lending partner. The operator of this website is not an
                    agent, representative or broker of any lender or lending partner and does not endorse or charge you
                    for any service or product.
                <p><strong>Availability</strong>: Every state has its own set of rules and regulations that govern
                    personal loan lenders. Your loan amount, APR and repayment term will vary based on your credit
                    worthiness, state and lender or lending partner.
                <p><strong>Material Disclosure</strong>: The operator of this website is not a lender, loan broker or
                    agent for any lender or loan broker. This website is not an offer of credit nor is it a solicitation
                    to lend. We are not affiliated with any lender. We are an advertising referral service for lenders
                    that may be able to offer loans in amounts between $250 and $3000. There is no fee to use our
                    services. Your loan request submitted on this website will be shared with one or more lenders. There
                    is no guarantee that you will be connected with a lender, your loan request will be approved by a
                    lender, or you will be offered the loan amount requested. Lenders may perform a credit check to
                    determine your creditworthiness or verify your information. Any compensation we receive is paid by
                    lenders and other advertising partners, and only for advertising services provided. Short-term,
                    small-dollar loans should not be used as a long-term solution to financial hardship.<h5>Loan Renewal
                    Policies</h5>
                <p>Loan renewal options are not always available. It is therefore advisable to clarify whether the
                    option is available with your lender. Before you sign the documents, carefully read and understand
                    the renewal policy presented in the agreement.<h5>Footnotes</h5>
                <p>(*) Three minutes is the average time taken to complete the online loan offer process, submit your
                    details and receive a loan offer decision if approved.
                <p>(**) Once approved, your cash could be sent within 15 minutes. The time that it takes for the cash to
                    be received in your account will depend on your bank’s policies and procedures.
                <p>(***) Although some providers offer rates from 4.95% up to 35.99% APR rates that low are only
                    available to certain customers. The repayment terms are for close end loan products, and is not
                    reflective of all loan products offered in our network.</div>
        </div>
    </main>

@endsection
