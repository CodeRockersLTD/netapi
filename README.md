# NetAPI – Domain & DNS Dataset API (v2)

NetAPI offers powerful and daily-updated domain datasets via a lightweight API.


**CHECK OUR LATEST DOMAIN API UPDATES HERE:** [netapi.com/help/api](https://netapi.com/help/api/)


📡 **Base endpoint:** `https://netapi.com/api2/`  
🔄 Response format: comma-separated CSV (compressed by default)


---

## 📋 Available Endpoints

### 1. List all supported zones
**GET** `?method=zones`
[Detailed description](/endpoints/zones.md)

Returns supported TLDs along with daily-update and country-code flags.  
Example output: `com,1,0` (for `.com`) 

---

### 2. Download domain lists / datasets
**GET** `?method=download`

**Query parameters:**
- `zone_tld` *(required)* — e.g., `de`, `com`, or `all-zones` for all
- `dataset_type` *(required)* — `list` (domains only) or `dataset` (with metadata)
- `filter_type` *(required)* — `active` (all domains) or `new` (last 24 h; only for gTLDs)
- `token` *(required)* — your API key
- `format` *(optional)* — `plain` (GZ by default) 

---

### 3. List supported DNS providers
**GET** `?method=dns`

Retrieve available DNS-provider aliases like `cloudflare` or `godaddy` 

---

### 4. Download domains by DNS provider
**GET** `?method=download-dns`

**Query parameters:**
- `dns_alias` *(required)* — provider alias
- `dataset_type`, `token`, and `format` as above 

---


### 5. Domain lookup details
**GET** `?method=lookup-domain`

**Query parameters:**
- `domain` *(required)*
- `token` *(required)*

Returns CSV with fields like `URL, DNS1, DNS2, HOSTNAME, IP, COUNTRY_CODE` 

---

### 6. IP lookup details
**GET** `?method=lookup-ip`

**Query parameters:**
- `ip` *(required)*
- `token` *(required)*

CSV fields: `DOMAIN, HOSTNAME, DNS1, DNS2` 

---

### 7. Compromised IPs & URLs
**GET** `?method=compromised`

**Query parameters:**
- `dataset_type` *(required)* — `ip`, `url`, `ip-all`, or `url-all`
- `token` *(required)* 

---

## 🔐 Authentication

All endpoints except 'compromised' require a valid API token. You can obtain your API token in [NetAPI dashboard](https://netapi.com/dashboard/)

## 🔐 openapi.yaml
📄 [OpenAPI Specification](./openapi.yaml)

