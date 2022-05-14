<?php

class Controller_User extends Controller {
  public function action_list() {
    $query = DB::query("SELECT * FROM posts");
    $results = $query->execute();

    return $results[0]["title"];
  }
}
