@extends('layouts.main')

@section('title')
    Добавить проект
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> > <a href="/admin/projects">Проекты</a> >
                        <span class="text-muted">Добавить проект</span></h6>
                </nav>
            </div>
        </div>
        <div class="row mt-2 mb-2">
            <div class="col-sm">
                <h4>Добавить проект</h4>
            </div>
        </div>
        <form action="/projects" method="post">
            @csrf
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="codename">Кодовое название <span class="text-danger"> *</span><br><span class="text-muted">(Номер гранта, госзадания и т. д.)</span></label>
                    <input type="text" minlength="5" maxlength="100" id="codename" name="codename" class="form-control" value="{{old('codename')}}" required>
                    @error('codename')
                    <div class="invalid-feedback">{{$errors->first('codename')}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="name">Название проекта<span class="text-danger"> *</span></label>
                    <input type="text" minlength="5" maxlength="200" id="name" name="name" class="form-control" value="{{old('name')}}" required>
                </div>
                @error('name')
                <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @enderror
            </div>
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="director">Руководитель<span class="text-danger"> *</span></label>
                    <select class="form-control" id="director" name="director" required>
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}">
                                {{$employee->surname}} {{$employee->name}}
                                @if(!empty($employee->patronymic))
                                    {{$employee->patronymic}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('director')
                <div class="invalid-feedback">{{$errors->first('director')}}</div>
                @enderror
            </div>
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="deadline">Cрок выполнения <span class="text-danger"> *</span><br><span class="text-muted">(Формат записи: 2020 или 2020-2021)</span></label>
                    <input type="text" minlength="4" maxlength="10" id="deadline" name="deadline" class="form-control" value="{{old('deadline')}}" required>
                    @error('deadline')
                    <div class="invalid-feedback">{{$errors->first('deadline')}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" name="archived"
                       id="archived" {{ old('archived') ? 'checked' : '' }}>

                <label class="form-check-label" for="archived">
                    Архивный
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </main>
@endsection
