<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Patient extends Authenticatable
{
     use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [        
        'passport','phone'
        ,'username','password','date_birth'
        ,'email'
        ,'blood','gender','wieght','n_id'
        ,'status','last_lat','last_lng','address'
    ];
        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function status(){
        return [
            'غير مصاب',
            'مصاب',
            'متعافي',
            'مطعم'
        ];
    }
    /**
     * Validation rules
     *
     * @return array
     **/
    public static function createValidationRules($id = null)
    {
        return [
            'passport'=> 'required|string|unique:patients,passport,'.$id
            ,'phone'=> 'required|string|unique:patients,phone,'.$id
         //   ,'n_id'=> 'required|numeric|unique:patients,n_id,'.$id
            ,'username'=> 'required|string|unique:patients,username,'.$id
            ,'password'=> 'required|string|min:6'
            ,'date_birth'=> 'required|date'
            ,'blood'=> 'required|string'
            ,'gender'=> 'required|string'
            //,'wieght'=> 'required'
            ,'status'=> 'required'
            ,'address'=> 'required|string'
        ];
    }
        /**
     * Validation rules
     *
     * @return array
     **/
    public static function updateValidationRules($id = null)
    {
        return [
            'passport'=> 'required|string|unique:patients,passport,'.$id
            ,'phone'=> 'required|string|unique:patients,phone,'.$id
            ,'date_birth'=> 'required|date'
            ,'blood'=> 'required|string'
            ,'gender'=> 'required|string'
            ,'wieght'=> 'required'
            ,'status'=> 'required|string'
            ,'address'=> 'required|string'
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
    public function swipes()
    {
        return $this->hasMany('App\Swipe','passport','passport');
    }
    public function shots()
    {
        return $this->hasMany('App\Shot','passport','passport');
    }
}
