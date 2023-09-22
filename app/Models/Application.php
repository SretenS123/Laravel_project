<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullName',
        'nights',
        'people',
        'ask',
    ];



    public function user():BelongsTo
    {
        return $this->belongsTo(User::class); // Assuming User is your User model class name
    }
    public function festival():BelongsTo
    {
        return $this->belongsTo(Festival::class); // Assuming User is your User model class name
    }
}
