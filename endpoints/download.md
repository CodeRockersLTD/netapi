# Endpoint: `?method=download`

Downloads a domain dataset by TLD zone. The response is in CSV format and is GZIP-compressed by default.

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=download&zone_tld=...&dataset_type=...&filter_type=...&token=...

---

## 🔧 Required Parameters

- zone_tld — e.g. "com", "de", "org", or "all-zones"
- dataset_type — "list" (domains only) or "dataset" (with metadata)
- filter_type — "active" (full set) or "new" (past 24h, gTLDs only)
- token — your API key

### Optional Parameters

- format — "plain" for uncompressed output (default: gzip)

---

## 📄 Output Format (CSV)

By default, the response is a `.csv.gz` GZIP-compressed file.

### For `dataset_type=list`

One domain per line:
example.com  
anotherdomain.net  
somedomain.de  

### For `dataset_type=dataset`

CSV with metadata:
DOMAIN,DNS1,DNS2,HOSTNAME,IP,COUNTRY_CODE  
example.com,dns1.host.com,dns2.host.com,host.example.com,1.2.3.4,US

---

## 🔍 Example Output (`dataset_type=dataset`)

example.net,ns1.example.net,ns2.example.net,server1.example.net,192.0.2.10,DE  
demo.com,ns1.demo.com,ns2.demo.com,host.demo.com,203.0.113.5,US  

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=download&zone_tld=de&dataset_type=list&filter_type=active&token=YOUR_API_KEY" -o domains_de.csv.gz

### Python

import requests  
import gzip  
import io

url = "https://netapi.com/api2/"
params = {
    "method": "download",
    "zone_tld": "de",
    "dataset_type": "dataset",
    "filter_type": "active",
    "token": "YOUR_API_KEY"
}

resp = requests.get(url, params=params)
with gzip.open(io.BytesIO(resp.content), 'rt', encoding='utf-8') as f:
    for i in range(10):
        print(f.readline().strip())

---

## 📌 Notes
Check our latest domain API updates here: [https://netapi.com/help/api/](https://netapi.com/help/api/)
- The `new` filter is only supported for major gTLDs like `.com`, `.net`, `.org`.
- Use `format=plain` if you don't want gzip compression.
- The "list" type is lighter and faster for simple domain enumerati
