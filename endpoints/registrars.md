# Endpoint: `?method=registrars`

Returns a list of supported Registrars that can be used with the `download-whois` endpoint.

The response is returned as plain-text CSV.

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=registrars

No authentication or parameters required.

---

## 📄 Output Format (CSV)

Each line contains:

ID,REGISTRAR_NAME,REGISTRAR_BRAND,TOTAL_DOMAINS

### Field Descriptions:

| Field     | Description                        |
|-----------|------------------------------------|
| ID     | Registrars id   |
| name  | Registrars legal entity     |
| brand_name  | Registrars brand name        |
| total  | Total domains found for this Registrar      |

---

## 🔍 Example Output

146, Godaddy Inc, Godaddy, 67898453
146, Godaddy Inc, Godaddy, 67898453

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=registrars"

### Python

import requests

resp = requests.get("https://netapi.com/api2/", params={"method": "registrars"})
print(resp.text.strip())

---

## 📌 Notes

- The `ID` field is used as `registrar_id` in `?method=download-whois`.
- The list may be updated over time as new providers are detected.

---

--

Check our latest API updates here: [https://netapi.com/help/api/](https://netapi.com/help/api/#whois-registrars)

