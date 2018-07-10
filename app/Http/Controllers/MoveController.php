<?php
namespace App\Http\Controllers;

use App\Traits\ControllerTrait;
use Illuminate\Routing\Controller as BaseController;

class MoveController extends BaseController
{
    use ControllerTrait;

    public function index() {
        $this->processPageAndLimitParams();
        $moveListResults = $this->moveRepository->getMoveList($this->page - 1, $this->limit);
        $viewParams = [
            'moveList' => $moveListResults['results'],
            'totalNumber' => $moveListResults['count'],
            'page' => $this->page,
            'limit' => $this->limit
        ];

        return view('move.index')
            ->with($viewParams);
    }

    public function move(int $id) {
        return view('move.move')
            ->with(
                'move',
                $this->moveRepository->getMove($id)
            );
    }

    public function categoryIndex() {
        $this->processPageAndLimitParams();
        $moveCategoryListResults = $this->moveCategoryRepository->getMoveCategoryList($this->page - 1, $this->limit);
        $viewParams = [
            'moveCategory' => $moveCategoryListResults['results'],
            'totalNumber' => $moveCategoryListResults['count'],
            'page' => $this->page,
            'limit' => $this->limit
        ];

        return view('move.moveCategoryIndex')
            ->with($viewParams);
    }

    public function category(int $id) {
        return view('move.moveCategory')
            ->with(
                'moveCategory',
                $this->moveCategoryRepository->getMoveCategory($id)
            );
    }
}