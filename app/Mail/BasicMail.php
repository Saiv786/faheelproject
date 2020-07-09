<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BasicMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $object;
    protected $recepient;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($obj=[],$recepient='osmly')
    {
        //
        $this->object=$obj;
        if(!isset($this->object['content'])){
            $this->object['content']='';
        }
        if(!isset($this->object['reply_to'])){
            $this->object['reply_to']='';
        }
        $this->recepient=str_replace(" ","_",$recepient).'@osmlymail.com';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $output= $this->from($this->recepient)->html($this->object['content']);
        if($this->object['subject']){
            $output->subject($this->object['subject']);
        }
        if($this->object['reply_to']){
            $output->replyTo($this->object['reply_to']);
        }
        return $output;
        // return $this->from($this->recepient)->markdown('emails.basic_mail')->with(['object'=>$this->object]);
        // ->with([
        //         'buyer'            => $this->order->user->name,
        //         'order'            => $this->order->name,
        //         'item_name'        => $this->order->item_name,
        //         'item_description' => $this->order->item_description,
        //         'quantity'         => $this->order->quantity,
        //         'total_amount'     => $this->order->total_amount,
        //         'unit_price'       => $this->order->unit_price,
        //         'expiry_time'      => $this->order->expiry_time,
        //     ]);
    }
}
