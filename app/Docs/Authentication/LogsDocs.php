<?php

namespace App\Docs\Authentication;


class LogsDocs
{

    /**
     * @OA\Get(
     *     path="/api/logs/{id}",
     *     summary="Get a log by ID or the latest 30 logs if no ID is provided",
     *     tags={"Logs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=false,
     *         description="ID of the log to retrieve. If not provided, returns the latest 30 logs.",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Log found or list of latest 30 logs",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="acao", type="string", example="Tarefa criada"),
     *                     @OA\Property(property="detalhes", type="string", example="Tarefa 1 criada. Título: Teste"),
     *                     @OA\Property(property="referencia", type="integer", example=1),
     *                     @OA\Property(property="data_hora", type="string", example="22/09/2025 02:43:45"),
     *                     @OA\Property(property="id", type="integer", example=4)
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Log not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Log not found")
     *         )
     *     )
     * )
     */

    public function index() {}
}
