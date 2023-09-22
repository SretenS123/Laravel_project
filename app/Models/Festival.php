<?php

namespace App\Models;

use App\Events\FestivalCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Festival extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
    ];
    protected $dispatchesEvents = [
        'created' => FestivalCreated::class,
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class); // Assuming User is your User model class name
    }
    public function application(): HasMany
    {
        return  $this ->hasMany(Application::class);
    }
}
