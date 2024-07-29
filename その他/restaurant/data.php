<?php
require_once('food.php');
require_once('drink.php');
require_once('review.php');
require_once('user.php');

$curry= new Food('CURRY',600,'./image/curry.png',3);
$pasta= new Food('PASTA',900,'./image/pasta.png',1);
$juice= new Drink('JUICE',500,'./image/juice.png','アイス');
$coffee= new Drink('COFFEE',500,'./image/coffee.png','ホット');

$menus=array($juice,$coffee,$curry,$pasta);

$user1=new User('suzuki','male');
$user2=new User('tanaka','female');

$users=array($user1,$user2);

$review1 = new Review($juice->getName(), $user1->getId(), '果肉たっぷりのオレンジジュースです！');
$review2 = new Review($curry->getName(), $user1->getId(), '具がゴロゴロしていてとてもおいしいです');
$review3 = new Review($coffee->getName(), $user1->getId(), '香りがいいです');
$review4 = new Review($pasta->getName(), $user1->getId(), 'ソースが絶品です。また食べたい。');
$review5 = new Review($juice->getName(), $user2->getId(), '普通のジュース');
$review6 = new Review($curry->getName(), $user2->getId(), '値段の割においしいカレーだと思いました');
$review7 = new Review($coffee->getName(), $user2->getId(), '苦味がちょうどよくて、おすすめです');
$review8 = new Review($pasta->getName(), $user2->getId(), '具材にこだわりを感じました。');

$reviews = array($review1, $review2, $review3, $review4, $review5, $review6, $review7, $review8);

