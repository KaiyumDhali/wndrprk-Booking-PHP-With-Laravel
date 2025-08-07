@echo off
cd /d "D:\xampp\htdocs\wonderpark_booking"
for /f "delims=[] tokens=2" %%a in ('ping -4 -n 1 Masum-PC ^| findstr [') do set NetworkIP=%%a
php artisan serve --host 192.168.10.3 --port 8075
pause