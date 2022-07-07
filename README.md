# Installation

```bash
git clone https://github.com/bastien70/symfony-rate-limiter.git
cd symfony-rate-limiter
composer install
symfony serve -d
```

1. Go to `127.0.0.1:8000`
2. The rate limiter has started for the first time.
3. Refresh the page until you exhaust your 5 tokens. You will see each time the limit, the number of tokens remaining, and the value of retryAfter.
4. Refresh again. The retryAfter date is equal to the date of your last request plus 1 hour.
5. Refresh again. And again, the refreshAfter date is equal to the date of your last request plus 1 hour.

