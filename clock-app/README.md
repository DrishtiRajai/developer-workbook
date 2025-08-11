# ⏰ Clock App with Quotes & Location Info

A responsive web app that displays:
- **Live digital clock** (auto-updates every second)
- **Dynamic greeting** (morning, afternoon, evening, or night)
- **Random motivational quotes** (via [Quotable API](https://api.quotable.io/))
- **User's timezone & location** (via [IPBase API](https://ipbase.com/))
- **Day of year, week number, and more** (via [World Time API](https://worldtimeapi.org/))

---

## 📸 Features
- **Real-Time Clock** – Displays current time with leading zero formatting.
- **Adaptive Greetings** – Automatically changes message depending on time of day.
- **Day/Night Theme** – Switches background and styles based on local time.
- **Random Quotes** – Fetches new quotes on demand.
- **"More" Info Section** – Displays extended location & time details.
- **Responsive Design** – Adjusts layout and greeting for mobile & desktop.

---

## 🛠 Tech Stack
- **HTML5** – Structure
- **CSS3** – Styling & responsive layout
- **JavaScript (ES6+)** – Logic, API calls, DOM manipulation
- **APIs Used:**
  - [Quotable API](https://api.quotable.io/) – Random quotes
  - [IPBase API](https://ipbase.com/) – Location & timezone
  - [World Time API](https://worldtimeapi.org/) – Date/time details

---

## 📂 Project Structure
clock-app/
│── assets/
└── README.md
└── script.js
└── style.css
└── index.html


---

## 🚀 Getting Started

### 1️⃣ Clone the repo

git clone https://github.com/DrishtiRajai/clock-app.git
cd clock-app

### 1️⃣ Open in browser

Simply open index.html in your browser.
No build step is required.

🔑 API Keys
For location data, you’ll need an IPBase API Key.
Replace the value of apiKey in script.js:

const apiKey = 'YOUR_API_KEY_HERE';

📧 Contact
Drishti Rajai
📩 drishtirajai7@gmail.com


💡 This app is part of my Developer Workbook — a collection of projects I built during my web development training.
