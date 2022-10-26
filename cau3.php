SELECT *, SUM(sotinchi) FROM `dangkymonhoc` INNER JOIN monhoc on monhoc.mamon = dangkymonhoc.mamon INNER JOIN sinhvien ON sinhvien.masv = dangkymonhoc.masv GROUP BY sinhvien.masv HAVING SUM(sotinchi) < 8

SELECT *
FROM sinhvien 
WHERE masv NOT IN (SELECT masv FROM dangkymonhoc )