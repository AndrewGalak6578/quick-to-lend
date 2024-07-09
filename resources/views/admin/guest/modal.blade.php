<div class="modal-header">
    <h5 class="modal-title">Информация о пользователе</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $guest->name }}</td>
                </tr>
                <tr>
                    <th>Birth Date</th>
                    <td>{{ $guest->date_of_birth }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $guest->email }}</td>
                </tr>
                <tr>
                    <th>Cell Phone</th>
                    <td>{{ $guest->cell_phone }}</td>
                </tr>
                <tr>
                    <th>Work Phone</th>
                    <td>{{ $guest->work_phone }}</td>
                </tr>
                <tr>
                    <th>Social Number</th>
                    <td>{{ $guest->social_number }}</td>
                </tr>
                <tr>
                    <th>Driver License Number</th>
                    <td>{{ $guest->documents ? $guest->documents->driving_number : '' }}</td>
                </tr>
                <tr>
                    <th>Military Service</th>
                    <td>{{ $guest->military_service ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Home Zip Code</th>
                    <td>{{ $guest->zip_code }}</td>
                </tr>
                <tr>
                    <th>Street</th>
                    <td>{{ $guest->address }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $guest->city }}</td>
                </tr>
                <tr>
                    <th>State</th>
                    <td>{{ $guest->state }}</td>
                </tr>
                <tr>
                    <th>County</th>
                    <td>{{ $guest->county }}</td>
                </tr>
                <tr>
                    <th>Years At Address</th>
                    <td>{{ $guest->address_years }} Years</td>
                </tr>
                <tr>
                    <th>Residential Status</th>
                    <td>{{ $guest->residential_status }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <tr>
                    <th>Bank Name</th>
                    <td>{{ $guest->bank ? $guest->bank->bank_name : '' }}</td>
                </tr>
                <tr>
                    <th>Routing Number</th>
                    <td>{{ $guest->bank ? $guest->bank->routing_number : '' }}</td>
                </tr>
                <tr>
                    <th>Account Number</th>
                    <td>{{ $guest->bank ? $guest->bank->account_number : '' }}</td>
                </tr>
                <tr>
                    <th>Bank Years</th>
                    <td>{{ $guest->bank ? $guest->bank->bank_year : '' }}</td>
                </tr>
                <tr>
                    <th>Employment Status</th>
                    <td>{{ $guest->jobInfo->employment_status ?? '' }}</td>
                </tr>
                <tr>
                    <th>Job Title</th>
                    <td>{{ $guest->jobInfo->job_title }}</td>
                </tr>
                <tr>
                    <th>Employer Name</th>
                    <td>{{ $guest->jobInfo->employer_name }}</td>
                </tr>
                <tr>
                    <th>Employment Status Length</th>
                    <td>{{ $guest->jobInfo->employment_length }}</td>
                </tr>
                <tr>
                    <th>Payment Type</th>
                    <td>{{ $guest->jobInfo->payment_type }}</td>
                </tr>
                <tr>
                    <th>How Often Get Paid</th>
                    <td>{{ $guest->jobInfo->how_often_get_paid }}</td>
                </tr>
                <tr>
                    <th>Salary</th>
                    <td>{{ $guest->jobInfo->salary }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between mt-3">
                <div>
                    <img src="{{ $guest->documents && $guest->documents->driving_front ? asset('storage/' . $guest->documents->driving_front) : 'placeholder.png' }}" alt="Переднее фото прав" class="img-thumbnail mt-2">
                    <label>Переднее фото прав</label>
                </div>
                <div>
                    <img src="{{ $guest->documents && $guest->documents->driving_back ? asset('storage/' . $guest->documents->driving_back) : 'placeholder.png' }}" alt="Заднее фото прав" class="img-thumbnail mt-2">
                    <label>Заднее фото прав</label>
                </div>
                <div>
                    <img src="{{ $guest->documents && $guest->documents->selfie ? asset('storage/' . $guest->documents->selfie) : 'placeholder.png' }}" alt="Селфи" class="img-thumbnail mt-2">
                    <label>Селфи</label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <button type="button" class="btn bg-yellow">Удалить</button>
        <button type="button" class="btn btn-primary btn-download">Скачать</button>
    </div>
</div>

