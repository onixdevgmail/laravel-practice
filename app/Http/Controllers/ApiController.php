<?php


namespace App\Http\Controllers;


class ApiController extends Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Laravel Practise API Documentation",
     *      @OA\Contact(
     *          email="onix.develop@gmail.com"
     *      ),
     * )
     *
     *
     * @OA\Get(
     *     path="/core-api/api/customer",
     *     tags={"Customers"},
     *     summary="Get list of customers",
     *     @OA\Response(response="200", description="Get list of customers"),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     * @OA\Post(
     *      path="/core-api/api/customer",
     *      tags={"Customers"},
     *      summary="Store new customer",
     *      description="Returns customer data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={"firstName": "firstName", "lastName": "lastName", "dateOfBirth":"2020-01-01"}
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Get list of customer",
     *          @OA\JsonContent()
     *       ),
     *     @OA\Response(response="422", description="The given data was invalid"),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     * @OA\Get(
     *      path="/core-api/api/customer/{id}",
     *      tags={"Customers"},
     *      summary="Get customer information",
     *      description="Returns customer data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     *
     * @OA\Put(
     *      path="/core-api/api/customer/{id}",
     *      tags={"Customers"},
     *      summary="Update existing customer",
     *      description="Returns updated customer data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={"firstName": "firstName", "lastName": "lastName", "dateOfBirth":"2020-01-01"}
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *     @OA\Response(response="422", description="The given data was invalid"),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     *
     * @OA\Delete(
     *      path="/core-api/api/customer/{id}",
     *      tags={"Customers"},
     *      summary="Delete existing customer",
     *      description="Deletes a customer",
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     *
     *
     *
     *
     *
     *
     *
     * @OA\Get(
     *     path="/core-api/api/product",
     *     tags={"Products"},
     *     summary="Get list of products",
     *     @OA\Response(response="200", description="Get list of products"),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     * @OA\Post(
     *      path="/core-api/api/product",
     *      tags={"Products"},
     *      summary="Store new product",
     *      description="Returns product data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={"customer_id": 1, "status": "new", "issn":"123456", "name":"New Product"}
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Get list of product",
     *          @OA\JsonContent()
     *       ),
     *     @OA\Response(response="422", description="The given data was invalid"),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     * @OA\Get(
     *      path="/core-api/api/product/{id}",
     *      tags={"Products"},
     *      summary="Get product information",
     *      description="Returns product data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     *
     * @OA\Put(
     *      path="/core-api/api/product/{id}",
     *      tags={"Products"},
     *      summary="Update existing product",
     *      description="Returns updated product data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={"customer_id": 1, "status": "new", "issn":"123456", "name":"New Product"}
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *     @OA\Response(response="422", description="The given data was invalid"),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     *
     * @OA\Delete(
     *      path="/core-api/api/product/{id}",
     *      tags={"Products"},
     *      summary="Delete existing product",
     *      description="Deletes a product",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *     @OA\Response(response="404", description="Resource not found"),
     * )
     */
}
