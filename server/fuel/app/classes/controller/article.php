<?php

class Controller_Article extends Controller_Template
{
  public function action_index()
  {
    $data = array();
    // 記事取得
    // リレーションが設定されている物はjoinして一緒に取ってくる
    $data['articles'] = Model_Article::query()->order_by('id', 'desc')->get();

    $this->template->title = '記事一覧';
    $this->template->content = View::forge('article/list', $data);
  }
}
