<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CommentAdded extends Notification
{
    use Queueable;

    protected $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toArray($notifiable)
    {
        return [
            'entry_id' => $this->comment->exhibition_entry_id,
            'entry_name' => $this->comment->exhibitionEntry->name,
            'comment' => $this->comment->comment,
            'image_path' => $this->comment->exhibitionEntry->image_path,
            'type' => 'comment'
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Có bình luận mới cho bài viết của bạn')
                    ->line('Có bình luận mới cho bài viết của bạn!')
                    ->line('Nội dung bình luận: ' . $this->comment->comment)
                    ->action('Xem Bình Luận', url('/entries/' . $this->comment->exhibition_entry_id))
                    ->line('Cảm ơn bạn đã sử dụng ứng dụng của chúng tôi!');
    }
}
