<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
 
require 'vendor/autoload.php';
require 'db.php';
require 'subject.php';
require 'quiz.php';
require 'exam.php';
require 'member.php';
require 'memberanswer.php';
require 'user.php';
require 'ranking.php';
 
$app = new \Slim\App();
//Routes
//Subject
$app->group('/Subject', function () use ($app) {
    $app->get('/subjects', 'getSubjects');
    $app->get('/subject/{id}', 'getSubject');
});
//Quiz
$app->group('/Quiz', function () use ($app) {
    $app->get('/quizs', 'getQuizs');
    $app->get('/quiz/{id}', 'getQuizsBySubjID');
});
//Example
$app->group('/Exam', function () use ($app) {
    $app->get('/exams', 'getExams');
    $app->get('/quiz/{id}/exam', 'getExamsByQuizID');
});
//Member
$app->group('/Member', function () use ($app) {
    $app->get('/members', 'getMembers');
    $app->get('/member/{id}', 'getMember');
    $app->post('/member', 'addMember');
});
//Member Answer
$app->group('/MemberAnswer', function () use ($app) {
    $app->get('/memanswers', 'getMemAnswers');
    $app->get('/member/{id1}/quiz/{id2}/memanswer', 'getMemAnswer');
    $app->post('/member/{id1}/quiz/{id2}/memanswer', 'addMemAnswer');
    $app->put('/member/{id1}/quiz/{id2}/memanswer', 'updateMemAnswer');
});
//User
$app->group('/User', function () use ($app) {
    $app->get('/users', 'getUsers');
    $app->get('/user/{id}', 'getUserByID');
    $app->get('/quiz/{id}/user', 'getUserByQuizID');
});
//Ranking
$app->group('/Ranking', function () use ($app) {
    $app->get('/rankings', 'getRankings');
    $app->get('/member/{id1}/quiz/{id2}/ranking', 'getRankingByID');
    $app->post('/member/{id1}/quiz/{id2}/ranking', 'addRankingByID');
});

$corsOptions = array(
    "origin" => "*",
    "exposeHeaders" => array("Content-Type", "X-Requested-With", "X-authentication", "X-client"),
    "allowMethods" => array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS')
);
$cors = new \CorsSlim\CorsSlim($corsOptions);
 
$app->add($cors);

$app->run();
?>