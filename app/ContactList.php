<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactList extends Model
{
    public $table = "contact_lists";
	protected $dates = ['deleted_at'];
	
	public $fillable = [
		'name',
		'description',
	];
	
	protected $casts = [
		'name'=>'string',
		'description'=>'string',
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
	public function contacts()
	{
		return $this->hasMany(\App\Contact::class);
	}
	public function compaign()
	{
		return $this->hasMany(\App\Compaign::class);
	}
	//-----------------------------------------
	// Relations End
	//-----------------------------------------
	
	//-----------------------------------------
	// Attributes Start
	//-----------------------------------------
	protected $appends = ['count'];
	public function getCountAttribute(){
		return $this->contacts()->count();
	}
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
