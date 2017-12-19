<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\DataTable\DataTableController;
use App\User;

class UserController extends DataTableController
{
    protected $allowCreation = true;

    protected $allowDeletion = true;

    public function builder()
    {
        return User::query();
    }

    public function getDisplayableColumns()
    {
        return [
            'id', 'name', 'email', 'created_at'
        ];
    }

    public function getUpdatableColumns()
    {
        return [
            'name', 'email'
        ];
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id
        ]);

        $this->builder->find($id)->update($request->only($this->getUpdatableColumns()));
    }

    /**
     * Get custom column names for the fields.
     *
     * @return array
     */
    public function getCustomColumnNames()
    {
        return [
            'name' => 'Full Name',
            'email' => 'Email Address'
        ];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        if (!$this->allowCreation) {
            return;
        }

        $data = $request->only($this->getUpdatableColumns());
        $data['password'] = bcrypt('password');

        $this->builder->create($data);
    }
}
