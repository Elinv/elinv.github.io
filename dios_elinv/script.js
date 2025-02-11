const videoUrls = [
    './audio/voz/poemasvacios/audio.m3u8t',
    './audio/bichocomplicado/audio.m3u8t',
    './audio/voz/situvieraqueexplicartemiamor/audio.m3u8t',    
    './audio/churuchuru/audio.m3u8t',
    './audio/cuandollego/audio.m3u8t',
    './audio/cuandolollenastedeamor/audio.m3u8t',
    './audio/doloresdolores/audio.m3u8t',
    './audio/enciendetufuturo/audio.m3u8t',
    './audio/enmiotonio/audio.m3u8t',                        
    './audio/eresunapoesiaunica/audio.m3u8t',
    './audio/estasenamorada/audio.m3u8t',
    './audio/felicidaddelunallena/audio.m3u8t',
    './audio/fuerademiradio/audio.m3u8t',
    './audio/huyendodeljardin/audio.m3u8t',
    './audio/id/audio.m3u8t',  
    './audio/jajaja/audio.m3u8t',
    './audio/join/audio.m3u8t',
    './audio/josefo/audio.m3u8t',
    './audio/ladebilidadedios/audio.m3u8t',
    './audio/launicaquemeinteresa/audio.m3u8t',
    './audio/launicaquemeinteresainst/audio.m3u8t',  
    './audio/lejosdevivir/audio.m3u8t',
    './audio/locoporcorrer/audio.m3u8t',
    './audio/loqueescribo/audio.m3u8t',
    './audio/mecuestatuamor/audio.m3u8t',
    './audio/mejode/audio.m3u8t',
    './audio/misheridassinti/audio.m3u8t',  
    './audio/misteriodiario/audio.m3u8t',
    './audio/miunicanovia/audio.m3u8t',
    './audio/miunicanoviainst/audio.m3u8t',
    './audio/mix1/audio.m3u8t',
    './audio/mix2/audio.m3u8t',
    './audio/naha/audio.m3u8t',  
    './audio/nahaantes/audio.m3u8t',
    './audio/noesningunanovedad/audio.m3u8t',
    './audio/palabrasmuertas/audio.m3u8t',
    './audio/quenecesito/audio.m3u8t',
    './audio/queseael/audio.m3u8t',
    './audio/quetequiero/audio.m3u8t',    
    './audio/quieroescaparirme/audio.m3u8t',
    './audio/rockdedonnadie/audio.m3u8t',   
    './audio/rockdelrecaudador/audio.m3u8t',
    './audio/rockel/audio.m3u8t',   
    './audio/rockelinst/audio.m3u8t',
    './audio/rosas/audio.m3u8t',   
    './audio/sintomnisom/audio.m3u8t',
    './audio/soloungiro/audio.m3u8t',   
    './audio/temporadadepoemasvacios/audio.m3u8t',
    './audio/tuytuluz/audio.m3u8t',   
    './audio/yesteencuentrodeprimavera/audio.m3u8t',
    './audio/siestacontigo/audio.m3u8t',   
];
videoUrls.sort();
let currentVideoIndex = Math.floor(Math.random() * 51);
const video = document.getElementById('videoPlayer');
function loadVideo(index) {
    const videoUrl = videoUrls[index];
    if (Hls.isSupported()) {
        const hls = new Hls();
        hls.loadSource(videoUrl);
        hls.attachMedia(video);
        hls.on(Hls.Events.MANIFEST_PARSED, function () {
            console.log(`Cargando video ${index + 1}: ${videoUrl}`);
            video.play();
        });
    } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
        video.src = videoUrl;
        video.addEventListener('loadedmetadata', function () {
            console.log(`Cargando video ${index + 1}: ${videoUrl}`);
            video.play();
        });
    } else {
        console.error('Tu navegador no soporta la reproducción de HLS.');
    }
}
loadVideo(currentVideoIndex);
video.addEventListener('ended', function () {
    currentVideoIndex = (currentVideoIndex + 1) % videoUrls.length;
    loadVideo(currentVideoIndex);
});
