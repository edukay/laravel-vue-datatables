<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTable\DataTableController;
use App\Plan;

class PlanController extends DataTableController
{
    public function builder()
    {
        return Plan::query();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'braintree_id' => 'required',
            'price' => 'required'
        ]);

        if (!$this->allowCreation) {
            return;
        }

        $this->builder->create($request->only($this->getUpdatableColumns()));
    }

    public function getUpdatableColumns()
    {
        return [
            'braintree_id', 'price', 'active'
        ];
    }
}