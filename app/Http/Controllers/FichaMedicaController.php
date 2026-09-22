<?php

namespace App\Http\Controllers;

use App\Models\FichaMedica;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class FichaMedicaController extends Controller
{
    /**
     * Exibir o formulário para criar uma nova Ficha Médica.
     */
    public function create()
    {
        return view('fichas.create');
    }

    /**
     * Salvar uma nova Ficha Médica e gerar o UUID único.
     */
    public function store(Request $request)
    {
        // 1. Validar os dados da requisição
        $validatedData = $request->validate([
            'nome_paciente' => 'required|string|max:255',
            'tipo_sanguineo' => 'required|string|max:10',
            'alergias_graves' => 'nullable|string',
            'remedios_uso_continuo' => 'nullable|string',
            'nome_contato_emergencia_1' => 'required|string|max:255',
            'telefone_contato_emergencia_1' => 'required|string|max:20',
            'nome_contato_emergencia_2' => 'nullable|string|max:255',
            'telefone_contato_emergencia_2' => 'nullable|string|max:20',
            'foto_paciente' => 'nullable|image|max:2048',
        ]);

        // 2. Gerar o UUID único (Padrão RFC 4122)
        $uuid = Str::uuid()->toString();

        // Tratamento para upload de foto (exemplo básico)
        $fotoPath = null;
        if ($request->hasFile('foto_paciente')) {
            $fotoPath = $request->file('foto_paciente')->store('fotos_pacientes', 'public');
        }

        // 3. Criar a nova ficha associada ao usuário autenticado
        $fichaMedica = FichaMedica::create([
            'user_id' => Auth::id(), // Pega o ID do usuário logado
            'uuid' => $uuid,
            'nome_paciente' => $validatedData['nome_paciente'],
            'foto_paciente' => $fotoPath,
            'tipo_sanguineo' => $validatedData['tipo_sanguineo'],
            'alergias_graves' => $validatedData['alergias_graves'] ?? null,
            'remedios_uso_continuo' => $validatedData['remedios_uso_continuo'] ?? null,
            'nome_contato_emergencia_1' => $validatedData['nome_contato_emergencia_1'],
            'telefone_contato_emergencia_1' => $validatedData['telefone_contato_emergencia_1'],
            'nome_contato_emergencia_2' => $validatedData['nome_contato_emergencia_2'] ?? null,
            'telefone_contato_emergencia_2' => $validatedData['telefone_contato_emergencia_2'] ?? null,
        ]);

        // 4. Redirecionar com mensagem de sucesso
        return redirect()->route('dashboard')
                         ->with('success', 'Ficha Médica criada com sucesso! Grave o link na sua tag NFC.');
    }

    /**
     * Exibir a Ficha Médica Pública usando o UUID (Acessado via NFC)
     */
    public function showPublic($uuid)
    {
        // Busca a ficha pelo UUID. Se não achar, retorna 404.
        // Como a URL usa o UUID (difícil de adivinhar), apenas quem tem a tag/link consegue acessar.
        $fichaMedica = FichaMedica::where('uuid', $uuid)->firstOrFail();

        return view('fichas.public_show', compact('fichaMedica'));
    }

    /**
     * Exibir o formulário de edição de uma Ficha Médica.
     */
    public function edit($id)
    {
        $ficha = FichaMedica::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('fichas.edit', compact('ficha'));
    }

    /**
     * Atualizar uma Ficha Médica existente.
     */
    public function update(Request $request, $id)
    {
        $ficha = FichaMedica::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $validatedData = $request->validate([
            'nome_paciente' => 'required|string|max:255',
            'tipo_sanguineo' => 'required|string|max:10',
            'alergias_graves' => 'nullable|string',
            'remedios_uso_continuo' => 'nullable|string',
            'nome_contato_emergencia_1' => 'required|string|max:255',
            'telefone_contato_emergencia_1' => 'required|string|max:20',
            'nome_contato_emergencia_2' => 'nullable|string|max:255',
            'telefone_contato_emergencia_2' => 'nullable|string|max:20',
        ]);

        $ficha->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Ficha atualizada com sucesso!');
    }

    /**
     * Excluir uma Ficha Médica.
     */
    public function destroy($id)
    {
        $ficha = FichaMedica::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $ficha->delete();

        return redirect()->route('dashboard')->with('success', 'Ficha excluída com sucesso!');
    }
    /**
     * Tela de Configuração NFC
     */
    public function nfc($id)
    {
        $ficha = FichaMedica::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('fichas.nfc-write', compact('ficha'));
    }
}
