<?php


namespace App\Http\Controllers;


use App\Exceptions\LiteResponseException;
use App\Models\BaseModel;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends CoreController
{

    /**
     * @inheritDoc
     */
    function getModel(): BaseModel
    {
        return new Product;
    }

    /**
     * @inheritDoc
     */
    function updateRule($modelId): array
    {
        return [
            "name" => ["nullable", "string", "max:100"],
            "quantity" => ["nullable","integer", "min:0"],
        ];
    }

    /**
     * @inheritDoc
     */
    function addRule(): array
    {
        return [
            "name" => ["required", "string", "max:100"],
            "quantity" => ["required","integer", "min:0"],
        ];
    }

    /**
     * @OA\Post(
     *     path="/api/product/add",
     *   tags={"Products"},
     *   summary="Create a new product",
     *   description="Register a new product",
     *   operationId="addProduct",
     *   @OA\Parameter(
     *     name="name",
     *     required=true,
     *     in="query",
     *     description="The name of the product max:100",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="quantity",
     *     required=true,
     *     in="query",
     *     description="the number of available product",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     * @param array $data
     *
     * @return void
     */
    public function onBeforeAdd(array &$data): void
    {
        parent::onBeforeAdd($data);
    }

    /**
     * @OA\Post(
     *     path="/api/product/search",
     *   tags={"Products"},
     *   summary="Search products",
     *   description="List a product by name, id",
     *   operationId="searchProduct",
     *      @OA\Parameter(
     *     name="id",
     *     required=false,
     *     in="query",
     *     description="The id of the product needed",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="name",
     *     required=false,
     *     in="query",
     *     description="The name of the product you need",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     * @param $query
     * @param $request
     *
     * @return void
     */
    public function specificSearchCriteria($query, $request)
    {
        //In case the product is search by his id
        if ($request->has("id")) {
            $query->where("id", $request->id);
            throw new LiteResponseException(config("code.request.SUCCESS"),"",$query->first());
        }
    }

    /**
     * @OA\Post(
     *     path="/api/product/update",
     *   tags={"Products"},
     *   summary="Update and existing product",
     *   description="Update a product by his id",
     *   operationId="updateProduct",
     *    @OA\Parameter(
     *     name="id",
     *     required=true,
     *     in="query",
     *     description="The id of the product to update",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="name",
     *     required=false,
     *     in="query",
     *     description="The name of the product max:100",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="quantity",
     *     required=false,
     *     in="query",
     *     description="the number of available product",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     * @param array $data
     *
     * @return void
     */
    public function onBeforeUpdate(array &$data): void
    {
        parent::onBeforeUpdate($data);
    }

    /**
     * @OA\Post(
     *     path="/api/product/delete",
     *   tags={"Products"},
     *   summary="Delete and existing product",
     *   description="Delete a product by his id",
     *   operationId="deleteProduct",
     *    @OA\Parameter(
     *     name="id",
     *     required=true,
     *     in="query",
     *     description="The id of the product to delete",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     * @param array $data
     *
     * @return void
     */
    public function onAfterDelete(BaseModel $model)
    {
        parent::onAfterDelete($model);
    }

    /**
     * @OA\Post(
     *     path="/api/product/restore",
     *   tags={"Products"},
     *   summary="Restore a deleted product",
     *   description="Restore a product by his id",
     *   operationId="restoreProduct",
     *    @OA\Parameter(
     *     name="id",
     *     required=true,
     *     in="query",
     *     description="The id of the product to restore",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(type="string"),
     *   ),
     * )
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function restore(Request $request)
    {
        return parent::restore($request);
    }
}
