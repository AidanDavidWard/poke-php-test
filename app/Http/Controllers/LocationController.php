<?php
namespace App\Http\Controllers;

use App\Repositories\LocationRepository;
use App\Repositories\RegionRepository;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application as Application;

class LocationController extends BaseController
{
    /** @var Client  $client */
    private $client;
    /** @var LocationRepository $locationRespository */
    private $locationRespository;
    /** @var RegionRepository $regionRepository */
    private $regionRepository;
    /** @var Request $request */
    private $request;
    /** @var int $page The page number for pagination */
    private $page;
    /** @var int $limit The number of results to display on page */
    private $limit;

    public function __construct(Application $app, Request $request)
    {
        $this->client = $app->make('PokeAPI\Client');
        $this->locationRespository = new LocationRepository($this->client);
        $this->regionRepository = new RegionRepository($this->client);
        $this->request = $request;
    }

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
    public function regionsIndex() {
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