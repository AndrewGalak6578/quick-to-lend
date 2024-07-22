@extends('loan.apply_for_loan')

{{--2--}}
@section('content')
    <style>
        .error-message {
            color: #9c4b45;
            margin-top: 5px;
        }
    </style>

    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.job') }}">
        <div class="section  section-checking-account" id="form_checking">
            <div class="container">
                <div class="row">
                    <div class="">
                        <div class="title">

                            <h3>Do you have a checking account?</h3>
                        </div>
                        <div class="form-group">
                            <div class="form-choice radio-class">
                                <div class="field-choice">
                                    <input onclick="hasChecking(event)" id="field-choice-checking-yes"
                                           name="Checking_account" value="Yes" type="radio"/>
                                    <label for="field-choice-checking-yes" class="form-control transition">Yes</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hasChecking(event)" id="field-choice-checking-no"
                                           name="Checking_account" value="No" type="radio"/>
                                    <label for="field-choice-checking-no" class="form-control transition">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="hide_element" id="no-checking">

                            <p class="warning-message">A checking account is required for a loan with most lenders. If
                                you don't have one <a onclick="noBankPost()"
                                                      href="https://secure.rspcdn.com/xprr/red/PID/10141/SID/pingyo"
                                                      target="_blank" rel="nofollow">Click here</a></p>
                        </div>
                        <div id="zipcode-field" class="hide_element">
                            <div class="form-group">
                                <label>What is your Zip code?</label>
                                <input id="zipcode-fill"  type="text" name="zip_code"
                                       class="form-control" autocomplete="postal-code"/>
                                <div class="messages"></div>
                            </div>
                            <div *ngIf="zipCodeLoading" class="ellipsis hide_element">
                                <img class="loading-ellipsis"
                                     src={{asset('loan/Content/images/loading-ellipsis.svg')}} alt="Loading Animation">
                            </div>
                        </div>
                        <div class="section-footer">
                            <a href="{{ route('apply.loan.amount') }}"><button type="button"  class="btn btn-secondary">Previous Step</button></a>
                            <a ><button type="submit" class="btn btn-primary">Next Step</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.getElementById('zipcode-fill').addEventListener('input', function() {
            const zipCode = this.value;
            const messagesDiv = document.querySelector('.messages');
            const zipCodePattern = /^\d{5}(?:[-\s]\d{4})?$/;

            messagesDiv.innerHTML = ''; // Clear previous messages

            if (zipCode && !zipCodePattern.test(zipCode)) {
                const errorMessage = document.createElement('div');
                errorMessage.classList.add('error-message');
                errorMessage.textContent = 'Zip code does not appear to be valid';
                messagesDiv.appendChild(errorMessage);
            }
        });
    </script>
@endsection
