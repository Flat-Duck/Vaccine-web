<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $types = [
        1 => 'مدرسية', 
        2 => 'مواليد',
        3 => 'سفر',
        4 => 'موسمية',
        5 => 'كورونا',
    ];

        /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules($id = null)
    {
        return [
            'name' => 'required|string',            
            'code' => 'required|string|unique:vaccines,code,'.$id,
            'date' => 'required|date',
            
        ];
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datet',
    ];

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
