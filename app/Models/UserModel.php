<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class UserModel extends Authenticatable
{
  use HasFactory;
  use Notifiable;
     protected $table = 'users';
     protected $primaryKey = "user_id";
       protected $fillable = ['name', 'username', 'email', 'password'];
       protected $hidden = [
        'password',
      ];
    public function __construct() {
    
    }
}
