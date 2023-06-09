<?php

/**
 * In the name of Allah, Most Gracious, Most Merciful
 *
 * MIRANA-DZ LOCALHOST TOOLS - A set of tools for helping development.
 *
 * @author        MIRANA-DZ <mirana-dz@proton.me>
 * @link          https://github.com/mirana-dz/Localhost-Tools    MIRANA-DZ LOCALHOST TOOLS Project.
 * @version 1.2.0 Beta
 *
 */

require_once '../config/config.php';

// Create a new router instance
$router = new Router($routes);

// Route the request
$router->route();