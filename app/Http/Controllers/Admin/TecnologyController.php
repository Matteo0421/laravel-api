<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tecnology;
use App\Functions\Helper;
use App\Http\Requests\TecnologyRequest;


class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnologies = Tecnology::all();
        $tecnologies = Tecnology::paginate(8);
        return view('admin.tecnologies.index', compact('tecnologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecnology $tecnology)
    {
        return view('admin.tecnologies.edit', compact('tecnology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tecnology $tecnology)
    {
        $request->validate([
            'title' => 'required|min:3|max:100',
            'language' => 'required|min:2|max:100',
        ]);

        $tecnology->update($request->all());

        return redirect()->route('admin.tecnologies.show', $tecnology);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tecnology $tecnology)
    {
        return view('admin.tecnologies.show', compact('tecnology'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnology $tecnology)
    {
        $tecnology->delete();
        return redirect()->route('admin.tecnologies.index')->with('success', 'Tecnology deleted successfully');
    }
}
