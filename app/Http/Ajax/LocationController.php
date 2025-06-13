<?php

namespace App\Http\Ajax;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $districtRepository;
    public function __construct(DistrictRepository $districtRepository) {
        $this->districtRepository = $districtRepository;
    }
    public function getLocation(Request $request){
        //lay ra id cua tinh thanh
        $provinces_id = $request->input('provinces_id'); 
        //lay ra danh sach quan huyen theo id tinh thanh
        $districts = $this->districtRepository->findDistrictByProvinceId($provinces_id);
        $response = [
            'html' => $this->renderHtml($districts),
        ];
        return response()->json($response);
    }
    public function renderHtml($districts)
    {
        $html = '<option value="0">-- Chọn quận huyện --</option>';
        foreach ($districts as $district) {
            $html .= '<option value="' . $district->code . '">' . $district->name . '</option>';
        }
        return $html;
    }


}
