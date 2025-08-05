<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserCatalogueRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserCatalogueRepository;
use App\Services\UserCatalogueService;
use Illuminate\Http\Request;
use App\Services\UserService;


class UserCatalogueController extends Controller
{
    protected $userCatalogueService,$userCatalogueRepository;
    public function __construct(UserCatalogueService $userCatalogueService, UserCatalogueRepository $userCatalogueRepository) {
        $this-> userCatalogueService = $userCatalogueService;
        $this-> userCatalogueRepository = $userCatalogueRepository;
    }
    public function index(Request $request)
    {
        $userCatalogues = $this->userCatalogueService->paginate($request);
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
        $config['seo'] = config('app.usercatalogue');
        $template = 'backend.user.catalogue.index';
        return view('backend.dashboard.layout', compact('template','config','userCatalogues'));
    }
    public function create()
    {
        $config['method'] = 'create';
        $config['seo'] = config('app.usercatalogue');
        $template = 'backend.user.catalogue.upsert';
        return view('backend.dashboard.layout', compact('template','config'));
    }
    public function store(StoreUserCatalogueRequest $request)
    {
        if($this->userCatalogueService->create($request)){
            return redirect()->route('user.catalogue.index')->with('success', 'Thêm mới nhóm thành viên thành công');
        }
        return redirect()->back()->with('error', 'Thêm mới nhóm thành viên thất bại');
    }
    public function update(StoreUserCatalogueRequest $request, $id)
    {
        if($this->userCatalogueService->update($request, $id)){
            return redirect()->route('user.catalogue.index')->with('success', 'Cập nhật nhóm thành viên thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật nhóm thành viên thất bại');
    }
    public function destroy($id)
    {
        if($this->userCatalogueService->destroy($id)){
            return redirect()->route('user.catalogue.index')->with('success', 'Xoá nhóm thành viên thành công');
        }
        return redirect()->back()->with('error', 'Xoá nhóm thành viên thất bại');
    }
    public function edit($id)
    {
        $userCatalogues = $this->userCatalogueRepository->findById($id);
        $config['method'] = 'edit';
        $config['seo'] = config('app.usercatalogue');
        
        $template = 'backend.user.catalogue.upsert';
        return view('backend.dashboard.layout', compact('template','config','userCatalogues'));
    }
    public function delete($id)
    {
        $userCatalogues = $this->userCatalogueRepository->findById($id);
        $config['seo'] = config('app.usercatalogue');
        $template = 'backend.user.catalogue.delete';
        return view('backend.dashboard.layout', compact('template','userCatalogues','config'));
    }

    

}
