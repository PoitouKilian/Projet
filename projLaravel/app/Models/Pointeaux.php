<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 23 Apr 2019 06:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pointeaux
 * 
 * @property int $idpointeaux
 * @property string $idTag
 * @property string $lieu
 * @property int $numero
 * @property int $pointeauActif
 * 
 * @property \Illuminate\Database\Eloquent\Collection $rondes
 * @property \Illuminate\Database\Eloquent\Collection $historiquepointeau
 *
 * @package App\Models
 */
class Pointeaux extends Eloquent
{
	protected $table = 'pointeaux';
	protected $primaryKey = 'idpointeaux';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idpointeaux' => 'int',
		'numero' => 'int',
		'pointeauActif' => 'int'
	];

	protected $fillable = [
		'idTag',
		'lieu',
		'numero',
		'pointeauActif'
	];

	public function rondes()
	{
		return $this->belongsToMany(\App\Models\Ronde::class, 'associationpointeauxrondes', 'idPointeau', 'idRonde')
					->withPivot('id', 'ordrePointeau', 'tempsProchainMin', 'tempsProchainMax');
	}

	public function historiquepointeau()
	{
		return $this->hasMany(\App\Models\Historiquepointeau::class, 'idPointeau');
	}
}
