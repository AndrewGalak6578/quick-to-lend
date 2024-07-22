@extends('loan.apply_for_loan')

@section('content')
    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.cc_info') }}">

        <div class="section section-form section-banking active" id="form_banking">
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
                                    <strong>Start typing your bank's name and we'll try to fill in some details</strong> to help speed things along.
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
                                    <input id="banknoyears" type="radio" name="bank_year" value="0">
                                    <label class="form-control transition" for="banknoyears">0</label>
                                </div>
                                <div class="field-choice">
                                    <input id="bankoneyear" type="radio" name="bank_year" value="1">
                                    <label class="form-control transition" for="bankoneyear">1</label>
                                </div>
                                <div class="field-choice">
                                    <input id="banktwoyears" type="radio" name="bank_year" value="2">
                                    <label class="form-control transition" for="banktwoyears">2</label>
                                </div>
                                <div class="field-choice">
                                    <input id="bankthreeyears" type="radio" name="bank_year" value="3">
                                    <label class="form-control transition" for="bankthreeyears">3</label>
                                </div>
                                <div class="field-choice">
                                    <input id="bankfouryears" type="radio" name="bank_year" value="4">
                                    <label class="form-control transition" for="bankfouryears">4</label>
                                </div>
                                <div class="field-choice">
                                    <input id="bankfiveyears" type="radio" name="bank_year" value="5">
                                    <label class="form-control transition" for="bankfiveyears">5</label>
                                </div>
                                <div class="field-choice">
                                    <input id="banksixyears" type="radio" name="bank_year" value="6">
                                    <label class="form-control transition" for="banksixyears">6</label>
                                </div>
                                <div class="field-choice">
                                    <input id="banksevenplusyears" type="radio" name="bank_year" value="7">
                                    <label class="form-control transition" for="banksevenplusyears">7+</label>
                                </div>
                            </div>
                            <div class="messages"></div>
                        </div>

                        <div class="section-footer">
                            <a href="{{ route('apply.loan.residential_info') }}"><button type="button" class="btn btn-secondary">Previous Step</button></a>
                            <button type="submit" class="btn btn-primary">Next Step</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $(function() {
            var availableBanks = [
                "Bank of America",
                "Chase Bank",
                "Wells Fargo",
                "Citibank",
                "U.S. Bank",
                "PNC Bank",
                "Capital One",
                "TD Bank",
                "BB&T",
                "SunTrust Bank",
                "HSBC Bank USA",
                "Fifth Third Bank",
                "Ally Bank",
                "KeyBank",
                "Huntington National Bank",
                "Santander Bank",
                "Regions Bank",
                "M&T Bank",
                "BMO Harris Bank",
                "Charles Schwab Bank",
                "Discover Bank",
                "American Express Bank",
                "Silicon Valley Bank",
                "First Republic Bank",
                "City National Bank"
            ];

            $("#bankname").autocomplete({
                source: availableBanks,
                minLength: 2,
                select: function(event, ui) {
                    console.log("Selected: " + ui.item.value);
                }
            });
        });

        function toUpperCase(event) {
            var input = event.target;
            input.value = input.value.toUpperCase();
        }
    </script>
@endpush
