@extends('loan.apply_for_loan')

{{--4--}}
@section('content')
    <style>
        .error-message {
            color: #9c4b45;
            margin-top: 5px;
        }
        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 16px;
        }

        .custom-checkbox input[type="checkbox"] {
            display: none;
        }

        .custom-checkbox .checkmark {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background: linear-gradient(90deg, rgba(65, 176, 245, 1) 0%, rgba(94, 84, 232, 1) 100%);
            border-radius: 10px;
            margin-right: 10px;
            position: relative;
        }

        .custom-checkbox input[type="checkbox"]:checked + .checkmark::before {
            content: '✔';
            color: white;
            font-size: 24px;
        }

        .custom-checkbox input[type="checkbox"]:checked + .checkmark {
            background-color: #8A97FF;
        }
    </style>
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
                            <label>Full name</label>
                            <input id="fullname" type="text" name="name" class="form-control" placeholder="Magic Jhonson" autocomplete="off"/>
                            <div id="fullname-messages" class="messages"></div>
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
                            <div id="email-messages" class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>Cell phone number</label>
                            <input onkeyup="checkMobileNumber(event)" id="mobilephone" type="tel" name="cell_phone" class="form-control"/>
                            <div id="cellphone-fill" class="hide_element areacode-fill">
                                <p>Suggested area codes:</p>
                            </div>
                            <div id="mobilephone-messages" class="messages"></div>
                        </div>

                        <div class="form-group" id="workphone-field">
                            <label>Work phone number</label>
                            <input onkeyup="checkWorkNumber(event)" id="workphone" type="tel" name="work_phone" class="form-control"/>
                            <div id="workphone-fill" class="hide_element areacode-fill">
                                <p>Suggested area codes:</p>
                            </div>
                            <div id="workphone-messages" class="messages"></div>
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
                            <div id="ssn-messages" class="messages"></div>
                        </div>
                        <div class="form-group">
                            <label>Driver's license number</label>
                            <input onkeyup="toUpperCase(event)" id="dlnumber" type="text" name="driving_number" class="form-control"/>
                            <div id="dlnumber-messages" class="messages"></div>
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
                            <label class="custom-checkbox">
                                <input type="checkbox" id="active-duty-checkbox">
                                <span class="checkmark"></span>
                                I am currently on Active Duty
                            </label>
                        </div>
                        <div class="section-footer">
                            <a href="{{ route('apply.loan.guest_info') }}"><button type="button"  class="btn btn-secondary">Previous Step</button></a>
                            <a ><button type="submit"  class="btn btn-primary">Next Step</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function updateFullName() {
                let firstName = document.getElementById('firstname').value;
                let lastName = document.getElementById('lastname').value;
                let fullName = firstName + ' ' + lastName;
                document.getElementById('fullname').value = fullName.trim();
                return true;
            }

            function showErrorMessage(elementId, message) {
                const messagesDiv = document.getElementById(elementId);
                messagesDiv.innerHTML = ''; // Clear previous messages

                if (message) {
                    const errorMessage = document.createElement('div');
                    errorMessage.classList.add('error-message');
                    errorMessage.textContent = message;
                    messagesDiv.appendChild(errorMessage);
                }
            }

            document.getElementById('fullname').addEventListener('input', function () {
                const fullName = this.value;
                const minLength = 2;
                let message = '';

                if (fullName && fullName.length < minLength) {
                    message = 'First name is too short (minimum is 2 characters).';
                }

                showErrorMessage('fullname-messages', message);
            });

            document.getElementById('email').addEventListener('input', function () {
                const email = this.value;
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                let message = '';

                if (email && !emailPattern.test(email)) {
                    message = 'Email is not a valid email.';
                }

                showErrorMessage('email-messages', message);
            });

            document.getElementById('mobilephone').addEventListener('input', function () {
                const mobilePhone = this.value;
                const phonePattern = /^\+?[0-9]{10,20}$/;
                let message = '';

                if (mobilePhone && !phonePattern.test(mobilePhone)) {
                    message = 'Mobile phone does not appear to be valid.';
                }

                showErrorMessage('mobilephone-messages', message);
            });

            document.getElementById('workphone').addEventListener('input', function () {
                const workPhone = this.value;
                const phonePattern = /^\+?[0-9]{10,20}$/;
                let message = '';

                if (workPhone && !phonePattern.test(workPhone)) {
                    message = 'Work phone does not appear to be valid.';
                }

                showErrorMessage('workphone-messages', message);
            });

            document.getElementById('ssn').addEventListener('input', function () {
                const ssn = this.value;
                const ssnPattern = /^\d{3}-\d{2}-\d{4}$/;
                let message = '';

                if (ssn && !ssnPattern.test(ssn)) {
                    message = 'Social security number does not appear to be valid.';
                }

                showErrorMessage('ssn-messages', message);
            });

            document.getElementById('dlnumber').addEventListener('input', function () {
                const dlNumber = this.value;
                const dlPattern = /^[A-Za-z][0-9]{7}$/;
                let message = '';

                if (dlNumber && !dlPattern.test(dlNumber)) {
                    message = 'License number does not appear to be valid.';
                }

                showErrorMessage('dlnumber-messages', message);
            });
        });


    </script>
@endsection
