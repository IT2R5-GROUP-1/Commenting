<?php

return [
    'paths' => ['api/*', 'posts/*'], // Adjust the API route paths if needed
    'allowed_methods' => ['*'],      // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)
    'allowed_origins' => ['*'],      // Allow all origins or specify the frontend origin here
    'allowed_headers' => ['*'],      // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false, // Set to true if you're using cookies with authentication
];
