<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FichaMedica extends Model
{
    /**
     * Tabela associada a este model.
     */
    protected $table = 'fichas_medicas';

    /**
     * Os atributos que são assinaláveis em massa (mass assignable).
     */
    protected $fillable = [
        'user_id',
        'uuid',
        'nome_paciente',
        'foto_paciente',
        'tipo_sanguineo',
        'alergias_graves',
        'remedios_uso_continuo',
        'nome_contato_emergencia_1',
        'telefone_contato_emergencia_1',
        'nome_contato_emergencia_2',
        'telefone_contato_emergencia_2',
    ];

    /**
     * Relacionamento: Uma Ficha Médica pertence a um Usuário.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
