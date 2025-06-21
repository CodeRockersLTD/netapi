# Endpoint: `?method=zones`

Returns a list of all supported TLD zones available in Netapi, along with flags indicating daily updates and whether the zone is a country-code TLD (ccTLD).

---

## 🔗 Full Request

GET https://netapi.com/api2/?method=zones

No authentication or parameters required.

---

## 📄 Output Format (plain CSV)

Each line contains the following comma-separated fields:

ZONE_TLD,DAILY_UPDATES,IS_COUNTRY_CODE

### Field Descriptions

Field             | Type   | Description
------------------|--------|----------------------------------------------------
ZONE_TLD          | string | Top-level domain (e.g., com, de, io)
DAILY_UPDATES     | int    | 1 if the zone is updated daily, 0 if not
IS_COUNTRY_CODE   | int    | 1 if the zone is a country-code TLD (ccTLD), 0 otherwise

---

## 🔍 Example Output

com,1,0
de,1,1
org,1,0
ru,1,1
io,0,1

This means:
- .com is updated daily and is not a country-code
- .de is a ccTLD and is updated daily
- .io is a ccTLD but not updated daily

---

## 🧪 Usage Examples

### cURL

curl "https://netapi.com/api2/?method=zones"

### Python

import requests

response = requests.get("https://netapi.com/api2/", params={"method": "zones"})
print(response.text)

---

## 📌 Notes

- This endpoint is useful for building dynamic zone selectors.
- Some zones (like .io) may not be updated daily — use DAILY_UPDATES flag to filter.
- The list includes both generic and country-code TLDs.


