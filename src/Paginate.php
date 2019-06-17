<?php namespace webmuscets\CustomPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginate {
  public $path = '/';
  public $items = [];
  public $page = 1;
  public $itemPerPage = 10;

  public function render() {
      $offSet = ($this->page * $this->itemPerPage) - $this->itemPerPage;
      $itemsForCurrentPage = array_slice($this->items, $offSet, $this->itemPerPage, true);

      $paginatedItems = new LengthAwarePaginator($itemsForCurrentPage, count($this->items), $this->itemPerPage, $this->page);
      
      $paginatedItems->setPath($this->path);

      return $paginatedItems;
  }

}