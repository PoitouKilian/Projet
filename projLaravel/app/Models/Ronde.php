<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 23 Apr 2019 06:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Ronde
 * 
 * @property int $idrondes
 * @property string $nomrondes
 * @property int $rondeActive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $agents
 * @property \Illuminate\Database\Eloquent\Collection $pointeaux
 * @property \Illuminate\Database\Eloquent\Collection $historiquepointeau
 *
 * @package App\Models
 */
class Ronde extends Eloquent
{
	protected $primaryKey = 'idrondes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idrondes' => 'int',
		'rondeActive' => 'int'
	];

	protected $fillable = [
		'nomrondes',
		'rondeActive'
	];

	public function agents()
	{
		return $this->belongsToMany(\App\Models\Agent::class, 'associationagentsrondes', 'idRonde', 'idAgent')
					->withPivot('id');
	}

	public function pointeaux()
	{
		return $this->belongsToMany(\App\Models\Pointeaux::class, 'associationpointeauxrondes', 'idRonde', 'idPointeau')
					->withPivot('id', 'ordrePointeau', 'tempsProchainMin', 'tempsProchainMax');
	}

	public function historiquepointeau()
	{
		return $this->hasMany(\App\Models\Historiquepointeau::class, 'idRonde');
	}
}
