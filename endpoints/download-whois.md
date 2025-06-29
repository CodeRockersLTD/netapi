# Endpoint: `?method=download-whois`

Downloads a domain dataset filtered by Registrar. The response is in CSV format and is GZIP-compressed by default.

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=download-whois&registrar_id=...&dataset_type=...&token=...

---

## 🔧 Required Parameters

- registrar_id — domain Registrar ID (see `?method=registrars`)
- dataset_type — "list" or "dataset"
- token — your API key

### Optional Parameters

- format — "plain" for uncompressed output (default: gzip)

---

## 📄 Output Format (CSV)

By default, response is GZIP-compressed CSV file.

### For `dataset_type=list`

Each line contains a domain using the specified DNS provider:
cloudflare.com  
cloudflare.de  
cloudflare.net  

### For `dataset_type=dataset`

CSV with additional metadata:
REGISTRAR,DOMAIN,REGISTRATION_DATE,EXPIRATION_DATE,IP,MajesticRank, EMAILS,PHONES,COUNTRY_CODE  

example:
godaddy,example.com,2025-04-23,2029-06-19,115,info@netapi.com,13044568439,1.1.1.1,US

---

## 🔍 Example Output (`dataset_type=dataset`)

godaddy,example.com,2025-04-23,2029-06-19,115,info@netapi.com,13044568439,1.1.1.1,US

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=download-whois&registrar_id=146&dataset_type=list&token=YOUR_API_KEY" -o godaddy_domains.csv.gz

### Python

import requests  
import gzip  
import io

url = "https://netapi.com/api2/"
params = {
    "method": "download-whois",
    "registrar_id": "146",
    "dataset_type": "dataset",
    "token": "YOUR_API_KEY"
}

resp = requests.get(url, params=params)
with gzip.open(io.BytesIO(resp.content), 'rt', encoding='utf-8') as f:
    for i in range(10):
        print(f.readline().strip())

---

## 📌 Notes

- Use `?method=registrars` to get a list of supported `dns_alias` values.
- Use `format=plain` if you need plain-text CSV output.


---

Check our latest Reverse DNS API updates here: [https://netapi.com/help/api/](https://netapi.com/help/api/#dns-api)
