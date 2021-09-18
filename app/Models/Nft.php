<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NftUser;
use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;

class Nft extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'description', 'image', 'price' , 'user_id'];
    protected $primaryKey = 'id';


    public function user() {
        return $this->hasManyThrough(User::class,NftUser::class, 'nft_id', 'id', 'id', 'user_id');
    }

}

