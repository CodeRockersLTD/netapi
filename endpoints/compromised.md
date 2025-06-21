# Endpoint: `?method=compromised`

Returns lists of compromised IPs or URLs collected from threat intelligence feeds.

The response is returned as plain-text CSV.

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=compromised&dataset_type=...

---

## 🔧 Required Parameters

- dataset_type — one of:
  - `ip`       → recent compromised IPs (24h)
  - `ip-all`   → full list of known compromised IPs
  - `url`      → recent compromised URLs (24h)
  - `url-all`  → full list of known malicious URLs

---

## 📄 Output Format (CSV)

The format depends on the selected `dataset_type`.

### For `ip` / `ip-all`:

IP,DATE_REPORTED,SOURCE

### For `url` / `url-all`:

URL,DATE_REPORTED,SOURCE

---

## 🔍 Example Output

**(dataset_type = ip):**

185.38.184.53,2025-06-20,abuse-db  
94.102.51.200,2025-06-19,phishing-tracker  

**(dataset_type = url):**

bad-site.com,2025-06-20,url-blacklist  
fakebank.net,2025-06-19,phishing-reports

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=compromised&dataset_type=ip"

### Python

import requests  
import csv  
import io

url = "https://netapi.com/api2/"
params = {
    "method": "compromised",
    "dataset_type": "ip"  # or 'url', 'ip-all', 'url-all'
}

resp = requests.get(url, params=params)

if resp.status_code == 200:
    reader = csv.reader(io.StringIO(resp.text))
    header = next(reader)
    print("Header:", header)
    for i, row in enumerate(reader):
        print(row)
        if i >= 9:
            break
else:
    print(f"Error {resp.status_code}: {resp.text}")

---

## 📌 Notes

- `ip` and `url` return only the last 24 hours.
- `ip-all` and `url-all` return the full threat database.
- The `SOURCE` field indicates where the compromise was reported.
- Response is not compressed.

---

Check our latest Compromised Domain and IP API updates here: [https://netapi.com/help/api/](https://netapi.com/help/api/#compromised-api)
