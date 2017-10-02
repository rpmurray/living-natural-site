#!/bin/bash

sudo php /var/www/livingnatural/sf/bin/console cache:clear --env=prod --no-debug;
sudo php /var/www/livingnatural/sf/bin/console cache:warmup --env=prod --no-debug;
sudo chown -R www-data /var/www/;
sudo chgrp -R www-data /var/www/;