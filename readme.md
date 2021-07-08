# illust station
![5c7ee7900700ed12a8be543e1f88ff14](https://user-images.githubusercontent.com/52768993/124945196-e178f580-e048-11eb-8c2a-0fc09c5d199b.jpeg)

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

# Demonstration
## トップページ
![157a286f67700c1320753aca7a38c29b](https://user-images.githubusercontent.com/52768993/124945860-83004700-e049-11eb-8b16-4b4b797720e4.jpeg)
投稿された画像が一覧で表示されるトップページである。ヘッダーにはログイン及び新規登録ページへのリンクがあり、その下には投稿に紐付けられたタグがランダムで表示される。また、投稿の詳細ページへは表示されている画像を押下すれば遷移する。

## サインアップ
<img width="1199" alt="c2c24242c52c0f647c03ded0208b17f5" src="https://user-images.githubusercontent.com/52768993/124949139-44b85700-e04c-11eb-9468-56ff86b77565.png">
必要事項を記入し新規登録が可能である。ツイッターアカウントがログイン状態であればTwitter APIを用いてツイッターアカウントでサインアップ可能である。

## ログイン
<img width="1199" alt="c2c24242c52c0f647c03ded0208b17f5" src="https://user-images.githubusercontent.com/52768993/124949681-c14b3580-e04c-11eb-9c91-257046c25b82.png">
登録したユーザーがログインできる。Twitter APIを用いてログインも可能である。また、パスワードを失念した際は、再設定リンクを登録したアドレスに送信可能である。

## 投稿詳細ページ
![screencapture-illust-station-herokuapp-posts-show-124-2021-07-09-00_34_31](https://user-images.githubusercontent.com/52768993/124950573-7ed62880-e04d-11eb-902c-c106f0558c40.png)
投稿画像、タイトル、作者、メッセージが閲覧可能である。また、投稿へのコメントフォーム及び作者へのリクエストフォームが配置されている。

## リクエスト機能
<img width="728" alt="c857cea4444cec8b0b4da99bcc5f7f57" src="https://user-images.githubusercontent.com/52768993/124951337-366b3a80-e04e-11eb-8e67-55f40900c4c4.png">
<img width="1255" alt="808d2056ae000212993933894d8bdab7" src="https://user-images.githubusercontent.com/52768993/124951874-b72a3680-e04e-11eb-84cd-c9aa80841a34.png">
作者に描いて欲しいイラストの詳細を記述し、作者のマイページへと送信する。
その後、作者がリクエストに答えてイラストを投稿する。

# DB設計
![illust_station_ER図 - データベース ER 図 (カラスの足記法)](https://user-images.githubusercontent.com/52768993/124953761-61568e00-e050-11eb-85af-38f61cc895a3.png)