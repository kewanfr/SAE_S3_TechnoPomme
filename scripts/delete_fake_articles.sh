#!/usr/bin/env bash
cd "$(dirname "$0")/../codeigniter4-framework-68d1a58"
php -r "\$db = new SQLite3('writable/db_sae.db'); \$db->exec(\"DELETE FROM products WHERE tags LIKE '%fake-article%'\"); echo 'Faux articles supprimés: ' . \$db->changes() . PHP_EOL;"