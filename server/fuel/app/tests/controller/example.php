<?php

class Test_Controller_Example extends TestCase
{
  public function test_example_hello()
  {
    $expected = 'hello';
    $response = Request::forge('example/hello')->set_method('get')->execute()->response();
    $assertValue = $response->body;
    $this->assertSame($expected, $assertValue);
  }
}