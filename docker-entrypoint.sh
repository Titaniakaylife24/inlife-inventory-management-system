#!/bin/bash
set -e

# Disable semua MPM yang mungkin aktif
a2dismod mpm_event 2>/dev/null || true
a2dismod mpm_worker 2>/dev/null || true
a2dismod mpm_prefork 2>/dev/null || true

# Aktifkan hanya prefork
a2enmod mpm_prefork

exec apache2-foreground