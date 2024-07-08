### Setup

Clone the Repository.

Execute the following commands:
```
cd test_apip
symfony composer install
symfony server:start
```

On any tool, like Postman, execute the following request:
`POST https://127.0.0.1:8000/api/dummies` with the header `Content-Type: application/ld+json` and the body `{}`