<?php

namespace App\Controllers;

use App\DB;
use App\Models\Post;
use App\Models\User;

class PublicController
{
    public function index()
    {
        $title = 'World';
        $posts = Post::where('category', 'world');
        view('index', compact('title', 'posts'));
    }

    public function us()
    {
        $title = 'U.S';
        $posts = Post::where('category', 'us');
        view('us', compact('title', 'posts'));
    }

    public function tech()
    {
        $title = 'Technology';
        $posts = array_map(fn($post) => (object) $post, [
            [
                'title' => 'Composer ja autoload',
                'tag' => 'PHP',
                'read_time' => 3,
                'created_at' => '10. november 2026',
                'author' => 'Martin',
                'body' => 'Composer laeb klassid ise, kui nimeruum vastab kaustale. Nii ei pea iga faili jaoks require-rida kirjutama.',
            ],
            [
                'title' => 'Andmebaas Dockeris',
                'tag' => 'Docker',
                'read_time' => 4,
                'created_at' => '12. november 2026',
                'author' => 'Martin',
                'body' => 'MariaDB käib docker compose abil konteineris, nii et andmebaasi ei pea arvutisse eraldi installima.',
            ],
            [
                'title' => 'Paroolid password_hash abil',
                'tag' => 'Turvalisus',
                'read_time' => 2,
                'created_at' => '14. november 2026',
                'author' => 'Martin',
                'body' => 'Parooli ei salvestata kunagi lihttekstina. password_hash teeb räsi ja password_verify kontrollib seda sisselogimisel.',
            ],
            [
                'title' => 'MVC lühidalt',
                'tag' => 'Arhitektuur',
                'read_time' => 3,
                'created_at' => '16. november 2026',
                'author' => 'Martin',
                'body' => 'Mudel räägib andmebaasiga, controller otsustab, mida teha, ja vaade näitab tulemust kasutajale.',
            ],
        ]);
        view('tech', compact('title', 'posts'));
    }

    public function test()
    {
        $db = new DB();
    }

    public function form()
    {

        view('form');
    }

    public function answer()
    {
        dump($_GET, $_POST);
    }
}