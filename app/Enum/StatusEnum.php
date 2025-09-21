<?php

namespace App\Enum;

use BenSampo\Enum\Enum;

class StatusEnum extends Enum
{
    public const PENDENTE = 1;
    public const EM_PROGRESSO = 2;
    public const CONCLUIDO = 3;

    public function label(): string
    {
        return match($this->value) {
            StatusEnum::PENDENTE => 'Pendente',
            StatusEnum::EM_PROGRESSO => 'Em progresso',
            StatusEnum::CONCLUIDO => 'Concluído',
        };
    }
}
