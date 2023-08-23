<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocenteJubiladoRequest;
use App\Http\Requests\UpdateDocenteJubiladoRequest;
use App\Http\Resources\DocenteJubiladoResource;
use App\Models\DocenteJubilado;
use App\Repositories\DocenteJubiladoRepositoryInterface;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DocenteJubiladoController extends Controller
{
    public function __construct(private DocenteJubiladoRepositoryInterface $docenteJubiladoRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $this->docenteJubiladoRepository->getAllDocentesJubilados();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->docenteJubiladoRepository->createDocenteJubilado();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocenteJubiladoRequest $request): RedirectResponse
    {
//        $validated = $request->validated();
//
//        $validated['bono_asignado'] = $this->getBonoAsignado($validated['fecha_nacimiento']);
//
//        // 1 = Docente registrado
//        $validated['estado_docente_id'] = 1;
//
//        $request->user()->docentesJubilados()->create($validated);
//
//        return redirect(route('docentes-jubilados.index'));

        return $this->docenteJubiladoRepository->storeDocenteJubilado($request->validated());
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
    public function edit(DocenteJubilado $docenteJubilado): \Inertia\Response
    {
//        return Inertia::render('DocentesJubilados/Edit', [
//            //
//
//            'docenteJubilado' => $docenteJubilado,
//
//        ]);

        return $this->docenteJubiladoRepository->editDocenteJubilado($docenteJubilado->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocenteJubiladoRequest $request, DocenteJubilado $docenteJubilado): RedirectResponse
    {
//        $validated = $request->validated();
//
//        $validated['bono_asignado'] = $this->getBonoAsignado($validated['fecha_nacimiento']);
//
//        // 2 = Docente actualizado
//        $validated['estado_docente_id'] = 2;
//
//        $docenteJubilado->update($validated);
//
//        return redirect(route('docentes-jubilados.index'));

        return $this->docenteJubiladoRepository->updateDocenteJubilado($docenteJubilado->id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocenteJubilado $docenteJubilado): RedirectResponse
    {
////        $docenteJubilado->delete();
//        // 3 = Docente eliminado
//        $docenteJubilado->estadoDocente()->associate(3)->save();
//        return redirect(route('docentes-jubilados.index'));

        return $this->docenteJubiladoRepository->destroyDocenteJubilado($docenteJubilado->id);
    }

}
