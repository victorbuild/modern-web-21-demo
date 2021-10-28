<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Article;
use App\Services\ArticleService;

class ArticleController extends Controller
{
  private $articleService;
  /**
   * Instantiate a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //TODO: init article service
    //$this->articleService = ;
  }
  
  public function save($title, $content) 
  {
    //TODO: save article
    //TODO: call service method after saving article
  }
}
