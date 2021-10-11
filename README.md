# Blog
Giaohangtietkiem cần một trang blog để các thành viên có thể giao lưu với nhau. 
Yêu cầu tạo một trang blog đơn giản sử dụng Laravel 6, Redis, Elasticsearch, Kafka (optional)  
Các chức năng cần có:  
Quản lý nhóm người dùng: user có thể xem được các bài viết của blog, writer có thể tạo mới bài viết, có thể sửa bài viết của mình; admin có thể tạo mới tài khoản, tạo/sửa bất kỳ bài viết nào 
Quản lý người dùng: tài khoản admin có thể tạo/sửa/xóa được các tài khoản + sử dụng session lưu trong Redis để ghi nhớ người dùng đã login hay chưa + login xác thực theo (email hoặc username) và password. 
Sử dụng Laravel validation để valid email, username có sử dụng các ký tự hợp lệ + đúng format Quản lý bài viết: có 2 trang portal và trang chi tiết, trang portal liệt kê các bài viết, sử dụng chức năng phân trang của cake, chức năng xem bài viết đầy đủ 
Các chức năng nâng cao:  
Lưu log người dùng tất cả action liên quan tới bài viết, sử dụng event-listener 
Xóa các log cũ sau thời gian 1 tuần (cronjob)
