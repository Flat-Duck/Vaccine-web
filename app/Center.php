<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{ 
   // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','latitude','longitude','address'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'name' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }

    /**
     * Get the providers for the Service.
     */
    public function providers()
    {
        return $this->belongsToMany('App\Provider');
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
}
