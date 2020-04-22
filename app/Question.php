<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question';

    public function __construct(array $data = array())
    {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }
}
