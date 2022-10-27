<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Admin
{
   protected $table = 'admins';

 //  use SoftDeletes, Notifiable;

   /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = ['deleted_at'];

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'name', 'email','phone', 'username', 'password',
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       'password', 'remember_token',
   ];

   /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
   public function sendPasswordResetNotification($token)
   {
       $this->notify(new AdminResetPassword($token, $this->email, $this->name));
   }

   /**
    * Profile update validation rules
    *
    * @return array
    **/
   public static function createValidationRules($id = null)
   {
       return [
           'name' => 'required|string|max:255',
           'username' => 'required|string|max:255|unique:admins,username,'.$id,
           'phone' => 'required|string|max:10|min:10|unique:admins,phone,'.$id,
           'email' => 'required|email|max:255|unique:admins,email,'.$id,
           'password' => 'required|string|min:8',
       ];
   }
       /**
     * Profile update validation rules
     *
     * @return array
     **/
    public static function updateValidationRules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username,'.$id,
            'phone' => 'required|string|max:10|min:10|unique:admins,phone,'.$id,
            'email' => 'required|email|max:255|unique:admins,email,'.$id,
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
}
