<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $connection;

    protected $fillable = [
        'category_id',
        'subject',
        'content'
    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        if(config('app.type') == 'reports') {
            $this->connection = 'secondary';
        }
    }
}