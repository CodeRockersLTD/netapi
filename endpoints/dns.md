# Endpoint: `?method=dns`

Returns a list of supported DNS providers that can be used with the `download-dns` endpoint.

The response is returned as plain-text CSV.

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=dns

No authentication or parameters required.

---

## 📄 Output Format (CSV)

Each line contains:

ALIAS,PROVIDER

### Field Descriptions:

| Field     | Description                        |
|-----------|------------------------------------|
| ALIAS     | DNS provider alias (used in API)   |
| PROVIDER  | Full name of the DNS provider      |

---

## 🔍 Example Output

cloudflare,Cloudflare Inc.  
godaddy,GoDaddy LLC  
google,Google Domains  
aws,Amazon Web Services  

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=dns"

### Python

import requests

resp = requests.get("https://netapi.com/api2/", params={"method": "dns"})
print(resp.text.strip())

---

## 📌 Notes

- The `ALIAS` field is used as `dns_alias` in `?method=download-dns`.
- The list may be updated over time as new providers are detected.

---

--

Check our latest API updates here: [https://netapi.com/help/api/](https://netapi.com/help/api/#dns-api-list)

