<?php
// Start the session
session_start();
// require_once 'models/UserModel.php';
// require_once 'models/Repository.php';
// $userModel = new UserModel();
// $repository = new Repository();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$userRepository = $factory->make('repository');

$userModel = $factory->make('user');

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $start = substr($id, 0, 5);

    //Get last number
    $end = substr($id, -5);

    //Replace first number with null
    $id = str_replace($start, "", $id);

    //Replace last number with null
    $newid = str_replace($end, "", $id);
    // var_dump($newid); die;
    $user = $userModel->findUserById($newid);//Update existing user
}


if (!empty($_POST['submit'])) {
    // var_dump($_id);die();
    if (!empty($newid)) {
        $userModel->updateUser($_POST);
    } else {
        $userRepository->createUser($_POST);
    }
    header('location: list_users.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

            <?php if ($user || !isset($newid)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php if(!empty($newid)){echo $newid;}else{echo $_id;} ?>">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="name">Fullname</label>
                        <input class="form-control" name="fullname" placeholder="Fullname" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input class="form-control" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="type" value="1" placeholder="Type">
                            <option value="admin" <?php if (!empty($user[0]['type'])&&$user[0]['type'] =='admin') echo "selected=\"selected\""; ?>>Admin</option>
                            <option value="user" <?php if (!empty($user[0]['type'])&&$user[0]['type'] =='user') echo "selected=\"selected\"";?> >User</option>
                            <option value="guest" <?php if (!empty($user[0]['type'])&& $user[0]['type']=='guest') echo "selected=\"selected\"";?>>Guest</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if(!empty($user[0]['password'])) echo $user[0]['password']?>">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>