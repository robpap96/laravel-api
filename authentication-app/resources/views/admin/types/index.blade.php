@extends('layouts.admin')

@section('content')
<table class="table">
    
    <a class="btn btn-primary" href="{{ route('admin.types.create') }}">Aggiungi Tipo</a>

    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
        <tr>
          <th scope="row">{{ $type->name}}</th>
          <td>{{ $type->name }}</td>
          <td class="d-flex ">
            <a class="btn btn-warning" href="{{route('admin.types.show', $type)}}"><i class="fa-solid fa-eye"></i></a>
            <a class="btn btn-secondary" href="{{route('admin.types.edit', $type)}}"><i class="fa-solid fa-pen"></i></a>
            <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection  