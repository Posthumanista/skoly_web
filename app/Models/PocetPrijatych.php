<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PocetPrijatych extends Model
{
    use HasFactory;

        
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pocet_prijatych';

    public function oborNazev()
    {
        return $this->hasOne('App\Models\Obor', 'id', 'obor');
    }
    public function skolaNazev()
    {
        return $this->hasOne('App\Models\Skola', 'id', 'skola');
    }
    
}
