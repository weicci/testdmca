<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

	//protected $template;
	protected $fillable = [
			'provider_id',
			'infringing_title',
			'infringing_link',
			'original_link',
			'original_description',
			'template',
			'content_removed'
	];
	/*
	public static function open(array $attributes)
	{
		return new static($attributes);//new Notice(array);
	}

	public function useTemplate($template)
	{
		$this->template = $template;
		return $this;
	}*/

	public function recipient()
	{
		return $this->belongsTo('App\Provider','provider_id');
	}

	public function owner()
	{
		return $this->belongsTo('App\User','user_id');
	}
	
	public function getRecipientEmail()
	{
		return $this->recipient->copyright_email;	
	}

	public function getOwnerEmail()
	{
		return $this->owner->email;
	}	

	
}
