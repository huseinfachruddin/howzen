<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class Image extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function index()
    {
        return 'id';
    }

    public static function upload($images,$id_note)
    {
    foreach ($images as $image) {
        $imgName = Uuid::uuid4().'.'.$image->extension();
        $image->move(public_path('images'), $imgName);

        $data[] = Image::create([
            'name' => $imgName,
            'id_note' => $id_note,
         ]);
    }
    return $data;

    }
}
