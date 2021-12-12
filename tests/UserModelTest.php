<?php
use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

  public function Sumb($a, $b)
  {
    return $a+$b;
  }
  public function testSumOk(){
    $userModel = new UserModel();
    $a =1;
    $b =2;
    $expected=3;
    $actual = $userModel->sumb($a,$b);
    $this->assertEquals($expected,$actual);
}
public function testFindUserByIdWithOK()
{
  $userModel = new UserModel();
  $expected = [
    "id" => 235,
    "name" => "nhom 20",
    "fullname" => "nguyen trong tin",
    "email" => "caoxuany16051980@gmail.com",
    "type" => "admin",
    "password" => "123465",
    "version" => "1",
  ];
  $actual = $userModel->findUserById(235);
  $this->assertEquals($expected, $actual[0]);
}
public function testFindUserByIdWithNullId()
  {
    $userModel = new UserModel();
    $expected = false;
    $actual = $userModel->findUserById(null);
    $this->assertEquals($expected, $actual);
  }

public function testFindUserByIdWithcharaterNotOk()
  {
    $userModel = new UserModel();
    $expected = false;
    $actual = $userModel->findUserById("a");
    $this->assertEquals($expected, $actual);
  }
  public function testFindUserByIdNotOk()
  {
    $userModel = new UserModel();
    $expected = false;
    $actual = $userModel->findUserById(-12);
    $this->assertEquals($expected, $actual);
  }
  public function testFindUserByIdObjectNotOk()
  {
    $userModel = new UserModel();
    $object = (object)12;
    $expected = false;
    //var_dump($object);die();
    $actual = $userModel->findUserById($object);
    $this->assertEquals($expected, $actual);
  }
}
?>
