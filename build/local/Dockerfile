FROM thecodingmachine/php:8.3-v4-fpm

ARG WWWUSER
ARG WWWGROUP

# Создаем группу и пользователя с большими ID
RUN groupadd -g ${WWWGROUP} appgroup 2>/dev/null || true
RUN useradd -u ${WWWUSER} -g ${WWWGROUP} -m -s /bin/bash appuser 2>/dev/null || true

USER appuser
