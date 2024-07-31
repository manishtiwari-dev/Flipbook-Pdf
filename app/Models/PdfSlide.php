<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfSlide  extends Model
{
    use HasFactory;

    protected $table = 'pdf_slides';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public $timeStamps="false";
     
  
}
