<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'sender_user_id', 'receiver_user_id', 'assunto','content','state'
    ];

    public function getShortContentAttribute()
    {
        return substr($this->content,0,random_int(60,150))."...";
    }

    public function getShortestContent()
    {
        return substr($this->content,0,random_int(10,30))."...";
    }

    public function user_sender(){
        return $this->belongsTo('App\User','sender_user_id');
    }

    public function user_receiver(){
        return $this->belongsTo('App\User','receiver_user_id');
    }

    public function estado(){
        return $this->state ? 'Lida' : 'Nao Lida';
    }

    public function alert(){
        return $this->state ? 'label label-success' : 'label label-info';
    }

}
