<?php

class Controller_Article extends Controller_Template
{
  private $per_page = 3;

  public function before()
  {
    parent::before();
    // 未認証状態でリクエストのアクションがlogin, index, view以外ならリダイレクト
    if (!Auth::check() and !in_array(Request::active()->action, array('login', 'index', 'view'))) {
      Response::redirect('article/login');
    }
  }

  public function action_index()
  {
    $data = array();

    // ページネーションの設定
    $count = Model_Article::count();
    $config = array(
      'pagination_url' => 'article/index',
      // article/index/1 で数字が3番目に来るから3
      'uri_segment' => 3,
      'num_links' => 4,
      'per_page' => $this->per_page,
      'total_items' => $count,
    );
    $pagination = Pagination::forge('article_pagination', $config);

    // 記事取得
    // リレーションが設定されている物はjoinして一緒に取ってくる
    $data['articles'] = Model_Article::query()->order_by('id', 'desc')->limit($this->per_page)->offset($pagination->offset)->get();

    $this->template->title = '記事一覧';
    $this->template->content = View::forge('article/list', $data);
    $this->template->content->set_safe('pagination', $pagination);
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

  public function action_create()
  {
    $article = Model_Article::forge();
    // ログイン中のユーザIDを設定
    $article->user_id = Arr::get(Auth::get_user_id(), 1);

    // カテゴリチェックボックス用オプション配列
    $categories = Model_Category::find('all');
    $category_options = array();
    foreach ($categories as $category) {
      $category_options[$category->id] = $category->name;
    }

    // Fieldsetオブジェクトにモデルを登録
    $fieldset = Fieldset::forge()->add_model('Model_Article');

    // カテゴリチェックボックスとボタンを登録
    $fieldset->add_before('category_id', 'カテゴリ', array('type' => 'checkbox', 'options' => $category_options), array(), 'title')->add_after('submit', '', array('type' => 'submit', 'value' => '投稿'), array(), 'body');

    // モデルの値をFieldsetに登録
    $fieldset->populate($article, true);

    // validationの実行
    if ($fieldset->validation()->run()) {
      // validationに成功したフィールドの読み込み
      $fields = $fieldset->validated();

      $article = Model_Article::forge();
      $article->title = $fields['title'];
      $article->body = $fields['body'];
      $article->user_id = $fields['user_id'];

      // カテゴリIDからカテゴリオブジェクトを生成して$categoriesプロパティに設定
      if ($fields['category_id']) {
        foreach ($fields['category_id'] as $category_id) {
          $category = Model_Category::find($category_id);
          if ($category) {
            $article->categories[] = $category;
          }
        }
      }

      if ($article->save()) {
        Response::redirect('article/view/' . $article->id);
      }
    }

    // 最初にアクセスした際にはフォームを表示
    $this->template->title = '新規投稿';
    $this->template->set('content', $fieldset->build(), false);
  }

  public function action_login()
  {
    // ログイン済ならリダイレクト
    Auth::check() and Response::redirect('articles');

    $data = array();

    $auth = Auth::instance();
    // usernameとpasswordがPOSTされているなら認証する
    if (Input::post('username') and Input::post('password')) {
      $username = Input::post('username');
      $password = Input::post('password');
      // これは必要？
      $auth = Auth::instance();

      // 認証
      if ($auth->login($username, $password)) {
        Response::redirect('article');
      } else {
        // 認証失敗時はビューに$errorをセット
        $data['error'] = true;
      }
    }

    $this->template->title = 'ログイン';
    $this->template->content = View::forge('article/login');
  }

  public function action_logout()
  {
    // ログアウト
    $auth = Auth::instance();
    $auth->logout();
    Response::redirect('article');
  }
}
