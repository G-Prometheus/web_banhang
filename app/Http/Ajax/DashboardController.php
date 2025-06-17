<?php

namespace App\Http\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
        
    }
    
    public function changeStatus(Request $request){
        $post = $request->input();
        $serviceInstanceNamespace = '\App\Services\\' . ucfirst($post['service']) . 'Service';
        if(class_exists($serviceInstanceNamespace)){
            $serviceInstance = app($serviceInstanceNamespace);
        }
        $serviceInstance->updateStatus($post);
    }
    
    


}
