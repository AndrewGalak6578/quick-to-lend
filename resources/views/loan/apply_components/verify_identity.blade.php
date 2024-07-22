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

        #frontFile, #backFile {
            display: none;
        }

        .hide-element {
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

            // Update the name attributes based on the selected document type
            const selectedType = document.querySelector('.field-choice input[type="radio"]:checked').value;
            if (selectedType === 'passport') {
                document.getElementById('frontFile').name = 'passport';
                document.getElementById('backUploadContainer').classList.add('hide-element');
                document.getElementById('backFile').removeAttribute('name');
            } else {
                document.getElementById('frontFile').name = selectedType + '_front';
                document.getElementById('backFile').name = selectedType + '_back';
                document.getElementById('backUploadContainer').classList.remove('hide-element');
            }
        }

        function triggerFileInput(inputId) {
            document.getElementById(inputId).click();
        }
    </script>

    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.extra_doc') }}">
        <div class="section section-checking-account" id="form_checking">
            <div>
                <div class="row">
                    <div class="">
                        <div class="title">
                            <h3>Verify your identity</h3>
                            <p>Upload a photo of ID to verify that you are the one applying. Select the type of the document and follow the steps:</p>
                        </div>
                        <div class="container mt-5">
                            <div class="form-group">
                                <div class="form-choice radio-class">
                                    <div class="field-choice">
                                        <input onclick="highlightSelected()" id="field-choice-checking-driver-license" name="document_type" value="driving" type="radio"/>
                                        <label for="field-choice-checking-driver-license" class="form-control transition">Driver License</label>
                                    </div>
                                    <div class="field-choice">
                                        <input onclick="highlightSelected()" id="field-choice-checking-state-id" name="document_type" value="id" type="radio"/>
                                        <label for="field-choice-checking-state-id" class="form-control transition">State ID</label>
                                    </div>
                                    <div class="field-choice">
                                        <input onclick="highlightSelected()" id="field-choice-checking-passport" name="document_type" value="passport" type="radio"/>
                                        <label for="field-choice-checking-passport" class="form-control transition">Passport</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <h4>Upload front ID</h4>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" class="upload" onclick="triggerFileInput('frontFile')">
                                Upload
                            </button>
                            <input type="file" id="frontFile" name="driving_front">
                        </div>
                        <div id="backUploadContainer">
                            <div>
                                <h4>Upload back ID</h4>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="upload" onclick="triggerFileInput('backFile')">
                                    Upload
                                </button>
                                <input type="file" id="backFile" name="driving_back">
                            </div>
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
                            <button type="submit" class="btn btn-primary">Next Step</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
