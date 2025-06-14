<?php

namespace App\Http\Ajax;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;
use App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $districtRepository;
    protected $provinceRepository;
    public function __construct(DistrictRepository $districtRepository, ProvinceRepository $provinceRepository) {
        $this->districtRepository = $districtRepository;
        $this->provinceRepository = $provinceRepository;
    }
    public function getLocation(Request $request){
        //lay ra id cua tinh thanh
        $provinces_id = $request->input('province_id'); 
        //lay ra danh sach quan huyen theo id tinh thanh
        $province = $this->provinceRepository->findById($provinces_id, ['code', 'name'], ['districts']);
        $response = [
            'html' => $this->renderHtml($province->districts),
        ];
        return response()->json($response);
    }
    public function renderHtml($districts)
    {
        $html = '<option value="0">-- Chọn quận huyện --</option>';
        foreach ($districts as $district) {
            $html .= '<option value="'.$district->code.'">'.$district->name.'</option>';
        }
        return $html;
    }


}
