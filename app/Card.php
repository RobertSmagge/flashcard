<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SahusoftCom\EloquentImageMutator\EloquentImageMutatorTrait;

class Card extends Model
{
    use EloquentImageMutatorTrait;

    protected $fillable = [
        'begrip',
        'omschrijving',
        'afbeelding',
    ];

    protected $image_fields = [
        'afbeelding',
    ];

    public function sets()
    {
        return $this->belongsToMany(Set::class)
            ->withTimestamps()->withPivot('order');
    }

    public function getSet()
    {
        $set = $this->sets->first();

        return $set;
    }
}
