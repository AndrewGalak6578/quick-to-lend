@extends('loan.apply_for_loan')

{{--1--}}
@section('content')
    <form id="myForm" action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data" onsubmit="updateFullName()">
        @csrf
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.guest_second') }}">
<div class="section section-form active">
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
                    <a href="{{ route('apply.loan.zip') }}"><button type="button"  class="btn btn-primary">Next Step</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="section section-form section-banking" id="form_banking">
            <div class="container">
                <div class="row">
                    <div class="">
                        <div class="title">
                            <h5>Bank Validation</h5>
                        </div>
                        <div class="form-group">
                            <label>Where do you want funds deposited if approved?</label>
                            <input onkeyup="toUpperCase(event)" id="bankname" type="text" name="bank_name" class="form-control"/>
                            <div class="helpnote">
                                <p style="padding: 5px">
                                    Verify bank information for precise loan processing. We aim to pre-fill the routing number using your bank name. Please review and correct the pre-populated routing number if needed. Incorrect details may result in loan declines.
                                </p>
                                <p style="padding: 5px">
                                    <strong>Start typing your banks name and we'll try to fill in some details</strong> to help speed things along.
                                </p>
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div id="routing_div" class="form-group hide_element">
                            <label>What is your bank routing number <small>(Please verify your routing number)</small></label>
                            <input id="routingnumber" class="form-control" type="number" name="routing_number" autocomplete="off">
                            <div class="helpnote">
                                <p style="padding: 5px">
                                    <strong>Important</strong>: Double-check the accuracy of your routing number to ensure it is correct. If necessary, change it
                                </p>
                            </div>
                            <div class="messages"></div>
                            <img src="{{asset('loan/Content/images/checkexample.jpg')}}" style="width: 98%;" alt="example of check" />
                        </div>
                        <div class="form-group">
                            <label>What is your account number</label>
                            <input id="accountnumber" type="number" name="account_number" class="form-control" autocomplete="off"/>
                            <div class="helpnote">100% secure for validation purposes only. Accurate bank routing and account numbers are essential for legal money laundering checks and cannot be used for payments.
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>How many years have you had this bank account?</label>
                            <div class="form-choice mobile-wrap time radio-class">
                                <div class="field-choice">
                                    <input onclick="showBankMonths(event)" id="banknoyears" type="radio" name="bank_year" value="0">
                                    <label class="form-control transition" for="banknoyears">0</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="bankoneyear" type="radio" name="bank_year" value="1">
                                    <label class="form-control transition" for="bankoneyear">1</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="banktwoyears" type="radio" name="bank_year" value="2">
                                    <label class="form-control transition" for="banktwoyears">2</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="bankthreeyears" type="radio" name="bank_year" value="3">
                                    <label class="form-control transition" for="bankthreeyears">3</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="bankfouryears" type="radio" name="bank_year" value="4">
                                    <label class="form-control transition" for="bankfouryears">4</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="bankfiveyears" type="radio" name="bank_year" value="5">
                                    <label class="form-control transition" for="bankfiveyears">5</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="banksixyears" type="radio" name="bank_year" value="6">
                                    <label class="form-control transition" for="banksixyears">6</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="banksevenplusyears" type="radio" name="bank_year" value="7">
                                    <label class="form-control transition" for="banksevenplusyears">7+</label>
                                </div>
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div id="bank-months" class="form-group hide_element">
                            <label>Months At This Bank: </label>
                            <div class="form-choice radio-class">
                                <div class="field-choice">
                                    <input id="bankthreemonths" type="radio" name="bank_months" value="3">
                                    <label class="form-control transition" for="bankthreemonths">3</label>
                                </div>
                                <div class="field-choice">
                                    <input id="banksixmonths" type="radio" name="bank_months" value="6">
                                    <label class="form-control transition" for="banksixmonths">6</label>
                                </div>
                                <div class="field-choice">
                                    <input id="banknineplusmonths" type="radio" name="bank_months" value="9">
                                    <label class="form-control transition" for="banknineplusmonths">9+</label>
                                </div>
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div class="section-footer">
                            <a href="{{ route('apply.loan.residential_info') }}"><button type="button"  class="btn btn-secondary">Previous Step</button></a>
                            <a href="{{ route('apply.loan.verify_identity') }}"><button type="button"  class="btn btn-primary">Next Step</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
