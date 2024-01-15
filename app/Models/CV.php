<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model {
	use HasFactory;

	protected $fillable   = [
		'email',
		'nume',
		'telefon',
		'descriere',
		'poza',
		'experienta_educationala',
		'competente',
		'experienta_profesionala',
		'limbi_cunoscute',
	];
	protected $table      = 'cv_content';
	public    $timestamps = false;

}
