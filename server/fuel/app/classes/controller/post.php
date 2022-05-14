<?php

class Controller_Post extends Controller
{
  public function action_auto_insert()
  {
    // Model_Postクラスのオブジェクトを作成
    // forge()はオブジェクトを生成するメソッド
    $post = Model_Post::forge();

    $row = [];
    $row['title'] = '投稿の件名';
    $row['summary'] = '投稿の概要';
    $row['body'] = '投稿内容';

    // Model_Postクラスのオブジェクトに値をセット
    $post->set($row);

    // オブジェクトを保存する
    $post->save();

    echo "Finished!";
  }

  public function action_index()
  {
    $data = [];
    $data['rows'] = Model_Post::find_all();
    return View::forge('post/list', $data);
  }

  public function action_form()
  {
    return View::forge('post/form');
  }

  public function action_save()
  {
    $form = [];
    $form['title'] = Input::post('title');
    $form['summary'] = Input::post('summary');
    $form['body'] = Input::post('body');
    $post = Model_Post::forge();
    $post->set($form);
    $post->save();
    Response::redirect('post');
  }
}
