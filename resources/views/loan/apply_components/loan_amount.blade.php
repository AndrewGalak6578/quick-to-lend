@extends('loan.apply_for_loan')

{{--1--}}
@section('content')
<div class="section">
    <div class="container" style="max-width: 1210px">
        <div class="row">
            <div class=" ">
                <div class="title">
                    <h3>Get Your Personalized Loan Offer Instantly<br />100% Free &amp; No Obligations!</h3>
                    <p class="pretitle">Complete This Form To Apply<br />No Additional Steps Required!</p>
                </div>
                <div class="quote-form">

                    <div class="loan-details">
                        <div class="loan-amount">
                            <div class="form-group">
                                <label>
                                    How much would you like to borrow?
                                    <span>
                                                $<input id="la" type="number" class="loan-amount-input" value="3000" min="100" max="25000" maxlength="5" />
                                                <a href="apply_for_loan" class="edit-amount"><i class="far fa-pencil"></i></a>
                                            </span>
                                </label>
                                <div class="loan-amount-range"></div>
                                <div class="messages"></div>
                            </div>
                        </div>


                        <div class="loan-purpose">
                            <div class="form-group">
                                <label>Loan Purpose?</label>
                                <div class="form-choice loan-purpose-input radio-class">
                                    <div class="field-choice">
                                        <input onclick="isOther(event)" id="loan-purpose-1" name="loan-purpose-radio" value="10" type="radio" />
                                        <label for="loan-purpose-1" class="form-control transition">
                                            <img src={{asset('loan/Content/images/purpose-1-01.svg')}} alt="pay bills" />
                                            Pay bills
                                        </label>
                                    </div>
                                    <div class="field-choice">
                                        <input onclick="isOther(event)" id="loan-purpose-2" name="loan-purpose-radio" value="11" type="radio" />
                                        <label for="loan-purpose-2" class="form-control transition">
                                            <img src={{asset('loan/Content/images/purpose-1-02.svg')}} alt="home improvements" />
                                            Home Improvements
                                        </label>
                                    </div>
                                    <div class="field-choice">
                                        <input onclick="isOther(event)" id="loan-purpose-3" name="loan-purpose-radio" value="12" type="radio" />
                                        <label for="loan-purpose-3" class="form-control transition">
                                            <img src={{asset('loan/Content/images/purpose-1-03.svg')}} alt="car" />
                                            Car
                                        </label>
                                    </div>
                                    <div class="field-choice">
                                        <input onclick="isOther(event)" id="loan-purpose-4" name="loan-purpose-radio" value="13" type="radio" />
                                        <label for="loan-purpose-4" class="form-control transition">
                                            <img src={{asset('loan/Content/images/purpose-1-04.svg')}} alt="debt consolidations" />
                                            Debt consolidation
                                        </label>
                                    </div>
                                    <div class="field-choice">
                                        <input onclick="isOther(event)" id="loan-purpose-5" name="loan-purpose-radio" value="14" type="radio" />
                                        <label for="loan-purpose-5" class="form-control transition">
                                            <img src={{asset('loan/Content/images/purpose-1-05.svg')}} alt="short term cash" />
                                            Short term cash
                                        </label>
                                    </div>
                                    <div class="field-choice">
                                        <input onclick="isOther(event)" id="loan-purpose-6" name="loan-purpose-radio" value="15" type="radio" />
                                        <label for="loan-purpose-6" class="form-control transition">
                                            <img src={{asset('loan/Content/images/purpose-1-06.svg')}} alt="something else" />
                                            Something else
                                        </label>
                                    </div>

                                </div>
                                <div class="helpnote"><strong>HELP NOTE:</strong> Please choose an option that closely matches the reason you need the funds </div>
                                <div class="messages"></div>
                            </div>
                            <div id="somethingelse-field" class="hide_element">
                                <div class="form-group">
                                    <label>Could you tell us why you want to use the funds for?</label>
                                    <select id="loan-proceed-use-select" aria-label="loan-proceed-use-select" class="form-control">
                                        <option disabled="" selected="" value="">Select</option>
                                        <option value="2">Debt Relief</option>
                                        <option value="3">Credit Card Refinance</option>
                                        <option value="4">Emergency Situation</option>
                                        <option value="5">Auto Repair</option>
                                        <option value="6">Auto Purchase</option>
                                        <option value="7">Moving</option>
                                        <option value="8">Medical</option>
                                        <option value="9">Business</option>
                                        <option value="10">Vacation</option>
                                        <option value="10">Taxes</option>
                                        <option value="10">Rent or Mortgage</option>
                                        <option value="10">Special Occasion</option>
                                        <option value="10">Major Purchase</option>
                                        <option value="10">Student-Related / Education</option>
                                        <option value="10">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div id="total-card-debt-select-container" class="loan-purpose hide_element">
                                <div class="form-group">
                                    <label for="total-card-debt-select" class="h6">How much unsecured debt do you currently have?</label>
                                    <select id="total-card-debt-select" aria-label="total-card-debt-select" class="form-control">
                                        <option value="">Select</option>
                                        <option disabled="" selected="" value="">Select</option>
                                        <option value="0">None</option>
                                        <option value="5000">under $5,000</option>
                                        <option value="6000">$5,000 - $6,000</option>
                                        <option value="7500">$6,000 - $7,500</option>
                                        <option value="10000">$7,500 - $10,000</option>
                                        <option value="15000">$10,000 - $15,000</option>
                                        <option value="20000">$15,000 - $20,000</option>
                                        <option value="25000">$20,000 - $25,000</option>
                                        <option value="30000">$25,000 - $30,000</option>
                                        <option value="35000">$30,000 - $35,000</option>
                                        <option value="40000">$35,000 - $40,000</option>
                                        <option value="45000">$40,000 - $45,000</option>
                                        <option value="50000">$45,000 - $50,000</option>
                                        <option value="50001">over $50,000</option>
                                    </select>
                                    <div class="helpnote">
                                        <p style="padding: 5px">
                                            Select the range that most closely matches your total unsecured debt. This would include credit cards, revolving credit accounts, and unsecured loans.
                                        </p>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="section-footer">
                    <a href="{{ route('apply.loan.checking_account') }}"><button type="button"  class="btn btn-primary">Next Step</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
