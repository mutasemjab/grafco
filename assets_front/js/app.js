// Section: Nav Toggle
document.addEventListener('DOMContentLoaded', function(){
  var body = document.body;

  var openSearchBtns = document.querySelectorAll('[data-open="search"]');
  var closeSearchBtn = document.querySelector('[data-close="search"]');
  var searchDrop = document.querySelector('[data-search]');

  var toggleMobileBtn = document.querySelector('[data-toggle="mobile"]');
  var closeMobileBtn = document.querySelector('[data-close="mobile"]');
  var overlay = document.querySelector('[data-overlay]');

  function openSearch(){
    body.classList.add('is-open-search');
  }
  function closeSearch(){
    body.classList.remove('is-open-search');
  }
  function openMobile(){
    body.classList.add('is-open-mobile');
  }
  function closeMobile(){
    body.classList.remove('is-open-mobile');
  }

  openSearchBtns.forEach(btn => btn.addEventListener('click', openSearch));
  if(closeSearchBtn){ closeSearchBtn.addEventListener('click', closeSearch); }
  if(toggleMobileBtn){ toggleMobileBtn.addEventListener('click', openMobile); }
  if(closeMobileBtn){ closeMobileBtn.addEventListener('click', closeMobile); }
  if(overlay){
    overlay.addEventListener('click', function(){
      closeSearch(); closeMobile();
    });
  }

  document.addEventListener('keyup', function(e){
    if(e.key === 'Escape'){ closeSearch(); closeMobile(); }
  });
});

(function(){
  var slider = document.querySelector('[data-slider]');
  if(!slider) return;
  var slides = Array.from(slider.querySelectorAll('.hero-slide'));
  var dotsWrap = slider.querySelector('[data-dots]');
  var idx = 0, t = null, dur = 6000;
  function go(i){
    slides[idx].classList.remove('is-active');
    idx = (i+slides.length)%slides.length;
    slides[idx].classList.add('is-active');
    updateDots();
  }
  function updateDots(){
    if(!dotsWrap) return;
    dotsWrap.innerHTML = '';
    slides.forEach(function(_, i){
      var b = document.createElement('button');
      if(i===idx) b.classList.add('is-active');
      b.addEventListener('click', function(){ stop(); go(i); start(); });
      dotsWrap.appendChild(b);
    });
  }
  function start(){
    stop();
    t = setInterval(function(){ go(idx+1); }, dur);
  }
  function stop(){
    if(t) clearInterval(t);
    t = null;
  }
  slides[0].classList.add('is-active');
  updateDots();
  start();
})();

(function(){
  var wrap=document.querySelector('[data-featured]'); if(!wrap) return;
  var track=wrap.querySelector('[data-track]');
  var prev=wrap.querySelector('[data-prev]');
  var next=wrap.querySelector('[data-next]');
  var cards=[].slice.call(track.children);
  var i=0, perView=3;

  function calcPerView(){
    var w=wrap.clientWidth;
    if(window.innerWidth<=680){ perView=1; }
    else if(window.innerWidth<=1200){ perView=2; }
    else { perView=3; }
  }
  function update(){
    var step = 100 / perView;
    var offset = -(i * step);
    track.style.transform='translateX('+offset+'%)';
  }
  function maxIndex(){
    return Math.max(0, cards.length - perView);
  }
  function go(n){
    i=n;
    if(i<0) i=maxIndex();
    if(i>maxIndex()) i=0;
    update();
  }

  function onResize(){
    var old=perView;
    calcPerView();
    if(perView!==old){
      i=Math.min(i, maxIndex());
      update();
    }
  }

  calcPerView();
  cards.forEach(function(c){ c.style.scrollSnapAlign='start'; });
  update();

  prev.addEventListener('click', function(){ go(i-1); });
  next.addEventListener('click', function(){ go(i+1); });
  window.addEventListener('resize', onResize);
})();

