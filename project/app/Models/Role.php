<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Role extends Model
{
    use HasFactory;

    protected $table = 'roles'; // Specifies the table name
    protected $fillable = ['name']; // Allows mass assignment of the 'name' column


    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
