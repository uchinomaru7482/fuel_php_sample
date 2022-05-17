# Fuel PHP Sample
FuelPHP及びPHP基礎の学習記録

## サーバ起動方法
以下コマンドを実行
```
cd docker
docker compose up -d
docker compose exec php bash
cd server
php oil refine migrate
```

以下URLにアクセス
http://localhost:8080/article
