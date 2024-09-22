
--4
--a. Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình 
select baiviet.* from baiviet join theloai 
on baiviet.ma_tloai = theloai.ma_tloai
where theloai.ten_tloai = 'Nhạc trữ tình';

--b. Liệt kê các bài viết của tác giả “Nhacvietplus”
select baiviet.* from baiviet 
join tacgia on baiviet.ma_tgia = tacgia.ma_tgia
where tacgia.ten_tgia = 'Nhacvietplus';

--c.Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào
select theloai.* from theloai
join baiviet on baiviet.ma_tloai = theloai.ma_tloai
where baiviet.ma_bviet is null;

--d.Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết.
select baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet from baiviet 
join tacgia on baiviet.ma_tgia = tacgia.ma_tgia
join theloai on baiviet.ma_tloai = theloai.ma_tloai

--e. Tìm thể loại có số bài viết nhiều nhất
SELECT top 1 theloai.ten_tloai, COUNT(baiviet.ma_bviet) AS SoLuongBaiViet
FROM baiviet
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
GROUP BY theloai.ten_tloai
ORDER BY SoLuongBaiViet DESC;

--f. Liệt kê 2 tác giả có số bài viết nhiều nhất
select top 2 tacgia.ten_tgia, count(baiviet.ma_bviet) as SoLuongBaiViet from tacgia 
join baiviet on baiviet.ma_tgia = tacgia.ma_tgia
group by tacgia.ten_tgia 
order by SoLuongBaiViet desc

--g.Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em”
select * from baiviet 
where ten_bhat like '%yêu%'
or ten_bhat like '%thương%'
or ten_bhat like '%anh%'
or ten_bhat like '%em%'

--h. Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ  “yêu”, “thương”, “anh”, “em” 
select baiviet.* from baiviet 
where ten_bhat like '%yêu%'
or ten_bhat like '%thương%'
or ten_bhat like '%anh%'
or ten_bhat like '%em%'
or tieude like '%yêu%'
or tieude like '%thương%'
or tieude like '%anh%'
or tieude like '%em%';
go

--i. Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả
create view vw_Music as
select  baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, tacgia.ten_tgia, baiviet.ngayviet from baiviet
join tacgia on baiviet.ma_tgia = tacgia.ma_tgia
join theloai on baiviet.ma_tloai = theloai.ma_tloai; 


--j. Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi.
create procedure sp_DSBaiViet @TenTheLoai nvarchar(50) as --tạo thủ tục với tham số, thân thủ tục bắt đầu ngay sau as.
begin
	IF exists (select 1 from theloai where ten_tloai = @TenTheLoai) --select 1 là lấy ít nhất một dòng khớp với điều kiện WHERE là đủ, select * tốn tài nguyên hơn.
																	--bên trong () là lấy ra các dòng, câu lệnh if exists thấy có dòng sẽ trả về true, ko thì trả về false		
																	--sau khi kiểm tra nếu tồn tại thì thực hiện if, ko sẽ nhảy tới else
		begin
			select baiviet.ma_bviet, baiviet.tieude,baiviet.ten_bhat, tacgia.ten_tgia, baiviet.ngayviet, baiviet.hinhanh from baiviet
			join theloai on baiviet.ma_tloai = theloai.ma_tloai
			join tacgia on baiviet.ma_tgia = tacgia.ma_tgia
			where theloai.ten_tloai = @TenTheLoai;
		end
	ELSE --nếu ko tồn tại thể loại 
		begin
			raiserror ('thể loại ko tồn tại',16,1); --tạo 1 thông báo lỗi 
													--16 là mức độ nghiêm trọng của lỗi, 11-16: Lỗi do người dùng (nhập sai thông tin, dữ liệu không tồn tại...)
													--1 là mã trạng thái,thường giá trị này là 1
		end
end;

--k. Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo.
alter table theloai 
add SLBaiViet int default 0;
go

create trigger tg_CapNhatTheLoai on baiviet --trigger là 1 thủ tục tự động được thực thi khi có sự kiện insert,update,delete trên 1 table hoặc view
after insert, update, delete as
begin
	--cập nhật sl bài viết sau khi thêm
	if exists (select * from inserted) --kiểm tra có bản ghi nào mới thêm vào bảng chứa tạm ko
										--nếu tồn tại thì thực hiện lệnh if
	begin
		update theloai
		set SLBaiViet = (select count(*) from baiviet --đếm tất cả bài viết có mã thể loại khớp với hiện tại, gán cho SLBaiViet
						 where baiviet.ma_tloai = theloai.ma_tloai) 
		from theloai
		where theloai.ma_tloai in (select ma_tloai from inserted); --chỉ cập nhật các thể loại có trong bảng tạm inserted 
	end

	if exists (select * from deleted)
	begin
		update theloai
        set SLBaiViet = (select count(*) from baiviet where baiviet.ma_tloai = theloai.ma_tloai)
        from theloai
        where theloai.ma_tloai in (select ma_tloai from deleted);
	end 
end

--l. Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web. 
create table Users (
	user_id int primary key identity(1,1),
	username nvarchar(50) not null,
	password nvarchar(50) not null,
	email nvarchar(100) not null,
	role nvarchar(20) default 'user', --vai trò, mặc định là user có thể insert thành admin
	created_at datetime default getdate()
);
