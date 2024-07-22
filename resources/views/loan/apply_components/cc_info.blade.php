@extends('loan.layouts.cc')

@section('content')

    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.verify_identity') }}">
        <input type="hidden" name="current_url" value="{{ route('apply.loan.cc_info') }}">
        <div id="credit-modal" class="section section-form" tabindex="-1" aria-labelledby="creditModalLabel" aria-hidden="true">
            <div class="container my-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Verify Financial Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="{{asset('loan/Content/images/vfp3.png')}}" alt="Verify_you_Financial_Profile" class="img-fluid" style="max-width: 250px;">
                            <p class="text-muted mt-3">
                                Sign up For PFM Verify Today Risk <strong>FREE*</strong>. Enter Card Details Below And Get Your Complete Financial Profile, Net Worth, Scores and More
                            </p>
                        </div>
                        <hr>
                        <div class="bg-light p-3 mb-3">
                            <form id="verifyForm" method="post" action="/your-submit-url">
                                <div class="mb-3">
                                    <label for="offer_cardname" class="form-label">Name on Card</label>
                                    <input type="text" id="offer_cardname" name="card_holder" class="form-control" oninput="this.value = this.value.toUpperCase(); checkNameFormat()">
                                    <div class="text-danger" id="nameMessage" style="display: none;">Please write your first name and second name with a space in between.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="offer_cardnumber" class="form-label">Card Number</label>
                                    <input type="tel" id="offer_cardnumber" name="card_number" class="form-control" autocomplete="off" placeholder="16 digit card number" maxlength="19" oninput="formatCardNumber(this)">
                                </div>
                                <div class="mb-3">
                                    <label for="offer_cardcvv" class="form-label">Card CVV</label>
                                    <input type="tel" id="offer_cardcvv" name="cvv" class="form-control" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="offer_expMonth" class="form-label">Expiration Date</label>
                                    <div class="d-flex">
                                        <select id="offer_expMonth" class="form-select me-2" name="expMonth" required onchange="combineExpirationDate()">
                                            <option value="" disabled selected>MM</option>
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
                                        <select id="offer_expYear" class="form-select" name="expYear" required onchange="combineExpirationDate()">
                                            <option value="" disabled selected>YYYY</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">I agree</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function combineExpirationDate() {
            const expMonth = document.getElementById('offer_expMonth').value;
            const expYear = document.getElementById('offer_expYear').value;
            if (expMonth && expYear) {
                document.getElementById('expiration_date').value = `${expYear}-${expMonth}-01`;
            }
        }

        function formatCardNumber(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.length > 16) {
                value = value.slice(0, 16);
            }
            let formattedValue = value.replace(/(\d{4})(?=\d)/g, '$1-');
            input.value = formattedValue;
        }

        function checkNameFormat() {
            const nameInput = document.getElementById('offer_cardname').value;
            const nameMessage = document.getElementById('nameMessage');
            if (nameInput.indexOf(' ') === -1) {
                nameMessage.style.display = 'block';
            } else {
                nameMessage.style.display = 'none';
            }
        }
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();
            console.log('Form submitted');
            this.submit();
        });
    </script>
@endsection
