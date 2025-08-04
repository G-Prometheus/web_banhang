<?php

namespace App\Services;


use App\Repositories\UserCatalogueRepository;
use App\Services\Interfaces\UserCatalogueServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserCatalogueService implements UserCatalogueServiceInterface
{
    /**
     * Create a new class instance.
     */
    protected $userCatalogueRepository;
    public function __construct(UserCatalogueRepository $userCatalogueRepository)
    {
        $this->userCatalogueRepository = $userCatalogueRepository;
    }
    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $perpage = $request->integer('perpage');
        $users = $this->userCatalogueRepository->pagination(['id','email','phone','address','name','status'],$condition,[],['path'=>'user/index'],$perpage);   
        return $users;
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send', 're_password']);
            $payload['birthday'] = $this->converBirthdayDate($payload['birthday']);
            $payload['password'] = Hash::make($payload['password']);

            $user = $this->userCatalogueRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
    public function update($request,$id)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            $payload['birthday'] = $this->converBirthdayDate($payload['birthday']);
            $user = $this->userCatalogueRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->userCatalogueRepository->delete($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
    private function converBirthdayDate($birthday = '')
    {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday = $carbonDate->format('Y-m-d');
        return $birthday;
    }
    public function updateStatus($post = []){
        DB::beginTransaction();
        try {
            $payload[$post['field']] = (($post['value'] == 1) ? 0 : 1);
            $user = $this->userCatalogueRepository->update($post['modelId'], $payload);
            echo 123;
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }

    }
}
