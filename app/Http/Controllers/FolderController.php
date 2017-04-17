<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;

/**
 * Manages the folders
 */
class FolderController extends Controller
{
    /**
     * Display a listing of the folders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('folder.index');
    }

    /**
     * Show the form for creating a new folder.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('folder.create');
    }

    /**
     * Store a newly created folder in storage.
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
                'naam' => 'required|unique:folders',
            ]
        );
        $folder = new Folder($request->all());
        $folder->save();

        return redirect()->route('mappen.show', [$folder]);
    }

    /**
     * Display the specified folder.
     *
     * @param Folder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        return view('folder.show', ['folder' => $folder]);
    }

    /**
     * Show the form for editing the specified folder.
     *
     * @param Folder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        return view('folder.edit', ['folder' => $folder]);
    }

    /**
     * Update the specified folder in storage.
     *
     * @param Request $request
     * @param Folder                   $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
        $this->validate(
            $request,
            [
                'naam' => 'required|unique:folders,naam,'.$folder->id,
            ]
        );
        $folder->update($request->all());

        return redirect()->route('mappen.show', [$folder]);
    }

    /**
     * Add a set to the given folder
     *
     * @param Folder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function addSet(Folder $folder)
    {
        return view('set.create', [
            'folder' => $folder
            'folders' => Folder::pluck('naam', 'id'),
        ]);
    }

    /**
     * Show the delete confirmation page
     *
     * @param  Folder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Folder $folder)
    {
        return view('folder.delete', ['folder' => $folder]);
    }

    /**
     * Remove the specified folder from storage.
     *
     * @param Folder $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
        $folder->delete();

        return redirect()->route('mappen.index');
    }
}
