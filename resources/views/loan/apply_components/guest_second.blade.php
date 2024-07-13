@extends('loan.apply_for_loan')

{{--5--}}
@section('content')
    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.residential_info') }}">
        <div class="section  section-address" id="form_address">
            <div class="container">
                <div class="row">
                    <div class="">
                        <div class="title">
                        </div>
                        <div class="form-group">
                            <label>Home Zip code?</label>
                            <input id="zipcode" type="tel" name="zip_code" class="form-control" autocomplete="off"/>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>Street address</label>
                            <input onkeyup="toUpperCase(event)" id="housestreet" type="text" name="address"
                                   class="form-control"/>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input id="city" type="text" name="city" class="form-control"/>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>County</label>
                            <input id="county" type="text" name="country" class="form-control"/>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <select onchange="showCCPA()" name="state" id="state-select" class="form-control">
                                <option disabled="" selected="" value="">Select</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>

                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>

                        <div class="section-footer">
                            <button type="button" onclick="nextPrev(-1)" class="btn">Previous Step</button>
                            <button type="submit"  class="btn btn-primary">Next Step</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
