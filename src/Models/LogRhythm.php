<?php

namespace InfancyIt\LogRhythm\Models;

use Illuminate\Database\Eloquent\Model;

class LogRhythm extends Model
{
    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('logrhythm.table_name', 'laravel_logs'));
    }
}
