<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

/**
* Test case Okie
*/
public function testSumOk()
{
$userModel = new UserModel();
$a = 1;
$b = 2;
$expected = 3;//Tự tính

$actual = $userModel->sumb($a,$b);//Kết quả của Chương trình gọi

$this->assertEquals($expected, $actual);
}
// public function testFindUserByIdWithOK()
// {
//   $userModel = new UserModel();
//   $expected = [
//     "id" => 91,
//     "name" => "test",
//     "fullname" => "test",
//     "email" => "test@gmail.com",
//     "type" => "user",
//     "password" => "12",
//     "version" => "1",
//   ];
//   $actual = $userModel->findUserById(91);
//   $this->assertEquals($expected, $actual[0]);
// }
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
  // public function testFindUserNameWithOK()
  // {
  //   $userModel = new UserModel();
  //   $expected = [
  //     "id" => 91,
  //     "name" => "test2",
  //     "fullname" => "test2",
  //     "email" => "test2@gmail.com",
  //     "type" => "user",
  //     "password" => "hghh",
  //     "vesion" => "1",
  //   ];
  //   $keyword = "test2";
  //   $actual = $userModel->findUser($keyword);
  //   var_dump($actual);die();
  //   $this->assertEquals($expected, $actual[0]["name"]);
  //   }
  // public function testFindUserEmailWithOK()
  // {
  //   $userModel = new UserModel();
  //   $expected = [
  //     "id" => 91,
  //     "name" => "test2",
  //     "fullname" => "test2",
  //     "email" => "test2@gmail.com",
  //     "type" => "user",
  //     "password" => "hghh",
  //     "vesion" => "1",
  //   ];
  //   $keyword = "test2@gmail.com";
  //   $actual = $userModel->findUser($keyword);
  //   $this->assertEquals($expected, $actual[0]["email"]);
  // }
  public function testFindUserByIdWithNullkeyword()
  {
    $userModel = new UserModel();
    $expected = false;
    $keyword = null;
    $actual = $userModel->findUser($keyword);
    $this->assertEquals($expected, $actual);
  }



 //finduser
  public function testFindUsersOk()
  {
    $user = new UserModel();
    $keys = "a";
    $actual = $user->findUser($keys);
    if (empty($actual)) {
      $this->assertTrue(true);
      } else {
        $this->assertTrue(false);
      }
  }
  public function testFindUserNg()
    {
      $user = new UserModel();
      $keys = "45125215sad";

      $actual = $user->findUser($keys);
      if (empty($actual)) {
        $this->assertTrue(true);
        } else {
          $this->assertTrue(false);
        }
    }
  // public function testFindUserNull()
  //   {
  //     $user = new UserModel();
  //     $keys = null;

  //     $actual = $user->findUser($keys);
  //     if (empty($actual)) {
  //         $this->assertTrue(true);
  //     } else {
  //         $this->assertTrue(false);
  //     }
  //   }
  public function testFindUserNumber()
    {
      $user = new UserModel();
      $keys = 123;

      $actual = $user->findUser($keys);
      if (empty($actual)) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
    }
      //update
  public function testUpdateUserOk()
    {
      $user = new UserModel();
      $input = [];
          $input['id'] = 91;
          $input['name'] = "test";
          $input['fullname'] = "test";
          $input['email'] = "test@gmail.com";
          $input['type'] = "user";
          $input['password'] = "5435";
          $input['vesion'] = 1;
      $actual = $user->updateUser($input);

      if ($actual == true) {
          return $this->assertTrue(true);
      }
        return $this->assertTrue(false);
    }
 
  public function testUpdatetUserOk()
      {
        $user = new UserModel();
        $input = [];
            $input['id'] = 85;
            $input['name'] = "sdgh";
            $input['fullname'] = "test";
            $input['email'] = "test@gmail.com";
            $input['type'] = "user";
            $input['password'] = "5435";
            $input['vesion'] = 1;
        $actual = $user->insertUser($input);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
      public function testUpdateUserIdNull()
      {
          $user = new UserModel();
          $input = [];
          $input['id'] = null;
          $input['name'] = "test";
          $input['fullname'] = "test";
          $input['email'] = "test@gmail.com";
          $input['type'] = "user";
          $input['password'] = "566";
          $input['vesion'] = "1";
          $actual = $user->updateUser($input);

          // var_dump($actual);die();
          $expected = false;
          $this->assertEquals($expected, $actual);
      }
      public function testUpdateUserIntNotOk()
    {
      $user = new UserModel();
      $input = [];
          $input['name'] = 2421;
          $input['name'] = 2421;
          $input['fullname'] = "test";
          $input['email'] = "test@gmail.com";
          $input['type'] = "user";
          $input['password'] = "5435";
          $input['vesion'] = 1;
      $actual = $user->insertUser($input);
      $expected = false;
      $this->assertEquals($expected, $actual);
    }

      //delete
      public function testdeleteUserIdOk()
      {
          $user = new UserModel();
          $actual = $user->deleteUserById(103);
         //  var_dump($actual);die();
         $expected = true;
          $this->assertEquals($expected, $actual);
      }
      public function testdeleteUserIdNullNotOk()
      {
          $user = new UserModel();
          $actual = $user->deleteUserById('');
          // var_dump($actual);die();
         $expected = false;
          $this->assertEquals($expected, $actual);
      }
      public function testdeleteUserIdSoAmNotOk()
      {
          $user = new UserModel();
          $actual = $user->deleteUserById(-2);
          // var_dump($actual);die();
         $expected = false;
          $this->assertEquals($expected, $actual);
      }
      public function testdeleteUserIdArrayNotOk()
      {
          $user = new UserModel();
          $arr = [];
          $actual = $user->deleteUserById($arr);
          // var_dump($actual);die();
         $expected = false;
          $this->assertEquals($expected, $actual);
      }
      public function testdeleteUserIdBoolNotOk()
      {
          $user = new UserModel();
          $ob = true;
          $actual = $user->deleteUserById($ob);
          // var_dump($actual);die();
         $expected = false;
          $this->assertEquals($expected, $actual);
      }
      public function testdeleteUserIdStringNotOk()
      {
          $user = new UserModel();
          $ob = true;
          $actual = $user->deleteUserById($ob);
          // var_dump($actual);die();
         $expected = false;
          $this->assertEquals($expected, $actual);
      }
      public function testInsertUserOk()
      {
        $user = new UserModel();
        $input = [];
            $input['name'] = "test";
            $input['fullname'] = "test";
            $input['email'] = "test@gmail.com";
            $input['type'] = "user";
            $input['password'] = "5435";
            $input['vesion'] = 1;
        $actual = $user->insertUser($input);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    public function testInsertUserNullNotOk()
    {
      $user = new UserModel();
      $input = [];
          $input['name'] = null;
          $input['fullname'] = "test";
          $input['email'] = "test@gmail.com";
          $input['type'] = "user";
          $input['password'] = "5435";
          $input['vesion'] = 1;
      $actual = $user->insertUser($input);
      $expected = false;
      $this->assertEquals($expected, $actual);
    }
    public function testInsertUserIntNotOk()
    {
      $user = new UserModel();
      $input = [];
          $input['name'] = 2421;
          $input['fullname'] = "test";
          $input['email'] = "test@gmail.com";
          $input['type'] = "user";
          $input['password'] = "5435";
          $input['vesion'] = 1;
      $actual = $user->insertUser($input);
      $expected = false;
      $this->assertEquals($expected, $actual);
    }
    public function testInsertUserBoolNotOk()
    {
      $user = new UserModel();
      $input = [];
          $input['name'] = true;
          $input['fullname'] = "test";
          $input['email'] = "test@gmail.com";
          $input['type'] = "user";
          $input['password'] = "5435";
          $input['vesion'] = 1;
      $actual = $user->insertUser($input);
      $expected = false;
      $this->assertEquals($expected, $actual);
    }
    public function testInsertUserArrayNotOk()
    {
      $user = new UserModel();
      $input = [];
          $input['name'] = [];
          $input['fullname'] = "test";
          $input['email'] = "test@gmail.com";
          $input['type'] = "user";
          $input['password'] = "5435";
          $input['vesion'] = 1;
      $actual = $user->insertUser($input);
      $expected = false;
      $this->assertEquals($expected, $actual);
    }
    public function testInsertUserObjectNotOk()
    {
      $user = new UserModel();
      $input = [];
          $input['name'] = new DateTime();
          $input['fullname'] = "test";
          $input['email'] = "test@gmail.com";
          $input['type'] = "user";
          $input['password'] = "5435";
          $input['vesion'] = 1;
      $actual = $user->insertUser($input);
      $expected = false;
      $this->assertEquals($expected, $actual);
    }
  }