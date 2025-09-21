<?php

namespace App\Interface;

interface LoggerInterface
{
    public function log(string $acao, string $detalhes, ?int $referencia = null): void;
    public function getLogs(?int $id = null): array;
}
