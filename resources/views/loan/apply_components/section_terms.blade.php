@extends('loan.apply_for_loan')
@section('content')
    <input type="hidden" name="redirect_url" value="{{ route('start.loan.start_your_loan') }}">
    <div class="section  section-terms">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="title">
                        <p class="pretitle" style="padding-bottom: 10px">Almost Done</p>
                        <h3 data-nt="2D000007E8" data-hc="18">Terms &amp; Conditions</h3>
                    </div>
                    <p class="term-paragraph" style="font-size: 13px; margin-bottom: 25px">By submitting this online
                        form, I confirm that I have read and I consent to PingYo’s <a
                            href="terms_and_conditions_for_submission.html" target="_blank">Terms &amp; Conditions</a>,
                        <a href="our_secure_data_handling_rules.html" target="_blank">Privacy Policy</a>, and <a
                            href="consent_for_electronic_signatures.html" target="_blank">E-Consent</a>. <strong>I
                            acknowledge that I received this E-Consent and that I consent to conduct transactions using
                            electronic signatures, electronic disclosures, electronic records, and electronic contract
                            documents</strong>. I am also providing my consent under the Fair Credit Reporting Act for
                        PingYo’s participating lenders or partners to obtain consumer report information or other
                        information from credit reporting agencies. I understand that my request may be shared with
                        multiple lenders, non-lenders, and third-party loan connection services; each of whom may obtain
                        consumer report information from my credit profile. I understand that I may be contacted by a
                        lender regarding my loan request and I am providing express written consent under the Telephone
                        Consumer Protection Act to be contacted by a lender, and their affiliates and service providers,
                        by telephone at the numbers you have provided, even if your phone number is on any Do-Not-Call
                        registry list.</p>
                    <div class="form-group" style="margin-bottom: 30px">
                        <div class="checkbox">
                            <input checked id="terms_confirm" type="checkbox" value="true">
                            <label for="terms_confirm">
                                <p class="term-paragraph" style="font-size: 13px; margin-bottom: 0">
                                    <strong>Please check to confirm</strong><br/>
                                    I wish to receive recurring communication from PingYo and <a
                                        href="{{asset('apply/')}}"
                                        onclick="alert('By using our service, your information may be shared with, and you may be contacted by the third-parties listed below, along with their parent companies, subsidiaries, related entities, and service providers acting on their behalf. For a more detailed explanation of how and why your information may be shared with these third-parties, please see our Privacy Policy.\r\n\r\nGlobal Digital Revenue LLC, HomeOptions, Lending Club, Prosper, SoFi, Marcus, Best Egg, LightStream, Freedom Plus, Avant, Upgrade, Lending Point, Upstart, Payoff, One Main Financial, Net Credit, OppLoans, FigLoans, Tally, MoneyKey, 60MonthLoans, Personify, Elevate, Lending USA, Axos Bank, Figure, Mariner Finance, Merrick bank, Universal Credit, CreditFresh, Bankers Healthcare Group, PenFed Credit Union, Lydgen LLC')">3rd
                                        Party Partners</a> via telephone, text message or email using the number
                                    provided on the application.
                                </p>
                            </label>
                        </div>
                    </div>
                    <p class="term-paragraph" style="font-size: 13px">I understand that I will receive a maximum of 10
                        SMS messages per month and that I can text STOP to opt-out anytime. I understand that I may
                        incur charges from my telephone operator and that message and data rates may apply. No one from
                        this site will call you directly, we will never request upfront payments, we'll never ask you
                        for money, and we will never ask you to purchase vouchers of any kind.</p>
                    <p class="term-paragraph" style="font-size: 13px">Note: You can opt-out of these communications at
                        any time. For more details please see our Privacy Policy which also explains the types of
                        companies who may contact you and the way they will use the information you have provided today
                        as well as in the past. Be assured that any such parties will use your data in accordance with
                        all applicable law relating to privacy.</p>
                    <div id="ccpa" class="california-residents hide_element">
                        <p class="term-paragraph" style="font-size: 13px">
                            <small>
                                <strong>California Residents:</strong>
                                <br/>
                                <a class="affiliateCCPANoticeUrl" target="_blank" href="{{assert('start/ccpa')}}" rel="nofollow">CCPA
                                    Notice</a>
                                <br/>
                                <a class="affiliateDonotsellUrl" target="_blank" href="{{assert('start/ccpa_do_not_sell')}}"
                                   rel="nofollow">Do Not Sell My Information</a>
                            </small>
                        </p>
                    </div>

                    <div class="section-footer">
                        <button id="submission-button" type="submit" class="btn btn-primary">Get my quote </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
