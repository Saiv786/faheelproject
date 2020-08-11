<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $campaigns = \App\Campaign::where('next_run_time', '<=', \Carbon\Carbon::now())->get();
        \Log::debug($campaigns);
        foreach ($campaigns as $key => $value) {
            $count = 0;
            $content = $value->template ? $value->template->content : null;
            $regex = '~\{([^}]*)\}~';
            preg_match_all($regex, $content, $matches);
            $vars_in_html = $matches[1];
            $contact_list = $value->contactList()->first();
            foreach ($contact_list->contacts as $contact) {
                $new_content = $content;
                $val = [];
                $val['ADDRESS'] = $contact['address'] ?? null;
                $val['PHONE_NO'] = $contact['phone_no'] ?? null;
                $val['LAST_NAME'] = $contact['last_name'] ?? null;
                $val['FIRST_NAME'] = $contact['first_name'] ?? null;
                $val['CONTACT_EMAIL'] = $contact['email'] ?? null;
                $val['CONTACT_LIST_NAME'] = $contact_list->name ?? null;
                $built_in_contact_vars = ['ADDRESS', 'PHONE_NO', 'LAST_NAME', 'FIRST_NAME', 'CONTACT_EMAIL', 'CONTACT_LIST_NAME'];
                foreach ($vars_in_html as $key => $value_var) {
                    if (!in_array($value_var, $built_in_contact_vars)) {
                        $val[$value_var] = $contact['custom_fields'][strtolower($value_var)] ?? null;
                    }
                    $new_content = str_replace($matches[0][$key], $val[$value_var], $new_content);
                }
                $count++;
                $x = \Mail::to($contact['email'])->send(new \App\Mail\BasicMail(['content' => $new_content, 'subject' => $value['subject'], 'reply_to' => $value['reply_to']], $value['from_name']));
                \Log::debug($x);
            }
            $user = \App\User::find($value['customer_id']);
            $user->emails_sent += $count;
            $user->save();
            $value['next_run_time'] = \App\Schedule::find($value['schedule_id'])->getNextRunTimeDate() ?? null;
            $value->save();

        }

    }
}
