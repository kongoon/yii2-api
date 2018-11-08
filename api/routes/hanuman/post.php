<?php
return [
    /**
     * @SWG\Get(
     *     path="/v1/post",
     *     summary="Get list post",
     *     tags={"Post"},
     *     @SWG\Response(
     *         response=200,
     *         description="Post",
     *         @SWG\Schema(
     *            type="array",
     *            @SWG\Items(ref="#/definitions/Post")
     *         )
     *     ),
     *     @SWG\Response(
     *        response=401,
     *        description="Unauthorized",
     *        @SWG\Schema(ref="#/definitions/Unauthorized")
     *     )
     * )
     */
    'GET post' => 'post/index',
    /**
     * @SWG\Post(
     *     path="/v1/post",
     *     summary="Create data post",
     *     tags={"Post"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Data post",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/Createpost"),
     *     ),
     *     @SWG\Response(
     *         response=201,
     *         description="Data post",
     *         @SWG\Schema(ref="#/definitions/Post")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'POST post' => 'post/create',
    /**
     * @SWG\Put(
     *     path="/v1/post/{id}",
     *     summary="Update data post",
     *     tags={"Post"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Data post",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/Updatepost"),
     *     ),
     *     @SWG\Response(
     *         response=202,
     *         description="Data post",
     *         @SWG\Schema(ref="#/definitions/Post")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'PUT post/{id}' => 'post/update',
    /**
     * @SWG\Get(
     *     path="/v1/post/{id}",
     *     summary="Get data post",
     *     tags={"Post"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Data post",
     *         @SWG\Schema(ref="#/definitions/Post")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Resource not found",
     *         @SWG\Schema(ref="#/definitions/Not Found")
     *     )
     * )
     */
    'GET post/{id}' => 'post/view',
    /**
     * @SWG\Delete(
     *     path="/v1/post/{id}",
     *     summary="Delete data post",
     *     tags={"Post"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Response(
     *         response=202,
     *         description="Status Delete",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Resource not found",
     *         @SWG\Schema(ref="#/definitions/Not Found")
     *     )
     * )
     */
    'DELETE post/{id}' => 'post/delete',
];