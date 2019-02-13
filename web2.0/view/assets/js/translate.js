frases = {
    "en": {
        "ROMPE LOS LÍMITES DE TUS SUEÑOS, Y CREA": "BREAK THE LIMITS OF YOUR DREAMS, AND CREATE THEM",
        "ESCOGE EL NOMBRE A TU NUEVA CREACIÓN":"CHOOSE THE NAME OF YOUR NEW CREATION",
        "PON TEXTURAS A TUS SUEÑOS":"PUT TEXTURES TO YOUR DREAMS",
        "NO LO DEJES COMO UN SIMPLE SUEÑO":"DON'T LEAVE IT AS A SIMPLE DREAM",
        "INICIO": "HOME",
        "PROYECTOS":"PROJECTS",
        "LIKEPAGE": "LIKEPAGE",
        "SHOP":"SHOP",
        "CONTACTO":"CONTACT",
        "ELEMENTOS":"ELEMENTS",
        "Nombre Proyecto":"Name Project"
        
    },
    "va": {
        "ROMPE LOS LÍMITES DE TUS SUEÑOS, Y CREA": "TRENCA ELS LÍMITS DELS TEUS SOMNIS, I CREA",
        "ESCOGE EL NOMBRE A TU NUEVA CREACIÓN":"TRIA EL NOM A LA TEVA CREACIÓ",
        "PON TEXTURAS A TUS SUEÑOS":"POSA TEXTURES ALS TEUS SOMNIS",
        "NO LO DEJES COMO UN SIMPLE SUEÑO":"NO HO DEIXIES COM UN SIMPLE SOMNI",
        "INICIO": "INICI",
        "PROYECTOS":"PROJECTES",
        "LIKEPAGE": "LIKEPAGE",
        "SHOP":"SHOP",
        "CONTACTO":"CONTACTE",
        "ELEMENTOS":"ELEMENTS",
        "Nombre Proyecto":"Nom Projecte"
    }
  };
  
  function SelectLang(lang) {
    lang = lang || localStorage.getItem('app-lang') || 'es';
    localStorage.setItem('app-lang', lang);
  
    var elems = document.querySelectorAll('[data-tr]');
    for (var x = 0; x < elems.length; x++) {
      elems[x].innerHTML = frases.hasOwnProperty(lang)
        ? frases[lang][elems[x].dataset.tr]
        : elems[x].dataset.tr;
    }
  }
  
  window.onload = function(){
    SelectLang();
    document.getElementById('btn-es').addEventListener('click', SelectLang.bind(null, 'es'));
    document.getElementById('btn-en').addEventListener('click', SelectLang.bind(null, 'en'));
    document.getElementById('btn-va').addEventListener('click', SelectLang.bind(null, 'va'));
  }
  