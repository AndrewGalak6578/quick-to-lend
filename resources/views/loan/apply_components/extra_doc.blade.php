@extends('loan.apply_for_loan')
@section('content')

    <style>

        .upload {
            margin-top: 10px;
            margin-bottom: 15px;
            background: linear-gradient(90deg, rgba(65, 176, 245, 1) 0%, rgba(94, 84, 232, 1) 100%);
            border-color: transparent;
            width: 300px;
            color: #fff;
            padding: 16px 28px;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            display: inline-block;
            border: 0px solid transparent;
            border-radius: 8px;
            position: relative;
            white-space: normal;
            transition: all 0.6s ease;
            vertical-align: center;
            box-shadow: 10px 10px 15px rgba(49,49,104,0.1);
        }

    </style>

    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="section  section-checking-account" id="form_checking">
            <div>
                <div class="row">
                    <div class="">
                        <div class="title">
                            <h3>Verify your identity</h3>
                            <p>Upload a photo of the document. Select the document type and follow the steps:</p>
                        </div>
                        <div class="form-group">
                            <div class="form-choice radio-class">
                                <div class="field-choice">
                                    <input onclick="hasChecking(event)" id="field-choice-checking-yes"
                                           name="Checking_account" value="Yes" type="radio"/>
                                    <label for="field-choice-checking-yes" class="form-control transition">Bank statement</label>
                                </div>
                                <div class="field-choice">
                                    <input onclick="hasChecking(event)" id="field-choice-checking-no"
                                           name="Checking_account" value="No" type="radio"/>
                                    <label for="field-choice-checking-no" class="form-control transition">Utility bill</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <h4>Upload front Document</h4>
                        </div>
                        <div class="justify-content-center align-content-center">
                            <button type="submit"  class="upload" name="selfie">Upload</button>
                        </div>
                        <div class="check-bullet">
                            <img src={{asset('/loan/Content/images/check.png')}} alt="bullet point" /> <p>Upload color photo or file</p>
                        </div>
                        <div class="check-bullet">
                            <img src={{asset('/loan/Content/images/check.png')}} alt="bullet point" /> <p>All 4 edges of the document must be visible</p>
                        </div>
                        <div class="check-bullet">
                            <img src={{asset('/loan/Content/images/check.png')}} alt="bullet point" /> <p>Text in the image should be clearly visible, without blurring</p>
                        </div>
                        <div class="check-bullet">
                            <img src={{asset('/loan/Content/images/notcheck.png')}} alt="bullet point" /> <p>Don't edit images of your document</p>
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
