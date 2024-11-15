<?php
require_once '../models/ItemModel.php';

class ItemController
{
  private $model;

  public function __construct()
  {
    $this->model = new ItemModel();
  }

  public function listItems()
  {
    $items = $this->model->getAllItems();
    include '../views/items/list.php';
  }

  public function addItem()
  {
    if (isset($_POST['item_name'], $_POST['category'], $_POST['status'])) {
      $this->model->addItem($_POST['item_name'], $_POST['category'], $_POST['status']);
      redirect('items', 'success=1');
    } else {
      redirect('items', 'error=1');
    }
  }

  public function editItemView()
  {
    if (isset($_GET['id'])) {
      $item = $this->model->getItemById($_GET['id']);
      include '../views/items/edit.php';
    } else {
      redirect('items', 'error=1');
    }
  }

  public function updateItem()
  {
    if (isset($_POST['id'], $_POST['item_name'], $_POST['category'], $_POST['status'])) {
      $this->model->updateItem($_POST['id'], $_POST['item_name'], $_POST['category'], $_POST['status']);
      redirect('items', 'success=2');
    } else {
      redirect('items', 'error=2');
    }
  }

  public function deleteItem()
  {
    if (isset($_GET['id'])) {
      $this->model->deleteItem($_GET['id']);
      redirect('items', 'success=3');
    } else {
      redirect('items', 'error=3');
    }
  }
}
