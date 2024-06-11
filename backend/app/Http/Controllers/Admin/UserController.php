<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\BaseController;
use App\Interfaces\UserRepositoryInterface;

class UserController extends BaseController
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        ){}


    public function index()
    {
        try {
            $response = $this->userRepository->getAll();
            return view('admin.users.index', ['users' => $response['data']]);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $response = $this->userRepository->findById($id);
            return view('admin.users.show', ['user' => $response['data']]);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(UserRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $response = $this->userRepository->create($validatedData);
            return redirect()->route('admin.users.index')->with('success', $response['message']);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $response = $this->userRepository->findById($id);
            return view('admin.users.edit', ['user' => $response['data']]);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }


    public function update(UserRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();
            $response = $this->userRepository->update($id, $validatedData);
            return redirect()->route('admin.users.index')->with('success', $response['message']);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $response = $this->userRepository->delete($id);
            return redirect()->route('admin.users.index')->with('success', $response['message']);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
