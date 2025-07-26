function updateTime() {
    const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const bulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    const now = new Date();
    const localOffset = now.getTimezoneOffset(); // Dalam menit
    const totalMinutes = -localOffset;

    // Default
    let zona = '';
    if (totalMinutes === 420) zona = 'WIB';       // UTC+7
    else if (totalMinutes === 480) zona = 'WITA'; // UTC+8
    else if (totalMinutes === 540) zona = 'WIT';  // UTC+9
    else zona = 'Waktu Lokal';                    // Fallback jika bukan Indonesia

    const namaHari = hari[now.getDay()];
    const tanggal = now.getDate();
    const namaBulan = bulan[now.getMonth()];
    const tahun = now.getFullYear();

    const jam = String(now.getHours()).padStart(2, '0');
    const menit = String(now.getMinutes()).padStart(2, '0');
    const detik = String(now.getSeconds()).padStart(2, '0');

    document.getElementById('hariTanggal').innerText = `${namaHari}, ${tanggal} ${namaBulan} ${tahun}`;
    document.getElementById('jamSekarang').innerText = `${jam}:${menit}:${detik} ${zona}`;
}

setInterval(updateTime, 1000);
updateTime();

