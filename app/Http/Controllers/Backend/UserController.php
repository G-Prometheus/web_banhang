<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceService;
use App\Repositories\UserCatalogueRepository;
use App\Repositories\UserRepository;
class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    protected $userRepository;
    protected $userCatalogueRepository;
    public function __construct(UserService $userService,ProvinceService $provinceRepository,UserRepository $userRepository,UserCatalogueRepository $userCatalogueRepository) {
        $this-> userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->userRepository = $userRepository;
        $this->userCatalogueRepository = $userCatalogueRepository;
    }
    public function index(Request $request)
    {
        $users = $this->userService->paginate($request);
        //$users = User::paginate(15);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'
                
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ]
        ];
        $config['seo'] = config('app.user');
        $template = 'backend.user.user.index';
        return view('backend.dashboard.layout', compact('template','config','users'));
    }
    public function create()
    {
        $provinces = $this->provinceRepository->getAll();
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js'
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                
            ]
        ];
        $config['method'] = 'create';
         $config['seo'] = config('app.user');
        $template = 'backend.user.user.upsert';
        $userCatalogues = $this->userCatalogueRepository->getAll();
        return view('backend.dashboard.layout', compact('template','config','provinces','userCatalogues'));
    }
    public function store(StoreUserRequest $request)
    {
        if($this->userService->create($request)){
            return redirect()->route('user.index')->with('success', 'Thêm mới người dùng thành công');
        }
        return redirect()->back()->with('error', 'Thêm mới người dùng thất bại');
    }
    public function update(UpdateUserRequest $request, $id)
    {
        if($this->userService->update($request, $id)){
            return redirect()->route('user.index')->with('success', 'Cập nhật người dùng thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật người dùng thất bại');
    }
    public function destroy($id)
    {
        if($this->userService->destroy($id)){
            return redirect()->route('user.index')->with('success', 'Xoá người dùng thành công');
        }
        return redirect()->back()->with('error', 'Xoá người dùng thất bại');
    }
    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $provinces = $this->provinceRepository->getAll();
        $userCatalogues = $this->userCatalogueRepository->getAll();
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js'
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                
            ]
        ];
        $config['method'] = 'edit';
         $config['seo'] = config('app.user');
        $template = 'backend.user.user.upsert';
        return view('backend.dashboard.layout', compact('template','config','provinces','user','userCatalogues'));
    }
    public function delete($id)
    {
        $user = $this->userRepository->findById($id);
        $config['seo'] = config('app.user');
        $template = 'backend.user.user.delete';
        return view('backend.dashboard.layout', compact('template','user','config'));
    }

    

}
