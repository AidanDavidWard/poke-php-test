<?php
namespace App\Http\Controllers;

use App\Traits\ControllerTrait;
use Illuminate\Routing\Controller as BaseController;

class LocationController extends BaseController
{
    use ControllerTrait;

    public function index() {
        $this->processPageAndLimitParams();
        $locationListResults = $this->locationRespository->getLocationList($this->page - 1, $this->limit);
        $viewParams = [
            'locationList' => $locationListResults['results'],
            'totalNumber' => $locationListResults['count'],
            'page' => $this->page,
            'limit' => $this->limit
        ];

        return view('location.index')
            ->with($viewParams);
    }
    public function location(int $id) {
        return view('location.location')
            ->with(
                'location',
                $this->locationRespository->getLocation( $id)
            );
    }
    public function regionIndex() {
        $regionListResults = $this->regionRepository->getRegionList();
        $viewParams = [
            'regionList' => $regionListResults['results'],
            'totalNumber' => $regionListResults['count']
        ];

        return view('location.regionIndex')
            ->with($viewParams);
    }
    public function region(int $id) {
        return view('location.region')
            ->with(
                'region',
                $this->regionRepository->getRegion( $id)
            );
    }

    private function processPageAndLimitParams() {
        $this->limit = (int) $this->request->input('limit',100);
        $this->page = (int) $this->request->input('page', 1); //for display purposes. Wouldn't want them seeing page 2 as page 1
    }
}