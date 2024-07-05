
    <div class="form-group w-50">
        <input type="text" class="form-control" name="name" placeholder="Имя посетителя"
               value="{{ $guest->name }}">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="residential_status">Статус проживания</label>
        <input type="text" class="form-control" name="residential_status" id="residential_status"
               placeholder="Статус проживания"
               value="{{ $guest->residential_status }}">
        @error('residential_status')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="address_years">Годы проживания по адресу</label>
        <input type="number" class="form-control" name="address_years" id="address_years"
               placeholder="Годы проживания по адресу"
               value="{{ $guest->address_years }}">
        @error('address_years')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="country">Страна</label>
        <input type="text" class="form-control" name="country" id="country" placeholder="Страна"
               value="{{ $guest->country }}">
        @error('country')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="city">Город</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Город"
               value="{{ $guest->city }}">
        @error('city')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="address">Адрес</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Адрес"
               value="{{ $guest->address }}">
        @error('address')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="zip_code">Почтовый индекс</label>
        <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Почтовый индекс"
               value="{{ $guest->zip_code }}">
        @error('zip_code')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="social_number">Социальный номер</label>
        <input type="text" class="form-control" name="social_number" id="social_number"
               placeholder="Социальный номер"
               value="{{ $guest->social_number }}">
        @error('social_number')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="cell_phone">Мобильный телефон</label>
        <input type="text" class="form-control" name="cell_phone" id="cell_phone" placeholder="Мобильный телефон"
               value="{{ $guest->cell_phone }}">
        @error('cell_phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="work_phone">Рабочий телефон</label>
        <input type="text" class="form-control" name="work_phone" id="work_phone" placeholder="Рабочий телефон"
               value="{{ $guest->work_phone }}">
        @error('work_phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
               value="{{ $guest->email }}">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="is_live">Жив ли</label>
        <select class="form-control" name="is_live" id="is_live">
            <option value="1" {{ ( $guest->is_live) == 1 ? 'selected' : '' }}>Жив</option>
            <option value="0" {{ ( $guest->is_live) == 0 ? 'selected' : '' }}>Не жив</option>
        </select>
        @error('is_live')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="military_service">Служил ли</label>
        <select class="form-control" name="military_service" id="military_service">
            <option value="1" {{ ( $guest->military_service) == 1 ? 'selected' : '' }}>
                Служил
            </option>
            <option value="0" {{ ( $guest->military_service) == 0 ? 'selected' : '' }}>Не
                служил
            </option>
        </select>
        @error('military_service')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="state">Штат</label>
        <input type="text" class="form-control" name="state" id="state" placeholder="Штат"
               value="{{ $guest->state }}">
        @error('state')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="date_of_birth">Дата рождения</label>
        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Дата рождения"
               value="{{  $guest->date_of_birth ? $guest->date_of_birth : '' }}">
        @error('date_of_birth')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group w-50">
        <label for="post_index">Индекс</label>
        <input type="text" class="form-control" name="post_index" id="post_index" placeholder="Индекс"
               value="{{ $guest->post_index }}">
        @error('post_index')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
