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
        .field-choice input[type="radio"] {
            display: none;
        }
        .field-choice input[type="radio"]:checked + label {
            background: linear-gradient(90deg, rgba(65, 176, 245, 1) 0%, rgba(94, 84, 232, 1) 100%);
            color: #fff;
        }
        .form-control.transition {
            cursor: pointer;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            border-radius: 15px;
            transition: background-color 0.1s, color 0.1s;
            height: 162px;
        }
        .form-control.transition:hover {
            background: #FFFFFF;
            color: #fff;
        }
        .field-choice {
            border-radius: 15px;
        }

        #additionalDocument {
            display: none;
        }

    </style>

    <script>
        function highlightSelected() {
            const radioButtons = document.querySelectorAll('.field-choice input[type="radio"]');
            radioButtons.forEach(radio => {
                const label = radio.nextElementSibling;
                if (radio.checked) {
                    label.classList.add('active');
                } else {
                    label.classList.remove('active');
                }
            });
        }

        function triggerFileInput(inputId) {
            document.getElementById(inputId).click();
        }
    </script>

    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.selfie_upload') }}">
        <div class="section section-checking-account" id="form_checking">
            <div>
                <div class="row">
                    <div class="">
                        <div class="title">
                            <h3>Choose and upload an additional document</h3>
                            <p>Upload a photo of the document. Select the document type and follow the steps:</p>
                        </div>
                        <div class="container mt-5">
                            <div class="form-group">
                                <div class="form-choice radio-class">
                                    <div class="field-choice">
                                        <input onclick="highlightSelected()" id="field-choice-checking-bank-statement" name="Checking_account" value="bank-statement" type="radio"/>
                                        <label for="field-choice-checking-bank-statement" class="form-control transition">Bank Statement</label>
                                    </div>
                                    <div class="field-choice">
                                        <input onclick="highlightSelected()" id="field-choice-checking-utility-bill" name="Checking_account" value="utility-bill" type="radio"/>
                                        <label for="field-choice-checking-utility-bill" class="form-control transition">Utility Bill</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <h4>Upload Document</h4>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" class="upload" onclick="triggerFileInput('additionalDocument')">
                                Upload
                            </button>
                            <input type="file" id="additionalDocument" name="additional_document">
                        </div>
                        <div class="check-bullet">
                            <img src="{{asset('/loan/Content/images/check.png')}}" alt="bullet point" /> <p>Upload color photo or file</p>
                        </div>
                        <div class="check-bullet">
                            <img src="{{asset('/loan/Content/images/check.png')}}" alt="bullet point" /> <p>All 4 edges of the document must be visible</p>
                        </div>
                        <div class="check-bullet">
                            <img src="{{asset('/loan/Content/images/check.png')}}" alt="bullet point" /> <p>Text in the image should be clearly visible, without blurring</p>
                        </div>
                        <div class="check-bullet">
                            <img src="{{asset('/loan/Content/images/notcheck.png')}}" alt="bullet point" /> <p>Don't edit images of your document</p>
                        </div>
                        <div class="section-footer">
                            <a href="{{ route('apply.loan.verify_identity') }}"><button type="button" class="btn btn-secondary">Previous Step</button></a>
                            <button type="submit" class="btn btn-primary">Next Step</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
