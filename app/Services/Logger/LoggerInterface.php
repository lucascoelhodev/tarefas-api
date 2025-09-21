<?php

namespace App\Services\Logger;

interface LoggerInterface
{
    public function log(string $acao, string $detalhes, ?int $referencia = null): void;
}
