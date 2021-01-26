<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;


class Employee extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo('App\Models\Company','company_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($employee) { // before delete() method call this
            // delete employee logo 
            try {
                File::delete(public_path('images/employee'. '/' . $employee->logo ));
            } catch (\Throwable $th) {
                //throw $th;
            }
            
        });
    }
}
