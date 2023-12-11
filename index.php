<?php
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});


$martin = new User();
$martin->setId(1);
$martin->setFirstName("Martin");
$martin->setLastName("Karadzinov");
$martin->setEmail("martin@pingdevs.com");
$martin->setPassword("temp123456");
$martin->setRoleId(1);
$martin->setImage("martin.jpg");


$hristo = new User();
$hristo->setFirstName("Hristo");
$hristo->setLastName("Krstevski");
$hristo->setEmail("hristo@pingdevs.com");
$hristo->setPassword("teemp12345");
$hristo->setRoleId(2);
$hristo->setImage("hristo.jpg");
// $hristo->save();


// echo $hristo->action();

// echo $martin->action();

// echo User::tableName();


$user = new User();
$user->setId("78");
$user->get();

$user->setEmail("petko@gmail.com");
// $user->update();



// $user->delete();






$users = new User();

$users = $users->all();

foreach($users as $user)
{
    var_dump($user["first_name"]);
}
