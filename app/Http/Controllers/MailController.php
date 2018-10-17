<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use App\Http\Controllers\Controller;
 
class MailController extends Controller
{
 
    public function __construct()
    {
 
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
 
    }
 
    /**
     * Update posisi menu
     *
     * @param  int  $id
     * @return Response
     */
    public function sendemail()
    {
 			$data = array('name'=>"Sam Jose", "bodymessage" => "Test mail");
   
			Mail::send('emails.html', $data, function($message) {
			    $message->to('achmaddaniar@gmail.com', 'Artisans Web')
			            ->subject('Artisans Web Testing Mail');
			    $message->from('seatemailsmtp@gmail.com','Sajid Sayyad');
			});
 
 
    }
 
 
 
 
}
