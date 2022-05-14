<?php

// Model_CrudにCRUDを行う為のメソッドが用意されている
class Model_Post extends Model_Crud {
  protected static $_table_name = 'posts';
  protected static $_primary_key = 'id';
}
