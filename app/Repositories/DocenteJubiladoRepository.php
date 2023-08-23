<?php

namespace App\Repositories;

use App\Models\DocenteJubilado;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DocenteJubiladoRepository implements DocenteJubiladoRepositoryInterface
{

    public function getAllDocentesJubilados(): \Inertia\Response
    {
        return Inertia::render('DocentesJubilados/Index', [
            'docentesJubilados' => DocenteJubilado::with(['user:id,name', 'estadoDocente:id,descripcion'])->paginate(),
        ]);

    }

    public function createDocenteJubilado():\Inertia\Response
    {
        return Inertia::render('DocentesJubilados/Create');
    }

    public function storeDocenteJubilado(array $docenteJubiladoData): RedirectResponse
    {
        $docenteJubiladoData['bono_asignado'] = $this->getBonoAsignado($docenteJubiladoData['fecha_nacimiento']);

        // 1 = Docente registrado
        $docenteJubiladoData['estado_docente_id'] = 1;

        request()->user()->docentesJubilados()->create($docenteJubiladoData);

        return redirect(route('docentes-jubilados.index'));
    }


    public function editDocenteJubilado($docenteJubiladoId): \Inertia\Response
    {
        $docenteJubilado = DocenteJubilado::findOrFail($docenteJubiladoId);
        return Inertia::render('DocentesJubilados/Edit', [
            //

            'docenteJubilado' => $docenteJubilado,

        ]);
    }


    public function updateDocenteJubilado($docenteJubiladoId, array $docenteJubiladoData):RedirectResponse
    {
        $docenteJubilado = DocenteJubilado::findOrFail($docenteJubiladoId);

        $docenteJubiladoData['bono_asignado'] = $this->getBonoAsignado($docenteJubiladoData['fecha_nacimiento']);

        // 2 = Docente actualizado
        $docenteJubiladoData['estado_docente_id'] = 2;

        $docenteJubilado->update($docenteJubiladoData);

        return redirect(route('docentes-jubilados.index'));
    }

    public function destroyDocenteJubilado($docenteJubiladoId):RedirectResponse
    {
        $docenteJubilado = DocenteJubilado::findOrFail($docenteJubiladoId);
        // 3 = Docente eliminado
        $docenteJubilado->estadoDocente()->associate(3)->save();
        return redirect(route('docentes-jubilados.index'));
    }


    /**
     * @param mixed $fechaNacimiento
     * @return mixed
     */
    protected function getBonoAsignado(mixed $fechaNacimiento): mixed
    {
        $edadDocente = now()->diffInYears($fechaNacimiento);

        $bonosPorEdad = [
            66 => 1200,
            67 => 1500,
            68 => 1800,
        ];

        $bonoAsignado = $bonosPorEdad[$edadDocente] ?? 1000;

        if ($edadDocente >= 69) {
            $bonoAsignado = 2000;
        }

        return $bonoAsignado;
    }
}
