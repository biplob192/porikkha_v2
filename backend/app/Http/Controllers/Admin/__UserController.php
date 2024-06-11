<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\BaseController;
use App\Interfaces\UserRepositoryInterface;

class UserController extends BaseController
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        ){ }


    public function index()
    {
        try {
            $response = $this->userRepository->getAll();
            return $this->sendResponse($response['data'], $response['message']);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }


    public function show($id)
    {
        try {
            $response = $this->userRepository->findById($id);
            return $this->sendResponse($response['data'], $response['message']);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }


    public function store(UserRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $response = $this->userRepository->create($validatedData);
            return $this->sendResponse($response['data'], $response['message'], $response['status']);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }


    public function update(UserRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();
            $response = $this->userRepository->update($id, $validatedData);
            return $this->sendResponse($response['data'], $response['message']);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }


    public function destroy($id)
    {
        try {
            $response = $this->userRepository->delete($id);
            return $this->sendResponse($response['data'], $response['message']);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }
}
