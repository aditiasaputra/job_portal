<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\UserRepositoryInterface;

class ManageController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function users()
    {
        $users = $this->userRepository->all('admin');
        // dd($users[0]->name);
        $title = 'User Management';
        return view('manage.user', compact('title', 'users'));
    }

    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }
        // $this->userRepository->updateCreate($request->all());
        return response()->json(['message' => "$request->name has been saved!"]);
        // return redirect()->back()->with('success', 'User has been saved!');
    }

    public function editUser($id)
    {
        return response()->json($this->userRepository->get($id));
    }

    public function deleteUser($id)
    {
        $this->userRepository->delete($id);
        return redirect()->back()->with('success', 'User has been deleted!');
    }

    public function employers()
    {
        $employers = $this->userRepository->all('employer');
        // dd($users[0]->name);
        $title = 'Employer Management';
        return view('manage.employer', compact('title', 'employers'));
    }

    public function storeEmployer(Request $request)
    {
        $this->userRepository->updateCreate($request->all());
        return redirect()->back()->with('success', 'Employer has been saved!');
    }

    public function deleteEmployer($id)
    {
        $this->userRepository->delete($id);
        return redirect()->back()->with('success', 'User has been deleted!');
    }

    public function jobseekers()
    {
        $jobseekers = $this->userRepository->all('jobseeker');
        // dd($users[0]->name);
        $title = 'Jobseeker Management';
        return view('manage.jobseeker', compact('title', 'jobseekers'));
    }

    public function storeJobseeker(Request $request)
    {
        $this->userRepository->updateCreate($request->all());
        return redirect()->back()->with('success', 'Jobseeker has been saved!');
    }

    public function deleteJobseeker($id)
    {
        $this->userRepository->delete($id);
        return redirect()->back()->with('success', 'Jobseeker has been deleted!');
    }
}
