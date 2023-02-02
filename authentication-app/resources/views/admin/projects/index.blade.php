@extends('layouts.admin')

@section('content')
<table class="table">
    
    <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Aggiungi Progetto</a>

    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Contenuto</th>
        <th scope="col">Slug</th>
        <th scope="col">Creato il</th>
        <th scope="col">Privato</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
          <th scope="row">{{ $project->name }}</th>
          <td>{{ $project->content }}</td>
          <td>{{ $project->slug }}</td>
          <td>{{ $project->created_on }}</td>
          <td>{{ $project->private }}</td>
          <td class="d-flex ">
            <a class="btn btn-warning" href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye"></i></a>
            <a class="btn btn-secondary" href="{{route('admin.projects.edit', $project)}}"><i class="fa-solid fa-pen"></i></a>
            <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
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