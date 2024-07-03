<form action="{{ route('guest.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group w-25">
        <input type="text" class="form-control" name="name" placeholder="Имя пользователя"
               value="{{ old('name') }}"
        >
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-25">
        <label for="date_of_birth">Дата рождения</label>
        <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
        @error('date_of_birth')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="email">Электронная почта</label>
        <input type="email" class="form-control" name="email" placeholder="mail@dmoin.com" value="{{ old('email') }}">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="social_number">Социальный номер</label>
        <input type="text" class="form-control" name="social_number" placeholder="078-05-1120" value="{{ old('social_number') }}">
        @error('social_number')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="cell_phone">Мобильный телефон</label>
        <input type="text" class="form-control" name="cell_phone" placeholder="+77777777777" value="{{ old('cell_phone') }}">
        @error('cell_phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="work_phone">Рабочий телефон</label>
        <input type="text" class="form-control" name="work_phone" placeholder="Рабочий телефон" value="{{ old('work_phone') }}">
        @error('work_phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="country">Страна</label>
        <input type="text" class="form-control" name="country" placeholder="Страна" value="{{ old('country') }}">
        @error('country')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="state">Штат/Регион</label>
        <input type="text" class="form-control" name="state" placeholder="Штат/Регион" value="{{ old('state') }}">
        @error('state')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="city">Город</label>
        <input type="text" class="form-control" name="city" placeholder="Город" value="{{ old('city') }}">
        @error('city')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="address">Адрес</label>
        <input type="text" class="form-control" name="address" placeholder="Адрес" value="{{ old('address') }}">
        @error('address')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="zip_code">Почтовый индекс</label>
        <input type="text" class="form-control" name="zip_code" placeholder="например, 12345 или 12345-6789" value="{{ old('zip_code') }}">
        @error('zip_code')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="post_index">Дополнительный индекс</label>
        <input type="text" class="form-control" name="post_index" placeholder="Дополнительный индекс" value="{{ old('post_index') }}">
        @error('post_index')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="is_live">Живой ли пользователь</label>
        <select class="form-control" name="is_live">
            <option value="1" {{ old('is_live') == '1' ? 'selected' : '' }}>Да</option>
            <option value="0" {{ old('is_live') == '0' ? 'selected' : '' }}>Нет</option>
        </select>
        @error('is_live')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="military_service">Военная служба</label>
        <select class="form-control" name="military_service">
            <option value="1" {{ old('military_service') == '1' ? 'selected' : '' }}>Да</option>
            <option value="0" {{ old('military_service') == '0' ? 'selected' : '' }}>Нет</option>
        </select>
        @error('military_service')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="residential_status">Статус проживания</label>
        <input type="text" class="form-control" name="residential_status" placeholder="Статус проживания" value="{{ old('residential_status') }}">
        @error('residential_status')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="unique_token">Unique token (для генерации ничего не пишите)</label>
        <input type="text" class="form-control" name="unique_token" placeholder="Unique token" value="{{ old('unique_token') }}">
        @error('unique_token')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group w-25">
        <label for="address_years">Количество лет по адресу</label>
        <input type="number" class="form-control" name="address_years" placeholder="Количество лет по адресу" value="{{ old('address_years') }}">
        @error('address_years')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Добавить">
    </div>
</form>
