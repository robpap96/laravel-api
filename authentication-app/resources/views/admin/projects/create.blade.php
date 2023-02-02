@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Aggiungi un nuovo progetto</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome*</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" maxlength="100" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                <div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type_id">Tipo</label>
            <select class="form-select" name="type_id" id="type_id">
                <option value="">Nessun Tipo</option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}" {{ old('type_id') == $type->id ? 'selected' : '' }} >{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto*</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{old('content')}}</textarea>
            @error('content')
                <div class="alert alert-danger">
                    {{$message}}
                <div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label class="active" for="created_on">Creato il*</label>
            <input type="date" class="@error('created_on') is-invalid @enderror" id="created_on" name="created_on" value="{{old('created_on')}}">
            @error('created_on')
                <div class="alert alert-danger">
                    {{$message}}
                <div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="customer" class="form-label">Cliente*</label>
            <input type="text" class="form-control @error('customer') is-invalid @enderror" id="customer" name="customer" maxlength="100" value="{{ old('customer') }}">
            @error('customer')
                <div class="alert alert-danger">
                    {{$message}}
                <div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="private" class="form-label">Privato(si/no)*</label>
            <input type="text" class="form-control @error('private') is-invalid @enderror" id="private" name="private" maxlength="200" value="{{old('private')}}">
            @error('private')
                <div class="alert alert-danger">
                    {{$message}}
                <div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="mb-2">Tag</div>
            @foreach ($technologies as $tech)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="{{$tech->slug}}" name="technologies[]" value="{{$tech->id}}" {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{$tech->slug}}">{{$tech->name}}</label>
            </div>
            @endforeach
        </div> 
        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
        </div>

        <button type="submit" class="btn btn-success">Aggiungi</button>
    </form>
</div>
@endsection