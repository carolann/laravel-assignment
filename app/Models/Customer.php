<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $requiredfields=["firstname"=>"required", "lastname"=>"required"];

	public function bankaccount(){
		return $this->hasOne(BankAccount::class);
	}
    public function job(){
		return $this->hasOne(Job::class);
	}
    public function transactions(){
        return $this->hasManyThrough(Transaction::class, BankAccount::class);
    }

}
