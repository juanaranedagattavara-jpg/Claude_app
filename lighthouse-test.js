// ===========================================
// SCRIPT DE TEST DE LIGHTHOUSE AUTOMATIZADO
// ===========================================

const lighthouse = require('lighthouse');
const chromeLauncher = require('chrome-launcher');

async function runLighthouseTest() {
    console.log('🚀 Iniciando test de Lighthouse...');
    
    const chrome = await chromeLauncher.launch({chromeFlags: ['--headless']});
    const options = {
        logLevel: 'info',
        output: 'json',
        onlyCategories: ['performance', 'accessibility', 'best-practices', 'seo'],
        port: chrome.port,
    };
    
    const runnerResult = await lighthouse('http://localhost:8000', options);
    
    // Extraer métricas de performance
    const lhr = runnerResult.lhr;
    const performance = lhr.categories.performance;
    const accessibility = lhr.categories.accessibility;
    const bestPractices = lhr.categories['best-practices'];
    const seo = lhr.categories.seo;
    
    console.log('\n📊 RESULTADOS DE LIGHTHOUSE:');
    console.log('================================');
    console.log(`Performance: ${Math.round(performance.score * 100)}/100`);
    console.log(`Accessibility: ${Math.round(accessibility.score * 100)}/100`);
    console.log(`Best Practices: ${Math.round(bestPractices.score * 100)}/100`);
    console.log(`SEO: ${Math.round(seo.score * 100)}/100`);
    
    // Métricas específicas de performance
    const audits = lhr.audits;
    console.log('\n🎯 MÉTRICAS DE PERFORMANCE:');
    console.log('============================');
    
    if (audits['first-contentful-paint']) {
        const fcp = audits['first-contentful-paint'].numericValue;
        console.log(`First Contentful Paint: ${Math.round(fcp)}ms`);
    }
    
    if (audits['largest-contentful-paint']) {
        const lcp = audits['largest-contentful-paint'].numericValue;
        console.log(`Largest Contentful Paint: ${Math.round(lcp)}ms`);
    }
    
    if (audits['cumulative-layout-shift']) {
        const cls = audits['cumulative-layout-shift'].numericValue;
        console.log(`Cumulative Layout Shift: ${cls.toFixed(3)}`);
    }
    
    if (audits['speed-index']) {
        const si = audits['speed-index'].numericValue;
        console.log(`Speed Index: ${Math.round(si)}ms`);
    }
    
    if (audits['total-blocking-time']) {
        const tbt = audits['total-blocking-time'].numericValue;
        console.log(`Total Blocking Time: ${Math.round(tbt)}ms`);
    }
    
    // Verificar si cumple con los objetivos
    console.log('\n✅ VERIFICACIÓN DE OBJETIVOS:');
    console.log('==============================');
    
    const performanceScore = Math.round(performance.score * 100);
    const fcpValue = audits['first-contentful-paint']?.numericValue || 0;
    const lcpValue = audits['largest-contentful-paint']?.numericValue || 0;
    const clsValue = audits['cumulative-layout-shift']?.numericValue || 0;
    
    console.log(`Lighthouse Score 95+: ${performanceScore >= 95 ? '✅' : '❌'} (${performanceScore})`);
    console.log(`FCP < 1.5s: ${fcpValue < 1500 ? '✅' : '❌'} (${Math.round(fcpValue)}ms)`);
    console.log(`LCP < 2.5s: ${lcpValue < 2500 ? '✅' : '❌'} (${Math.round(lcpValue)}ms)`);
    console.log(`CLS < 0.1: ${clsValue < 0.1 ? '✅' : '❌'} (${clsValue.toFixed(3)})`);
    
    await chrome.kill();
    
    return {
        performance: performanceScore,
        fcp: fcpValue,
        lcp: lcpValue,
        cls: clsValue,
        passed: performanceScore >= 95 && fcpValue < 1500 && lcpValue < 2500 && clsValue < 0.1
    };
}

// Ejecutar si se llama directamente
if (require.main === module) {
    runLighthouseTest()
        .then(results => {
            if (results.passed) {
                console.log('\n🎉 ¡TODOS LOS OBJETIVOS CUMPLIDOS!');
                process.exit(0);
            } else {
                console.log('\n⚠️ Algunos objetivos no se cumplieron');
                process.exit(1);
            }
        })
        .catch(error => {
            console.error('❌ Error en el test:', error);
            process.exit(1);
        });
}

module.exports = { runLighthouseTest };
