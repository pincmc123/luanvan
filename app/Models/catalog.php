<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catalog extends Model
{
    use HasFactory;
    protected $table='catalog';
    protected $fillable = [
        'name',
        'status',
    ];
    public function getListcatalog()
    {
        return catalog::get();
    }
    public function getCatalog($id){
        return catalog::find($id);
    }
    public  function updateCatalog($data,$id)
    {
        $catalog=catalog::find($id);
        $catalog->name=$data->name;
        $catalog->status=$data->status;
        $catalog->save();
        return 'True';
    }
    public function createCatalog($data)
    {
        $catalog= catalog::create([
            'name'=>$data->name,
            'status'=>$data->status,
        ]);
        return $catalog;
    }

}
