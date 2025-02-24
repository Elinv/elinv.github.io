const videoUrls2025 = [
    './audio/Devezencuandounbeso./audio.m3u8t',   
];
const suena2025 = [
    'De vez en cuando un beso(Pronto)',
];
let tot2025 = videoUrls2025.length;
//videoUrls2025.sort();
let currentVideoIndex2025 = Math.floor(Math.random() * tot2025);
const video2025 = document.getElementById('videoPlayer2025');
function loadVideo2025(index) {
    const videoUrl2025 = videoUrls2025[index];
    //const audio = videoUrl.split('/')[2].trim();
    if (Hls.isSupported()) {
        const hls = new Hls();
        hls.loadSource(videoUrl2025);
        hls.attachMedia(video2025);
        hls.on(Hls.Events.MANIFEST_PARSED, function () {
            document.getElementById('estas2025').innerText = `suena 2025: ${suena2025[currentVideoIndex2025]}`;
            //console.log(`Cargando video ${index + 1}: ${videoUrl2025}`);
            //video2025.play();
        });
    } else if (video2025.canPlayType('application/vnd.apple.mpegurl')) {
        video2025.src = videoUrl2025;
        video2025.addEventListener('loadedmetadata', function () {
            document.getElementById('estas2025').innerText = `suena 2025: ${suena2025[currentVideoIndex2025]}`;
            //console.log(`Cargando video ${index + 1}: ${videoUrl2025}`);
            //video2025.play();
        });
    } else {
        console.error('Tu navegador no soporta la reproducción de HLS.');
    }
}
loadVideo2025(currentVideoIndex2025);
video2025.addEventListener('ended', function () {
    currentVideoIndex2025 = (currentVideoIndex2025 + 1) % videoUrls2025.length;
    //loadVideo2025(currentVideoIndex2025);
});

