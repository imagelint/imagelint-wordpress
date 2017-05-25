rm imagelint.zip
composer install && zip -r imagelint.zip . -x "*.git*" "*.idea*"
