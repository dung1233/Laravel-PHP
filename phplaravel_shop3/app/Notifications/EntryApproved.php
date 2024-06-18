<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EntryApproved extends Notification
{
    use Queueable;

    protected $entry;
    protected $status;

    public function __construct($entry, $status)
    {
        $this->entry = $entry;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }
    public function toMail($notifiable)
    {
        $message = (new MailMessage)
                    ->subject('Trạng thái bài viết của bạn đã thay đổi')
                    ->line('Bài viết của bạn: ' . $this->entry->name)
                    ->line('Trạng thái: ' . ($this->status == 'accepted' ? 'Đã được duyệt' : 'Đã bị từ chối'));

        if ($this->status == 'accepted') {
            $message->action('Xem chi tiết', url('/entries/' . $this->entry->id));
        }

        $message->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');

        return $message;
    }

    public function toArray($notifiable)
    {
        return [
            'type' => $this->status == 'accepted' ? 'accepted' : 'rejected',
            'entry_name' => $this->entry->name,
            'image_path' => $this->entry->image_path,
        ];
    }
}
