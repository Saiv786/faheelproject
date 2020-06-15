<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public $table = "campaigns";
    
    public $fillable = [
		'contact_list_id',
		'name',
		'subject',
		'from_name',
		'from_email',
		'reply_to',
		'track_open',
		'track_click',
		'template_id',
		'schedule_id',
	];

	protected $casts = [
		
		'track_open'=>'boolean',
		'track_click'=>'boolean',
			
		'name'=>'string',
		'subject'=>'string',
		'from_name'=>'string',
		'from_name'=>'string',

		'from_email'=>'string',
		'reply_to'=>'string',

		'template_id'=>'integer',
		'schedule_id'=>'integer',
		'contact_list_id'=>'integer',

	];

	public function contactList()
	{
		return $this->belongsTo('App\ContactList', 'contact_list_id');
	}
	public function template()
	{
		return $this->belongsTo('App\Template', 'template_id');
	}
	public function schedule()
	{
		return $this->belongsTo('App\Schedule', 'schedule_id');
	}
}
