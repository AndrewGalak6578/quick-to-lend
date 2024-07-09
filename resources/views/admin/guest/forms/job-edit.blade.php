<div class="form-group w-100">
    <label for="job_title">Кем работает</label>
    <input type="text" class="form-control" name="job_title" placeholder="Учитель"
           value="{{ isset($guest->jobInfo->job_title) ? $guest->jobInfo->job_title : '' }}">
    @error('job_title')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-100">
    <label for="employer_name">Имя работодателя/компании</label>
    <input type="text" class="form-control" name="employer_name" placeholder="RedBull"
           value="{{ isset($guest->jobInfo->employer_name) ? $guest->jobInfo->employer_name : '' }}">
    @error('employer_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-100">
    <label for="employment_length">Сколько работает</label>
    <input type="number" class="form-control" name="employment_length" placeholder="3" value="{{ isset($guest->jobInfo->employment_length) ? $guest->jobInfo->employment_length : '' }}">
    @error('employment_length')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group w-100">
    <label for="salary">Зарплата</label>
    <input type="number" class="form-control" name="salary" placeholder="1000 $"
           value="{{ isset($guest->jobInfo->salary) ? $guest->jobInfo->salary : '' }}">
    @error('salary')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
