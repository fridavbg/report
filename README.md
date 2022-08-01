# Report page for BTHs MVC course


# FORMAT CODE

## PHP Coding Standards Fixer

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src
```

# Code Sniffer

## cs checks code - bf corrects code

```
tools/php-codesniffer/vendor/bin/phpcs -h
tools/php-codesniffer/vendor/bin/phpcbf -h
```

## Execute the codestyle checker using the PSR-12 standard

```
tools/php-codesniffer/vendor/bin/phpcs --standard=PSR12 src
```

## SCRIPTS

### You can verify that your update did not make the composer.json corrupt by running the following command.

```
composer validate
```
- <mark>csfix</mark> formats code so it looks the same all throughout all Symfony modules.
 - <mark>phpcs</mark> checks the codestyle and provide warnings. 
 - <mark>phpcbf</mark> fixes the codestyle

```
composer csfix          -- Fix codestyle / format
composer phpcs          -- Check code standard
composer phpcbf         -- Correct code standard
```

# PHP built in webserver
You can open the PHP built in webserver to verify the installation.

```
php -S localhost:8888 -t public
```
