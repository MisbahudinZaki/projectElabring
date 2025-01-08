$(document).ready(function() {
    // Panggil fungsi untuk mengupdate jam digital setiap detik
    updateDigitalClock();
    setInterval(updateDigitalClock, 1000); // Update setiap 1 detik
});

function updateDigitalClock() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();

    // Tambahkan leading zero jika nilai < 10
    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;
    seconds = (seconds < 10 ? "0" : "") + seconds;

    // Format waktu menjadi HH:mm:dd
    var formattedTime = hours + ":" + minutes + ":" +seconds;

    // Set nilai input dengan waktu yang sudah diformat
    $("#presensi_masuk").val(formattedTime);
}
/*
function setExitTime() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const currentTime = `${hours}:${minutes}:${seconds}`;
    document.getElementById('presensi_masuk').value = currentTime;
}
*/
