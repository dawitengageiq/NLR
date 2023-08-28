<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteCategory extends Model
{
    protected $connection;
    protected $fillable = [
        'name',
    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        if(config('app.type') == 'reports') {
            $this->connection = 'secondary';
        }
    }
}
