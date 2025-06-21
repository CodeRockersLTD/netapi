# NetAPI – Domain & DNS Dataset API (v2)

NetAPI offers powerful and daily-updated domain datasets via a lightweight API.


**CHECK OUR LATEST DOMAIN API UPDATES HERE:** [https://github.com](https://netapi.com/help/api/)


📡 **Base endpoint:** `https://netapi.com/api2/`  
🔄 Response format: comma-separated CSV (compressed by default) :contentReference[oaicite:2]{index=2}

---

## 📋 Available Endpoints

### 1. List all supported zones
**GET** `?method=zones`

Returns supported TLDs along with daily-update and country-code flags.  
Example output: `com,1,0` (for `.com`) :contentReference[oaicite:3]{index=3}

---

### 2. Download domain lists / datasets
**GET** `?method=download`

**Query parameters:**
- `zone_tld` *(required)* — e.g., `de`, `com`, or `all-zones` for all
- `dataset_type` *(required)* — `list` (domains only) or `dataset` (with metadata)
- `filter_type` *(required)* — `active` (all domains) or `new` (last 24 h; only for gTLDs)
- `token` *(required)* — your API key
- `format` *(optional)* — `plain` (GZ by default) :contentReference[oaicite:4]{index=4}

---

### 3. List supported DNS providers
**GET** `?method=dns`

Retrieve available DNS-provider aliases like `cloudflare` or `godaddy` :contentReference[oaicite:5]{index=5}

---

### 4. Download domains by DNS provider
**GET** `?method=download-dns`

**Query parameters:**
- `dns_alias` *(required)* — provider alias
- `dataset_type`, `token`, and `format` as above :contentReference[oaicite:6]{index=6}

---

### 5. Reverse DNS – IP → domains
**GET** `?method=download-ip`

**Query parameters:**
- `token` *(required)*
- `format` *(optional)* :contentReference[oaicite:7]{index=7}

Returns CSV with `IP,domains_list` columns (compressed by default).

---

### 6. Domain lookup details
**GET** `?method=lookup-domain`

**Query parameters:**
- `domain` *(required)*
- `token` *(required)*

Returns CSV with fields like `URL, DNS1, DNS2, HOSTNAME, IP, COUNTRY_CODE` :contentReference[oaicite:8]{index=8}

---

### 7. IP lookup details
**GET** `?method=lookup-ip`

**Query parameters:**
- `ip` *(required)*
- `token` *(required)*

CSV fields: `DOMAIN, HOSTNAME, DNS1, DNS2` :contentReference[oaicite:9]{index=9}

---

### 8. Compromised IPs & URLs
**GET** `?method=compromised`

**Query parameters:**
- `dataset_type` *(required)* — `ip`, `url`, `ip-all`, or `url-all`
- `token` *(required)* :contentReference[oaicite:10]{index=10}

---

## 🔐 Authentication

All endpoints require a valid API key via URL param:
