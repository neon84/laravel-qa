@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                       <h2> Ask Questions </h2>
                       <div class="ml-auto">
                       <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary"> Back to All Questions </a>
                       </div>
                    </div>
                    
                    


                </div>

                <div class= "card-body">
                <form action="{{ route('questions.store')}}" method = "post">
                    @include('questions._form', ['buttonText'=> "POST"])
                </form>
                </div> {{-- card body--}}
            </div> {{-- card --}}
        </div> {{-- col grid 12 --}}
    </div> {{-- justify --}}
 </div> {{-- container --}}

@endsection
