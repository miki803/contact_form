
# お問い合わせフォーム  

## 環境構築 
Dockerビルド   
1.git clone  git@github.com:miki803/contact-form.git  
2.docker-compose up-d--build  

Laravel環境構築  
1.docker-compose exec php bash  
2.composer install  
3.envexampleファイルから.envを作成し、環境変数を変更  
4.php artisan key:generate  
5.php artisan migrate  
6.php aritsan db:seed  

## 使用技術  
PHP 8.1.33  
Laravel 8.83.8  
MySQL 8.0.26  

## ER図  

  <img width="618" height="1081" alt="er drawio" src="https://github.com/user-attachments/assets/736bf3b0-eb28-4937-a76c-80afa175cd64" />

## URL  

開発環境：http://localhost/  
phpMyAdmin:http://localhost:8080   
