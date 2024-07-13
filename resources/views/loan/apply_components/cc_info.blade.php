@extends('loan.apply_for_loan')
@section('content')
    <div id="credit-modal" class="section section-grey  credit-modal-visible hide_element">
        <div class="special-offer">
            <span class="offer-close-x" onclick="closeSpecialOffer(false)"></span>
            <div class="special-offer-logo" style="margin-bottom: 10px; text-align: center">
                <img src="{{asset('loan/Content/images/vfp3.png')}}" alt="Verify_you_Financial_Profile" style="width: 250px">
                <p class="offer-message" style="color: gray; margin-top: 15px;">
                    Sign up For PFM Verify Today Risk <strong>FREE*</strong>. Enter Card Details Below And Get Your Complete Financial Profile, Net Worth, Scores and More
                </p>
            </div>
            <hr>
            <div style="background-color: #e8eef0; padding: 10px 2px 10px 10px; margin-bottom: 15px">
                <div class="form-group" style="display:inline-block; width: 96%">
                    <label for="offer_cardname">Name on Card</label>
                    <input type="text" id="offer_cardname" name="card_holder" class="form-control">
                    <div class="messages"></div>
                </div>
                <div class="form-group" style="width: 96%">
                    <label for="offer_cardnumber">Card Number</label>
                    <input type="tel" id="offer_cardnumber" name="card_number" class="form-control" autocomplete="off" placeholder="16 digit card number">
                    <div class="messages"></div>
                </div>
                <div class="form-group" style="display:inline-block; width: 40%">
                    <label for="offer_cardcvv">Card CVV</label>
                    <input type="tel" id="offer_cardcvv" name="cvv" class="form-control" autocomplete="off">
                    <div class="messages"></div>
                </div>
                <div class="form-group" style="width: 96%">
                    <label for="offer_expMonth">Expiration Date</label>
                    <div>
                        <div class="form-group" style="display: inline-block">
                            <select id="offer_expMonth" class="form-control" name="expiration_date">
                                <option value="" disabled="disabled" selected="">MM</option>
                                <option value="01">Jan</option>
                                <option value="02">Feb</option>
                                <option value="03">Mar</option>
                                <option value="04">Apr</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Aug</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group" style="display: inline-block">
                            <select id="offer_expYear" class="form-control" name="expiration_date">
                                <option value="" disabled="disabled" selected="">YYYY</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                            </select>
                            <div class="messages"></div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" onclick="closeSpecialOffer(true)" class="btn btn-lg btn-block btn-default offer-button" style="margin-bottom: 20px">I Agree</button>


            <input type="hidden" id="offerTypeId" value="7" />
        </div>
    </div>
@endsection
