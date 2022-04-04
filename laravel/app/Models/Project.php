<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * @property string $name
 * @property string $location
 * @property string $introduction
 * @property int $cost
 *
 * @package App\Models
 */
class Project extends Model
{
    use HasFactory;

    /**
     * Name of the table
     *
     * @var string
     */
    protected string $table = 'projects';

    /**
     * The attributes thar are mass assignable
     *
     * @var array
     */
    protected array $fillable = [
        'name',
        'location',
        'introduction',
        'cost'
    ];

    /**
     * The attributes that should be cast to native types
     *
     * @var array
     */
    protected array $casts = [
        'cost' => 'int'
    ];
}
