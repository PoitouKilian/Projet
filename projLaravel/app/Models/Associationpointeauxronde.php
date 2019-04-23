<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 23 Apr 2019 06:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Associationpointeauxronde
 * 
 * @property int $id
 * @property int $idRonde
 * @property int $idPointeau
 * @property int $ordrePointeau
 * @property int $tempsProchainMin
 * @property int $tempsProchainMax
 * 
 * @property \App\Models\Pointeaux $pointeaux
 * @property \App\Models\Ronde $ronde
 *
 * @package App\Models
 */
class Associationpointeauxronde extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'idRonde' => 'int',
		'idPointeau' => 'int',
		'ordrePointeau' => 'int',
		'tempsProchainMin' => 'int',
		'tempsProchainMax' => 'int'
	];

	protected $fillable = [
		'idRonde',
		'idPointeau',
		'ordrePointeau',
		'tempsProchainMin',
		'tempsProchainMax'
	];

	public function pointeaux()
	{
		return $this->belongsTo(\App\Models\Pointeaux::class, 'idPointeau');
	}

	public function ronde()
	{
		return $this->belongsTo(\App\Models\Ronde::class, 'idRonde');
	}
}
