# BỘ GIÁO DỤC VÀ ĐÀO TẠO
# TRƯỜNG ĐẠI HỌC DUY TÂN

Tên đề tài: **XÂY DỰNG WEBSITE BÁN HÀNG TÍCH HỢP AI TÌM KIẾM**

Tài liệu: **KẾ HOẠCH KIỂM THỬ (TEST PLAN) – GIAI ĐOẠN 08/11/2025 → 08/12/2025**

GVHD: ……………….

Nhóm SVTH: ……………….

Địa điểm: Đà Nẵng, tháng 11 năm 2025

---

## Mục lục
1. [Giới thiệu](#1-giới-thiệu)
   1. [Mục tiêu](#11-mục-tiêu)
   2. [Phạm vi tài liệu](#12-phạm-vi-tài-liệu)
   3. [Thuật ngữ và viết tắt](#13-thuật-ngữ-và-viết-tắt)
   4. [Tài liệu tham khảo](#14-tài-liệu-tham-khảo)
   5. [Giả định và ràng buộc](#15-giả-định-và-ràng-buộc)
   6. [Chiến lược kiểm thử](#16-chiến-lược-kiểm-thử)
2. [Phạm vi và kế hoạch chi tiết](#2-phạm-vi-và-kế-hoạch-chi-tiết)
   1. [Chức năng kiểm thử Sprint 1](#21-các-chức-năng-kiểm-thử-trong-sprint-1)
   2. [Chức năng kiểm thử Sprint 2](#22-các-chức-năng-kiểm-thử-trong-sprint-2)
   3. [Chức năng kiểm thử Sprint 3](#23-các-chức-năng-kiểm-thử-trong-sprint-3)
   4. [Phạm vi loại trừ](#24-các-chức-năng-không-được-kiểm-thử)
   5. [Tài liệu và sản phẩm bàn giao](#25-các-tài-liệu-và-sản-phẩm-bàn-giao)
   6. [Lịch trình kiểm thử chi tiết](#26-lịch-trình-kiểm-thử-chi-tiết)
   7. [Ma trận theo dõi yêu cầu – kiểm thử](#27-ma-trận-theo-dõi-yêu-cầu--kiểm-thử)
3. [Điều kiện kiểm thử](#3-các-điều-kiện-kiểm-thử)
   1. [Điều kiện bắt đầu (Entry Criteria)](#31-điều-kiện-bắt-đầu-entry-criteria)
   2. [Điều kiện kết thúc (Exit Criteria)](#32-điều-kiện-kết-thúc-exit-criteria)
   3. [Quy tắc ghi nhận và xử lý lỗi](#33-quy-tắc-ghi-nhận-và-xử-lý-lỗi)
   4. [Rủi ro và phương án ứng phó](#34-rủi-ro-và-phương-án-ứng-phó)
4. [Môi trường kiểm thử](#4-môi-trường-kiểm-thử)
   1. [Phần cứng và hệ điều hành](#41-phần-cứng-và-hệ-điều-hành)
   2. [Công cụ hỗ trợ](#42-công-cụ-hỗ-trợ)
5. [Vai trò và trách nhiệm](#5-vai-trò-và-trách-nhiệm)
6. [Quản lý truyền thông và báo cáo](#6-quản-lý-truyền-thông-và-báo-cáo)

---

## 1. Giới thiệu

### 1.1. Mục tiêu
- **Đảm bảo tiến độ:** Lập kế hoạch, giám sát và kiểm soát toàn bộ hoạt động kiểm thử trong khoảng thời gian từ **08/11/2025 đến 08/12/2025**.
- **Đảm bảo chất lượng:** Xác minh các chức năng chính của hệ thống thương mại điện tử tích hợp AI đáp ứng yêu cầu nghiệp vụ mô tả trong `Product Backlog` và `ArchitectureDocument.md`.
- **Đảm bảo phối hợp:** Cung cấp nền tảng trao đổi giữa nhóm phát triển, nhóm QA và giảng viên hướng dẫn để thống nhất tiêu chí giao sản phẩm.

### 1.2. Phạm vi tài liệu
- **Áp dụng:** Toàn bộ quá trình kiểm thử phần mềm trong giai đoạn hoàn thiện chức năng và chuẩn bị nghiệm thu nội bộ.
- **Bao phủ:** Sprint 1, Sprint 2 và Sprint 3, tương ứng với ba nhóm chức năng người dùng – AI – quản trị.
- **Không bao gồm:** Các hạng mục triển khai hạ tầng, kiểm thử hiệu năng quy mô lớn hoặc kiểm thử bảo mật chuyên sâu (được xử lý ở tài liệu bổ sung nếu cần).

### 1.3. Thuật ngữ và viết tắt

| STT | Thuật ngữ | Ghi chú mô tả |
|:---:|-----------|---------------|
| 1 | Test Plan | Kế hoạch kiểm thử tổng thể cho từng giai đoạn. |
| 2 | Test Case | Kịch bản kiểm thử với bước, dữ liệu, kết quả mong đợi. |
| 3 | Sprint | Chu kỳ làm việc 10 ngày trong kế hoạch Agile. |
| 4 | QA | Quality Assurance – đội ngũ đảm bảo chất lượng. |
| 5 | UAT | User Acceptance Testing – kiểm thử chấp nhận người dùng. |
| 6 | Defect | Lỗi/bug được ghi nhận trong quá trình kiểm thử. |

### 1.4. Tài liệu tham khảo
- `Proposal` dự án.
- `Product Backlog` cập nhật ngày 05/11/2025.
- `Project Plan` (phiên bản 2025).
- `ArchitectureDocument.md`, `UIDesignDocument.md` trong cùng thư mục dự án.
- `Coding Standard` và `API Specification` nội bộ.

### 1.5. Giả định và ràng buộc
- Tất cả thành viên có mặt đầy đủ trong khung thời gian 08/11/2025 → 08/12/2025.
- Môi trường kiểm thử nội bộ ổn định, dữ liệu mô phỏng đã được chuẩn bị trước ngày 07/11/2025.
- Các chức năng được chuyển giao theo mốc lập trình ở cuối mỗi sprint (T-1 ngày trước phiên kiểm thử chính thức).
- Dụng cụ quản lý (Jira/Excel) hoạt động ổn định; trường hợp mất truy cập quá 4 giờ sẽ kích hoạt phương án dự phòng (ghi nhận thủ công).

### 1.6. Chiến lược kiểm thử
- **Cấp độ kiểm thử:**
  - *Unit Test:* do nhóm phát triển thực hiện trước khi bàn giao (không nằm trong tài liệu nhưng là điều kiện đầu vào).
  - *Functional/System Test:* do QA thực hiện theo test case, kiểm tra toàn bộ luồng người dùng.
  - *Integration Test:* kiểm tra API, quy trình AI tìm kiếm hình ảnh, đồng bộ dữ liệu đơn hàng.
  - *UAT:* thực hiện cuối Sprint 3 với sự tham gia của giảng viên hướng dẫn.
- **Phương pháp:** Kiểm thử hộp đen (black-box), dựa trên yêu cầu và hành vi người dùng.
- **Tiêu chí ưu tiên:** Các chức năng có tác động trực tiếp tới khách hàng (tìm kiếm AI, thanh toán) được ưu tiên kiểm thử sớm trong mỗi sprint.

---

## 2. Phạm vi và kế hoạch chi tiết

### 2.1. Các chức năng kiểm thử trong Sprint 1 (08/11/2025 – 17/11/2025)
- Đăng nhập.
- Đăng ký.
- Đổi mật khẩu.
- Trang chủ.
- Danh sách sản phẩm.
- Chi tiết sản phẩm.

### 2.2. Các chức năng kiểm thử trong Sprint 2 (18/11/2025 – 27/11/2025)
- Tìm kiếm.
- Tìm kiếm AI (camera/ảnh).
- Quy trình mua hàng.
- Giỏ hàng.
- Tài khoản cá nhân.
- Lấy lại mật khẩu.

### 2.3. Các chức năng kiểm thử trong Sprint 3 (28/11/2025 – 08/12/2025)
- Quản lý sản phẩm.
- Quản lý tài khoản.
- Xem hóa đơn.
- Quản lý hóa đơn.
- Thống kê báo cáo.
- Phiên UAT tổng hợp.

### 2.4. Các chức năng không được kiểm thử
- Không có chức năng nào bị loại khỏi phạm vi; toàn bộ yêu cầu trong `Product Backlog` của ba sprint đều được kiểm thử.

### 2.5. Các tài liệu và sản phẩm bàn giao
- `TestPlanDocument.md` (tài liệu hiện tại).
- `TestCaseDocument.xlsx` (danh sách test case chi tiết, cập nhật hàng sprint).
- `DefectLog.xlsx` (sổ tay ghi nhận lỗi, trạng thái, mức độ ưu tiên).
- `Daily Test Report` (mẫu báo cáo ngày dạng Google Sheet/Excel).
- `Sprint Test Summary` (báo cáo tổng kết mỗi sprint, nộp cho GVHD).

### 2.6. Lịch trình kiểm thử chi tiết

#### 2.6.1. Tổng quan mốc thời gian

| Sprint | Khoảng thời gian | Mục tiêu chính | Phiên kiểm thử chấp nhận |
|:------:|------------------|----------------|---------------------------|
| 1 | 08/11/2025 – 17/11/2025 | Ổn định chức năng người dùng cơ bản | 17/11/2025 | 
| 2 | 18/11/2025 – 27/11/2025 | Hoàn thiện tính năng AI và mua hàng | 27/11/2025 |
| 3 | 28/11/2025 – 08/12/2025 | Quản trị, báo cáo, tổng kiểm thử    | 08/12/2025 (UAT) |

#### 2.6.2. Lịch trình Sprint 1 (08/11/2025 – 17/11/2025)

| Mốc | Nội dung công việc | Ngày bắt đầu | Ngày kết thúc | Thời lượng (giờ) | Phụ trách |
|:---:|--------------------|--------------|---------------|-----------------:|-----------|
| S1.0 | Khởi động kiểm thử, rà soát môi trường | 08/11/2025 | 08/11/2025 | 4 | Minh, Bửu |
| S1.1 | Hoàn thiện Test Plan chi tiết Sprint 1 | 08/11/2025 | 09/11/2025 | 6 | Minh |
| S1.2 | Thiết kế test case Đăng nhập – Đăng ký – Đổi mật khẩu | 09/11/2025 | 10/11/2025 | 8 | T. Thắng |
| S1.3 | Thiết kế test case Trang chủ – Danh sách – Chi tiết sản phẩm | 10/11/2025 | 11/11/2025 | 8 | Bửu |
| S1.4 | Chuẩn bị dữ liệu kiểm thử mock (tài khoản, sản phẩm) | 11/11/2025 | 11/11/2025 | 4 | Nhật Quang |
| S1.5 | Thực thi kiểm thử vòng 1 | 12/11/2025 | 14/11/2025 | 18 | QA team |
| S1.6 | Ghi nhận và chuyển lỗi cho dev | 12/11/2025 | 15/11/2025 | 6 | Minh |
| S1.7 | Re-test và xác nhận fix | 16/11/2025 | 17/11/2025 | 10 | QA team |
| S1.8 | Báo cáo tổng kết Sprint 1 | 17/11/2025 | 17/11/2025 | 2 | Võ Đỗ Văn Minh |

#### 2.6.3. Lịch trình Sprint 2 (18/11/2025 – 27/11/2025)

| Mốc | Nội dung công việc | Ngày bắt đầu | Ngày kết thúc | Thời lượng (giờ) | Phụ trách |
|:---:|--------------------|--------------|---------------|-----------------:|-----------|
| S2.0 | Họp kick-off Sprint 2, cập nhật Test Plan | 18/11/2025 | 18/11/2025 | 3 | Minh |
| S2.1 | Thiết kế test case Tìm kiếm & Tìm kiếm AI | 18/11/2025 | 19/11/2025 | 10 | Minh |
| S2.2 | Thiết kế test case Mua hàng & Giỏ hàng | 19/11/2025 | 20/11/2025 | 10 | Bửu |
| S2.3 | Thiết kế test case Tài khoản cá nhân & Lấy lại mật khẩu | 20/11/2025 | 21/11/2025 | 8 | T. Thắng |
| S2.4 | Chuẩn bị dữ liệu hình ảnh cho AI | 21/11/2025 | 22/11/2025 | 6 | Nhật Quang |
| S2.5 | Thực thi kiểm thử vòng 1 | 22/11/2025 | 24/11/2025 | 18 | QA team |
| S2.6 | Đánh giá độ chính xác AI, ghi nhận lỗi | 22/11/2025 | 25/11/2025 | 6 | Minh |
| S2.7 | Re-test & xác nhận lỗi ưu tiên | 26/11/2025 | 27/11/2025 | 10 | QA team |
| S2.8 | Báo cáo Sprint 2 & đề xuất cải tiến | 27/11/2025 | 27/11/2025 | 2 | Võ Đỗ Văn Minh |

#### 2.6.4. Lịch trình Sprint 3 (28/11/2025 – 08/12/2025)

| Mốc | Nội dung công việc | Ngày bắt đầu | Ngày kết thúc | Thời lượng (giờ) | Phụ trách |
|:---:|--------------------|--------------|---------------|-----------------:|-----------|
| S3.0 | Kick-off Sprint 3 & rà soát tồn đọng | 28/11/2025 | 28/11/2025 | 3 | Minh |
| S3.1 | Thiết kế test case Quản lý sản phẩm & tài khoản | 28/11/2025 | 29/11/2025 | 8 | Bửu |
| S3.2 | Thiết kế test case Hóa đơn & báo cáo thống kê | 29/11/2025 | 30/11/2025 | 8 | T. Thắng |
| S3.3 | Chuẩn bị dữ liệu back-office, phân quyền | 30/11/2025 | 01/12/2025 | 6 | Nhật Quang |
| S3.4 | Thực thi kiểm thử vòng 1 | 02/12/2025 | 04/12/2025 | 18 | QA team |
| S3.5 | Kiểm tra chéo UAT nội bộ | 05/12/2025 | 06/12/2025 | 8 | QA + Dev |
| S3.6 | Re-test cuối & chuẩn bị kịch bản UAT | 07/12/2025 | 07/12/2025 | 6 | Minh |
| S3.7 | Phiên UAT với GVHD | 08/12/2025 | 08/12/2025 | 6 | Tập thể nhóm |
| S3.8 | Báo cáo tổng kết dự án kiểm thử | 08/12/2025 | 08/12/2025 | 3 | Võ Đỗ Văn Minh |

### 2.7. Ma trận theo dõi yêu cầu – kiểm thử

| Yêu cầu/Chức năng | Sprint | Loại kiểm thử | Test Case ID (dự kiến) | Trạng thái mong đợi |
|-------------------|:------:|---------------|-------------------------|----------------------|
| Đăng nhập         | 1 | Functional, Security smoke | TC-S1-LOGIN-001 → 010 | Pass ≥ 95% |
| Đăng ký           | 1 | Functional, Validation | TC-S1-SIGNUP-001 → 008 | Pass ≥ 95% |
| Tìm kiếm          | 2 | Functional, Usability | TC-S2-SEARCH-001 → 006 | Pass ≥ 95% |
| Tìm kiếm AI       | 2 | Functional, Accuracy | TC-S2-AI-IMG-001 → 015 | Độ chính xác ≥ 85% |
| Mua hàng          | 2 | Functional, Integration | TC-S2-CHECKOUT-001 → 012 | Pass ≥ 95% |
| Quản lý sản phẩm  | 3 | System, Role-based | TC-S3-ADMIN-PROD-001 → 010 | Pass ≥ 95% |
| Thống kê          | 3 | Functional, Data integrity | TC-S3-REPORT-001 → 008 | Đối soát số liệu khớp 100% |

---

## 3. Các điều kiện kiểm thử

### 3.1. Điều kiện bắt đầu (Entry Criteria)
- Tất cả tính năng bàn giao kèm tài liệu hướng dẫn sử dụng nội bộ.
- Kết quả Unit Test đạt ≥ 90% và không còn lỗi mức khẩn cấp.
- Môi trường kiểm thử đã cấu hình giống môi trường staging (phiên bản backend, frontend, cơ sở dữ liệu cập nhật 07/11/2025).
- Bộ test case tương ứng mỗi chức năng được duyệt bởi QA Lead.

### 3.2. Điều kiện kết thúc (Exit Criteria)
- 100% test case được thực thi ít nhất một lần.
- Không còn lỗi mức **Critical** hoặc **High** chưa xử lý; lỗi **Medium/Low** phải có kế hoạch khắc phục rõ ràng.
- Báo cáo kiểm thử từng sprint và báo cáo tổng kết đã được gửi cho GVHD và nhóm phát triển.
- Tài liệu `TestCaseDocument.xlsx` và `DefectLog.xlsx` được cập nhật lần cuối sau UAT.

### 3.3. Quy tắc ghi nhận và xử lý lỗi

| Mức độ | Định nghĩa | Thời gian phản hồi | Thời gian khắc phục mục tiêu |
|:------:|------------|--------------------|-------------------------------|
| Critical | Gây gián đoạn toàn hệ thống, không có giải pháp thay thế. | Phản hồi ≤ 2 giờ | Sửa ≤ 1 ngày |
| High | Ảnh hưởng chức năng chính, có thể có workaround tạm. | Phản hồi ≤ 4 giờ | Sửa ≤ 2 ngày |
| Medium | Ảnh hưởng một phần luồng phụ, ít tác động người dùng. | Phản hồi ≤ 8 giờ | Sửa ≤ 4 ngày |
| Low | Giao diện, lỗi chính tả, không ảnh hưởng nghiệp vụ. | Phản hồi ≤ 1 ngày | Fix trong lần phát hành tiếp theo |

Lỗi được quản lý trên bảng `DefectLog.xlsx` và gắn thẻ theo sprint để tiện truy vết.

### 3.4. Rủi ro và phương án ứng phó

| Rủi ro | Mức ảnh hưởng | Khả năng | Phương án dự phòng |
|--------|---------------|----------|--------------------|
| Hình ảnh thử nghiệm AI không đủ đa dạng | Cao | Trung bình | Thu thập thêm dữ liệu từ kho ảnh công khai, phối hợp nhóm phát triển để bổ sung mô hình. |
| Thành viên vắng mặt đột xuất | Trung bình | Trung bình | Thiết lập người thay thế, chia sẻ tài liệu trên drive chung, họp cập nhật hằng ngày. |
| Môi trường kiểm thử lỗi (server down) | Cao | Thấp | Duy trì bản sao lưu máy chủ, thông báo quản trị hệ thống trong vòng 30 phút. |
| Số lượng lỗi nhiều, vượt quá khả năng fix ở sprint | Trung bình | Trung bình | Ưu tiên lỗi Critical/High, đẩy lùi chức năng ít quan trọng sang bản vá nhỏ sau UAT. |

---

## 4. Môi trường kiểm thử

### 4.1. Phần cứng và hệ điều hành

| Thiết bị | Cấu hình đề nghị | Hệ điều hành / Phần mềm |
|----------|------------------|--------------------------|
| Desktop QA | CPU Intel Core i5 thế hệ 10, RAM 8 GB, SSD 256 GB | Windows 11 Pro 23H2, Node.js 20.x, PHP 8.2, Docker Desktop |
| Laptop dev | CPU Intel Core i7, RAM 16 GB, SSD 512 GB | Windows 11 Pro / Ubuntu 22.04, VS Code, Postman, MySQL Workbench |
| Thiết bị di động | Android 11+, iOS 15+ | Chrome, Safari để kiểm thử responsive |

### 4.2. Công cụ hỗ trợ

| Nhóm công cụ | Tên công cụ | Ghi chú |
|--------------|------------|---------|
| Lập kế hoạch & báo cáo | Microsoft Excel Online, Google Sheets | Chia sẻ real-time với GVHD |
| Quản lý tiến độ | Jira Software (project QA-2025) | Theo dõi nhiệm vụ, bug |
| Quản lý phiên bản | GitHub private repo | Nhánh `release/testing` dùng cho kiểm thử |
| Kiểm thử API | Postman, Thunder Client | Lưu bộ sưu tập request theo sprint |
| Ghi log lỗi | DefectLog.xlsx, Jira bug issue | Đồng bộ mỗi cuối ngày |
| Hội họp trực tuyến | Microsoft Teams, Zoom | Họp daily và review sprint |

---

## 5. Vai trò và trách nhiệm

| Vị trí | Thành viên | Trách nhiệm chính |
|--------|------------|-------------------|
| Quản lý dự án | **Võ Đỗ Văn Minh** | Điều phối chung, phê duyệt tài liệu kiểm thử, báo cáo tiến độ cho GVHD. |
| Trưởng nhóm QA | **Lê Xuân Hoàng Bửu** | Lập kế hoạch chi tiết, phân công nhiệm vụ QA, duyệt test case, tổng hợp báo cáo. |
| Kiểm thử viên | **Nguyễn Thanh Thắng** | Thiết kế & thực thi test case, ghi nhận lỗi, hỗ trợ UAT. |
| Kiểm thử viên | **Nguyễn Huỳnh Nhật Quang** | Chuẩn bị dữ liệu, kiểm thử tích hợp, theo dõi môi trường. |
| Nhà phát triển hỗ trợ | **Phạm Mạnh Thắng** | Phối hợp xử lý lỗi, cung cấp bản build, hỗ trợ phân tích nguyên nhân. |
| Cố vấn / GVHD | **(Tên GVHD)** | Nhận báo cáo sprint, tham gia phiên UAT ngày 08/12/2025, phản hồi về mức độ hoàn thiện. |

---

## 6. Quản lý truyền thông và báo cáo

- **Họp Daily (08/11 – 07/12):** 08h30 hằng ngày qua Microsoft Teams, cập nhật tiến độ, rủi ro.
- **Họp Review cuối sprint:** 17/11, 27/11 và 08/12/2025, báo cáo tóm tắt và demo chức năng.
- **Kênh trao đổi nhanh:** Nhóm Zalo/Teams “AI Commerce QA 2025” – phản hồi lỗi trong ≤ 2 giờ làm việc.
- **Lưu trữ tài liệu:** Thư mục chung `Drive/Test-Plan-2025/` bao gồm `TestPlanDocument.md`, `TestCaseDocument.xlsx`, `DefectLog.xlsx`.
- **Báo cáo gửi GVHD:** Email tổng hợp sau mỗi sprint và báo cáo chính thức ngày 08/12/2025 kèm bảng thống kê kết quả kiểm thử.

---

*Tài liệu kết thúc tại đây.*
