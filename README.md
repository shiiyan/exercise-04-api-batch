`Phalcon`を使ってログイン、ログアウト機能を実装したデモアプリです。ログイン機能はGitHubのOauth API経由で実現しました。


## 注意事項
1. `config/auth.php`にGitHubより発行されたCLIENT_IDとCLIENT_SECRETを入れる必要があります。

2. SQLサーバに`myusers`というデータベースと`users`テーブルを事前に作る必要があります。
```sql
CREATE TABLE `users` (
   `id` int(11) NOT NULL AUTO_INCREMENT, 
   `github_id` int,
   `name` varchar(100) COLLATE utf8_bin DEFAULT NULL, 
   `html_url` varchar(500) COLLATE utf8_bin DEFAULT NULL, 
   `avatar_url` varchar(120) COLLATE utf8_bin DEFAULT NULL, 
   PRIMARY KEY (`id`) 
   );
```
3. Sign up機能がないため、プロファイルを表示する為には、予めユザーのデータをデータベースにInsertしてください。
## 課題４のアップデート
1. 論理削除の実装
2. APIとプロファイルコントローラーの修正
3. ログイン後に集計サマリー一覧と検索機能の追加  <br/>`summaries`テーブル例：
![Summary of products](https://github.com/shiiyan/exercise-04-api-rev/blob/master/%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88%202018-12-04%2016.17.56.png?raw=true "Summary of Products")<br/>
期間で検索例：
![Summary of products](https://github.com/shiiyan/exercise-04-api-rev/blob/master/%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88%202018-12-04%2016.18.13.png?raw=true "Summary of Products")

