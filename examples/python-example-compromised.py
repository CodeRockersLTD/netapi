import requests
import csv
import io

# API configuration
API_URL = "https://netapi.com/api2/"
API_TOKEN = "YOUR_API_KEY"

# Parameters
params = {
    "method": "compromised",
    "dataset_type": "ip"  # Options: ip, url, ip-all, url-all
  
}

# Make request
response = requests.get(API_URL, params=params)

# Check response
if response.status_code == 200:
    # Parse plain CSV text
    text_stream = io.StringIO(response.text)
    reader = csv.reader(text_stream)
    header = next(reader)
    print("CSV Header:", header)

    # Print first 10 rows
    for i, row in enumerate(reader):
        print(row)
        if i >= 9:
            break
else:
    print(f"Error {response.status_code}: {response.text}")
