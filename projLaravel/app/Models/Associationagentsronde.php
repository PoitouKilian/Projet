<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 23 Apr 2019 06:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Associationagentsronde
 * 
 * @property int $id
 * @property int $idAgent
 * @property int $idRonde
 * 
 * @property \App\Models\Agent $agent
 * @property \App\Models\Ronde $ronde
 *
 * @package App\Models
 */
class Associationagentsronde extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'idAgent' => 'int',
		'idRonde' => 'int'
	];

	protected $fillable = [
		'idAgent',
		'idRonde'
	];

	public function agent()
	{
		return $this->belongsTo(\App\Models\Agent::class, 'idAgent');
	}

	public function ronde()
	{
		return $this->belongsTo(\App\Models\Ronde::class, 'idRonde');
	}
}
