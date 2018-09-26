<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Set;

/**
 * Manages the sets
 */
class SetController extends Controller
{
    /**
     * Display a listing of the sets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('set.index');
    }

    /**
     * Show the form for creating a new set.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('set.create', [
            'folders' => Folder::pluck('naam', 'id'),
        ]);
    }

    /**
     * Store a newly created set in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'naam' => 'required|unique:sets',
                'map'  => 'required|exists:folders,naam',
            ]
        );
        $set = new Set($request->all());

        $folder = Folder::whereNaam($request->get('map'))->first();
        $set->folder()->associate($folder);

        $set->save();

        return redirect()->route('sets.show', [$set]);
    }

    /**
     * Display the specified set.
     *
     * @param Set $set
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set)
    {
        return view('set.show', ['set' => $set]);
    }

    /**
     * Present the specified set.
     *
     * @param Set $set
     * @param int $order
     * @param int $part
     *
     * @return \Illuminate\Http\Response
     */
    public function present(Set $set, $order, $part)
    {
        if ($part == 'afbeelding') {
            $part = 1;
        } elseif ($part == 'omschrijving') {
            $part = 2;
        } elseif ($part == 'begrip') {
            $part = 3;
        } elseif ($part < 1) {
            $part = 1;
            $order--;
        } elseif ($part > 3) {
            $part = 1;
            $order++;
        }

        $sessionSet = session('set');
        if (!$sessionSet || $sessionSet['id'] != $set->id) {
            $sessionSet = [
                'id'    => $set->id,
                'cards' => $set->cards->shuffle(),
            ];

            session(['set' => $sessionSet]);
        }

        if ($order < 0 || $order >= $sessionSet['cards']->count()) {
            return redirect()->route('sets.show', [$set]);
        } else {
            $card = $sessionSet['cards']->get($order);

            return view(
                'card.present',
                [
                    'card'  => $card,
                    'set'   => $set,
                    'order' => $order,
                    'part'  => $part,
                ]
            );
        }
    }

    /**
     * Show the form for editing the specified set.
     *
     * @param Set $set
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Set $set)
    {
        return view('set.edit', [
            'set'     => $set,
            'folders' => Folder::pluck('naam', 'id'),
        ]);
    }

    /**
     * Update the specified set in storage.
     *
     * @param Request $request
     * @param Set                      $set
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Set $set)
    {
        $this->validate(
            $request,
            [
                'naam' => 'required|unique:sets,naam,'.$set->id,
                'map'  => 'required|exists:folders,naam',
            ]
        );

        $folder = Folder::whereNaam($request->get('map'))->first();
        $set->folder()->associate($folder);

        $set->update($request->all());

        return redirect()->route('sets.show', [$set]);
    }

    /**
     * Add a card to the given set
     *
     * @param Set $set
     */
    public function addCard(Set $set)
    {
        return view('card.create', ['set' => $set]);
    }

    /**
     * Show the delete confirmation page
     *
     * @param  Set $set
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Set $set)
    {
        return view('set.delete', ['set' => $set]);
    }

    /**
     * Remove the specified set from storage.
     *
     * @param Set $set
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Set $set)
    {
        $folder = $set->folder;
        $set->delete();
        return redirect()->route('mappen.show', [$folder]);
    }
}
