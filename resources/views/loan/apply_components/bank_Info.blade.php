{{--@extends('loan.apply_for_loan')--}}

{{--7--}}
{{--@section('content')--}}
{{--    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @method('POST')--}}
{{--        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.bank_info') }}">--}}
{{--        <div class="section section-form section-banking active" id="form_banking">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="">--}}

{{--                        <div class="title">--}}

{{--                            <h5>Bank Validation</h5>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Where do you want funds deposited if approved?</label>--}}
{{--                            <input onkeyup="toUpperCase(event)" id="bankname" type="text" name="Bank_name"--}}
{{--                                   class="form-control"/>--}}
{{--                            <div class="helpnote">--}}
{{--                                <p style="padding: 5px">--}}
{{--                                    Verify bank information for precise loan processing. We aim to pre-fill the routing--}}
{{--                                    number using your bank name. Please review and correct the pre-populated routing--}}
{{--                                    number--}}
{{--                                    if needed. Incorrect details may result in loan declines.--}}
{{--                                </p>--}}
{{--                                <p style="padding: 5px">--}}
{{--                                    <strong>Start typing your banks name and we'll try to fill in some details</strong>--}}
{{--                                    to--}}
{{--                                    help speed things along.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="messages"></div>--}}
{{--                        </div>--}}
{{--                        <div id="routing_div" class="form-group hide_element">--}}
{{--                            <label>What is your bank routing number <small>(Please verify your routing--}}
{{--                                    number)</small></label>--}}
{{--                            <input id="routingnumber" class="form-control" type="tel" name="Bank_routing_number"--}}
{{--                                   autocomplete="off">--}}
{{--                            <div class="helpnote">--}}
{{--                                <p style="padding: 5px">--}}
{{--                                    <strong>Important</strong>: Double-check the accuracy of your routing number to--}}
{{--                                    ensure--}}
{{--                                    it is correct. If necessary, change it--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="messages"></div>--}}
{{--                            <img src="{{asset('loan/Content/images/checkexample.jpg')}}" style="width: 98%;" alt="example--}}
{{--                            of--}}
{{--                            check" />--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>What is your account number</label>--}}
{{--                            <input id="accountnumber" type="tel" name="Bank_account_number" class="form-control"--}}
{{--                                   autocomplete="off"/>--}}
{{--                            <div class="helpnote">100% secure for validation purposes only. Accurate bank routing and--}}
{{--                                account numbers are essential for legal money laundering checks and cannot be used for--}}
{{--                                payments.--}}
{{--                            </div>--}}
{{--                            <div class="messages"></div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>How many years have you had this bank account?</label>--}}
{{--                            <div class="form-choice mobile-wrap time radio-class">--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input onclick="showBankMonths(event)" id="banknoyears" type="radio"--}}
{{--                                           name="radio_bankYears" value="0">--}}
{{--                                    <label class="form-control transition" for="banknoyears">0</label>--}}
{{--                                </div>--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input onclick="hideBankMonths(event)" id="bankoneyear" type="radio"--}}
{{--                                           name="radio_bankYears" value="1">--}}
{{--                                    <label class="form-control transition" for="bankoneyear">1</label>--}}
{{--                                </div>--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input onclick="hideBankMonths(event)" id="banktwoyears" type="radio"--}}
{{--                                           name="radio_bankYears" value="2">--}}
{{--                                    <label class="form-control transition" for="banktwoyears">2</label>--}}
{{--                                </div>--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input onclick="hideBankMonths(event)" id="bankthreeyears" type="radio"--}}
{{--                                           name="radio_bankYears" value="3">--}}
{{--                                    <label class="form-control transition" for="bankthreeyears">3</label>--}}
{{--                                </div>--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input onclick="hideBankMonths(event)" id="bankfouryears" type="radio"--}}
{{--                                           name="radio_bankYears" value="4">--}}
{{--                                    <label class="form-control transition" for="bankfouryears">4</label>--}}
{{--                                </div>--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input onclick="hideBankMonths(event)" id="bankfiveyears" type="radio"--}}
{{--                                           name="radio_bankYears" value="5">--}}
{{--                                    <label class="form-control transition" for="bankfiveyears">5</label>--}}
{{--                                </div>--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input onclick="hideBankMonths(event)" id="banksixyears" type="radio"--}}
{{--                                           name="radio_bankYears" value="6">--}}
{{--                                    <label class="form-control transition" for="banksixyears">6</label>--}}
{{--                                </div>--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input onclick="hideBankMonths(event)" id="banksevenplusyears" type="radio"--}}
{{--                                           name="radio_bankYears" value="7">--}}
{{--                                    <label class="form-control transition" for="banksevenplusyears">7+</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="messages"></div>--}}
{{--                        </div>--}}
{{--                        <div id="bank-months" class="form-group hide_element">--}}
{{--                            <label>Months At This Bank: </label>--}}
{{--                            <div class="form-choice radio-class">--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input id="bankthreemonths" type="radio" name="radio_bankMonths" value="3">--}}
{{--                                    <label class="form-control transition" for="bankthreemonths">3</label>--}}
{{--                                </div>--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input id="banksixmonths" type="radio" name="radio_bankMonths" value="6">--}}
{{--                                    <label class="form-control transition" for="banksixmonths">6</label>--}}
{{--                                </div>--}}
{{--                                <div class="field-choice">--}}
{{--                                    <input id="banknineplusmonths" type="radio" name="radio_bankMonths" value="9">--}}
{{--                                    <label class="form-control transition" for="banknineplusmonths">9+</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="messages"></div>--}}
{{--                        </div>--}}
{{--                        <div class="form-terms modal" id="special-offer-cta" style="padding-top: 0">--}}
{{--                            <div class="form-group offer" onclick="showCreditModal()" style="margin-bottom: 5px">--}}
{{--                                <div class="special-offer-logo" style="margin-bottom: 1px;">--}}
{{--                                    <img src="{{ asset('loan/Content/images/vfp3.png') }}" alt="Verify you Financial Profile"--}}
{{--                                         style="width: 250px">--}}
{{--                                </div>--}}
{{--                                <div class="form-choice offer"--}}
{{--                                     style="background-color: #f5f3f3; padding: 10px 2px 10px 10px; ">--}}
{{--                                    <div class="field-choice offer">--}}
{{--                                        <input id="RequestSpecialOffer" name="RequestSpecialOffer" type="checkbox">--}}
{{--                                        <label for="RequestSpecialOffer" class="form-control transition offer_checkbox"--}}
{{--                                               style="border-color: darkgray;">--}}
{{--                                            <i class="far fa-check"></i>--}}
{{--                                        </label>--}}
{{--                                        <label class="control-label credit-label" for="RequestSpecialOffer"--}}
{{--                                               style="cursor: pointer; margin-left: 10px; margin-right: 10px; display: inline-block; font-size: 13px">--}}
{{--                                            Tick here and get your Risk <strong>FREE*</strong> access to your Complete--}}
{{--                                            Financial Profile, PFM Credit Score, Net Worth and other Crucial Factors to--}}
{{--                                            loan--}}
{{--                                            process--}}
{{--                                        </label>--}}
{{--                                        <div style="font-size: 10px; margin-top: 15px">** above product is not a--}}
{{--                                            condition--}}
{{--                                            to applying for a loan. <a href="https://www.pfmverify1.com/terms"--}}
{{--                                                                       rel="nofollow" target="_blank"--}}
{{--                                                                       class="offer-link">Terms--}}
{{--                                                and Conditions</a> apply--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="section-footer">--}}
{{--                            <button type="button" onclick="nextPrev(-1)" class="btn">Previous Step</button>--}}
{{--                            <button type="submit" class="btn btn-primary">Next Step</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@endsection--}}

@extends('loan.apply_for_loan')

@section('content')
    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.bank_info') }}">
        <div class="section section-form section-banking active" id="form_banking">
            <div class="container">
                <div class="row">
                    <div class="">
                        <div class="title">
                            <h5>Bank Validation</h5>
                        </div>
                        <div class="form-group">
                            <label>Where do you want funds deposited if approved?</label>
                            <input onkeyup="toUpperCase(event)" id="bankname" type="text" name="Bank_name" class="form-control"/>
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
                            <input id="routingnumber" class="form-control" type="tel" name="Bank_routing_number" autocomplete="off">
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
                            <input id="accountnumber" type="tel" name="Bank_account_number" class="form-control" autocomplete="off"/>
                            <div class="helpnote">100% secure for validation purposes only. Accurate bank routing and account numbers are essential for legal money laundering checks and cannot be used for payments.
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>How many years have you had this bank account?</label>
                            <div class="form-choice mobile-wrap time radio-class">
                                <div class="field-choice">
                                    <input onclick="showBankMonths(event)" id="banknoyears" type="radio" name="radio_bankYears" value="0">
                                    <label class="form-control transition" for="banknoyears">0</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="bankoneyear" type="radio" name="radio_bankYears" value="1">
                                    <label class="form-control transition" for="bankoneyear">1</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="banktwoyears" type="radio" name="radio_bankYears" value="2">
                                    <label class="form-control transition" for="banktwoyears">2</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="bankthreeyears" type="radio" name="radio_bankYears" value="3">
                                    <label class="form-control transition" for="bankthreeyears">3</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="bankfouryears" type="radio" name="radio_bankYears" value="4">
                                    <label class="form-control transition" for="bankfouryears">4</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="bankfiveyears" type="radio" name="radio_bankYears" value="5">
                                    <label class="form-control transition" for="bankfiveyears">5</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="banksixyears" type="radio" name="radio_bankYears" value="6">
                                    <label class="form-control transition" for="banksixyears">6</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideBankMonths(event)" id="banksevenplusyears" type="radio" name="radio_bankYears" value="7">
                                    <label class="form-control transition" for="banksevenplusyears">7+</label>
                                </div>
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div id="bank-months" class="form-group hide_element">
                            <label>Months At This Bank: </label>
                            <div class="form-choice radio-class">
                                <div class="field-choice">
                                    <input id="bankthreemonths" type="radio" name="radio_bankMonths" value="3">
                                    <label class="form-control transition" for="bankthreemonths">3</label>
                                </div>
                                <div class="field-choice">
                                    <input id="banksixmonths" type="radio" name="radio_bankMonths" value="6">
                                    <label class="form-control transition" for="banksixmonths">6</label>
                                </div>
                                <div class="field-choice">
                                    <input id="banknineplusmonths" type="radio" name="radio_bankMonths" value="9">
                                    <label class="form-control transition" for="banknineplusmonths">9+</label>
                                </div>
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div class="form-terms modal" id="special-offer-cta" style="padding-top: 0">
                            <div class="form-group offer" onclick="showCreditModal()" style="margin-bottom: 5px" data-bs-toggle="modal" data-bs-target="#video-about-us">

                                <div class="special-offer-logo" style="margin-bottom: 1px;">
                                    <img src="{{ asset('loan/Content/images/vfp3.png') }}" alt="Verify you Financial Profile" style="width: 250px">
                                </div>
                                <div class="form-choice offer" style="background-color: #f5f3f3; padding: 10px 2px 10px 10px; ">
                                    <div class="field-choice offer">
                                        <input id="RequestSpecialOffer" name="RequestSpecialOffer" type="checkbox">
                                        <label for="RequestSpecialOffer" class="form-control transition offer_checkbox" style="border-color: darkgray;">
                                            <i class="far fa-check"></i>
                                        </label>
                                        <label class="control-label credit-label" for="RequestSpecialOffer" style="cursor: pointer; margin-left: 10px; margin-right: 10px; display: inline-block; font-size: 13px">
                                            Tick here and get your Risk <strong>FREE*</strong> access to your Complete Financial Profile, PFM Credit Score, Net Worth and other Crucial Factors to loan process
                                        </label>
                                        <div style="font-size: 10px; margin-top: 15px">** above product is not a condition to applying for a loan. <a href="https://www.pfmverify1.com/terms" rel="nofollow" target="_blank" class="offer-link">Terms and Conditions</a> apply
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-footer">
                            <button type="button" onclick="nextPrev(-1)" class="btn">Previous Step</button>
                            <button type="submit" class="btn btn-primary">Next Step</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Modal container -->
{{--    <div id="modal-container"></div>--}}


@endsection

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        function showCreditModal() {--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('credit.modal.show') }}",--}}
{{--                type: 'GET',--}}
{{--                success: function(response) {--}}
{{--                    $('#modal-container').html(response.html);--}}
{{--                    $('#credit-modal').removeClass('hide_element');--}}
{{--                },--}}
{{--                error: function(xhr, status, error) {--}}
{{--                    alert('Failed to load the modal. Error: ' + error);--}}
{{--                },--}}
{{--                finally: function () {--}}
{{--                    console.log('govnp')--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        function closeSpecialOffer(agree) {--}}
{{--            if (agree) {--}}
{{--                $('#RequestSpecialOffer').prop('checked', true);--}}
{{--            }--}}
{{--            $('#credit-modal').addClass('hide_element');--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}
