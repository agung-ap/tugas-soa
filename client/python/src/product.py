import requests
import json

response = requests.get("http://host.docker.internal:8000/product")
json_formatted_str = json.dumps(response.json(), indent=4)
print(json_formatted_str)