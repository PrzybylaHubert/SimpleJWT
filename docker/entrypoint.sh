#!/usr/bin/env bash
bin/console doctrine:database:create
bin/console doctrine:migrations:migrate --no-interaction
php bin/console lexik:jwt:generate-keypair --skip-if-exists

exec "$@"
