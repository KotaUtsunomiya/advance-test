<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{
    use HasFactory;

    protected $table = "contacts";
    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
    ];

    /**
    * @param \Illuminate\Database\Eloquent\Builder
    * @param array
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeSearch(Builder $query, array $params): Builder{
        $query->where(function ($query) use ($params){
            $query->where('fullname', 'like', '%'.$params['name'].'%')->where('email', 'like', '%'.$params['email'].'%');
        })->when(isset($params['gender']), function($query) use ($params){
            $query->where('gender', $params['gender']);
        })->when(isset($params['start-date']) || isset($params['last-date']), function($query) use ($params){
            $query->WhereBetween('created_at', [$params['start-date'].' 00:00:00', $params['last-date'].' 23:59:59']);
        });
        return $query;
    }
}
