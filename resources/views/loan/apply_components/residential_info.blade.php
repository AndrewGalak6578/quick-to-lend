@extends('loan.apply_for_loan')

{{--6--}}
@section('content')


    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.bank_info') }}">
        <div class="section  section-address-time" id="form_address_time">
            <div class="container">
                <div class="row">
                    <div class="">
                        <div class="title">

                        </div>
                        <div class="form-group">
                            <label>Years at address</label>
                            <div class="form-choice mobile-wrap time radio-class">
                                <div class="field-choice">
                                    <input onclick="showAddressMonths(event)" id="addressnoyears" type="radio"
                                           name="address_years" value="0">
                                    <label class="form-control transition" for="addressnoyears">0</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideAddressMonths(event)" id="addressoneyear" type="radio"
                                           name="address_years" value="1">
                                    <label class="form-control transition" for="addressoneyear">1</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideAddressMonths(event)" id="addresstwoyears" type="radio"
                                           name="address_years" value="2">
                                    <label class="form-control transition" for="addresstwoyears">2</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideAddressMonths(event)" id="addressthreeyears" type="radio"
                                           name="address_years" value="3">
                                    <label class="form-control transition" for="addressthreeyears">3</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideAddressMonths(event)" id="addressfouryears" type="radio"
                                           name="address_years" value="4">
                                    <label class="form-control transition" for="addressfouryears">4</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideAddressMonths(event)" id="addressfiveyears" type="radio"
                                           name="address_years" value="5">
                                    <label class="form-control transition" for="addressfiveyears">5</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideAddressMonths(event)" id="addresssixyears" type="radio"
                                           name="address_years" value="6">
                                    <label class="form-control transition" for="addresssixyears">6</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hideAddressMonths(event)" id="addresssevenplusyears" type="radio"
                                           name="address_years" value="7">
                                    <label class="form-control transition" for="addresssevenplusyears">7+</label>
                                </div>
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div id="address-months" class="form-group hide_element">
                            <label>Months At This Address</label>
                            <div class="form-choice radio-class">
                                <div class="field-choice">
                                    <input id="addressthreemonths" type="radio" name="radio_addressMonths" value="3">
                                    <label class="form-control transition" for="addressthreemonths">3</label>
                                </div>
                                <div class="field-choice">
                                    <input id="addresssixmonths" type="radio" name="radio_addressMonths" value="6">
                                    <label class="form-control transition" for="addresssixmonths">6</label>
                                </div>
                                <div class="field-choice">
                                    <input id="addressnineplusmonths" type="radio" name="radio_addressMonths" value="9">
                                    <label class="form-control transition" for="addressnineplusmonths">9+</label>

                                </div>
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>Residential status</label>
                            <div class="form-choice mobile-wrap radio-class">
                                <div class="field-choice">
                                    <input id="field-choice-home-owner" name="residential_status" value="Home Owner" type="radio"/>
                                    <label for="field-choice-home-owner" class="form-control transition">Home Owner</label>
                                </div>
                                <div class="field-choice">
                                    <input id="field-choice-renter" name="residential_status" value="Renter" type="radio"/>
                                    <label for="field-choice-renter" class="form-control transition">Renter</label>
                                </div>
                            </div>
                            <div class="helpnote">HELP NOTE: We need to ensure you have a permanent home address</div>
                        </div>
                        <div class="section-footer">
                            <a href="{{ route('apply.loan.guest_second') }}"><button type="button"  class="btn btn-secondary">Previous Step</button></a>
                            <a ><button type="submit"  class="btn btn-primary">Next Step</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

