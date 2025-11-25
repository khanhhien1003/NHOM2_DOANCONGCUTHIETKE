```markdown
# 📘 Hướng dẫn chạy Frontend ReactJS kết nố  i Flask Backend (Windows CMD)

## 🛠️ 1. Chuẩn bị môi trường
- **Node.js** (phiên bản LTS, ví dụ 20.x)  
  👉 Tải tại [nodejs.org](https://nodejs.org)  
- **Python 3.x** (để chạy Flask backend)  
- **Git** (tuỳ chọn, để clone dự án)  

Kiểm tra phiên bản trong **Windows CMD**:
```cmd
node -v
npm -v
python --version
```

## 📂 2. Cấu trúc thư mục dự án
Bạn đã có thư mục gốc tên **`frontend`**. Bên trong đó cần có thư mục **`src`** để chứa mã nguồn ReactJS:

```
frontend/
├─ src/
│  ├─ components/
│  │  ├─ LeftPanel.jsx
│  │  ├─ CenterPanel.jsx
│  │  ├─ RightPanel.jsx
│  │  ├─ ChatMessage.jsx
│  ├─ context/
│  │  └─ AppContext.jsx
│  ├─ utils/
│  │  ├─ api.js
│  │  └─ latex.js
│  ├─ App.jsx
│  ├─ index.css
│  └─ main.css
├─ public/
│  └─ index.html
├─ .env
├─ package.json
└─ README.md
```

---

## 📦 3. Khởi tạo ReactJS với Vite
Trong thư mục **`frontend`** mở **Windows CMD** và chạy:
```cmd
npm create vite@latest .
```
- Chọn framework: `React`
- Chọn variant: `React + JavaScript`

Cài đặt dependencies:
```cmd
npm install
```

---

## 📦 4. Thêm thư viện cần thiết
```cmd
npm install axios react-markdown dompurify
```

6. Flask backend
Trong thư mục backend (ví dụ flask-server), tạo file app.py:

python
from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

@app.route("/agent/run", methods=["POST"])
def agent_run():
    data = request.get_json()
    prompt = data.get("prompt", "")
    context = data.get("context", "")
    return jsonify({"result": f"Phản hồi cho: {prompt}\n\nContext:\n{context}"})

@app.route("/mcp/start", methods=["POST"])
def mcp_start():
    return jsonify({"status": "running"})

@app.route("/mcp/stop", methods=["POST"])
def mcp_stop():
    return jsonify({"status": "stopped"})

@app.route("/mcp/status")
def mcp_status():
    return jsonify({"status": "running"})

@app.route("/notion/<page_id>")
def notion(page_id):
    return jsonify({"full_content": "demo", "problems": {"Bài 1": "x+y=1"}})

@app.route("/notion/append", methods=["POST"])
def notion_append():
    return jsonify({"status": "ok"})

if __name__ == "__main__":
    app.run(port=5000, debug=True)



Chạy backend trong CMD:
```cmd
python app.py
```

---

## 🚀 7. Chạy React frontend
Trong thư mục **`frontend`**:
```cmd
npm run dev
```

👉 Mặc định chạy ở `http://localhost:5173`

---

## 🎨 8. Kiểm tra giao diện
- Mở trình duyệt tại `http://localhost:5173`
- Bạn sẽ thấy giao diện 3 panel:
  - **Left Panel**: quản lý MCP + Notion
  - **Center Panel**: chat chính
  - **Right Panel**: thông tin hệ thống
- Thử nhập tin nhắn → Flask backend sẽ trả phản hồi.

---

## 🌙 9. Tính năng nâng cấp
- **Dark Mode Toggle**: nút 🌙/🌞 trên thanh top-bar.
- **Typing Indicator**: hiển thị “Trợ lý đang gõ…” khi chờ phản hồi.
- **Message Reactions**: thả 👍 hoặc ❤️ vào tin nhắn.

---

## ✅ 10. Tóm tắt
- **Frontend**: ReactJS + Vite, chạy bằng `npm run dev` trong CMD.
- **Backend**: Flask, chạy bằng `python app.py` trong CMD.
- **Kết nối**: qua API URL `http://localhost:5000`.

---
```