<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 23 Apr 2019 06:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Historiquepointeau
 * 
 * @property int $id
 * @property int $idAgent
 * @property int $idRonde
 * @property int $idPointeau
 * @property \Carbon\Carbon $date
 * @property int $ordrePointeau
 * @property int $numeroRonde
 * 
 * @property \App\Models\Agent $agent
 * @property \App\Models\Pointeaux $pointeaux
 * @property \App\Models\Ronde $ronde
 * @property \Illuminate\Database\Eloquent\Collection $mainscourantes
 *
 * @package App\Models
 */
class Historiquepointeau extends Eloquent
{
	protected $table = 'historiquepointeau';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idAgent' => 'int',
		'idRonde' => 'int',
		'idPointeau' => 'int',
		'ordrePointeau' => 'int',
		'numeroRonde' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'idAgent',
		'idRonde',
		'idPointeau',
		'date',
		'ordrePointeau',
		'numeroRonde'
	];

	public function agent()
	{
		return $this->belongsTo(\App\Models\Agent::class, 'idAgent');
	}

	public function pointeaux()
	{
		return $this->belongsTo(\App\Models\Pointeaux::class, 'idPointeau');
	}

	public function ronde()
	{
		return $this->belongsTo(\App\Models\Ronde::class, 'idRonde');
	}

	public function mainscourantes()
	{
		return $this->hasMany(\App\Models\Mainscourante::class, 'idHistoriquePointeau');
	}
}
