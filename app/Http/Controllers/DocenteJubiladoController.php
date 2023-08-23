<?php

namespace App\Http\Controllers;

use App\Models\DocenteJubilado;
use App\Http\Requests\StoreDocenteJubiladoRequest;
use App\Http\Requests\UpdateDocenteJubiladoRequest;
use Inertia\Inertia;

class DocenteJubiladoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('DocentesJubilados/Index', [
            //

            'docentesJubilados' => DocenteJubilado::with('user:id,name')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocenteJubiladoRequest $request)
    {
        $validated = $request->validated();

        $validated['bono_asignado'] = 1000;
        $validated['estado'] = 1;

        $request->user()->docentesJubilados()->create($validated);

//        return redirect(route('docentes-jubilados.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(DocenteJubilado $docenteJubilado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocenteJubilado $docenteJubilado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocenteJubiladoRequest $request, DocenteJubilado $docenteJubilado)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocenteJubilado $docenteJubilado)
    {
        //
    }
}
