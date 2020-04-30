<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Deal
 * @package App\Models
 * @version April 30, 2020, 1:55 pm UTC
 *
 * @property string $name
 */
class Deal extends Model
{
    use SoftDeletes;

    public $table = 'deals';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'imported_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'imported_id' => 'required'
    ];

    
}
