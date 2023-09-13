<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesaj extends Model
{
    protected $table = 'iletisim_mesajlari';
    use HasFactory;
}
