<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        if(is_int($id) && $id != null && $id > 0 && !is_object($id)){
             $sql = 'SELECT * FROM users WHERE id = '.$id;
            $user = $this->select($sql);
            return $user;
        }else{
            return false;
        }
       
    }

    public function findUser($keyword) {
        if(is_string($keyword)&& $keyword != null){
        //   var_dump(is_string($keyword));die();
        $sql = "SELECT * FROM users WHERE name LIKE '".$keyword. "'" . " OR email LIKE " .$keyword;
        $user = $this->select($sql);
        //var_dump( $sql);die();

        return $user;
    }else{
        return false;
    }
}

    public function auth($userName, $password) {
        $md5Password = $password;
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        if(!is_null($id) && $id > 0 &&
            !is_array($id) && !is_bool($id) && !is_string($id)){
            $sql = 'DELETE FROM users WHERE id = '.$id;
            return $this->delete($sql);
        }else{
            return false;
        }

    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        if(!is_null($input["name"]) &&
        !is_int($input["name"]) &&
        !is_bool($input["name"]) &&
        !is_array($input["name"]) &&
        !is_object($input["name"])){
             $sql = 'UPDATE users SET 
                 name = "' . $input['name'] .'", 
                 fullname = "' . $input['fullname'] .'",
                 email = "' . $input['email'] .'",
                 type = "' . $input['type'] .'",
                 password="'. md5($input['password']) .'"
                WHERE id = ' . $input['id'];
        $user = $this->update($sql);

        return $user;
        }else{
            return false;
        }
       
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        if(!is_null($input["name"]) &&
        !is_int($input["name"]) &&
        !is_bool($input["name"]) &&
        !is_array($input["name"]) &&
        !is_object($input["name"])){       
            $sql = "INSERT INTO `app_web1`.`users` (`name`, `fullname`, `email`, `type`, `password`) VALUES (" .
                    "'" . $input['name'] . "', '".$input['fullname']."', '".$input['email']."', '".$input['type']."', '".$input['password']."')";

            $user = $this->insert($sql);

            return $user;
        }else{
            return false;
        }
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';
        } else {
            $sql = 'SELECT * FROM users';
        }

        $users = $this->select($sql);

        return $users;
    }
    public function sumb($a , $b){
        return $a + $b;
    }
}