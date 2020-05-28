<?php

namespace Core\Api\Controllers;

use App\Http\Controllers\ApiController;
use Core\Api\Models\Customer;
use Core\Api\Requests\CustomerUpdateRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Core\Api\Requests\CustomerCreateRequest;

class CustomerController extends ApiController
{
    /**
     * @return Customer[]|Collection
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * @param CustomerCreateRequest $request
     *
     * @return JsonResponse
     */
    public function store(CustomerCreateRequest $request)
    {
        $customer = Customer::create($request->all());

        return response()->json($customer);
    }

    /**
     * @param $customer
     *
     * @return JsonResponse
     */
    public function show($customer)
    {
        return Customer::findOrFail($customer);
    }

    /**
     * @param CustomerUpdateRequest $request
     * @param                       $customer
     *
     * @return JsonResponse
     */
    public function update(CustomerUpdateRequest $request, $customer)
    {
        $customer = Customer::findorFail($customer);
        $customer->update($request->all());

        return response()->json($customer);
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $customer = Customer::findorFail($id);
        $customer->delete();

        return response()->json(["success" => true]);
    }
}
