/**
 * Correcciones globales para el panel de administración
 * Este script se enfoca en resolver problemas en todas las páginas
 */

// Ejecutar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    console.log('Aplicando correcciones globales...');
    
    // 1. CORRECCIÓN DEL BOTÓN DE MENÚ MÓVIL
    
    // Función para arreglar cualquier botón de menú mal configurado
    function fixMenuButton() {
        // Buscar el botón por varios selectores para mayor seguridad
        const menuButton = document.querySelector('[data-widget="pushmenu"]') || 
                          document.querySelector('#sidebarToggleBtn') || 
                          document.querySelector('.navbar-toggler');
        
        if (!menuButton) {
            console.warn('No se encontró ningún botón de menú para corregir');
            return;
        }
        
        // Asegurarse de que tenga todos los atributos correctos
        menuButton.setAttribute('role', 'button');
        menuButton.setAttribute('href', '#');
        
        if (!menuButton.id) {
            menuButton.id = 'sidebarToggleBtn';
        }
        
        // Asegurarse de que tenga el icono correcto
        if (!menuButton.querySelector('.fas.fa-bars')) {
            // Si no tiene el icono, asegurarse de que lo tenga
            if (menuButton.innerHTML.trim() === '') {
                menuButton.innerHTML = '<i class="fas fa-bars"></i>';
            }
        }
        
        // Agregar estilos directamente al botón para garantizar visibilidad
        menuButton.style.display = 'flex';
        menuButton.style.alignItems = 'center';
        menuButton.style.justifyContent = 'center';
        menuButton.style.background = '#007bff';
        menuButton.style.color = 'white';
        menuButton.style.borderRadius = '5px';
        menuButton.style.padding = '0.5rem 0.75rem';
        menuButton.style.margin = '0 10px';
        menuButton.style.cursor = 'pointer';
        menuButton.style.zIndex = '1050';
        
        // Función simplificada para alternar el sidebar
        function toggleSidebar(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const body = document.body;
            
            if (window.innerWidth < 992) {
                // Lógica móvil
                if (body.classList.contains('sidebar-open')) {
                    body.classList.remove('sidebar-open');
                    body.classList.add('sidebar-collapse');
                } else {
                    body.classList.add('sidebar-open');
                    body.classList.remove('sidebar-collapse');
                }
            } else {
                // Lógica escritorio
                body.classList.toggle('sidebar-collapse');
            }
        }
        
        // Reemplazar todos los event listeners existentes
        menuButton.onclick = null;
        const newMenuButton = menuButton.cloneNode(true);
        menuButton.parentNode.replaceChild(newMenuButton, menuButton);
        
        // Asignar el nuevo event listener
        newMenuButton.addEventListener('click', toggleSidebar);
        
        console.log('Botón de menú corregido y configurado correctamente');
    }
    
    // 2. CORRECCIÓN DE CLASES CSS FALTANTES
    
    function fixMissingCssClasses() {
        const body = document.body;
        
        // Asegurarse de que body tenga las clases base necesarias
        if (!body.classList.contains('hold-transition') && 
            !body.classList.contains('sidebar-mini')) {
            body.classList.add('hold-transition', 'sidebar-mini');
        }
        
        // Configurar estado inicial del sidebar en móviles
        if (window.innerWidth < 992 && !body.classList.contains('sidebar-collapse')) {
            body.classList.add('sidebar-collapse');
        }
        
        console.log('Clases CSS corregidas');
    }
    
    // Ejecutar las correcciones
    fixMenuButton();
    fixMissingCssClasses();
    
    // 3. DETECTAR ERRORES Y REPARARLOS
    
    // Verificar periódicamente si hay errores para repararlos
    setInterval(function() {
        const menuButton = document.querySelector('[data-widget="pushmenu"]') || 
                          document.querySelector('#sidebarToggleBtn');
        
        // Si el botón no tiene color de fondo, probablemente no se aplicaron los estilos
        if (menuButton && window.getComputedStyle(menuButton).backgroundColor === 'rgba(0, 0, 0, 0)') {
            console.warn('Detectada pérdida de estilos en el botón de menú. Reaplicando...');
            fixMenuButton();
        }
    }, 2000);
    
    console.log('Correcciones globales aplicadas correctamente');
});
