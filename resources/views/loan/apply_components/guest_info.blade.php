@extends('loan.apply_for_loan')

{{--4--}}
@section('content')
    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data" onsubmit="return updateFullName();">
        @csrf
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.guest_second') }}">
        <div class="section section-form active section-personal-details" id="form_details">
            <div class="container">
                <div class="row">
                    <div class="">
                        <div class="title">
                        </div>

                        <div class="form-group">
                            <label>Full Name</label>
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label class="mobile-label">First name</label>
                                    <input onkeyup="updateFullName()" id="firstname" type="text" name="First_name" class="form-control" autocomplete="given-name"/>
                                    <label class="desktop-label">First name</label>
                                    <div class="messages"></div>
                                </div>
                                <div class="form-group">
                                    <label class="mobile-label">Last name</label>
                                    <input onkeyup="updateFullName()" id="lastname" type="text" name="Last_name" class="form-control" autocomplete="family-name"/>
                                    <label class="desktop-label">Last name</label>
                                    <div class="messages"></div>
                                </div>
                            </div>
                            <input type="hidden" id="fullname" name="name" />
                        </div>
                        <div class="form-group">
                            <label>What is your date of birth?</label>
                            <input id="dob" type="date" name="date_of_birth" class="form-control" placeholder="MM/DD/YYYY" autocomplete="off"/>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group" id="email-div">
                            <label>Email: </label>
                            <input class="form-control google-email" onkeyup="showEmailDomains()" type="email" id="email" name="email">
                            <div id="email-button-block" class="email-buttons hide_element">
                                <button onclick="addGmail()" class="email-domains btn btn-default" type="button">@gmail</button>
                                <button onclick="addYahoo()" class="email-domains btn btn-default" type="button">@yahoo</button>
                                <button onclick="addHotmail()" class="email-domains btn btn-default" type="button">@hotmail</button>
                                <button onclick="addAol()" class="email-domains btn btn-default" type="button">@aol</button>
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>Cell phone number</label>
                            <input onkeyup="checkMobileNumber(event)" id="mobilephone" type="tel" name="cell_phone" class="form-control"/>
                            <div id="cellphone-fill" class="hide_element areacode-fill">
                                <p>Suggested area codes:</p>
                            </div>
                            <div class="messages"></div>
                        </div>

                        <div class="form-group" id="workphone-field">
                            <label>Work phone number</label>
                            <input onkeyup="checkWorkNumber(event)" id="workphone" type="tel" name="work_phone" class="form-control"/>
                            <div id="workphone-fill" class="hide_element areacode-fill">
                                <p>Suggested area codes:</p>
                            </div>
                            <div class="messages"></div>
                        </div>
                        <div id="same-number-warning" class="helpnote hide_element">
                            <p>
                                <span class="warning-message">You have matching work, home, or mobile numbers,</span><br/>
                                This means lenders may treat you as self-employed. If you are self-employed great! If you're not, then you may decrease your chance for acceptance. We encourage you to provide a real work number which is separate from your mobile to gain the highest possible chance for acceptance
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Social security number</label>
                            <input id="ssn" type="tel" name="social_number" class="form-control" autocomplete="off"/>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>Driver's license number</label>
                            <input onkeyup="toUpperCase(event)" id="dlnumber" type="text" name="driving_number" class="form-control"/>
                            <div class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>Issuing state</label>
                            <select name="state" onchange="showCCPA()" id="dl-state-select" class="form-control">
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
                        <div class="form-group">
                            <label>Military service</label>
                            <div class="checkbox">
                                <input id="military" name="military_service" type="checkbox">
                                <label for="military">I am currently on Active Duty</label>
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
@endsection
@push('scripts')
    <script>
        function updateFullName() {
            let firstName = document.getElementById('firstname').value;
            let lastName = document.getElementById('lastname').value;
            let fullName = firstName + ' ' + lastName;
            document.getElementById('fullname').value = fullName.trim();
            return true;
        }
    </script>
@endpush
