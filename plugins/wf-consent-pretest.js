const { chromium, devices } = require('playwright');
const ids = {'facebook-capi-param-builder':'marketing','wc-facebook-pixel-events':'marketing','facebook-for-woocommerce-inline':'marketing','jetpack-stats':'statistic','woocommerce-analytics':'statistic','woocommerce-analytics-client':'statistic'};
function transform(html){
  html = html.replace(/<script\b([^>]*)>([\s\S]*?)<\/script>/g, (m, attrs, body) => {
    const idm = attrs.match(/id=["']([^"']+)["']/); let cat = null;
    if (idm) for (const h in ids) for (const s of ['-js','-js-before','-js-after','-js-extra']) if (idm[1] === h+s) cat = ids[h];
    if (!cat && /connect\.facebook\.net|FacebookSignals|fbq\(/.test(body) && !/wc_facebook_signals_params/.test(body)) cat = 'marketing';
    if (!cat) return m;
    attrs = attrs.replace(/\s+type=["'][^"']*["']/g,'').replace(/\s+data-wp-strategy=["'][^"']*["']/,'');
    return `<script type="text/plain" data-webcare="${cat}"${attrs}>${body}</script>`;
  });
  return html;
}
(async () => {
  const b = await chromium.launch();
  const c = await b.newContext({ ...devices['iPhone 13'] });
  const p = await c.newPage();
  const reqs = [];
  p.on('request', r => reqs.push(r.url()));
  await p.route(/^https:\/\/wiesi-factory\.at\/(\?.*)?$/, async route => {
    const body = transform(require('fs').readFileSync('pt-home.html','utf8'));
    route.fulfill({ status: 200, body, headers: {'content-type':'text/html; charset=UTF-8'} });
  });
  await p.goto('https://wiesi-factory.at/?pt=' + Date.now(), { waitUntil: 'load', timeout: 90000 });
  await p.waitForTimeout(5000);
  const tp = u => ({fb: u.filter(x=>/facebook\.(net|com)/.test(x)).length, stats: u.filter(x=>/stats\.wp\.com/.test(x)).length, capi: u.filter(x=>/meta-capi-param-builder/.test(x)).length});
  console.log('VOR Zustimmung:', JSON.stringify(tp(reqs)));
  const buttons = await p.$$eval('button, a.cc-btn, a[role=button]', els => els.filter(e=>e.offsetParent).map(e => (e.className+'|'+e.textContent.trim()).slice(0,80)));
  console.log('Buttons:', JSON.stringify(buttons.filter(x=>/akzept|zustimm|allow|alle|erlaub/i.test(x))));
  const n = reqs.length;
  const btn = await p.$('a.cc-allow, .cc-allow, button:has-text("Alle akzeptieren"), a:has-text("Alle akzeptieren"), a:has-text("Akzeptieren"), button:has-text("Akzeptieren")');
  if (!btn) { console.log('KEIN Zustimmungs-Button gefunden'); await p.screenshot({path:'pt-banner.png'}); await b.close(); return; }
  await btn.click(); await p.waitForTimeout(6000);
  console.log('NACH Zustimmung:', JSON.stringify(tp(reqs.slice(n))));
  console.log('fbq geladen:', await p.evaluate(()=>typeof window.fbq + ' / pixelInit=' + (window.FacebookSignals && window.FacebookSignals._pixelInitialized)));
  const m2 = reqs.length;
  await p.goto('https://wiesi-factory.at/?pt2=' + Date.now(), { waitUntil: 'load', timeout: 90000 }); await p.waitForTimeout(5000);
  console.log('NEU GELADEN mit Zustimmung:', JSON.stringify(tp(reqs.slice(m2))), 'pixelInit=', await p.evaluate(()=>window.FacebookSignals && window.FacebookSignals._pixelInitialized));
  // Ablehnen-Fall in neuem Kontext
  const c2 = await b.newContext({ ...devices['iPhone 13'] }); const q = await c2.newPage(); const r2 = []; q.on('request', r => r2.push(r.url()));
  await q.route(/^https:\/\/wiesi-factory\.at\/(\?.*)?$/, route => route.fulfill({ status: 200, body: transform(require('fs').readFileSync('pt-home.html','utf8')), headers: {'content-type':'text/html; charset=UTF-8'} }));
  await q.goto('https://wiesi-factory.at/?pt3=' + Date.now(), { waitUntil: 'load', timeout: 90000 }); await q.waitForTimeout(4000);
  const deny = await q.$('.cc-deny, a.cc-dismiss, .cc-btn.cc-deny');
  console.log('Ablehnen-Button:', deny ? await deny.evaluate(e=>e.className) : 'nicht gefunden');
  if (deny) { await deny.click(); await q.waitForTimeout(5000); }
  console.log('NACH Ablehnen:', JSON.stringify(tp(r2)), 'Cookie:', (await c2.cookies()).filter(k=>/cookieconsent/.test(k.name)).map(k=>k.name+'='+decodeURIComponent(k.value)).join('; '));
  console.log('Cookie:', (await c.cookies()).filter(k=>/cookieconsent/.test(k.name)).map(k=>k.name+'='+decodeURIComponent(k.value)).join('; '));
  await b.close();
})();
