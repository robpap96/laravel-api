@extends('layouts.admin')

@section('content')
<table class="table">
    
    <a class="btn btn-primary" href="{{ route('admin.technologies.create') }}">Aggiungi Tecnologia</a>

    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Tecnologia</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($technologies as $technology)
        <tr>
          <th scope="row">{{ $technology->name}}</th>
          <td>{{ $technology->name }}</td>
          <td class="d-flex ">
            <a class="btn btn-warning" href="{{route('admin.technologies.show', $technology)}}"><i class="fa-solid fa-eye"></i></a>
            <a class="btn btn-secondary" href="{{route('admin.technologies.edit', $technology)}}"><i class="fa-solid fa-pen"></i></a>
            <form action="{{route('admin.technologies.destroy', $technology)}}" method="POST">
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