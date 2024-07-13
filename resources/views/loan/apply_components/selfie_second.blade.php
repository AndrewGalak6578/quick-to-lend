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
        <div class="section section-selfie" id="form_checking">
            <div class="container">
                <div>
                    <div class="title">
                        <h2>Please upload selfie with a document</h2>
                    </div>
                    <div class="justify-content-center align-content-center">
                        <button type="submit"  class="upload" name="selfie">Take a selfie</button>
                    </div>
                    <div class="section-footer">
                        <button type="button" onclick="nextPrev(-1)" class="btn">Previous Step</button>
                        <button type="submit"  class="btn btn-primary">Next Step</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
