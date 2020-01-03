# GuestBook-PHP-Ajax
以 https://github.com/Kurt-Liang/GuestBook-PHP 為基礎再增加 Ajax 功能

### JQuery
使用上週所製作的原生 PHP 版本的 GuestBook 來增加 Ajax 功能，重新把專案瀏覽一遍後，發現在文章內留言的部分做 Ajax 是最合適的。

原本的思路是，留言提交時瀏覽器會跳轉至 comment.php 做輸入資料庫的動作，那使用 Ajax 的新思路就是提交留言後，只傳送資料至 comment.php ，並在 comment.php 中將資料輸入進資料庫後，再將一模一樣的資料傳回瀏覽器，瀏覽器接收到資料後直接顯示在頁面上，這樣就不用重新載入整個頁面了

有修改的部分：article.php , comment.php
