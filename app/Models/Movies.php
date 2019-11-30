<?php

namespace App\Models;

use App\Traits\Eloquent\SearchLikeTrait;
use App\Traits\Models\FillableFields;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use FillableFields, SearchLikeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date_released','genre_id',
    ];

    /**
     * @return mixed
     */
    public function getRecordTitle()
    {
        return $this->name;
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre', 'genre_id');
    }
}
