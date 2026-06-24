SELECT pelanggan.nama_pelanggan, jenis_layanan.nama_layanan, transaksi_laundry.tanggal_transaksi, transaksi_laundry.berat_kg
FROM transaksi_laundry
INNER JOIN pelanggan 
ON transaksi_laundry.id_pelanggan = pelanggan.id_pelanggan
INNER JOIN jenis_layanan 
ON transaksi_laundry.id_layanan = jenis_layanan.id_layanan;


SELECT pelanggan.nama_pelanggan, jenis_layanan.nama_layanan, transaksi_laundry.berat_kg, jenis_layanan.harga_per_kg,
(transaksi_laundry.berat_kg * jenis_layanan.harga_per_kg)
FROM transaksi_laundry
INNER JOIN pelanggan 
ON transaksi_laundry.id_pelanggan = pelanggan.id_pelanggan
INNER JOIN jenis_layanan 
ON transaksi_laundry.id_layanan = jenis_layanan.id_layanan;


SELECT pelanggan.nama_pelanggan, jenis_layanan.nama_layanan, transaksi_laundry.berat_kg, jenis_layanan.harga_per_kg,
(transaksi_laundry.berat_kg * jenis_layanan.harga_per_kg),
IF(
(transaksi_laundry.berat_kg * jenis_layanan.harga_per_kg) >= 30000,
'Sabun Mandi Batang',
'Tidak Mendapat Bonus'
)
FROM transaksi_laundry
INNER JOIN pelanggan 
ON transaksi_laundry.id_pelanggan = pelanggan.id_pelanggan
INNER JOIN jenis_layanan 
ON transaksi_laundry.id_layanan = jenis_layanan.id_layanan;