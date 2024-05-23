<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tecnology;
use App\Functions\Helper;


class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tencologies = Tecnology::all();
        return view('admin.tecnologies.index', compact('tencologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tencologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tencologies|max:255',
            'language' => 'required',
            'file' => 'required|integer',
        ]);

        $newTecnology = new Tecnology();
        $newTecnology->title = $request->title;
        $newTecnology->language = $request->language;
        $newTecnology->file = $request->file;

        // Genera lo slug
        $newTecnology->slug = Helper::generateSlug($request->title, new Tecnology());

        // Salva la tecnologia
        $newTecnology->save();

        return redirect()->route('admin.tencologies.index')->with('success', 'Tecnologia aggiunta con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tecnology $Tecnology)
    {
        return view('admin.tencologies.show', compact('Tecnology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecnology $Tecnology)
    {
        return view('admin.tencologies.edit', compact('Tecnology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tecnology $Tecnology)
    {
        $request->validate([
            'title' => 'required|unique:tencologies|max:255',
            'language' => 'required',
            'file' => 'required|integer',
        ]);

        $Tecnology->update($request->all());

        return redirect()->route('admin.tencologies.index')->with('success', 'Tecnologia aggiornata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnology $Tecnology)
    {
        $Tecnology->delete();

        return redirect()->route('admin.tencologies.index')->with('success', 'Tecnologia eliminata con successo');
    }
}
