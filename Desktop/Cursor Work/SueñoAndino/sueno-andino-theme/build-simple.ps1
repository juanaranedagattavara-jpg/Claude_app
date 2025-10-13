# Script de Build Simple para Sueño Andino Theme
Write-Host "Construyendo tema Sueño Andino..." -ForegroundColor Green

# Variables
$themeName = "sueno-andino-theme"
$buildDir = "dist"
$zipName = "sueno-andino-wordpress-theme-v1.0.0.zip"

# Limpiar build anterior
if (Test-Path $buildDir) {
    Remove-Item -Recurse -Force $buildDir
}

# Crear estructura
New-Item -ItemType Directory -Path "$buildDir/$themeName" -Force | Out-Null
New-Item -ItemType Directory -Path "$buildDir/$themeName/assets/css" -Force | Out-Null
New-Item -ItemType Directory -Path "$buildDir/$themeName/assets/js" -Force | Out-Null
New-Item -ItemType Directory -Path "$buildDir/$themeName/assets/img" -Force | Out-Null
New-Item -ItemType Directory -Path "$buildDir/$themeName/inc" -Force | Out-Null
New-Item -ItemType Directory -Path "$buildDir/$themeName/template-parts" -Force | Out-Null

# Copiar archivos PHP principales
$phpFiles = @("style.css", "functions.php", "header.php", "footer.php", "front-page.php", "index.php", "page.php", "single.php", "archive.php", "sidebar.php")
foreach ($file in $phpFiles) {
    if (Test-Path $file) {
        Copy-Item $file -Destination "$buildDir/$themeName/" -Force
        Write-Host "Copiado: $file" -ForegroundColor Green
    }
}

# Copiar assets
if (Test-Path "assets/css") {
    Copy-Item "assets/css/*" -Destination "$buildDir/$themeName/assets/css/" -Force
    Write-Host "Copiado: CSS files" -ForegroundColor Green
}
if (Test-Path "assets/js") {
    Copy-Item "assets/js/*" -Destination "$buildDir/$themeName/assets/js/" -Force
    Write-Host "Copiado: JS files" -ForegroundColor Green
}
if (Test-Path "assets/img") {
    Copy-Item "assets/img/*" -Destination "$buildDir/$themeName/assets/img/" -Force
    Write-Host "Copiado: Image files" -ForegroundColor Green
}

# Copiar inc y template-parts
if (Test-Path "inc") {
    Copy-Item "inc/*" -Destination "$buildDir/$themeName/inc/" -Force
    Write-Host "Copiado: Inc files" -ForegroundColor Green
}
if (Test-Path "template-parts") {
    Copy-Item "template-parts/*" -Destination "$buildDir/$themeName/template-parts/" -Force
    Write-Host "Copiado: Template parts" -ForegroundColor Green
}

# Copiar archivos adicionales
$additionalFiles = @("screenshot.png", "README.txt", "README.md")
foreach ($file in $additionalFiles) {
    if (Test-Path $file) {
        Copy-Item $file -Destination "$buildDir/$themeName/" -Force
        Write-Host "Copiado: $file" -ForegroundColor Green
    }
}

# Crear ZIP
Compress-Archive -Path "$buildDir/$themeName/*" -DestinationPath "$buildDir/$zipName" -Force

# Calcular tamaño
$size = (Get-Item "$buildDir/$zipName").Length / 1MB
$sizeFormatted = [math]::Round($size, 2)

Write-Host ""
Write-Host "Build completado!" -ForegroundColor Green
Write-Host "Archivo: $buildDir/$zipName" -ForegroundColor Cyan
Write-Host "Tamaño: $sizeFormatted MB" -ForegroundColor Cyan

if ($sizeFormatted -gt 3) {
    Write-Host "ADVERTENCIA: El tema supera los 3 MB" -ForegroundColor Yellow
} else {
    Write-Host "Tamaño optimo alcanzado!" -ForegroundColor Green
}

Write-Host ""
Write-Host "Tema listo para instalar en WordPress!" -ForegroundColor Green
