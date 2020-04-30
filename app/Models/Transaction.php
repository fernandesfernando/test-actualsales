<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 * @package App\Models
 * @version April 30, 2020, 2:02 pm UTC
 *
 * @property string $hour
 * @property integer $deal_id
 * @property integer $client_id
 */
class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';
    

    protected $dates = ['deleted_at', 'hour'];

    protected $appends = ['only_hour', 'only_year', 'only_day', 'only_month'];


    public $fillable = [
        'hour',
        'deal_id',
        'client_id',
        'accepted',
        'refused',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'deal_id' => 'integer',
        'client_id' => 'integer',
        'accepted' => 'integer',
        'refused' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hour' => 'required',
        'deal_id' => 'required',
        'client_id' => 'required'
    ];

    /**
     * Get the client that owns the transaction.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    /**
     * Get the deal that owns the transaction.
     */
    public function deal()
    {
        return $this->belongsTo('App\Models\Deal');
    }    

    public function getOnlyHourAttribute()
    {
        return $this->hour->format('H:i');
    }

    public function getOnlyDayAttribute()
    {
        return $this->hour->format('d');
    }

    public function getOnlyMonthAttribute()
    {
        return $this->hour->format('m');
    }

    public function getOnlyYearAttribute()
    {
        return $this->hour->format('Y');
    }

}
