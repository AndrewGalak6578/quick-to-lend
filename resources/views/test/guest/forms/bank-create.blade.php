<div class="mb-2 ">
    <h3>Банковская информация</h3>
</div>
<form action="{{ route('bank.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group w-50">
        <label for="guest_id">ID гостя</label>
        <input type="number" class="form-control" name="guest_id" placeholder="ID гостя" value="{{ old('guest_id') }}">
        @error('guest_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="card_number">Номер карты</label>
        <input type="text" class="form-control" name="card_number" placeholder="Номер карты" value="{{ old('card_number') }}">
        @error('card_number')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="card_holder">Владелец карты</label>
        <input type="text" class="form-control" name="card_holder" placeholder="Владелец карты" value="{{ old('card_holder') }}">
        @error('card_holder')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="cvv">CVV</label>
        <input type="text" class="form-control" name="cvv" placeholder="CVV" value="{{ old('cvv') }}">
        @error('cvv')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="expiration_date">Дата истечения срока действия</label>
        <input type="date" class="form-control" name="expiration_date" placeholder="Дата истечения срока действия" value="{{ old('expiration_date') }}">
        @error('expiration_date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="bank_name">Название банка</label>
        <input type="text" class="form-control" name="bank_name" placeholder="Название банка" value="{{ old('bank_name') }}">
        @error('bank_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="routing_number">Маршрутный номер</label>
        <input type="text" class="form-control" name="routing_number" placeholder="Маршрутный номер" value="{{ old('routing_number') }}">
        @error('routing_number')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="account_number">Номер счета</label>
        <input type="text" class="form-control" name="account_number" placeholder="Номер счета" value="{{ old('account_number') }}">
        @error('account_number')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="bank_year">Год открытия счета</label>
        <input type="number" class="form-control" name="bank_year" placeholder="Год открытия счета" value="{{ old('bank_year') }}">
        @error('bank_year')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Добавить">
    </div>
</form>
