<?php


namespace App\Http\Controllers;


use App\Exceptions\LiteResponseException;
use App\Models\BaseModel;
use App\Models\Component;
use App\Models\Product;
use Illuminate\Http\Request;

class ComponentController extends CoreController
{

    /**
     * @inheritDoc
     */
    function getModel(): BaseModel
    {
        return new Component;
    }

    /**
     * @inheritDoc
     */
    function updateRule($modelId): array
    {
        return [
            "product_id" => ["nullable", "exists:products,id"],
            "component_id" => ["nullable", "exists:products,id"],
        ];
    }

    /**
     * @inheritDoc
     */
    function addRule(): array
    {
        return [
            "product_id" => ["required", "exists:products,id"],
            "component_id" => ["required", "exists:products,id"],
        ];
    }

    /**
     * @OA\Post(
     *     path="/api/component/add",
     *   tags={"Components"},
     *   summary="Create a new component",
     *   description="To create a product we may be need component to get it ready",
     *   operationId="addComponent",
     *   @OA\Parameter(
     *     name="product_id",
     *     required=true,
     *     in="query",
     *     description="The id of the product",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="component_id",
     *     required=true,
     *     in="query",
     *     description="The id of the component required to build the product",
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
        if (Product::hasAsComponent($data["component_id"], $data["product_id"])) {
            throw new LiteResponseException(config("code.request.EXCEPTION"), "Sorry but this product is use by this component. You can't assign component to a product with a product (this component) which as this product as component");
        }

        if ($data["component_id"] == $data["product_id"]) {
            throw new LiteResponseException(config("code.request.EXCEPTION"), "Sorry but you can use the same product as component");
        }
    }

    /**
     * @OA\Post(
     *     path="/api/component/update",
     *   tags={"Components"},
     *   summary="Update and existing component",
     *   description="Update a component by his id",
     *   operationId="updateComponent",
     *    @OA\Parameter(
     *     name="id",
     *     required=true,
     *     in="query",
     *     description="The id of the component to update",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="product_id",
     *     required=false,
     *     in="query",
     *     description="The id of the product",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="component_id",
     *     required=false,
     *     in="query",
     *     description="The id of the component required to build the product",
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
     *     path="/api/component/delete",
     *   tags={"Components"},
     *   summary="Delete and existing component",
     *   description="Delete a component by his id",
     *   operationId="deleteComponent",
     *    @OA\Parameter(
     *     name="id",
     *     required=true,
     *     in="query",
     *     description="The id of the component to delete",
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
     *     path="/api/component/restore",
     *   tags={"Components"},
     *   summary="Restore a deleted component",
     *   description="Restore a component by his id",
     *   operationId="restoreComponent",
     *    @OA\Parameter(
     *     name="id",
     *     required=true,
     *     in="query",
     *     description="The id of the component to restore",
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
