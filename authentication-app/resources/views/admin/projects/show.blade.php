@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="py-4">
            <h2><a href="{{route('admin.projects.index')}}">Torna alla lista</a></h2>
            <h1>{{$project->name}}</h1>
            @if ($project->name)
                <h3>Categoria: <a href="{{route('admin.types.show', $project->type)}}">{{$project->type->name}}</a></h3>    
            @else
                <h3>Nessun Tipo</h3>
            @endif
        </div>
        @if ($project->technologies)
            <div class="mt-4">
                <h3>Tags</h3>
                @foreach ($project->technologies as $tech)
                <span class="badge bg-secondary">{{$tech->name}}</span>
                @endforeach
            </div>
        @endif
        <div class="mt-4">
            <div class="text-center">
                @if ($project->cover_image)
                    <img class="w-25" src="{{asset("storage/$project->cover_image")}}" alt="{{$project->name}}" width="100px">
                @endif
            </div>
        </div>
        <div class="mt-4">
            <h3>Commenti</h3>
            @if($project->comments->isNotEmpty())
                <ul>
                    @foreach ($project->comments as $comment)
                    <li>
                        <h4>{{$comment->name}}</h4>
                        <p>
                            {{$comment->content}}
                        </p>
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina Commento</button>    
                        </form>
                    </li>
                    @endforeach
                </ul>
            @else
                <p>Non sono presenti commenti</p>
            @endif
        </div>
    </div>

@endsection