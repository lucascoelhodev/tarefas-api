<?php

namespace App\Docs\Authentication;


class TaskDocs
{
    /**
     * @OA\Post(
     *     path="/api/tasks",
     *     summary="Create a new task",
     *     tags={"Tasks"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"titulo", "descricao"},
     *              @OA\Property(property="titulo", type="string", example="Atualizar Dashboard"),
     *              @OA\Property(property="descricao", type="string", example="Atualizar a dashboard"),
     *              @OA\Property(property="status", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Task created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="task", ref="#/components/schemas/Task")
     *         )
     *     ),
     *     @OA\Response(
     * response=422,
     * description="Validation error",
     *@OA\JsonContent(
     *   @OA\Property(
     *      property="errors",
     *      type="object",
     *      example={
     *          "titulo": {"The titulo field is required."},
     *          "status": {"The selected status is invalid."}
     *          }
     *      )
     *   )
     *)
     * )
     */
    public function create() {}
}
