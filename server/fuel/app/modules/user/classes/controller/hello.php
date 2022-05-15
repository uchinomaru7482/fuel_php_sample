<?php
// クラス名の衝突を避ける為、モジュール名と同じ名前空間を設定する
namespace User;
// モジュール外のクラスについては、ルート名前空間から指定する必要がある
class Controller_Hello extends \Controller
{
  // baseURL/user/hello　でアクセス可能
  function action_index()
  {
    return \Response::forge('Hello!');
  }
}
