<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Chatbox --}}
                    <main wire:poll>
                        @foreach ($messages as $message)
                            {{-- Receiver --}}
                            <div class="chat @if ($message->from_user_id == auth()->id()) chat-end @else chat-start @endif">
                                <div class="chat-image avatar">
                                    <div class="w-10 rounded-full">
                                        <img alt="Tailwind CSS chat bubble component"
                                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                    </div>
                                </div>
                                <div class="chat-header">
                                    {{ $message->fromUser->name }}
                                    <time class="text-xs opacity-50">{{ $message->created_at->diffForHumans() }}</time>
                                </div>
                                <div class="chat-bubble">{{ $message->message }}!</div>
                                <div class="chat-footer opacity-50">Delivered</div>
                            </div>
                        @endforeach
                    </main>

                    {{-- Footer --}}
                    <footer class="inset-x-0 z-10 bg-white shrink-0">
                        <div class="form-control p-2 border-t">
                            <form wire:submit.prevent="sendMessage">
                                <div class="grid grid-cols-12">
                                    <!-- Menggunakan wire:model untuk menghubungkan input dengan Livewire -->
                                    <input wire:model="message" type="text" autocomplete="off" autofocus
                                        placeholder="Write Message" maxlength="1700"
                                        class="col-span-10 bg-gray-100 border-0 rounded-lg outline-0 focus:border-0 focus:ring-0 hover:ring-0 focus:outline-none">
                                    <!-- Tombol akan disable jika message kosong -->
                                    <button type="submit" x-bind:disabled="!$wire.message.trim()"
                                        class="col-span-2 bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-600 disabled:opacity-50 disabled:cursor-not-allowed">
                                        Send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </footer>


                </div>
            </div>
        </div>
    </div>
</div>
