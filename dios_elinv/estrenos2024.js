const videoUrls2024 = [
    './audio/churuchuru/audio.m3u8t',
    './audio/cuandollego/audio.m3u8t',
    './audio/cuandolollenastedeamor/audio.m3u8t',
    './audio/doloresdolores/audio.m3u8t',
    './audio/enciendetufuturo/audio.m3u8t',
    './audio/enmiotonio/audio.m3u8t',                        
    './audio/eresunapoesiaunica/audio.m3u8t',
    './audio/huyendodeljardin/audio.m3u8t',
    './audio/id/audio.m3u8t',  
    './audio/launicaquemeinteresa/audio.m3u8t',,
    './audio/loqueescribo/audio.m3u8t',
    './audio/miunicanovia/audio.m3u8t',
    './audio/naha/audio.m3u8t',  
    './audio/nahaantes/audio.m3u8t',
    './audio/palabrasmuertas/audio.m3u8t',
    './audio/rockdelrecaudador/audio.m3u8t',
    './audio/rockel/audio.m3u8t',   
    './audio/soloungiro/audio.m3u8t',   
    './audio/temporadadepoemasvacios/audio.m3u8t',
    './audio/tuytuluz/audio.m3u8t',   
    './audio/yesteencuentrodeprimavera/audio.m3u8t',
    './audio/siestacontigo/audio.m3u8t' 
];
const suena2024 = [
    'Churu Churu Churu',
    'Cuando Llego',
    'Cuando Lollenaste De Amor',
    'Dolores Dolores',
    'Enciende Tu Futuro',
    'En Mi Otoño',
    'Eres Una Poesía Única',
    'Huyendo Del Jardín',
    'Id',
    'La Única Que Me Interesa',
    'Lo Que Escribo',
    'Mi Única Novia',
    'Naha',
    'Naha Antes',
    'Palabras Muertas',
    'Rock Del Recaudador',
    'Rock El',
    'Sólo Un Giro',
    'Temporada De Poemas Vacíos',
    'Tu Y Tu Luz',
    'Y Este Encuentro De Primavera',
    'Si Esta Contigo'
];
let tot2024 = videoUrls2024.length;
//videoUrls2024.sort();
let currentVideoIndex2024 = Math.floor(Math.random() * tot2024);
const video2024 = document.getElementById('videoPlayer2024');
function loadVideo2024(index) {
    const videoUrl2024 = videoUrls2024[index];
    //const audio = videoUrl.split('/')[2].trim();
    if (Hls.isSupported()) {
        const hls = new Hls();
        hls.loadSource(videoUrl2024);
        hls.attachMedia(video2024);
        hls.on(Hls.Events.MANIFEST_PARSED, function () {
            document.getElementById('estas2024').innerText = `suena 2024: ${suena2024[currentVideoIndex2024]}`;
            //console.log(`Cargando video ${index + 1}: ${videoUrl2024}`);
            video2024.play();
        });
    } else if (video2024.canPlayType('application/vnd.apple.mpegurl')) {
        video2024.src = videoUrl2024;
        video2024.addEventListener('loadedmetadata', function () {
            document.getElementById('estas2024').innerText = `suena 2024: ${suena2024[currentVideoIndex2024]}`;
            //console.log(`Cargando video ${index + 1}: ${videoUrl2024}`);
            video2024.play();
        });
    } else {
        console.error('Tu navegador no soporta la reproducción de HLS.');
    }
}
loadVideo2024(currentVideoIndex2024);
video2024.addEventListener('ended', function () {
    currentVideoIndex2024 = (currentVideoIndex2024 + 1) % videoUrls2024.length;
    loadVideo2024(currentVideoIndex2024);
});

