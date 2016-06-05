<?php

/**
 * Generate a path relative to the root directory
 *
 * @param string $path
 * @return string
 */
function base_path(string $path = ''): string
{
    return BASE_PATH . "/{$path}";
}

/**
 * Generate a path relative to the storage directory
 *
 * @param string $path
 * @return string
 */
function storage_path(string $path = ''): string
{
    return base_path('storage/' . $path);
}

/**
 * Generate a path relative to the tests directory
 *
 * @param string $path
 * @return string
 */
function tests_path(string $path = ''): string
{
    return base_path('tests/' . $path);
}
