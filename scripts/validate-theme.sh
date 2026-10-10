#!/usr/bin/env bash
set -euo pipefail

required_files=(
  front-page.php
  functions.php
  header.php
  inc-product-page.php
  page.php
  page-patio-door-blinds-curtains-edmonton.php
  assets/images/blackout-blinds-edmonton-bedroom.webp
  assets/images/optimized/zebra-blinds.webp
  assets/images/optimized/roller-blinds.webp
  assets/images/optimized/motorized-curtains.webp
)

for file in "${required_files[@]}"; do
  if [[ ! -f "$file" ]]; then
    echo "Missing required recovered-theme file: $file" >&2
    exit 1
  fi
done

grep -q "Blackout Blinds" front-page.php
grep -q "smart-blinds-edmonton" header.php
grep -q "handheld remote" inc-product-page.php
grep -q "There is no phone app, voice assistant, scheduling, or smart-home automation required" inc-product-page.php
grep -q "Theme Name: HighEnd Blinds Recovered" style.css
grep -q "Patio Door Blinds and Curtains Edmonton" page-patio-door-blinds-curtains-edmonton.php
grep -q "patio-door-blinds-curtains-edmonton" functions.php
grep -q "'roller-shades'.*=> 'roller-blinds'" functions.php
grep -q "'motorization'.*=> 'motorized-blinds'" functions.php
grep -q "'measuring-guide'.*=> 'measurement-guide'" functions.php
grep -q "'sun-screen-blinds'.*=> 'roller-blinds'" functions.php
grep -q "rank_math/sitemap/entry" functions.php

if grep -q "motorized curtains.*app\|motorized curtains.*voice\|motorized curtains.*schedule" front-page.php; then
  echo "Motorized-curtain automation language found on the homepage." >&2
  exit 1
fi

echo "Recovered theme integrity checks passed."
