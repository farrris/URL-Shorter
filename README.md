# API Сервис для сокращения ссылок

## Основные положения

* Запуск проекта: `sh deploy.sh`
* Запуск тестов: `./vendor/bin/sail artisan test`
* Swagger документация api методов доступна по адресу: `http://localhost/api/documentation`

## Документация

### POST: /api/link - создание сокращенной ссылки
Входные данные: url (string)  
Результат:   
```
{  
    "msg": "Success",  
    "shortUrl": {
        id: number,  
        original_url: string,  
        short_url: string  
    }
}
```

Пример запроса: `curl -XPOST -H "Content-type: application/json" -d '{"url":"https://habr.com"}' 'http://localhost/api/link`

### GET: /api/{shortLink} - перенаправление на оригинальный url по сокращенной ссылке
Параметры: shortUrl (string)  
Результат: редирект на оригинальный url  
Пример запроса: `curl -XGET 'http://localhost/kK3ORTqD'`
