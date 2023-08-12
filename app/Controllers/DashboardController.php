<?php

namespace App\Controllers;

use System\Core\Controller;

class DashboardController extends Controller {

  public function __construct() {
    $this->checkAuth();
  }

    public function index() {
      view('back/dashboard/index.php');
    }

}