# お問い合わせフォーム

## 環境構築

【Docker ビルド】

1. git@github.com:MaricoIto/Check-Test.git
2. docker-compose up -d --build

＊ MySQL は、OS によって起動しない場合があるのでそれぞれの PC に合わせて docker-compose.yml ファイルを編集してください。

【Laravel 環境構築】

1. docker-compose exec php bash
2. composer install
3. .env.example ファイルから.env を作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術(実行環境)

- PHP 8.1.29
- Laravel 8.83.27
- MySQL 8.0
- livewire/livewire 

## ER 図

![inquiry-form](https://github.com/user-attachments/assets/e32b3092-1ed2-4143-9205-cd8e5cc5cfac)

## URL

- 開発環境 : <http://localhost/>
- phpMyAdmin : <http://localhost:8080/>