(function(){
  var root=document.querySelector('[data-brands]'); if(!root) return;
  var track=root.querySelector('[data-track]');
  var prev=root.querySelector('[data-prev]');
  var next=root.querySelector('[data-next]');
  var rtl=document.documentElement.getAttribute('dir')==='rtl';
  var items=[].slice.call(track.children);
  var perView=6, i=0, timer=null, dur=3200, animating=false;

  function calcPerView(){
    var w=window.innerWidth;
    if(w<=680) perView=2;
    else if(w<=1200) perView=4;
    else perView=6;
  }

  function cloneEdges(){
    track.innerHTML='';
    var need=perView;
    var head=items.slice(0,need).map(n=>n.cloneNode(true));
    var tail=items.slice(-need).map(n=>n.cloneNode(true));
    tail.forEach(n=>track.appendChild(n));
    items.forEach(n=>track.appendChild(n));
    head.forEach(n=>track.appendChild(n));
    items=[].slice.call(track.children);
    i=need;
    track.style.transition='none';
    translate();
    requestAnimationFrame(function(){ track.style.transition='transform .45s ease'; });
  }

  function translate(){
    var step=100/perView;
    var dir=rtl?-1:1;
    track.style.transform='translateX(' + (-i*step*dir) + '%)';
  }

  function go(n){
    if(animating) return;
    animating=true;
    i=n;
    translate();
  }

  function onEnd(){
    var need=perView;
    if(i>=items.length-need){ i=need; track.style.transition='none'; translate(); requestAnimationFrame(function(){ track.style.transition='transform .45s ease'; }); }
    if(i<need){ i=items.length-need-1; track.style.transition='none'; translate(); requestAnimationFrame(function(){ track.style.transition='transform .45s ease'; }); }
    animating=false;
  }

  function autoplay(){
    stop();
    timer=setInterval(function(){ go(i+(rtl?-1:1)); }, dur);
  }

  function stop(){ if(timer) clearInterval(timer); timer=null; }

  function init(){
    calcPerView();
    cloneEdges();
    autoplay();
  }

  prev.addEventListener('click', function(){ go(i+(rtl?1:-1)); });
  next.addEventListener('click', function(){ go(i+(rtl?-1:1)); });
  track.addEventListener('transitionend', onEnd);
  root.addEventListener('mouseenter', stop);
  root.addEventListener('mouseleave', autoplay);
  window.addEventListener('resize', function(){
    var old=perView;
    calcPerView();
    if(old!==perView){ cloneEdges(); autoplay(); }
  });

  init();
}
)();

(function(){
  var tabs=document.querySelectorAll('.about-tab');
  if(!tabs.length) return;
  var panels=document.querySelectorAll('.about-panel');
  tabs.forEach(function(tab){
    tab.addEventListener('click',function(){
      var target=tab.getAttribute('data-tab');
      tabs.forEach(function(t){t.classList.remove('is-active');});
      panels.forEach(function(p){p.classList.remove('is-active');});
      tab.classList.add('is-active');
      var panel=document.querySelector('.about-panel[data-panel="'+target+'"]');
      if(panel) panel.classList.add('is-active');
    });
  });
})();

