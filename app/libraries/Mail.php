<?php

/**
 * Created by Cheese.
 * User: Cheese
 * Date: 8/30/2019
 * Time: 6:11 PM
 * This is the general class for the mail library
 * It includes most of the functions that has to do with mail
 */
class Mail
{
    /**
     * @param string $to
     * @param string $subject
     * @param string $message
     * @param array $header
     * @return bool
     */
    public function sendMail($to='', $subject='', $message='', $header=[]){
        if(!empty($to) && !empty($subject) && !empty($message)){
            str_replace ('.','..',$message);
            $message = wordwrap ($message,75);
            if($header !== []){
                mail ($to,$subject,$message,$header);
                return true;
            } else{
                mail($to,$subject,$message);
                return true;
            }
        }
        else{
            return false;
        }
    }
}