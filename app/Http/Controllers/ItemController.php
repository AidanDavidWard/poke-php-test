<?php
namespace App\Http\Controllers;

use App\Traits\ControllerTrait;
use Illuminate\Routing\Controller as BaseController;

class ItemController extends BaseController
{
    use ControllerTrait;

    public function index() {
        $this->processPageAndLimitParams();
        $itemListResults = $this->itemRepository->getItemList($this->page - 1, $this->limit);
        $viewParams = [
            'itemList' => $itemListResults['results'],
            'totalNumber' => $itemListResults['count'],
            'page' => $this->page,
            'limit' => $this->limit
        ];

        return view('item.index')
            ->with($viewParams);
    }

    public function item(int $id) {
        return view('item.item')
            ->with(
                'item',
                $this->itemRepository->getItem($id)
            );
    }

    public function itemAttributeIndex() {
    }
    public function itemAttribute() {
    }
}