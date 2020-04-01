<?php

namespace App;

use Parsedown;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = ['body', 'user_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {

        return Parsedown::instance()->text($this->body);
    }

    public static function boot()
    {
        parent::boot();
        static::created(function ($answer) {
            $answer->question->increment('answers_count');
            $answer->question->save();
        });

        // static::saved(function($answer){
        //     echo "Answer Saved\n";
        // });

    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
