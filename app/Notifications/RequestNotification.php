<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequestNotification extends Notification
{
    use Queueable;
    private $data;

     //pass the loan object to the constructor

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // $this->data['mentor_club'] . 'has requested to mentor ' . $this->data['mentee_name'] . 'from ' . $this->data['mentee_club'] . 'for ' . $this->data['project_name'] . 'project')
        return (new MailMessage)
                    ->line($this->data['message'])
                    ->line($this->data['matron_name'] . 'from ' . $this->data['school_name'] . 'has requested to mentor ' . $this->data['mentor_name'] . 'for' . $this->data['club_name'] . 'on' . $this->data['activity_name'])
                    ->line('check the request and approve or reject it')
                    ->action('View Request', url('/request/' . $this->data['request_id']))
                    ->line('Well received!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'matron_name' => $this->data['matron_name'],
            'school_name' => $this->data['school_name'],
            'mentor_name' => $this->data['mentor_name'],
            'club_name' => $this->data['club_name'],
            'activity_name' => $this->data['activity_name'],
            'request_id' => $this->data['request_id'],
            'message' => $this->data['message'],
        ];
    }
}
