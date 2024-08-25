<div>
    @if($isOpen)
    <div class="modal-backdrop" wire:click="closeModal"></div>
    <div class="modal">
        <div class="modal-content">
            <span class="close" wire:click="closeModal">&times;</span>
            <h2>お問い合わせの詳細</h2>
            <p><strong>お名前:</strong> {{ $contact->last_name }} {{ $contact->first_name }}</p>
            <p><strong>性別:</strong>
                @if ($contact->gender == 1)
                男性
                @elseif ($contact->gender == 2)
                女性
                @else
                その他
                @endif
            </p>
            <p><strong>メールアドレス:</strong> {{ $contact->email }}</p>
            <p><strong>お問い合わせの種類:</strong> {{ $contact->category ? $contact->category->content : '未設定' }}</p>
            <p><strong>詳細:</strong> {{ $contact->detail }}</p>
        </div>
    </div>
    @endif
</div>