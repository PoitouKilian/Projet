<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 23 Apr 2019 06:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Agent
 * 
 * @property int $idAgent
 * @property string $idTag
 * @property string $nom
 * @property string $prenom
 * @property int $agentActif
 * 
 * @property \Illuminate\Database\Eloquent\Collection $rondes
 * @property \Illuminate\Database\Eloquent\Collection $historiquepointeau
 *
 * @package App\Models
 */
class Agent extends Eloquent
{
	protected $primaryKey = 'idAgent';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idAgent' => 'int',
		'agentActif' => 'int'
	];

	protected $fillable = [
		'idTag',
		'nom',
		'prenom',
		'agentActif'
	];

	public function rondes()
	{
		return $this->belongsToMany(\App\Models\Ronde::class, 'associationagentsrondes', 'idAgent', 'idRonde')
					->withPivot('id');
	}

	public function historiquepointeau()
	{
		return $this->hasMany(\App\Models\Historiquepointeau::class, 'idAgent');
	}
}
