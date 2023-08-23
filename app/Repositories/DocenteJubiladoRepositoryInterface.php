<?php

namespace App\Repositories;

interface DocenteJubiladoRepositoryInterface
{
    public function getAllDocentesJubilados();
    public function createDocenteJubilado();

    public function storeDocenteJubilado(array $docenteJubiladoData);
    public function editDocenteJubilado(string $docenteJubiladoId);

    public function updateDocenteJubilado(string $docenteJubiladoId, array $docenteJubiladoData);
    public function destroyDocenteJubilado(string $docenteJubiladoId);

}
