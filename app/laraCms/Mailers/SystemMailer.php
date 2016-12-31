<?php namespace App\LaraCms\Mailers;

/**
 * Created by Luca.
 * Date: 17/11/16
 * Time: 08:15
 */

class SystemMailer extends BaseMailer
{
    /**
     * This method is used to setup the necessary settings in order
     * to send a contact request notification to the admins.
     *
     * @param array $data
     *
     * @return \App\LaraCms\Mailers\SystemMailer
     */
    public function notifyContactFormSubmission($subject, $data = [])
    {
        $this->view = 'emails.contact';
        $this->data = $data;
        $this->subject = $subject;

        return $this;
    }
}