(function(){
  var list=document.querySelector('[data-news-list]');
  if(!list) return;
  var items=[].slice.call(list.querySelectorAll('.news-item'));
  var tabs=document.querySelectorAll('[data-news-tabs] .news-tab');
  var search=document.querySelector('[data-news-search]');
  var more=document.querySelector('[data-news-more]');
  var visibleCount=3;

  function applyFilters(){
    var activeYear=document.querySelector('.news-tab.is-active').getAttribute('data-year');
    var q=(search && search.value || "").toLowerCase().trim();
    var shown=0;
    items.forEach(function(item){
      var year=item.getAttribute('data-year');
      var text=item.textContent.toLowerCase();
      var matchYear=activeYear==='all' || String(year)===activeYear;
      var matchText=!q || text.indexOf(q)!==-1;
      if(matchYear && matchText && shown<visibleCount){
        item.classList.remove('is-hidden');
        shown++;
      }else if(matchYear && matchText){
        item.classList.add('is-hidden');
      }else{
        item.classList.add('is-hidden');
      }
    });
    var remaining=items.filter(function(item){
      return !item.classList.contains('is-hidden');
    }).length;
    var totalMatch=items.filter(function(item){
      var year=item.getAttribute('data-year');
      var text=item.textContent.toLowerCase();
      var matchYear=activeYear==='all' || String(year)===activeYear;
      var matchText=!q || text.indexOf(q)!==-1;
      return matchYear && matchText;
    }).length;
    if(more){
      if(remaining>=totalMatch || totalMatch<=visibleCount){
        more.style.display='none';
      }else{
        more.style.display='inline-flex';
      }
    }
  }

  tabs.forEach(function(tab){
    tab.addEventListener('click',function(){
      tabs.forEach(function(t){t.classList.remove('is-active');});
      tab.classList.add('is-active');
      visibleCount=3;
      applyFilters();
    });
  });

  if(search){
    search.addEventListener('input',function(){
      visibleCount=3;
      applyFilters();
    });
  }

  if(more){
    more.addEventListener('click',function(){
      visibleCount+=3;
      applyFilters();
    });
  }

  applyFilters();
})();

(function(){
  var root=document.querySelector('[data-contact]');
  if(!root) return;
  var tabs=[].slice.call(root.querySelectorAll('.contact-tab'));
  var extraRow=root.querySelector('[data-extra="product"]');
  var btn=root.querySelector('[data-contact-btn]');
  var btnText=btn ? btn.querySelector('.contact-submit-text') : null;

  function applyTab(tab){
    tabs.forEach(function(t){t.classList.remove('is-active');});
    tab.classList.add('is-active');
    var showProduct=tab.getAttribute('data-product')==="1";
    var label=tab.getAttribute('data-btn') || '';
    if(extraRow){
      if(showProduct) extraRow.classList.add('is-visible');
      else extraRow.classList.remove('is-visible');
    }
    if(btnText) btnText.textContent=label;
  }

  tabs.forEach(function(tab){
    tab.addEventListener('click',function(){
      applyTab(tab);
    });
  });

  if(tabs[0]) applyTab(tabs[0]);
})();

(function(){
  var root=document.querySelector('.service-shell__inner');
  if(!root) return;
  var btns=[].slice.call(root.querySelectorAll('.service-side-btn'));
  var panels=[].slice.call(root.querySelectorAll('.service-panel'));
  var pill=root.querySelector('[data-svc-pill]');
  var crumb=root.querySelector('[data-svc-breadcrumb] .svc-current');
  var title=root.querySelector('[data-svc-title]');
  var sub=root.querySelector('[data-svc-sub]');

  var headerData={
    software:{pill:'Software&Our service',title:'Our Services',sub:'Comprehensive support throughout the entire equipment lifecycle'},
    appointment:{pill:'Book an appointment',title:'Book an appointment',sub:'Meet with our specialists to review your needs and plan the right solution'},
    parts:{pill:'Reqesr for parts',title:'Spare Parts Request',sub:'Fast processing of OEM spare parts orders for your equipment'}
  };

  function activate(btn){
    var key=btn.getAttribute('data-panel');
    btns.forEach(function(b){b.classList.remove('is-primary');});
    panels.forEach(function(p){p.classList.remove('is-active');});
    btn.classList.add('is-primary');
    var panel=root.querySelector('.service-panel[data-panel="'+key+'"]');
    if(panel) panel.classList.add('is-active');
    var data=headerData[key];
    if(data){
      if(pill) pill.textContent=data.pill;
      if(crumb) crumb.textContent=data.pill;
      if(title) title.textContent=data.title;
      if(sub) sub.textContent=data.sub;
    }
  }

  btns.forEach(function(btn){
    btn.addEventListener('click',function(){activate(btn);});
  });

  if(btns[0]) activate(btns[0]);
})();

