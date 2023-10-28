<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customers extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $cascadeDeletes = ['customerdemo', 'customerdemographics'];

    public function customerdemo()
    {
        return $this->hasMany(CustomerCustomerDemo::class, 'CustomerID', 'CustomerID');
    }

    public function customercustomerdemographics()
    {
        return $this->hasManyThrough(CustomerDemographic::class, CustomerCustomerDemo::class, 'CustomerID', 'CustomerTypeID', 'CustomerID', 'CustomerTypeID');
    }

}
