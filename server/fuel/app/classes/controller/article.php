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

  public function action_view($id = 0)
  {
    $data = array();
    // 不正なIDの場合はリダイレクト
    // ここでのandの意味が謎
    $id and $data['article'] = Model_Article::find($id);
    if (!$data['article']) {
      Response::redirect('articles');
    }
    $this->template->title = $data['article']->title;
    $this->template->content = View::forge('article/view', $data);
  }
}
