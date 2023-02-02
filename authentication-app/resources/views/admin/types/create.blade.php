@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Aggiungi una nuova categoria</h1>

    <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome nuovo Tipo*</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" maxlength="100" value="{{ old('name') }}" >
            @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                <div>
            @enderror
        </div>


        <button type="submit" class="btn btn-success">Aggiungi</button>
    </form>
</div>
@endsection