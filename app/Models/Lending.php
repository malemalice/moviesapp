<?php
namespace App\Models;

use App\Traits\Eloquent\SearchLikeTrait;
use App\Traits\Models\FillableFields;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use FillableFields, SearchLikeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movies_id', 'member_id', 'date_lending', 'date_returned', 'lateness_charge', 'date_returned_actual'
    ];

    /**
     * @return mixed
     */
    public function getRecordTitle()
    {
        return 'record title';
    }

    public function movies()
    {
        return $this->belongsTo('App\Models\Movies', 'movies_id');
    }
}
