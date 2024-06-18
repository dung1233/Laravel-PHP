<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Bus\Queueable;

class EntryLiked extends Notification
{
    use Queueable;

    protected $like;

    public function __construct($like)
    {
        $this->like = $like;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toArray($notifiable)
    {
        return [
            'entry_id' => $this->like->exhibition_entry_id,
            'entry_name' => $this->like->exhibitionEntry->name,
            'image_path' => $this->like->exhibitionEntry->image_path,
            'type' => 'like',
            'message' => 'Bài viết của bạn đã được thích!'
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Bài viết của bạn đã được thích!')
                    ->action('Thích', url('/entries/' . $this->like->exhibition_entry_id))
                    ->line('Cảm ơn bạn đã sử dụng ứng dụng của chúng tôi!');
    }
}
