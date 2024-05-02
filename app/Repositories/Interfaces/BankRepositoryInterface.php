<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\BankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

interface BankRepositoryInterface
{
    public function all(Request $request = null);
    public function store(BankRequest $request);
    public function update(Bank $bank, BankRequest $request);
    public function delete(Bank $bank);
}
