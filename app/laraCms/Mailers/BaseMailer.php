<?php namespace App\LaraCms\Mailers;

/**
 * Created by Luca.
 * Date: 17/11/16
 * Time: 08:14
 */

use App\LaraCms\Tools\Mailer;

class BaseMailer extends Mailer
{
    /**
     * The view to render for the email.
     *
     * @var string
     */
    protected $view;

    /**
     * Data that needs to be passed to the view.
     *
     * @var array
     */
    protected $data = [];

    /**
     * The subject.
     *
     * @var string
     */
    protected $subject;

    /**
     * Destination address.
     *
     * @var string
     */
    protected $toAddress;

    /**
     * ReplyTo address.
     *
     * @var
     */
    protected $replyToAddress = null;

    /**
     * ReplyTo name.
     *
     * @var
     */
    protected $replyToName = null;

    /**
     * This method is used to set the recipient of the message.
     *
     * @param $email
     *
     * @return parent: The parent Mailer instance.
     */
    public function to($email)
    {
        $this->toAddress = $email;

        return $this;
    }

    /**
     * This method is used to set the ReplyTo field.
     *
     * @param $address
     * @param null $name
     *
     * @return parent: The parent Mailer instance.
     */
    public function replyTo($address, $name = null)
    {
        $this->replyToAddress = $address;
        $this->replyToName = $name;

        return $this;
    }

    /**
     * This method is used to send an email to the specified address.
     *
     * @return void
     */
    public function send()
    {
        return $this->sendMail(config('mail.from'), $this->data, $this->replyToAddress, $this->replyToName);
    }

    /**
     * This method is used to send an email to the specific address by queueing it.
     *
     * @return void
     */
    public function queue()
    {
        return $this->queueMail(config('mail.from'), $this->data, $this->replyToAddress, $this->replyToName);
    }
}