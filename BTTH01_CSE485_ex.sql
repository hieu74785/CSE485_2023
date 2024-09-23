use BTTH001

--3
create table tacgia(
ma_tgia int primary key,
ten_tgia varchar(100) not null,
hinh_tgia varchar(100)
);
GO

create table theloai(
ma_tloai int primary key,
ten_tloai varchar(50) not null
);
GO

create table baiviet(
ma_bviet int primary key,
tieude varchar(200) not null,
ten_bhat varchar(100) not null,
ma_tloai int not null,
tomtat text not null,
noidung text,
ma_tgia int not null,
ngayviet datetime not null,
hinhanh varchar(200),
foreign key (ma_tloai) references THELOAI(ma_tloai),
foreign key (ma_tgia) references TACGIA(ma_tgia)
);
GO


INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (1, 'Nhạc trẻ');
GO
INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (2, 'Nhạc trữ tình');
GO
INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (3, 'Nhạc cách mạng');
GO
INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (4, 'Nhạc thiếu nhi');
GO
INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (5, 'Nhạc quê hương');
GO
INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (6, 'POP');
GO
INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (7, 'Rock');
GO
INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (8, 'R&B');
GO


INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (1, 'Nhacvietplus');
GO
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (2, 'Sưu tầm');
GO
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (3, 'Sandy');
GO
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (4, 'Lê Trung Ngân');
GO
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (5, 'Khánh Ngọc');
GO
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (6, 'Night Stalker');
GO
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (7, 'Phạm Phương Anh');
GO
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (8, 'Tâm tình');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (1, N'Lòng mẹ', N'Lòng mẹ', 2, N'Và mẹ ơi đừng khóc nhé! Cả đời này mẹ đã khóc nhiều lắm rồi, hãy cười lên vì con đã trưởng thành! Con sẽ lại về dậy sớm nấu cơm cho mẹ, nấu nước cho mẹ tắm như ngày xưa. ''Dù cho vai nắng nhưng lòng thương chẳng nhạt màu, vẫn mơ quay về vui vầy dưới bóng mẹ yêu''', 1, '2012-07-23');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (2, N'Cảm ơn em đã rời xa anh', N'Vết mưa', 2, N'Cảm ơn em đã cho anh những tháng ngày hạnh phúc, cho anh biết yêu và được yêu. Em cho anh được nếm trải hương vị ngọt ngào của tình yêu nhưng cũng đầy đau khổ và nước mắt. Những tháng ngày đó có lẽ suốt cuộc đời anh không bao giờ quên', 3, '2012-02-12');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (3, N'Cuộc đời có mấy ngày mai?', N'Phôi pha', 2, N'Đêm nay, trời quang mây tạnh, trong người nghe hoang vắng và tôi ngồi đây ''Ôm lòng đêm, Nhìn vầng trăng mới về'' mà ngậm ngùi ''Nhớ chân giang hồ. Ôi phù du, từng tuổi xuân đã già''', 4, '2014-03-13');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (4, N'Quê tôi!', N'Quê hương', 5, N'Quê hương là gì mà chở đầy kí ức nhỏ xinh. Có đám trẻ nô đùa bên nhau dưới gốc ổi nhà bà Năm giữa trưa nắng gắt chỉ để chờ bà đi vắng là hái trộm. Có hai anh em tôi bì bõm lội sình bắt cua đem về nhà cho mẹ nấu canh, nấu cháo… Có ba chị em tôi lục đục tự nấu ăn khi mẹ vắng nhà. Có anh tôi luôn dắt tôi đi cùng đường ngõ xóm chỉ để em được vui. Có cả những trận cãi nhau nảy lửa của ba anh em nữa…', 5, '2014-02-20');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (5, N'Đất nước', N'Đất nước', 5, N'Đã bao nhiêu lần tôi tự hỏi: liệu trên thế giới này có nơi nào chiến tranh tang thương mà lại rất đỗi anh hùng như nước mình không? Liệu có mảnh đất nào mà mỗi tấc đất hôm nay đã thấm máu xương của những thế hệ đi trước nhiều như nước mình không? Và, liệu có một đất nước nào lại có nhiều bà mẹ đau khổ nhưng cũng hết sức gan góc như đất nước mình không?', 1, '2010-05-25');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (6, N'Hard Rock Hallelujah', N'Hard Rock Hallelujah', 7, N'Những linh hồn đang lạc lối, mù quáng mất phương hướng trong cõi trần gian đầy nghiệt ngã hãy nên lắng nghe ''Hard Rock Hallelujah'' để có thể quên tất cả mọi thứ để tìm về đúng bản chất sâu thẳm nhất trong tâm hồn chính mình!', 6, '2013-09-12');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (7, N'The Unforgiven', N'The Unforgiven', 7, N'Lâu lắm rồi mới nghe lại The Unforgiven II, vì bài này không phải là bài mà tôi thích. Anh bạn tôi lúc trước, đi đâu cũng nghêu ngao bài này ấy, chỉ tại vì hắn đang... thất tình mà lị. Mà sao Metallica có The Unforgiven rồi lại có thêm bài này chi nữa vậy không biết nữa, làm cho tôi cảm thấy hình như hơi bị đúng so với tâm trạng của tôi lúc này.', 1, '2010-05-25');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (8, N'Nơi tình yêu bắt đầu', N'Nơi tình yêu bắt đầu', 1, N'Nhiều người sẽ nghĩ làm gì có yêu nhất và làm gì có yêu mãi. Ừ! Chẳng có gì là mãi mãi cả, vì chúng ta không trường tồn vĩnh cửu', 1, '2014-02-03');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (9, N'Love Me Like There’s No Tomorrow', N'Love Me Like There’s No Tomorrow', 8, N'Nếu ai đã từng yêu Queen, yêu cái chất giọng cao, sắc sảo như một vết cắt thật ngọt ẩn giấu bao cảm xúc mãnh liệt của Freddie chắc không thể không ''điêu đứng'' mỗi khi nghe Love Me Like There’s No Tomorrow.', 1, '2013-02-26');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (10, N'I''m stronger', N'I''m stronger', 7, N'Em không phải là người giỏi giấu cảm xúc, nhưng em lại là người giỏi đoán biết cảm xúc của người khác vậy nên đừng cố nói nhớ em, rằng mọi thứ chỉ là do hoàn cảnh. Và cũng đừng dối em rằng anh đã từng yêu em. Em nhắm mắt cũng cảm nhận được mà, thật đấy', 2, '2013-08-21');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (11, N'Ôi Cuộc Sống Mến Thương', N'Ôi Cuộc Sống Mến Thương', 5, N'Có một câu nói như thế này ''Âm nhạc là một cái gì khác lạ mà hầu như tôi muốn nói nó là một phép thần diệu. Vì nó đứng giữa tư tưởng và hiện tượng, tinh thần và vật chất, mọi thứ trung gian mơ hồ thế đó mà không là thế đó giữa các sự vật mà âm nhạc hòa giải''', 2, '2011-10-09');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (12, N'Cây và gió', N'Cây và gió', 7, N'Em và anh, hai đứa quen nhau thật tình cờ. Lời hát của anh từ bài hát “Cây và gió” đã làm tâm hồn em xao động. Nhưng sự thật phũ phàng rằng em chưa bao giờ nói cho anh biết những suy nghĩ tận sâu trong tim mình. Bởi vì em nhút nhát, em không dám đối mặt với thực tế khắc nghiệt, hay thực ra em không dám đối diện với chính mình.', 7, '2013-12-05');
GO

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
VALUES (13, N'Như một cách tạ ơn đời', N'Người thầy', 2, N'Ánh nắng cuối ngày rồi cũng sẽ tắt, dòng sông con đò rồi cũng sẽ rẽ sang một hướng khác. Nhưng việc trồng người luôn cảm thụ với chuyến đò ngang, cứ tần tảo đưa rồi lặng lẽ quay về đưa sang. Con đò năm xưa của Thầy nặng trĩu yêu thương, hy sinh thầm lặng.', 8, '2014-01-02');
GO

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
go

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
