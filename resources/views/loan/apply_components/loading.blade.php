@extends('loan.apply_for_loan')
@section('content')
<div class="loading">
    <div id="progress_div" class="section section-form section-fullscreen section-form-loan-success" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col col-md-12">
                    <div class="title">
                        <p class="pretitle">We'll Be Quick</p>
                        <h3>Searching...</h3>
                    </div>
                    <div class="loading-icon">
                        <span class="loading-ball loading-ball-2"></span>
                        <span class="loading-ball loading-ball-3"></span>
                        <span class="loading-ball loading-ball-2"></span>
                        <span class="loading-ball loading-ball-3"></span>
                        <span class="loading-ball loading-ball-2"></span>
                        <span class="loading-ball loading-ball-3"></span>
                    </div>
                    <div id="progressBar" class="hide_element">
                        <div id="barStatus"></div>
                    </div>
                    <p>This might take a minute. Please don't reload your browser.</p>

                    <div class="status-div">
                        <h6 id="status-text" class="text-center warning-message"></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="countdown-div" class="hide_element">
        <p>
            Thank you for applying! You will now be redirected to a Lender or additional sponsored listings from our partners, depending on your criteria!
        </p>
        <p id="redirect-message">
            <strong>You will now be redirected in</strong>
        </p>
        <h2 id="countdown" class="count-down"></h2>
        <div id="tracking-codes" style="height: 1px; width: 1px">
        </div>
        <iframe id="tracking-code" style="visibility: hidden" height="0" width="0"></iframe>
    </div>
</div>
@endsection
