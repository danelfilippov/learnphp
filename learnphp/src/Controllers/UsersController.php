<?php

namespace App\Controllers;

use App\Models\User;

class UsersController
{
    public function index()
    {
        view('users/index', [
            'title' => 'Users',
            'users' => User::all(),
        ]);
    }

    public function view()
    {
        $user = $this->userFromQuery();
        if (!$user) {
            return $this->notFound();
        }

        view('users/view', ['user' => $user]);
    }

    public function edit()
    {
        $user = $this->userFromQuery();
        if (!$user) {
            return $this->notFound();
        }

        view('users/edit', ['user' => $user]);
    }

    public function update()
    {
        $user = $this->userFromQuery();
        if (!$user) {
            return $this->notFound();
        }

        $user->name = $_POST['name'];
        $user->email = $_POST['email'];

        // empty password field = keep the old password
        $newPassword = $_POST['password'] ?? '';
        if ($newPassword !== '') {
            $user->password = password_hash($newPassword, PASSWORD_BCRYPT);
        }

        $user->save();
        redirect('/admin/users');
    }

    public function delete()
    {
        $user = $this->userFromQuery();
        if (!$user) {
            return $this->notFound();
        }

        $user->delete();
        redirect('/admin/users');
    }

    // Finds the user whose id is in the address, e.g. /admin/users/view?id=3
    private function userFromQuery()
    {
        $id = (int) ($_GET['id'] ?? 0);
        return $id > 0 ? User::find($id) : null;
    }

    private function notFound()
    {
        http_response_code(404);
        echo 404;
    }
}
