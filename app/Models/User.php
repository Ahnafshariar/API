<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
   public $table = 'user';

   public $primaryKey = 'id';

   public $timestamps = true;
}
