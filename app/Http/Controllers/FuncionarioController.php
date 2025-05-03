<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    // Listar todos os funcionários
    public function index()
    {
        return Funcionario::all();
    }

    // Buscar funcionário por ID
    public function show($id)
    {
        return Funcionario::findOrFail($id);
    }

    // Criar novo funcionário
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|max:20|unique:funcionario',
            'rg' => 'required|string|max:20|unique:funcionario',
            'data_nascimento' => 'required|date',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|unique:funcionario',
            'cargo' => 'required|string|max:100',
            'salario' => 'required|numeric',
            'data_admissao' => 'required|date',
            'data_demissao' => 'nullable|date',
            'id_departamento' => 'required|exists:departamento,id',
        ]);

        return Funcionario::create($validated);
    }

    // Atualizar funcionário
    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'string|max:100',
            'cpf' => 'string|max:20|unique:funcionario,cpf,' . $id,
            'rg' => 'string|max:20|unique:funcionario,rg,' . $id,
            'data_nascimento' => 'date',
            'endereco' => 'string|max:255',
            'telefone' => 'string|max:20',
            'email' => 'email|unique:funcionario,email,' . $id,
            'cargo' => 'string|max:100',
            'salario' => 'numeric',
            'data_admissao' => 'date',
            'data_demissao' => 'nullable|date',
            'id_departamento' => 'exists:departamento,id',
        ]);

        $funcionario->update($validated);
        return $funcionario;
    }

    // Deletar funcionário
    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();
        return response()->json(['message' => 'Funcionário deletado com sucesso.']);
    }

    // Buscar departamento de um funcionário
    public function getDepartamento($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return $funcionario->departamento;
    }

    // Listar todos os funcionários com seus departamentos
    public function listarComDepartamentos()
    {
        return Funcionario::with('departamento')->get();
    }
}
