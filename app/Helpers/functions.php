<?php

/**
 * Generate a path relative to the root directory
 *
 * @param  string $path
 * @return string
 */
function base_path($path = '')
{
    return BASE_PATH . "/{$path}";
}

/**
 * Generate a path relative to the storage directory
 *
 * @param  string $path
 * @return string
 */
function storage_path($path = '')
{
    return base_path('storage/' . $path);
}

/**
 * Generate a path relative to the app directory
 *
 * @param  string $path
 * @return string
 */
function app_path($path = '')
{
    return base_path('app/' . $path);
}

/**
 * Generate a path relative to the tests directory
 *
 * @param  string $path
 * @return string
 */
function tests_path($path = '')
{
    return base_path('tests/' . $path);
}

/**
 * Read a parameter from $_ENV
 *
 * @param  string $key
 * @param  string|null $default
 * @return string|null
 */
function env($key, $default = null)
{
    return (isset($_ENV[$key]) ? $_ENV[$key] : $default);
}
