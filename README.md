<h1 align="center"><img src="https://frankenphp.dev/icon.svg" width="45" height="30"/> FrankenPHP API Platform <img src="https://api-platform.com/icon.svg" width="45" height="30"/> ️</h1>

<div align="center">
    <img src="https://img.shields.io/github/actions/workflow/status/toshy/symfony-frankenphp-api-platform/phpcs.yml?branch=main&label=PHPCS" alt="Code style">
    <img src="https://img.shields.io/github/actions/workflow/status/toshy/symfony-frankenphp-api-platform/phpstan.yml?branch=main&label=PHPStan" alt="Static analysis">
    <img src="https://img.shields.io/github/actions/workflow/status/toshy/symfony-frankenphp-api-platform/security.yml?branch=main&label=Security" alt="Security">
    <br />
    <br />
    An <a href="https://api-platform.com/">API platform</a> starting template with <a href="https://github.com/dunglas/symfony-docker">FrankenPHP</a>.
</div>

## 📜 Introduction

This repository acts as a template to set up basic [API platform](https://api-platform.com/) application with [FrankenPHP](https://frankenphp.dev/), using [Docker Compose](https://docs.docker.com/compose/install/) and [Traefik](https://doc.traefik.io/traefik/).

### 🧰 Prerequisites

* [Docker Compose (v2.39.4+)](https://docs.docker.com/compose/install/)
* [Task](https://taskfile.dev/installation/)
* [Reverse proxy | Traefik](https://doc.traefik.io/traefik/) (Optional)
    * It is assumed that the user has a working (development) setup for [Traefik](https://doc.traefik.io/traefik/).

> [!TIP]
> You can switch out Traefik for any other reverse proxy of your choice (or not use a reverse proxy at all), although
> this requires additional tweaking of labels (or exposing ports) in the docker compose configuration.

## 🎬 Get Started

### Update hosts file

Add `frankenphp.local` to your hosts files, e.g. `/etc/hosts` (Unix).

### Initialise dotenv

For first time setup, initialise the `.env.local` from the `.env`.

```shell
task init
```

You can now tweak the values in the `.env.local` if needed.

### Start application services

```shell
task up
```

### Visit the application

If the reverse proxy is configured correctly, you should be able to visit [`frankenphp.local`](https://frankenphp.local) in your browser and be
greeted by Symfony's default landing page.

> [!NOTE]
> You can disregard the SSL certificate warnings for development usages.

### Sync with remote template

If you started the template from this repository, you can sync with the latest changes by running the following command:

```shell
task sync
```

> [!NOTE]
> This uses [coopTilleuls/template-sync](https://github.com/coopTilleuls/template-sync) to sync the template.

## 🧰 DIY

If you want to create a Symfony project from scratch yourself, with the essential dependencies, you
can do the following:

```shell
# Substitute "dev.example.com" with desired project directory name
docker run --rm -it -v $(pwd):/app composer:2 create-project symfony/skeleton:7.3.* dev.example.com
docker run --rm -it -v $(pwd)/dev.example.com:/app composer:2 require webapp -n
sudo chown -R $(id -u):$(id -g) $(pwd)/dev.example.com
 ```

To include FrankenPHP in the newly created project, please follow the [FrankenPHP documentation](https://github.com/dunglas/symfony-docker/blob/main/docs/existing-project.md).

## ❕ Licence

This repository comes with a [MIT license](./LICENSE).
