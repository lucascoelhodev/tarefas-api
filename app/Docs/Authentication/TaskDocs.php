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
    /**
     * @OA\Get(
     *     path="/api/tasks/{id}",
     *     summary="Get a task by ID",
     *     tags={"Tasks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the task to retrieve",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Task found",
     *         @OA\JsonContent(ref="#/components/schemas/Task")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Task not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Task not found")
     *         )
     *     )
     * )
     */
    public function show() {}
}
