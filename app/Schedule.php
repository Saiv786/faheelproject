<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
	public $table = "schedules";
	protected $dates = ['deleted_at'];

	public $fillable = [
		'name',
		'type',
		'is_enabled',
		'one_time_date',
		'one_time_time',
		'occur_once_time',
		'occur_every_start_time',
		'occur_every_end_time',
		'recur_duration_start_date',
		'recur_duration_end_date',
		'recurr_type',
		'occur_every_type',
		'recurr_frequency',
		'occur_every_number',
		'description',
		'is_once',
		'cron',
		'customer_id'
	];

	protected $casts = [
		'name' => 'string',
		'type' => 'string',
		'is_enabled' => 'boolean',
		'recurr_type' => 'string',
		'occur_every_type' => 'string',
		'recurr_frequency' => 'integer',
		'occur_every_number' => 'integer',
		'description' => 'string',
		'is_once' => 'boolean',
		'cron' => 'string',
		'customer_id' => 'integer',
	];

	protected $hidden = [
		'_token'
	];

	//-----------------------------------------
	// Traits Start
	//-----------------------------------------

	public function getResistableRelations()
	{
		return [];
	}

	//-----------------------------------------
	// Traits End
	//-----------------------------------------

	//-----------------------------------------
	// Relations Start
	//-----------------------------------------

	//-----------------------------------------
	// Relations End
	//-----------------------------------------

	//-----------------------------------------
	// Attributes Start
	//-----------------------------------------
	protected $appends = ['next_run_time', 'description', 'status', 'status_class'];
	public function getNextRunTimeAttribute()
	{
		$last_run = null;
		$date = null;
		$cron = \Cron\CronExpression::factory($this->cron);
		$today = Carbon::today();

		if ($this->type == 'one_time') {
			$date = $cron->getNextRunDate($this->one_time_time);
			$date = Carbon::instance($date);

			if ($last_run) {
				return null;
			}

			return $date->format('F j, Y, g:i a');
		} else {
			if ($today->gt($this->occur_every_end_time)) {
				return $date;
			}
			if ($today->lt($this->occur_every_start_time)) {
				$today = Carbon::parse($this->occur_every_start_time);
			}

			$ref_start = \Carbon\Carbon::parse($this->occur_every_start_time);
			$ref_end = \Carbon\Carbon::parse($this->occur_every_end_time);

			if ($ref_start->gt($this->occur_every_end_time)) {
				return $date;
			}
		}
		if (!$last_run) {
			$last_run = Carbon::now();
		}

		$break = false;
		do {
			$relative = $ref_start;
			if ($ref_start->lt($last_run)) {
				$relative = $last_run;
			}

			$date = $cron->getNextRunDate($relative);
			$date = Carbon::instance($date);

			if ($date->lte($ref_end) || $this->is_once) {
				$break = true;
			}

			$ref_start->addDay();
		} while (!$break);

		return $date->format('F j, Y, g:i a');
	}
	public function getDescriptionAttribute()
	{
		$description = "";
		$timezone = request()['timezone'] ?? 'UTC';
		if ($this->type == 'one_time') {
			$description .= "One Time Occurance on " . \Carbon\Carbon::parse($this->one_time_time)->format(' M j, Y') . " at " . \Carbon\Carbon::parse($this->one_time_time)->format('g:i A');
		} else if ($this->type == 'recurring') {
			$description .= "Repeat every " . $this->recurr_frequency . " " . $this->recurr_type;
			if ($this->occur_once_time) {
				$description .= " at " . \Carbon\Carbon::parse($this->occur_once_time)->format('g:i A') . ", ";
			} else {
				$description .= " every " . $this->occur_every_number . " " . $this->occur_every_type . " between " . \Carbon\Carbon::parse($this->occur_every_start_time)->format('g:i A') . " and " . \Carbon\Carbon::parse($this->occur_every_end_time)->format('g:i A') . ". ";
			}
			if ($this->occur_every_start_time) {
				$description .= "From on " . \Carbon\Carbon::parse($this->occur_every_start_time)->format(' M j, Y');
			}
			if ($this->occur_every_end_time) {
				$description .= " to " . \Carbon\Carbon::parse($this->occur_every_end_time)->format(' M j, Y');
			}
		}
		return $description;
	}
	public function getStatusAttribute()
	{
		if ($this->is_enabled) {
			return 'Running';
		} else {
			return 'Stopped';
		}
	}
	public function getStatusClassAttribute()
	{
		if ($this->is_enabled) {
			return 'badge-success';
		} else {
			return 'badge-danger';
		}
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
	public function getCronString()
	{
		$cron_minute = "*";
		$cron_hours = "*";
		$cron_day = "*";
		$cron_month = "*";
		$cron_d_o_w = "*";
		$cron_year = "*";

		if ($this->type == 'one_time') {
			// $date = \Carbon\Carbon::parse($this->one_time_date);
			$time = \Carbon\Carbon::parse($this->one_time_time);

			$cron_minute = $time->minute;
			$cron_hours = $time->hour;
			$cron_day = $time->day;
			$cron_month = $time->month;
			$cron_year = $time->year;
		} else if ($this->type == 'recurring') {
			$total_days = 0;
			if ($this->is_once) {
				$time = \Carbon\Carbon::parse($this->occur_once_time);
				$cron_minute = $time->minute;
				$cron_hours = $time->hour;
			} else {
				if ($this->occur_every_type == 'hour') {
					$total_mins = $this->occur_every_number * 60;
				} else {
					$total_mins = $this->occur_every_number;
				}
				$cron_minute = $total_mins % 60;
				$cron_minute = $cron_minute ? "*/" . $cron_minute : "*";

				$total_hours = floor($total_mins / 60);
				$cron_hours = $total_hours % 60;
				$cron_hours = $cron_hours ? "*/" . $cron_hours : "*";

				$total_days = floor($total_hours / 24);
			}

			if ($this->recurr_type == 'weeks') {
				$total_days += $this->recurr_frequency * 7;
			} else {
				$total_days += $this->recurr_frequency;
			}

			$cron_day = $total_days % 31;
			$cron_day = $cron_day ? "*/" . $cron_day : "*";

			$total_months = floor($total_days / 31);
			$cron_month = $total_months % 12;
			$cron_month = $cron_month ? "*/" . $cron_month : "*";

			$cron_year = floor($total_months / 12);
		}
		return "{$cron_minute} {$cron_hours} {$cron_day} {$cron_month} {$cron_d_o_w}";
	}
	public function getNextRunTime($last_run)
	{
		$date = null;
		$cron = \Cron\CronExpression::factory($this->cron);
		$today = Carbon::today();

		if ($this->type == 'one_time') {
			$date = $cron->getNextRunDate($this->one_time_time);
			$date = Carbon::instance($date);

			if ($last_run) {
				return null;
			}

			return $date;
		} else {
			if ($today->gt($this->occur_every_end_time)) {
				return $date;
			}
			if ($today->lt($this->occur_every_start_time)) {
				$today = Carbon::parse($this->occur_every_start_time);
			}

			$ref_start = \Carbon\Carbon::parse($this->occur_every_start_time);
			$ref_end = \Carbon\Carbon::parse($this->occur_every_end_time);

			if ($ref_start->gt($this->occur_every_end_time)) {
				return $date;
			}
		}
		if (!$last_run) {
			$last_run = Carbon::now();
		}

		$break = false;
		do {
			$relative = $ref_start;
			if ($ref_start->lt($last_run)) {
				$relative = $last_run;
			}

			$date = $cron->getNextRunDate($relative);
			$date = Carbon::instance($date);

			if ($date->lte($ref_end) || $this->is_once) {
				$break = true;
			}

			$ref_start->addDay();
		} while (!$break);

		return $date;
	}

	public function combineDateTime($date, $time)
	{
		$time = Carbon::parse($time);
		return Carbon::create($date->year, $date->month, $date->day, $time->hour, $time->minute);
	}
	//-----------------------------------------
	// Functions End
	//-----------------------------------------
}
