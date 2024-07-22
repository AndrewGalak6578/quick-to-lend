@extends('loan.apply_for_loan')
@section('content')
    <style>
        .upload {
            background: linear-gradient(90deg, rgba(65, 176, 245, 1) 0%, rgba(94, 84, 232, 1) 100%);
            border-color: transparent;
            width: 400px;
            color: #fff;
            padding: 16px 28px;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            display: inline-block;
            border-radius: 8px;
            position: relative;
            white-space: normal;
            transition: all 0.6s ease;
            vertical-align: center;
            box-shadow: 10px 10px 15px rgba(49,49,104,0.1);
            cursor: pointer;
            margin-left: 280px;
        }
        #selfieFile {
            display: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('myForm').addEventListener('submit', function(event) {
                if (document.getElementById('selfieFile').files.length === 0) {
                    event.preventDefault();
                    alert('Please select a file first.');
                }
            });
        });
    </script>
    <form action="{{ route('apply.loan.store') }}" method="post" enctype="multipart/form-data" id="myForm">
        @csrf
        @method('POST')
        <input type="hidden" name="redirect_url" value="{{ route('apply.loan.selfie_second') }}">
        <div class="section section-selfie" id="form_checking">
            <div class="container d-flex">
                <div class="container justify-content-center">
                    <div class="title">
                        <h2>Please upload a selfie</h2>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="button" class="upload" name="selfie" onclick="document.getElementById('selfieFile').click();">
                            Take a selfie
                        </button>
                        <input type="file" id="selfieFile" name="selfie" accept="image/*" capture="camera" onchange="document.getElementById('myForm').submit();">
                    </div>
                    <div class="section-footer">
                        <a href="{{ route('apply.loan.extra_doc') }}"><button type="button" class="btn btn-secondary">Previous Step</button></a>
                        <button type="submit" class="btn btn-primary">Next Step</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
