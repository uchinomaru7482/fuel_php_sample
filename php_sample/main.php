<?php

// PHP基本構文に関するサンプル

// 変数
$hoge = "hello world";
echo "-- 変数 --" . PHP_EOL;
echo "変数を展開{$hoge}" . PHP_EOL;

// 配列
$array = ["hoge", "huga", 100];
echo "-- 配列 --" . PHP_EOL;
echo $array[1] . PHP_EOL;
$array[2] = 10000;
echo $array[2] . PHP_EOL;

// 連想配列
$associativeArray = [
  "a" => "hoge",
  "b" => "huga",
  "c" => 100
];
echo "-- 連想配列 --" . PHP_EOL;
echo $associativeArray["a"] . PHP_EOL;
$associativeArray["b"] = 9999;
echo $associativeArray["b"] . PHP_EOL;

// if文
$ifValue = 100;
echo "-- if文 --" . PHP_EOL;
if ($ifValue === 100) {
  echo "true" . PHP_EOL;
} else {
  echo "false" .PHP_EOL;
}

// for文
echo "-- for文 --" . PHP_EOL;
for ($i = 0; $i < 3; $i++) {
  echo $i . PHP_EOL;
}

$list = ["hoge", "huga", "piyo"];
foreach ($list as $val) {
  echo $val . PHP_EOL;
}

// 関数
function hogeFunc($name) {
  echo "-- 関数 --" . PHP_EOL;
  echo "名前：{$name}" . PHP_EOL;
}
hogeFunc("Tanaka");

// クラス
class HogeClass {
  public $huga = "HogeClass var huga";

  public function HogeClassFunc() {
    echo "hoge class func" . PHP_EOL;
  }
}
echo "-- クラス --" . PHP_EOL;
$hogeClass = new HogeClass();
echo $hogeClass->huga.PHP_EOL;
$hogeClass->HogeClassFunc();

// 継承
class ChildClass extends HogeClass {
  public $child = "ChildClass var child";

  public function ChildClassFunc() {
    echo "child class func".PHP_EOL;
  }

  public function HogeClassFunc() {
    echo "hogehogehoge".PHP_EOL;
  }
}
echo "-- 継承 --".PHP_EOL;
$childClass = new ChildClass();
echo $childClass->huga.PHP_EOL;
echo $childClass->child.PHP_EOL;
$childClass->ChildClassFunc();
$childClass->HogeClassFunc();

// 抽象クラス
abstract class AbstractClass {
  abstract protected function getClassName();

  public function thisClass() {
    echo $this->getClassName().PHP_EOL;
  }
}
class PiyoClass extends AbstractClass {
  protected function getClassName() {
    return "PiyoClass";
  }
}
echo "-- 抽象クラス --".PHP_EOL;
$piyoClass = new PiyoClass();
$piyoClass->thisClass();
