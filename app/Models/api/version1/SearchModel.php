<?php
namespace App;
namespace App\Models\api\version1;

use Illuminate\Database\Eloquent\Model;

class SearchModel extends Model
{
    protected $fillable = [
        'title', 'start', 'end', 'allDay', 'color', 'textColor'
    ];
}
