<?php

namespace Lavakit\Translation\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TranslationTranslation
 * @package Lavakit\Translation\Models
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class TranslationTranslation extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'translation_translations';

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'value'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;
}
