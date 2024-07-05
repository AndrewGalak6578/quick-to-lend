<div class="form-group w-50">
    <label for="card_number">Номер карты</label>
    <input type="text" class="form-control" name="card_number" placeholder="Номер карты"
           value="{{ isset($guest->bank->card_number) ? $guest->bank->card_number : '' }}">
    @error('card_number')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-50">
    <label for="card_holder">Владелец карты</label>
    <input type="text" class="form-control" name="card_holder" placeholder="Владелец карты"
           value="{{ isset($guest->bank->card_holder) ? $guest->bank->card_holder : '' }}">
    @error('card_holder')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-50">
    <label for="cvv">CVV</label>
    <input type="text" class="form-control" name="cvv" placeholder="CVV" value="{{ isset($guest->bank->cvv) ? $guest->bank->cvv : '' }}">
    @error('cvv')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-50">
    <label for="expiration_date">Дата истечения срока действия</label>
    <input type="date" class="form-control" name="expiration_date" placeholder="Дата истечения срока действия"
           value="{{ isset($guest->bank->expiration_date) ? $guest->bank->expiration_date : '' }}">
    @error('expiration_date')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-50">
    <label for="bank_name">Название банка</label>
    <input type="text" class="form-control" name="bank_name" placeholder="Название банка"
           value="{{ isset($guest->bank->bank_name) ? $guest->bank->bank_name : '' }}">
    @error('bank_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-50">
    <label for="routing_number">Маршрутный номер</label>
    <input type="text" class="form-control" name="routing_number" placeholder="Маршрутный номер"
           value="{{ isset($guest->bank->routing_number) ? $guest->bank->routing_number : '' }}">
    @error('routing_number')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-50">
    <label for="account_number">Номер счета</label>
    <input type="text" class="form-control" name="account_number" placeholder="Номер счета"
           value="{{ isset($guest->bank->account_number) ? $guest->bank->account_number : '' }}">
    @error('account_number')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-50">
    <label for="bank_year">Год открытия счета</label>
    <input type="number" class="form-control" name="bank_year" placeholder="Год открытия счета"
           value="{{ isset($guest->bank->bank_year) ? $guest->bank->bank_year : '' }}">
    @error('bank_year')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

