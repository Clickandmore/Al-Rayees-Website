#!/usr/bin/env bash
# ---------------------------------------------------------------------------
# Export the Laravel site as static HTML (for GitHub Pages or any static host).
#
#   BASE_URL=https://clickandmore.github.io/al-rayees-website scripts/export-static.sh
#
# Renders every GET route through `php artisan serve`, saves each one as
# <path>/index.html under dist/, copies public/ assets, and rewrites the
# local server address to BASE_URL so links/assets point at the live host.
# Requires: composer deps installed, assets built (npm run build), .env + key.
# ---------------------------------------------------------------------------
set -euo pipefail

BASE_URL="${BASE_URL:?set BASE_URL, e.g. https://clickandmore.github.io/al-rayees-website}"
BASE_URL="${BASE_URL%/}"
OUT="${OUT:-dist}"
PORT="${PORT:-8123}"
LOCAL="http://127.0.0.1:${PORT}"

rm -rf "$OUT" && mkdir -p "$OUT"

# 1) Static assets (everything in public/ except the PHP front controller)
cp -a public/. "$OUT/"
rm -f "$OUT/index.php" "$OUT/.htaccess" "$OUT/hot"

# 2) Start a local server
php artisan serve --host=127.0.0.1 --port="$PORT" >/tmp/artisan-serve.log 2>&1 &
SERVER_PID=$!
trap 'kill $SERVER_PID 2>/dev/null || true' EXIT
for _ in $(seq 1 30); do curl -fs "$LOCAL" >/dev/null && break; sleep 0.5; done

# 3) Render every GET route
php artisan route:list --method=GET --json \
  | php -r '$r=json_decode(stream_get_contents(STDIN),true); foreach($r as $x){ if(!str_contains($x["uri"],"{") && !str_starts_with($x["uri"],"_") && !str_starts_with($x["uri"],"sanctum") && $x["uri"]!=="api/user") echo $x["uri"],"\n"; }' \
  | while read -r uri; do
      path=$([ "$uri" = "/" ] && echo "" || echo "$uri")
      mkdir -p "$OUT/$path"
      curl -fsS "$LOCAL/$path" -o "$OUT/$path/index.html"
      echo "  ✓ /$path"
    done

# 4) Point all absolute URLs at the real host
grep -rl --include='*.html' "$LOCAL" "$OUT" | xargs -r sed -i "s#${LOCAL}#${BASE_URL}#g"

# 5) Custom 404 + disable Jekyll processing on GitHub Pages
cp "$OUT/index.html" "$OUT/404.html"
touch "$OUT/.nojekyll"

echo "Static site exported to $OUT/"
