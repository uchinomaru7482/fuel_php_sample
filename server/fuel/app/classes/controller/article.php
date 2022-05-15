<?php

class Controller_Article extends Controller_Template
{
  public function action_index()
  {
    $this->template->title = '記事一覧';
    $this->template->content = '';
  }
}
