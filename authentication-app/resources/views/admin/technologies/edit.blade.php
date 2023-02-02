@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Modifica: {{$technology->name}}</h1>

    <form action="{{ route('admin.technologies.update', $technology) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Tecnologia*</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" maxlength="100" value="{{ old('name', $technology->name) }}" >
            @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                <div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Accetta Modifica</button>
    </form>
</div>
@endsection