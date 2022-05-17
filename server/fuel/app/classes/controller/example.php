<?php

class Controller_Example extends Controller
{
  // パラメータの受け取り
  public function action_params()
  {
    $data = [];
    $data['params'] = $this->request->route->method_params;
    return View::forge('params', $data);
  }

  public function action_hello()
  {
    return 'hello';
  }
}
