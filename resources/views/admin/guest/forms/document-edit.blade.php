<div class="form-group w-50">
    <label for="driving_number">Номер прав</label>
    <input type="text" class="form-control" name="driving_number" placeholder="Номер прав"
           value="{{ old('driving_number') }}">
    @error('driving_number')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Поля для загрузки изображений документов -->
<div class="form-group w-100">
    <label for="driving_front" class="form-label">Переднее фото прав</label>
    <input class="form-control" type="file" name="driving_front" id="driving_front">
    @if(isset($guest) && isset($guest->documents->driving_front))
        <img src="{{ url('storage/' . $guest->documents->driving_front) }}" alt="Переднее фото прав" class="img-thumbnail mt-2">
    @endif
    @error('driving_front')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group w-100">
    <label for="driving_back" class="form-label">Заднее фото прав</label>
    <input class="form-control" type="file" name="driving_back" id="driving_back">
    @if(isset($guest) && isset($guest->documents->driving_back))
        <img src="{{ url('storage/' . $guest->documents->driving_back) }}" alt="Заднее фото прав" class="img-thumbnail mt-2">
    @endif
    @error('driving_back')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group w-100">
    <label for="id_front" class="form-label">Переднее фото удостоверения</label>
    <input class="form-control" type="file" name="id_front" id="id_front">
    @if(isset($guest) && isset($guest->documents->id_front))
        <img src="{{ url('storage/' . $guest->documents->id_front) }}" alt="Переднее фото удостоверения" class="img-thumbnail mt-2">
    @endif
    @error('id_front')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group w-100">
    <label for="id_back" class="form-label">Заднее фото удостоверения</label>
    <input class="form-control" type="file" name="id_back" id="id_back">
    @if(isset($guest) && isset($guest->documents->id_back))
        <img src="{{ url('storage/' . $guest->documents->id_back) }}" alt="Заднее фото удостоверения" class="img-thumbnail mt-2">
    @endif
    @error('id_back')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group w-100">
    <label for="passport" class="form-label">Фото паспорта</label>
    <input class="form-control" type="file" name="passport" id="passport">
    @if(isset($guest) && isset($guest->documents->passport))
        <img src="{{ url('storage/' . $guest->documents->passport) }}" alt="Фото паспорта" class="img-thumbnail mt-2">
    @endif
    @error('passport')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group w-100">
    <label for="selfie" class="form-label">Селфи</label>
    <input class="form-control" type="file" name="selfie" id="selfie">
    @if(isset($guest) && isset($guest->documents->selfie))
        <img src="{{ url('storage/' . $guest->documents->selfie) }}" alt="Селфи" class="img-thumbnail mt-2">
    @endif
    @error('selfie')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
