<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 23 Apr 2019 06:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Mainscourante
 * 
 * @property int $id
 * @property string $texte
 * @property \Carbon\Carbon $date
 * @property int $type
 * @property int $idHistoriquePointeau
 * 
 * @property \App\Models\Historiquepointeau $historiquepointeau
 *
 * @package App\Models
 */
class Mainscourante extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'type' => 'int',
		'idHistoriquePointeau' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'texte',
		'date',
		'type',
		'idHistoriquePointeau'
	];

	public function historiquepointeau()
	{
		return $this->belongsTo(\App\Models\Historiquepointeau::class, 'idHistoriquePointeau');
	}
}
