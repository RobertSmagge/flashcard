<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Defines a set
 */
class Set extends Model
{
    protected $fillable = [
        'naam',
        'folder_id',
    ];

    /**
     * Reorder the set
     */
    public function reorder()
    {
        $cards = $this->cards()->orderBy('order')->get();
        $count = $cards->count();
        for ($order=0; $order < $count; $order++) {
            $card = $cards[$order];
            $card->order = $order;
            $card->save();
        }
    }

    /**
     * Define the relation with the folder.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    /**
     * Define the relation with the cards.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cards()
    {
        return $this->belongsToMany(Card::class)
            ->withTimestamps()->withPivot('order');
    }
}
