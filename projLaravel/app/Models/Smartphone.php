<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 23 Apr 2019 06:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Smartphone
 * 
 * @property int $idsmartphones
 * @property string $nom
 * @property string $idADB
 *
 * @package App\Models
 */
class Smartphone extends Eloquent
{
	protected $primaryKey = 'idsmartphones';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idsmartphones' => 'int'
	];

	protected $fillable = [
		'nom',
		'idADB'
	];
}
