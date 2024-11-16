<?php

require_once '../models/CategoryModel.php';

class CategoryController
{
  private $categoryModel;

  public function __construct()
  {
    $this->categoryModel = new CategoryModel();
  }

  public function index()
  {
    $categories = $this->categoryModel->getAllCategories();
    include BASE_PATH . '/views/categories/list.php';
  }

  public function show()
  {
    include BASE_PATH . '/views/categories/create.php';
  }

  public function create()
  {
    $name = $_POST['name'];
    $description = $_POST['description'];

    if ($this->categoryModel->createCategory($name, $description)) {
      redirect('categories', 'success=1');
      exit;
    } else {
      redirect('categories', 'error=1');
      echo "Error creating category.";
    }
  }

  public function destroy()
  {
    $id = $_GET['id'];

    if ($this->categoryModel->deleteCategory($id)) {
      redirect('categories', 'success=3');
      exit;
    } else {
      redirect('categories', 'error=3');
    }
  }
}
