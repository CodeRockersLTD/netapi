# Endpoint: `?method=lookup-ip`

Performs a reverse lookup for a specific IP address and returns associated domain metadata.

The response is returned as plain-text CSV (one line per domain mapped to the IP).

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=lookup-ip&ip=1.2.3.4&token=YOUR_API_KEY

---

## 🔧 Required Parameters

- ip — IPv4 address to look up (e.g. 1.2.3.4)
- token — your API key

---

## 📄 Output Format (CSV)

Each line corresponds to one domain mapped to the input IP:

DOMAIN,HOSTNAME,DNS1,DNS2

### Field Descriptions:

| Field      | Description                      |
|------------|----------------------------------|
| DOMAIN     | Domain associated with the IP    |
| HOSTNAME   | Hostname pointing to the IP      |
| DNS1, DNS2 | Nameservers                      |

---

## 🔍 Example Output

example.com,host1.example.com,ns1.example.com,ns2.example.com  
shop.net,cloud.shop.net,dns1.shop.net,dns2.shop.net

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=lookup-ip&ip=1.2.3.4&token=YOUR_API_KEY"

### Python

import requests

url = "https://netapi.com/api2/"
params = {
    "method": "lookup-ip",
    "ip": "1.2.3.4",
    "token": "YOUR_API_KEY"
}

resp = requests.get(url, params=params)

if resp.status_code == 200:
    print(resp.text.strip())
else:
    print(f"Error {resp.status_code}: {resp.text}")

---

## 📌 Notes

- If multiple domains resolve to the same IP, multiple rows will be returned.
- For bulk reverse DNS datasets, use `?method=download-ip` instead.
- Supports only IPv4 at this time.

---

Check our latest IP lookup API updates here: [https://netapi.com/help/api/](https://netapi.com/help/api/#lookup-ip-api)
