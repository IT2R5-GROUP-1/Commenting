<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|---------------------------------------------------------------------------
| Application Routes
|---------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Get comments for a specific post
$router->get('/posts/{postId}/comments', 'CommentController@getComments');

// Comment routes
$router->post('/posts/{postId}/comments', 'CommentController@addComment');  // To add a comment to a post
$router->post('/comments/{commentId}/reply', 'CommentController@replyToComment');  // To reply to a comment

$router->get('/comments/{commentId}/replies', 'CommentController@getReplies');
