<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = "contacts";
	protected $dates = ['deleted_at'];

	public $fillable = [
		'first_name',
		'last_name',
		'email',
		'contact_list_id',
	];

	protected $casts = [
		'first_name'=>'string',
		'last_name'=>'string',
		'email'=>'string',
		'contact_list_id'=>'integer',
	];

	//-----------------------------------------
	// Traits Start
	//-----------------------------------------
	
	public function getResistableRelations() {
		return [];
	}

	//-----------------------------------------
	// Traits End
	//-----------------------------------------

	//-----------------------------------------
	// Relations Start
	//-----------------------------------------
	public function lists()
	{
		return $this->belongsTo(\App\ContactList::class, 'contact_list_id');
	}
	//-----------------------------------------
	// Relations End
	//-----------------------------------------

	//-----------------------------------------
	// Attributes Start
	//-----------------------------------------
	//-----------------------------------------
	// Attributes End
	//-----------------------------------------

	//-----------------------------------------
	// Scopes Start
	//-----------------------------------------
	//-----------------------------------------
	// Scopes End
	//-----------------------------------------

	//-----------------------------------------
	// Functions Start
	//-----------------------------------------
	//-----------------------------------------
	// Functions End
	//-----------------------------------------
}
