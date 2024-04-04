<?php

function print_arr($data): void
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

function get_count(string $table): int
{
    global $db;
    return $db->query("SELECT COUNT(*) FROM {$table}")->findColumn();
}

function get_cities(int $start, int $per_page): array
{
    global $db;
    return $db->query("SELECT * FROM city LIMIT $start, $per_page")->findAll();
}

function search_cities(string $search): array
{
    global $db;
    return $db->query("SELECT * FROM city WHERE name LIKE ?", ["%{$search}%"])->findAll();
}
