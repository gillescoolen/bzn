<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answer';

    public function __construct(array $data = array())
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function layer()
    {
        return $this->belongsTo('App\Layer');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
