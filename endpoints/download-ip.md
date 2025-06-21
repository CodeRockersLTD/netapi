# Endpoint: `?method=download-ip`

Returns reverse DNS data: IP addresses mapped to lists of associated domains.

The response is returned as a plain-text CSV file and is not compressed by default.

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=download-ip&token=YOUR_API_KEY

---

## 🔧 Required Parameters

- token — your API key

### Optional Parameters

- format — "plain" (default), reserved for future gzip support

---

## 📄 Output Format (CSV)

Each line is a comma-separated pair of:

IP,DOMAINS

Where:
- `IP` is an IPv4 address
- `DOMAINS` is a pipe (`|`)-separated list of domains resolving to that IP

---

## 🔍 Example Output

1.2.3.4,example.com|test.com|myshop.net  
5.6.7.8,hello.org|web.de  

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=download-ip&token=YOUR_API_KEY" -o reverse_dns.csv

### Python

import requests  
import csv  
import io

url = "https://netapi.com/api2/"
params = {
    "method": "download-ip",
    "token": "YOUR_API_KEY"
}

resp = requests.get(url, params=params)

if resp.status_code == 200:
    reader = csv.reader(io.StringIO(resp.text))
    for i, row in enumerate(reader):
        print(row)
        if i >= 9:
            break
else:
    print(f"Error {resp.status_code}: {resp.text}")

---

## 📌 Notes

- Output is not compressed (no gzip).
- Domain lists are pipe-delimited inside a single CSV field.
- One IP may map to multiple domains.
- Reverse DNS may include parked, inactive or short-lived domains.

---

Check our latest domain and IP lookup API updates here: [https://netapi.com/help/api/](https://netapi.com/help/api/)