(function(){
  var roots=document.querySelectorAll('[data-contact]');
  if(!roots.length) return;
  roots.forEach(function(root){
    var tabs=[].slice.call(root.querySelectorAll('.contact-tab'));
    var extraRow=root.querySelector('[data-extra="product"]');
    var btn=root.querySelector('[data-contact-btn]');
    var btnText=btn ? btn.querySelector('.contact-submit-text') : null;

    function applyTab(tab){
      tabs.forEach(function(t){t.classList.remove('is-active');});
      tab.classList.add('is-active');
      var showProduct=tab.getAttribute('data-product')==="1";
      var label=tab.getAttribute('data-btn') || '';
      if(extraRow){
        if(showProduct) extraRow.classList.add('is-visible');
        else extraRow.classList.remove('is-visible');
      }
      if(btnText) btnText.textContent=label;
    }

    tabs.forEach(function(tab){
      tab.addEventListener('click',function(){
        applyTab(tab);
      });
    });

    if(tabs[0]) applyTab(tabs[0]);
  });
})();

(function(){
  var root=document.querySelector('.cons-shell__inner');
  if(!root) return;
  var navs=[].slice.call(root.querySelectorAll('[data-cons-btn]'));
  var panels=[].slice.call(root.querySelectorAll('.cons-panel'));
  var crumb=root.querySelector('[data-cons-current]');
  var heading=root.querySelector('[data-cons-heading]');

  function activate(btn){
    var key=btn.getAttribute('data-panel');
    var title=btn.getAttribute('data-title') || '';
    navs.forEach(function(n){n.classList.remove('is-active');});
    btn.classList.add('is-active');
    panels.forEach(function(p){
      if(p.getAttribute('data-panel')===key) p.classList.add('is-active');
      else p.classList.remove('is-active');
    });
    if(title){
      if(crumb) crumb.textContent=title;
      if(heading) heading.textContent=title;
    }
  }

  navs.forEach(function(btn){
    btn.addEventListener('click',function(){activate(btn);});
  });

  if(navs[0]) activate(navs[0]);
})();

(function(){
  var top=document.querySelector('.cons-side-top');
  var box=document.querySelector('.cons-side-box');
  if(!top || !box) return;
  top.addEventListener('click',function(){
    var collapsed=box.classList.toggle('is-collapsed');
    top.classList.toggle('is-collapsed',collapsed);
  });
})();

(function(){
  var root=document.querySelector('.products-shell__inner');
  if(!root) return;
  var navs=[].slice.call(root.querySelectorAll('[data-prod-brand]'));
  var panels=[].slice.call(root.querySelectorAll('.prod-panel'));
  var crumb=root.querySelector('[data-prod-current]');
  var heading=root.querySelector('[data-prod-heading]');

  function activate(btn){
    var key=btn.getAttribute('data-panel');
    var title=btn.getAttribute('data-title') || '';
    navs.forEach(function(n){n.classList.remove('is-active');});
    btn.classList.add('is-active');
    panels.forEach(function(p){
      if(p.getAttribute('data-panel')===key) p.classList.add('is-active');
      else p.classList.remove('is-active');
    });
    if(title){
      if(crumb) crumb.textContent=title;
      if(heading) heading.textContent=title;
    }
  }

  navs.forEach(function(btn){
    btn.addEventListener('click',function(){activate(btn);});
  });

  if(navs[0]) activate(navs[0]);
})();

(function(){
  var root=document.querySelector('[data-pdetail-tabs]');
  if(!root) return;
  var tabs=[].slice.call(root.querySelectorAll('.pdetail-tab'));
  var panels=[].slice.call(document.querySelectorAll('.pdetail-panel'));
  function activate(tab){
    var key=tab.getAttribute('data-tab');
    tabs.forEach(function(t){t.classList.remove('is-active');});
    tab.classList.add('is-active');
    panels.forEach(function(p){
      if(p.getAttribute('data-panel')===key) p.classList.add('is-active');
      else p.classList.remove('is-active');
    });
  }
  tabs.forEach(function(tab){
    tab.addEventListener('click',function(){activate(tab);});
  });
  if(tabs[0]) activate(tabs[0]);
})();

