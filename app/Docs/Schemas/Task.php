<?php

namespace App\Docs\Schemas;

/**
 * @OA\Schema(
 *     schema="Task",
 *     type="object",
 *     title="Task",
 *     description="Detalhes da Tarefa",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="titulo", type="string", example="Atualizar Dashboard"),
 *     @OA\Property(property="descricao", type="string", example="Atualizar a dashboard"),
 *     @OA\Property(property="status", type="integer", example=1),
 *     @OA\Property(property="status_label", type="string", example="Pendente")
 * )
 */

class Task {}
