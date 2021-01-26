<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;


class Company extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->hasMany('App\Models\Employee','company_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($company) { // before delete() method call this
            // delete company logo 
            try {
                File::delete(public_path('images/company'. '/' . $company->logo ));
            } catch (\Throwable $th) {
                //throw $th;
            }
            // delete all company's employee
            $company->employee->each->delete();
            
        });
    }
}
