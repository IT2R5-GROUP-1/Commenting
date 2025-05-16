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

// app/routes/web.php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Get comments for a specific post
$router->get('/posts/{postId}/comments', 'CommentController@getComments');

// Add a comment to a post
$router->post('/posts/{postId}/comments', 'CommentController@addComment');  // Ensure this route is here

// Reply to a comment
$router->post('/comments/{commentId}/reply', 'CommentController@replyToComment'); 

// Get replies for a comment
$router->get('/comments/{commentId}/replies', 'CommentController@getReplies');

// Test model
$router->get('/test-comment', 'CommentController@testModel');

