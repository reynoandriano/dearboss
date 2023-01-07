<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'text',
    ];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $unique = false;
            while (!$unique) {
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                $randomString = substr(str_shuffle($characters), 0, config('dearboss.post_chars'));

                try {
                    $model::withTrashed()->where('id', $randomString)->firstOrFail();
                } catch (ModelNotFoundException $e) {
                    $unique = true;
                }
            }
            $model->id = (string) $randomString;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
