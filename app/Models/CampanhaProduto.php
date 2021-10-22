<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampanhaProduto extends Model
{
    use HasFactory;
    protected $table = 'campanhas_produtos';
    protected $fillable = [
        'campanha_id',
        'produto_id',
        'desconto_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function campanha()
    {
        return $this->belongsTo(Campanha::class, 'campanha_id');
    }
}
