<div>
    @if($showModal)
    <div class="modal">
        <div class="modal-content">
            <span class="close" wire:click="closeModal">&times;</span>
            <h2>{{ $contact->name }} さんの詳細</h2>
            <p>性別: {{ $contact->gender }}</p>
            <p>メールアドレス: {{ $contact->email }}</p>
            <p>お問い合わせの種類: {{ $contact->type }}</p>
            <p>お問い合わせ内容: {{ $contact->message }}</p>
        </div>
    </div>
    @endif
</div>

<style>
    .modal {
        display: block;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
    }
</style>