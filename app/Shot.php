<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shot extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number','passport','type', 'taken_at','delivered_at'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules($id = null)
    {
        return [
            'number' => 'required|string|unique:shots,number,'.$id,
            'type' => 'required|string',
            'passport'=> 'required|string|exists:patients,passport',
            'taken_at' => 'required|string',
            'delivered_at' => 'string',
        ];
    }
    
    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::paginate(10);
    }

    public function patient()
    {
        return $this->belongsTo('Patient','passport','passport');
    }
}
