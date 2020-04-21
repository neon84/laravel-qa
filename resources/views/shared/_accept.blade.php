@can('accept', $model)
    <a title="Mark answer as best answer" 
    class="{{$model->status}} mt-2"
        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id}}').submit()">
        <i class="fas fa-check fa-2x"></i>
        <span class="favorites-count">123</span>
    </a>
    <form id="accept-answer-{{$model->id}}" action="{{route('answers.accept', $model->id)}}" method="POST" style="display:none";>
        @csrf                            
    </form>
@else
    @if($model->is_best)
        <a title="Marked by questioner as best answer" 
        class="{{$model->status}} mt-2">
            
            <i class="fas fa-check fa-2x"></i>
            <span class="favorites-count">123</span>
        </a>
    @endif
@endcan