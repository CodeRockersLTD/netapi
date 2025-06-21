# Endpoint: `?method=lookup-domain`

Performs a domain-level lookup and returns DNS and network metadata associated with a given domain.

The response is returned in plain-text CSV format (one line per domain).

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=lookup-domain&domain=example.com&token=YOUR_API_KEY

---

## 🔧 Required Parameters

- domain — fully qualified domain name (e.g. example.com)
- token — your API key

---

## 📄 Output Format (CSV)

Single-line CSV response:

URL,DNS1,DNS2,HOSTNAME,IP,COUNTRY_CODE

### Field Descriptions:

| Field         | Description                                      |
|---------------|--------------------------------------------------|
| `URL`         | The input domain name                            |
| `DNS1`, `DNS2`| Nameservers                                      |
| `HOSTNAME`    | Associated hostname                              |
| `IP`          | Main resolved IP address                         |
| `COUNTRY_CODE`| ISO 2-letter country code of the IP geolocation  |

---

## 🔍 Example Output

example.com,dns1.example.com,dns2.example.com,host.example.com,1.2.3.4,US

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=lookup-domain&domain=example.com&token=YOUR_API_KEY"

### Python

import requests

url = "https://netapi.com/api2/"
params = {
    "method": "lookup-domain",
    "domain": "example.com",
    "token": "YOUR_API_KEY"
}

resp = requests.get(url, params=params)

if resp.status_code == 200:
    print(resp.text.strip())
else:
    print(f"Error {resp.status_code}: {resp.text}")

---

## 📌 Notes

- This method returns only one line per request.
- Bulk lookups are not supported in this method.
- Useful for resolving domains into infrastructure-level data.

---

Check our latest Domain Lookup API updates here: [https://netapi.com/help/api/](https://netapi.com/help/api/)
