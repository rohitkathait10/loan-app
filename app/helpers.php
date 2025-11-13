<?php

if (!function_exists('userRoleName')) {
    function userRoleName(): string
    {
        return match (auth()->user()->role ?? 0) {
            1 => 'admin',
            2 => 'agent',
            default => 'user',
        };
    }
}
