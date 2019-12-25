# cmsProject
Content management system (Blog) with php.
The database use in this project is MSQL database. 


For better experience with this project, you have to install XAMPP (Local server) in your machine.
There are five tables in this project with the following names:
Database Name: project

Table Name: admin_reg, files, images,post, videos.

Column names: 1. admin_reg => admin_id, Date_created, password,username
2. files => file_id, admin_id, file_content, file_name
3. images => image_id, admin_id, photo, time_sent
4. videos => video_id, admin_id, time_sent, video
5. post => post_id, admin_id, content, post_title, post_time

