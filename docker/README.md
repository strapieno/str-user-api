docker dev env
--------------

This directory contains all the configurations needed by docker images to build, to start and to run a full-featured docker development environment.

**Features**:

1. php 5.6.10
2. custom php-fpm 5.6.10

    2.1. mongo driver 1.6.9

    2.2. xdebug 2.3.1
    
    2.3. xhprof 0.9.4

    2.4. imagick (latest) w/ jpeg and png support + imagick driver 3.1.2

    2.5. icu 55.1 + intl core ext 1.1.0

    2.5. default locale: en_GB


3. nginx 1.6.2
4. mongo (offical image) 3.0.4

**Addresses**:

* strapienouserapi app => **127.0.0.44**
* xhprof => **127.0.0.44:8090**

## Requirements

1. docker >= 1.6.2
2. docker-composer >= 1.3

#### Docs

* Docker [installation guides](https://docs.docker.com/installation).
* Docker Compose [installation guides](https://docs.docker.com/compose/install).

## Usage

Execute the following commands in the **strapienouserapi root**.

```
$ cp docker-compose.yml.dist docker-compose.yml
$ docker-compose -p strapienouserapi
$ docker-compose -p strapienouserapi up -d
```

To stop everything and to remove containers also run following commands.

```
$ docker-compose --project strapienouserapi stop
$ docker-compose --project strapienouserapi rm
```

### Composer

You built the docker environment and you ran it.

Now you need to run composer but you do not have it (and php) locally installed on your machine.

Solution:

```
$ docker run --rm \
    -v $(pwd):/app \
    -v ${HOME}/.ssh:/root/.ssh \
    composer/composer install --ignore-platform-reqs
```

Do you need to update the vendor and the autoload files?

```
$ docker run --rm \
    -v $(pwd):/app \
    -v ${HOME}/.ssh:/root/.ssh \
    composer/composer up -o --ignore-platform-reqs
```

---
