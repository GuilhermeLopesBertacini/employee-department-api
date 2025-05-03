<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    // Listar todos os departamentos
    public function index()
    {
        return Departamento::all();
    }

    // Buscar departamento por ID
    public function show($id)
    {
        return Departamento::findOrFail($id);
    }

    // Criar novo departamento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:departamento',
            'descricao' => 'nullable|string|max:255',
            'data_criacao' => 'nullable|date',
            'data_atualizacao' => 'nullable|date',
        ]);

        return Departamento::create($validated);
    }

    // Atualizar departamento
    public function update(Request $request, $id)
    {
        $departamento = Departamento::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'string|max:100|unique:departamento,nome,' . $id,
            'descricao' => 'nullable|string|max:255',
            'data_criacao' => 'nullable|date',
            'data_atualizacao' => 'nullable|date',
        ]);

        $departamento->update($validated);
        return $departamento;
    }

    // Deletar departamento
    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return response()->json(['message' => 'Departamento deletado com sucesso.']);
    }

    // Listar funcionários de um departamento
    public function getFuncionarios($id)
    {
        $departamento = Departamento::with('funcionarios')->findOrFail($id);
        return $departamento->funcionarios;
    }

    // Listar todos os departamentos com seus funcionários
    public function listarComFuncionarios()
    {
        return Departamento::with('funcionarios')->get();
    }
}
