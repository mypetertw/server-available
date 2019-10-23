# server-available
### Php script to check your server available or down and report Slack channel.

---

## Getting Started

Put `Server-Available.php` to your project.

## Usage

```sh
$ php Server-Available.php
```

## Using Crontab to run script automatic

You can schedule your script using Linux's `Crontab`.

```sh
$ crontab -e
```

Run every day at midnight

```sh
0 0 * * * php /var/www/Server-Available.php
```
