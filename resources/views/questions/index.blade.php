@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                       <h2> All Questions </h2>
                       <div class="ml-auto">
                       <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary"> Ask Question </a>
                       </div>
                    </div>
                    
                    


                </div>

                <div class= "card-body">
                    @include('layouts._messages')

                   @forelse($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters pull-left">
                                {{-- <img  class="mr-3" alt="..."> --}}
                                <div class="vote">
                                    <strong> {{$question->votes_count}} </strong> {{ Str::plural('vote', $question->votes_count) }}
                                </div>
                            <div class="status {{ $question->status }}">
                                    <strong> {{$question->answers_count}} </strong> {{ Str::plural('answer', $question->answers_count)}}
                                </div>
                                <div class="view">
                                    {{ $question->views  . " " . Str::plural('view', $question->views) }}
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{$question->url}}"> {{$question->title}} </a> </h3>
                                    <div class="ml-auto">
                                        @can('update', $question)
                                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan
                                        @can('delete', $question)
                                        <form class="form-delete" method="post" action={{ route('questions.destroy', $question->id) }}>
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you Sure?')"> Delete </button>
                                        </form>
                                        @endcan
                                    </div>
                                </div>
                                
                                <p class="lead">
                                    Asked by 
                                    <a href="{{$question->user->url}}"> {{$question->user->name}}</a>
                                    <small class="text-muted"> {{$question->created_On}} </small>
                                </p>
                               <div class="excerpt"> {{ $question->excerpt(150) }} </div>
                            </div>

                        </div>
                            <hr>
                   @empty
                    <div class="alert alert-warning">
                        <strong> Sorry </strong> No Questoins available.
                    </div>
                       
                   
                   @endforelse
                   <div >
                       {{$questions->links()}} 
                   </div>
                </div>
            </div> {{-- card --}}
        </div> {{-- col grid 12 --}}
    </div> {{-- justify --}}
 </div> {{-- container --}}

@endsection
