# HNG12 Task 2 - Number Classification API

## 📌 Project Description
This is a simple public API for classifying numbers based on their mathematical properties and fetching fun facts. The API provides:

- Identification of whether a number is prime or perfect.
- Classification of numbers as Armstrong, odd, or even.
- Sum of digits for the given number.
- A fun fact retrieved from the Numbers API.
- JSON responses following RESTful principles.

The API is deployed to a publicly accessible endpoint for easy access [Here](https://hng.samayo.com.ng/HNG12_Task2/api/classify-number?number=317).

## 🚀 Setup Instructions

### 📍 Prerequisites
- PHP installed on your local machine(`php -v` to check in your command line).
- A web server (Apache, Nginx) or use PHP’s built-in server.

### 📍 Local Installation
1. **Clone the repository**
   ```bash
   git clone https://github.com/sam-uel-ayo/HNG12_Task2.git
   cd HNG12_Task2
   ```
2. **Run the PHP server**
   ```bash
   php -S localhost:8000
   ```
4. **Test the API**
   ```sh
   curl http://localhost:8000/api/classify-number?number=371
   ```
   Or open the endpoint in a browser.

## 🔥 API Specification

### 📍 Endpoint:
`GET hng.samayo.com.ng/HNG12_Task2/api/classify-number?number=317`

### 📍 JSON Response Format
#### ✅ Success Response (200 OK)
```json
{
    "number": 371,
    "is_prime": false,
    "is_perfect": false,
    "properties": ["armstrong", "odd"],
    "digit_sum": 11,
    "fun_fact": "371 is an Armstrong number because 3^3 + 7^3 + 1^3 = 371"
}
```

#### ❌ Error Response (400 Bad Request)
```json
{
    "number": "alphabet",
    "error": true
}
```

## 🔗 Resources
- Fun Fact API: [Numbers API](http://numbersapi.com/#42)
- [Parity in Mathematics](https://en.wikipedia.org/wiki/Parity_(mathematics))


## 📜 License
This project is open-source and available under the MIT License.

---
🔹 **Author**: Your Name  
🔹 **HNG12 Internship**: Stage 1 Backend - Number Classification API  
🔹 **Year**: 2025 🚀

