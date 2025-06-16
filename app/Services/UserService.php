<?php

namespace App\Services;


use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService implements UserServiceInterface
{
    /**
     * Create a new class instance.
     */
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function paginate()
    {
        $users = $this->userRepository->getAllPaginate();
        return $users;
    }
    public function create(Request $request){
        DB::beginTransaction();
        try{
            $paload = $request->except(['_token','send','re_password']);
            $carbonDate = Carbon::createFromFormat('Y-m-d', $paload['birthday']);
            $paload['birthday'] = $carbonDate->format('Y-m-d');
            $paload['password'] = Hash::make($paload['password']);

            $user = $this->userRepository->create($paload);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
}
