<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Functions\Helper;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        $types = Type::paginate(8);

        return view('admin.types.index', compact('types'));
    }


    public function typeProjects(){
        $types = Type::all();
        return view('admin.types.type-projects', compact('types'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'categories' => ['required', 'string', 'max:120'],
        ], [
            'title.required' => 'Il campo Titolo è obbligatorio.',
            'categories.required' => 'Il campo Linguaggio Usato è obbligatorio.',
        ]);

        // Effettua una ricerca per verificare se il tipo esiste già
        $exists = Type::where('title', $request->title)->first();

        // Se il tipo esiste già, reindirizza all'indice dei tipi con un messaggio di errore
        if ($exists) {
            return redirect()->route('admin.types.index')->with('error', 'Il Progetto già esiste.');
        }

        // Altrimenti, crea un nuovo tipo
        $newType = new Type();
        $newType->title = $request->title;
        $newType->categories = $request->categories;

        // Genera lo slug
        $newType->slug = Helper::generateSlug($newType->title, new Type());

        // Salva il tipo
        $newType->save();

        // Reindirizza all'indice dei tipi con un messaggio di successo
        return redirect()->route('admin.types.index')->with('success', 'Progetto creato con successo.');
    }

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Type $type)
{
    $request->validate([
        'title' => 'required|string|max:100',
        'categories' => 'required|string|max:120',
    ]);

    $type->title = $request->title;
    $type->categories = $request->categories;

    // Aggiorniamo lo slug solo se il titolo è stato modificato
    if ($request->title !== $type->getOriginal('title')) {
        $type->slug = Helper::generateSlug($request->title, new Type());
    }

    $type->save();

    return redirect()->route('admin.types.index')->with('success', 'Progetto aggiornato con successo');
}


public function create()
{
    return view('admin.types.create');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('success', 'Tipo eliminato con successo.');
    }
}

