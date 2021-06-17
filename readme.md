# illust station
![screencapture-illust-station-herokuapp-2021-06-17-13_51_19](https://user-images.githubusercontent.com/52768993/122333484-34441d80-cf73-11eb-8d7f-5b06dfd9fc07.png)

# Introduction
illust stationはユーザーが作成したイラストを画像ファイルとして投稿できるサイトです。基本的には一般的な投稿型のサイトですが、タグ付け機能やユーザーへのリクエスト機能、投稿へのコメント機能など、ユーザー同士の交流が活発になることをメインテーマに作成しました。

## URL
- URL: http://illust-station.herokuapp.com/
- テスト用アカウント 
メールアドレス: testman@example.com  パスワード: 0578testpower
- TwitterアカウントでWEB APIを利用したログインも可能です。

## Purpose
- 自分の作成したイラストを自由に投稿する
- イラストを作成したユーザーに対してコメントやリクエストなどアクションを起こし、交流の場とする

## Environment
- PHP 7.3.9
- laravel 6.20.16
- Apache 2.4.34
- MySQL 5.6.43
- MAMP 5.7
- Composer 2.0.8
- Heroku 7.54.0
- AWS(S3)
- node 14.15.1
- jQuery

# Function
- User認証機能
  - 新規登録
  - ログイン
  - SNSログイン(WEB API)
  - リセットパスワード(GmailのSMTPを利用)
- 投稿一覧表示
- 投稿機能
  - 新規作成(画像アップロード)
  - 編集
  - 削除
- 投稿検索機能
- タグ一覧表示機能
- マイページ編集機能
- 投稿コメント機能