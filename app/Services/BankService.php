<?php

namespace App\Services;

use App\Http\Requests\BankRequest;
use App\Models\Bank;
use App\Repositories\Interfaces\BankRepositoryInterface;
use Illuminate\Http\Request;

class BankService
{
    protected BankRepositoryInterface $bankRepository;
    public function __construct(BankRepositoryInterface $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    public function all(Request $request = null)
    {
        return $this->bankRepository->all($request);
    }

    public function store(BankRequest $request){
        return $this->bankRepository->store($request);
    }

    public function update(Bank $bank,BankRequest $request){
        return $this->bankRepository->update($bank, $request);
    }
    public function delete(Bank $bank){
        return $this->bankRepository->delete($bank);
    }
}
