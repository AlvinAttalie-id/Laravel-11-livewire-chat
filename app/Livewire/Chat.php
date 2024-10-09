<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class Chat extends Component
{
    public User $user;
    public $message = '';



    public function render()
    {
        return view('livewire.chat', [
            'messages' => Message::where(function (Builder $query) {
                $query->where('from_user_id', auth()->id())
                    ->where('to_user_id', $this->user->id);
            })->orWhere(function (Builder $query) {
                $query->where('from_user_id',  $this->user->id) // perbaikan di sini
                    ->where('to_user_id', auth()->id());
            })
                ->get(),
        ]);
    }


    // Mengirim Pesan
    public function sendMessage()
    {
        // Test The Code
        // dd($this->message);
        Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $this->user->id,
            'message' => $this->message,
        ]);

        $this->reset('message');
    }
}
