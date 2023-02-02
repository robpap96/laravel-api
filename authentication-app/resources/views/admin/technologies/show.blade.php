@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="py-4">
            <h4><a href="{{route('admin.technologies.index')}}">Torna alla lista</a></h4>
            <h1>{{$technology->name}}</h1>
            @if($type->projects->isNotEmpty())
                <h3>Post associati:</h3>
                <ul>
                    @foreach ($technology->projects as $project)
                        <li><a href="{{route('admin.projects.show', $project)}}">{{project->name}}</a></li>    
                    @endforeach
                </ul>
            @else
                <h3> Nessun progetto associato</h3>    
        </div>
    </div>
@endsection