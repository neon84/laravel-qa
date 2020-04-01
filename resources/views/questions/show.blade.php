@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                           <h1> {{ $question->title }}  </h1>
                           <div class="ml-auto">
                           <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary"> Back to All Questions </a>
                           </div>
                        </div>
                    </div>
                    <hr>
                    <div class= "media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This Question is useful" class="vote-up"> 
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                        
                            <span class="vote-count">123</span>
                            <a title ="This question is not useful" class="vote-down off"> 
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a title="Click to mark as favroite question [Click again to Undo]" class="favorite mt-2 favorited">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorites-count">123</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">
                                        Posted {{ $question->created_date }}
                                </span>
                                <div class="media mt-2">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{  $question->user->avatar  }}">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url }}"> {{$question->user->name}} </a>
                                    </div>
                                </div>
                            </div> {{-- float right?? --}}
                        </div>
                    </div> {{-- media--}}

                </div>
            </div> {{-- card --}}
        </div> {{-- col grid 12 --}}  
    </div> {{-- row justify-content-center --}}

    @include('answers._index', ['answers'=> $question->answers, 'answersCount' => $question->answers_count ])
    @include('answers._create')
 </div> {{-- container --}}

@endsection
