<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 23 Apr 2019 06:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Responsable
 * 
 * @property int $idresponsables
 * @property string $login
 * @property string $mdp
 *
 * @package App\Models
 */
class Responsable extends Eloquent
{
	protected $primaryKey = 'idresponsables';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idresponsables' => 'int'
	];

	protected $fillable = [
		'login',
		'mdp'
	];
}
