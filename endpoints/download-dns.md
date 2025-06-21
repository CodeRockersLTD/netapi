# Endpoint: `?method=download-dns`

Downloads a domain dataset filtered by DNS provider. The response is in CSV format and is GZIP-compressed by default.

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=download-dns&dns_alias=...&dataset_type=...&token=...

---

## 🔧 Required Parameters

- dns_alias — DNS provider alias (see `?method=dns`)
- dataset_type — "list" or "dataset"
- token — your API key

### Optional Parameters

- format — "plain" for uncompressed output (default: gzip)

---

## 📄 Output Format (CSV)

By default, response is GZIP-compressed CSV file.

### For `dataset_type=list`

Each line contains a domain using the specified DNS provider:
example-cloudflare.com  
my-site.cloudflare.de  
shop.cloudflare.net  

### For `dataset_type=dataset`

CSV with additional metadata:
DOMAIN,DNS1,DNS2,HOSTNAME,IP,COUNTRY_CODE  
example.com,dns1.cloudflare.com,dns2.cloudflare.com,server.example.com,1.1.1.1,US

---

## 🔍 Example Output (`dataset_type=dataset`)

example.com,dns1.cloudflare.com,dns2.cloudflare.com,server1.example.com,1.1.1.1,US  
shop.io,dns1.cloudflare.com,,cloud.shop.io,1.1.1.2,US  

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=download-dns&dns_alias=cloudflare&dataset_type=list&token=YOUR_API_KEY" -o cloudflare_domains.csv.gz

### Python

import requests  
import gzip  
import io

url = "https://netapi.com/api2/"
params = {
    "method": "download-dns",
    "dns_alias": "cloudflare",
    "dataset_type": "dataset",
    "token": "YOUR_API_KEY"
}

resp = requests.get(url, params=params)
with gzip.open(io.BytesIO(resp.content), 'rt', encoding='utf-8') as f:
    for i in range(10):
        print(f.readline().strip())

---

## 📌 Notes

- Use `?method=dns` to get a list of supported `dns_alias` values.
- Domains are grouped by authoritative DNS provider, not just hostname pattern.
- Use `format=plain` if you need plain-text CSV output.
- Metadata includes IP, DNS names, hostname, and country code.

---

Check our latest domain API updates here: [https://netapi.com/help/api/](https://netapi.com/help/api/)
