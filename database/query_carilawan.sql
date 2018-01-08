-- menampilkan data kategori
SELECT * FROM tb_kategori

-- menampilkan data event terdekat
SELECT *, DATE_FORMAT(tanggal, \"%w %Y %m %d\"), TIME_FORMAT(waktu, \"%H.%i WIB\") FROM tb_event, tb_kategori WHERE tb_kategori.id_kategori=tb_event.id_kategori AND tanggal>=CURDATE() AND waktu>=CURTIME() ORDER BY tanggal ASC LIMIT 4

-- menampilkan detail event
SELECT *, DATE_FORMAT(tanggal, \"%w %Y %m %d\"), TIME_FORMAT(waktu, \"%H.%i WIB\") FROM tb_event, tb_kategori WHERE id_event=$id_event AND tb_kategori.id_kategori=tb_event.id_kategori

-- menampilkan event berdasarkan kategori
SELECT *, DATE_FORMAT(tanggal, \"%w %Y %m %d\"), TIME_FORMAT(waktu, \"%H.%i WIB\"), nama_member FROM tb_member, tb_event, tb_kategori WHERE tb_member.id_member=tb_event.pj_event AND tb_kategori.id_kategori=tb_event.id_kategori AND tb_kategori.id_kategori=$id_kategori ORDER BY id_event DESC

-- menampilkan semua event terbaru
SELECT *, DATE_FORMAT(tanggal, \"%w %Y %m %d\"), TIME_FORMAT(waktu, \"%H.%i WIB\"), nama_member FROM tb_member, tb_event, tb_kategori WHERE tb_member.id_member=tb_event.pj_event AND tb_kategori.id_kategori=tb_event.id_kategori ORDER BY id_event DESC

-- menampilkan nama member
SELECT nama_member FROM tb_member WHERE id_member=$id_member

-- join suatu event
INSERT INTO tb_join SET id_member='$id_member', id_event='$id_event', tanggal_join='$tanggal'

-- menampilkan event yang diikuti oleh member
SELECT *, DATE_FORMAT(tanggal, \"%w %Y %m %d\"), TIME_FORMAT(waktu, \"%H.%i WIB\") FROM tb_join, tb_event, tb_kategori WHERE tb_kategori.id_kategori=tb_event.id_kategori AND tb_join.id_event=tb_event.id_event AND tb_join.id_member=$id_member

-- menampilkan data event terbaru
SELECT *, DATE_FORMAT(tanggal, \"%w %Y %m %d\"), TIME_FORMAT(waktu, \"%H.%i WIB\") FROM tb_event, tb_kategori WHERE tb_kategori.id_kategori=tb_event.id_kategori ORDER BY id_event DESC LIMIT 4

-- menampilkan jumlah peserta pada suatu event
SELECT COUNT(id_join) FROM tb_join WHERE id_event=$id_event

-- untuk mengirimkan pesan
INSERT INTO tb_chat SET id_member='$id_member', id_event='$id_event', isi_chat='$isi_chat', posted=NOW()

-- untuk login
SELECT * FROM tb_user WHERE username='$username' AND password='$password'

-- untuk menampilkan pesan pada suatu event
SELECT * FROM tb_chat, tb_join, tb_member WHERE tb_join.id_member=tb_member.id_member AND tb_join.id_member=tb_chat.id_member AND tb_join.id_event=tb_chat.id_event AND tb_join.id_event='$id_event' ORDER BY posted ASC

-- menampilkan data suatu member
SELECT * FROM tb_member where id_member='$id_member'

-- untuk registrasi member
INSERT INTO tb_member SET nama_member='$nama_member', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp', email='$email', hobi='$hobi', bio='$bio'

-- untuk registrasi akun member
INSERT INTO tb_user SET username='$username', password='$password', level='member', id_member='$id_member'

-- untuk membuat event baru
INSERT INTO tb_event SET nama_event='$nama_event', id_kategori='$kategori', deskripsi='$deskripsi', tanggal='$tanggal', waktu='$waktu', jumlah_peserta='$jumlah_peserta', lokasi='$lokasi', biaya='$biaya', banner_event='$banner_event', pj_event='$id_member'

-- untuk ubah password
UPDATE tb_user SET password='$password_baru' WHERE id_member='$id_member'

-- untuk ubah profil
UPDATE tb_member SET nama_member='$nama_member', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp', email='$email', hobi='$hobi', bio='$bio', foto='$foto' WHERE id_member='$id_member'

-- untuk ubah akun member
UPDATE tb_user SET username='$username' WHERE id_member='$id_member'