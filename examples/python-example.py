import requests
import gzip
import io

# Your API parameters
API_URL = "https://netapi.com/api2/"
API_TOKEN = "YOUR_API_KEY"

# Parameters for API request
params = {
    "method": "download",
    "zone_tld": "net",           # e.g., 'de', 'com', or 'all-zones'
    "dataset_type": "list",     # 'list' or 'dataset'
    "filter_type": "active",    # 'active' or 'new' (for gTLD)
    "token": API_TOKEN,
}

# Make the request
response = requests.get(API_URL, params=params)

# Check if request is successful
if response.status_code == 200:
    # Decompress gzip content
    with gzip.open(io.BytesIO(response.content), 'rt', encoding='utf-8') as f:
        # Read and print first 10 lines
        for _ in range(10):
            line = f.readline()
            print(line.strip())
else:
    print(f"Error {response.status_code}: {response.text}")
