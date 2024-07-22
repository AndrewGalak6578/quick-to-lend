@extends('loan.apply_for_loan')
{{--3--}}
@section('content')
    <style>
        .error-message {
            color: #9c4b45;
            margin-top: 5px;
        }
    </style>
    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.guest_info') }}">
        <div class="section section-form section-income active" id="form_income" style="display: block;">
            <div class="container">
                <div class="row">
                    <div class="">

                        <div class="form-group">
                            <label>What's your current employment status?</label>
                            <div class="form-choice mobile-wrap radio-class" id="employmentStatus">
                                <div class="field-choice">
                                    <input id="field-choice-Full Time" name="radio_source"
                                           onclick="showJobFields(event)" value="2" type="radio"/>
                                    <label for="field-choice-Full Time" class="form-control transition">Full
                                        Time</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-Part Time" name="radio_source"
                                           onclick="showJobFields(event)" value="3" type="radio"/>
                                    <label for="field-choice-Part Time" class="form-control transition">Part
                                        Time</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-Self Employed" name="radio_source"
                                           onclick="showJobFields(event)" value="1" type="radio"/>
                                    <label for="field-choice-Self Employed" class="form-control transition">Self
                                        Employed</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-Pension" name="radio_source" onclick="hideJobFields(event)"
                                           value="5" type="radio"/>
                                    <label for="field-choice-Pension" class="form-control transition">Pension</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-Disability Benefits" name="radio_source"
                                           onclick="hideJobFields(event)" value="5" type="radio"/>
                                    <label for="field-choice-Disability Benefits" class="form-control transition">Disability
                                        Benefits</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-Unemployed Benefits" name="radio_source"
                                           onclick="hideJobFields(event)" value="6" type="radio"/>
                                    <label for="field-choice-Unemployed Benefits" class="form-control transition">Unemployed
                                        Benefits</label>
                                </div>

                                <div class="messages"></div>
                            </div>


                        </div>
                        <div class="helpnote">
                            <strong>HELP NOTE:</strong> Do not be concerned, we do not contact your employer but we do
                            need to ensure you have regular income.
                            <div id="income-message" class="hide_element">
                                <p style="text-align: left;">
                                    <strong>NOTE:</strong> You have chosen a benefit as your income source. If you have
                                    a part-time, full-time, or temp job, regardless of pay amount, choosing one of these
                                    may improve your ability to be matched to a lender.
                                </p>
                            </div>
                        </div>


                        <div id="job_fields" class="hide_element">
                            <div class="form-group">
                                <label>What is your job title?</label>
                                <input onkeyup="toCapitalize(event)" id="jobtitle" type="text" name="job_title"
                                       class="form-control" autocomplete="organization-title"/>
                                <div id="jobtitle-messages" class="messages"></div>
                            </div>
                            <div class="form-group">
                                <label>What is your employer's name?</label>
                                <input onkeyup="toCapitalize(event)" id="employername" type="text" name="employer_name"
                                       class="form-control" autocomplete="organization"/>
                                <div id="employername-messages" class="messages"></div>
                            </div>
                            <div class="helpnote">We do not contact your employer</div>


                            <div class="form-group">
                                <label>How long have you had this employment status?</label>
                                <div class="form-choice mobile-wrap time radio-class">
                                    <div class="field-choice">
                                        <input onclick="showEmployerMonths(event)" id="noyears" type="radio"
                                               name="employment_length" value="1">
                                        <label class="form-control transition" for="noyears">Up to 1 Year</label>
                                    </div>
                                    <div class="field-choice ">
                                        <input onclick="hideEmployerMonths(event)" id="oneyear" type="radio"
                                               name="employment_length" value="2">
                                        <label class="form-control transition" for="oneyear">1 - 2 Years</label>
                                    </div>
                                    <div class="field-choice ">
                                        <input onclick="hideEmployerMonths(event)" id="twoyears" type="radio"
                                               name="employment_length" value="3">
                                        <label class="form-control transition" for="twoyears">2 - 3 Years</label>
                                    </div>
                                    <div class="field-choice ">
                                        <input onclick="hideEmployerMonths(event)" id="threeyears" type="radio"
                                               name="employment_length" value="4">
                                        <label class="form-control transition" for="threeyears">3 - 4 Years</label>
                                    </div>
                                    <div class="field-choice ">
                                        <input onclick="hideEmployerMonths(event)" id="fouryears" type="radio"
                                               name="employment_length" value="5">
                                        <label class="form-control transition" for="fouryears">4 - 5 Years</label>
                                    </div>
                                    <div class="field-choice ">
                                        <input onclick="hideEmployerMonths(event)" id="fiveyears" type="radio"
                                               name="employment_length" value="6">
                                        <label class="form-control transition" for="fiveyears">Over 5 Years</label>
                                    </div>
                                </div>
                                <div class="messages"></div>
                            </div>


                            <div id="employer-months" class="form-group hide_element">
                                <label>Months At This Employer</label>
                                <div class="form-choice radio-class">
                                    <div class="field-choice">
                                        <input id="threemonths" type="radio" name="radio_employerMonths" value="3">
                                        <label class="form-control transition" for="threemonths">3</label>
                                    </div>
                                    <div class="field-choice">
                                        <input id="sixmonths" type="radio" name="radio_employerMonths" value="6">
                                        <label class="form-control transition" for="sixmonths">6</label>
                                    </div>
                                    <div class="field-choice">
                                        <input id="nineplusmonths" type="radio" name="radio_employerMonths" value="9">
                                        <label class="form-control transition" for="nineplusmonths">9+</label>
                                    </div>
                                </div>
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Payment type</label>
                            <div class="form-choice mobile-wrap radio-class">
                                <div class="field-choice">
                                    <input id="field-choice-Direct Deposit" name="radio_payment" value="4"
                                           type="radio"/>
                                    <label for="field-choice-Direct Deposit" class="form-control transition">Direct
                                        Deposit</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-Check" name="radio_payment" value="2" type="radio"/>
                                    <label for="field-choice-Check" class="form-control transition">Check</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>How often are you paid?</label>
                            <div class="form-choice mobile-wrap radio-class">
                                <div class="field-choice">
                                    <input id="field-choice-Weekly" name="radio_frequency" value="1" type="radio"/>
                                    <label for="field-choice-Weekly" class="form-control transition">Weekly</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-Bi-Weekly" name="radio_frequency" value="2" type="radio"/>
                                    <label for="field-choice-Bi-Weekly"
                                           class="form-control transition">Bi-Weekly</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-Fortnightly" name="radio_frequency" value="7" type="radio"/>
                                    <label for="field-choice-Fortnightly" class="form-control transition">Twice
                                        Monthly</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-Monthly" name="radio_frequency" value="14" type="radio"/>
                                    <label for="field-choice-Monthly" class="form-control transition">Monthly</label>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-5">
                            <div class="form-group">
                                <label>
                                    What is your <span id="net_gross_monthly">Net Monthly</span> Pay Amount?
                                </label>
                                <input placeholder="Minimum $800" id="netamount" type="number" class="form-control" name="salary" autocomplete="off">
                                <div id="net_gross_monthly_msg" class="helpnote">
                                    The total after-tax amount of income or pay earned each month from all sources.
                                </div>
                                <div id="netamount-messages" class="messages"></div>
                            </div>
                        </div>

                        <div class="section-footer">
                            <a href="{{ route('apply.loan.zip') }}"><button type="button"  class="btn btn-secondary">Previous Step</button></a>
                            <a ><button type="submit" class="btn btn-primary">Next Step</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.getElementById('netamount').addEventListener('input', function() {
            const amount = this.value;
            const messagesDiv = document.getElementById('netamount-messages');
            const minAmount = 800;
            const maxAmount = 9999;

            messagesDiv.innerHTML = ''; // Clear previous messages

            if (amount && (amount < minAmount || amount > maxAmount)) {
                const errorMessage = document.createElement('div');
                errorMessage.classList.add('error-message');
                errorMessage.textContent = 'Net monthly amount must be between $800 and $9999.';
                messagesDiv.appendChild(errorMessage);
            }
        });

        document.getElementById('jobtitle').addEventListener('input', function() {
            const jobTitle = this.value;
            const messagesDiv = document.getElementById('jobtitle-messages');
            const minLength = 3;

            messagesDiv.innerHTML = ''; // Clear previous messages

            if (jobTitle && jobTitle.length < minLength) {
                const errorMessage = document.createElement('div');
                errorMessage.classList.add('error-message');
                errorMessage.textContent = 'Job title is too short (minimum is 3 characters).';
                messagesDiv.appendChild(errorMessage);
            }
        });

        document.getElementById('employername').addEventListener('input', function() {
            const employerName = this.value;
            const messagesDiv = document.getElementById('employername-messages');
            const minLength = 2;

            messagesDiv.innerHTML = ''; // Clear previous messages

            if (employerName && employerName.length < minLength) {
                const errorMessage = document.createElement('div');
                errorMessage.classList.add('error-message');
                errorMessage.textContent = 'Employer name is too short (minimum is 2 characters).';
                messagesDiv.appendChild(errorMessage);
            }
        });
    </script>
@endsection
