<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Blog extends Model
{
    use HasFactory;
    //use QueryCacheable;

    /* public $cacheFor      = 3600; */
    /* public $cacheTags     = ['blog']; */
    /* public $cachePrefix   = 'blog_smk_cloud_provider_'; */
    /* public $cacheDriver   = 'memcached'; */
}
