<?php

namespace App\Repositories;

use App\Http\Requests\BankRequest;
use App\Models\Bank;
use App\Repositories\Interfaces\BankRepositoryInterface;
use Illuminate\Http\Request;

class BankRepository implements BankRepositoryInterface
{
    protected $bank;
    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    public function all(Request $request = null) {
        return $this->bank->select('id','name','shaba_identifier')->get();
    }

    public function delete(Bank $bank) {
        $bank->delete();
    }

    public function store(BankRequest $request) {
        return $this->bank->create([
            'name'=> $request->name,
            'shaba_identifier' => $request->shaba_identifier
        ]);
    }

    public function update(Bank $bank, BankRequest $request) {
        $bank->name = $request->name;
        $bank->shaba_identifier = $request->shaba_identifier;
        $bank->update();
    }
}
