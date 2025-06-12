/**
 * Script personalizado para el manejo del sidebar AdminLTE en ElPoraq
 * Implementación robusta para dispositivos móviles y escritorio
 */

// Inicializar cuando el DOM esté cargado
document.addEventListener('DOMContentLoaded', function() {
    console.log('Inicializando scripts del sidebar...');
    
    // Función simple para alternar el sidebar
    function toggleSidebar(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        const body = document.body;
        
        // Lógica específica para móviles vs. escritorio
        if (window.innerWidth < 992) {
            // En móviles: alternar entre abierto y cerrado
            body.classList.toggle('sidebar-open');
            
            if (body.classList.contains('sidebar-open')) {
                body.classList.remove('sidebar-collapse');
                console.log('Sidebar móvil: ABIERTO');
            } else {
                body.classList.add('sidebar-collapse');
                console.log('Sidebar móvil: CERRADO');
            }
        } else {
            // En escritorio: solo colapsar/expandir
            body.classList.toggle('sidebar-collapse');
            
            // Guardar estado para futuras visitas
            const isCollapsed = body.classList.contains('sidebar-collapse');
            localStorage.setItem('sidebarState', isCollapsed ? 'collapsed' : 'expanded');
            console.log('Sidebar escritorio:', isCollapsed ? 'COLAPSADO' : 'EXPANDIDO');
        }
    }
    
    // Configurar estado inicial del sidebar
    function initSidebarState() {
        const body = document.body;
        
        // En móviles, empezar con sidebar cerrado
        if (window.innerWidth < 992) {
            body.classList.add('sidebar-collapse');
            body.classList.remove('sidebar-open');
            console.log('Estado inicial móvil: Sidebar cerrado');
        } else {
            // En escritorio, restaurar estado guardado
            const sidebarState = localStorage.getItem('sidebarState');
            if (sidebarState === 'collapsed') {
                body.classList.add('sidebar-collapse');
            } else {
                body.classList.remove('sidebar-collapse');
            }
            console.log('Estado inicial escritorio: Estado restaurado');
        }
    }
    
    // Marcar elementos de menú activos
    function highlightActiveMenu() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-sidebar .nav-link');
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (!href || href === '#' || href === '/') return;
            
            if (currentPath === href || currentPath.includes(href)) {
                // Activar enlace actual
                link.classList.add('active');
                
                // Activar menús padre
                let parent = link.closest('.has-treeview');
                while (parent) {
                    parent.classList.add('menu-open');
                    const parentLink = parent.querySelector('.nav-link');
                    if (parentLink) parentLink.classList.add('active');
                    parent = parent.parentElement.closest('.has-treeview');
                }
            }
        });
    }
    
    // REGISTRO DE MÚLTIPLES EVENTOS PARA GARANTIZAR FUNCIONAMIENTO
    
    // 1. Evento directo en el botón principal
    const menuButton = document.querySelector('[data-widget="pushmenu"]') || 
                      document.querySelector('#sidebarToggleBtn');
    
    if (menuButton) {
        console.log('Botón de menú encontrado:', menuButton);
        menuButton.onclick = toggleSidebar;
    } else {
        console.warn('Botón de menú no encontrado mediante selector principal');
    }
    
    // 2. Evento por delegación para capturar cualquier clic relacionado
    document.addEventListener('click', function(e) {
        const target = e.target;
        
        // Verificar si el clic fue en el botón o su icono
        if (target.closest('[data-widget="pushmenu"]') || 
            target.classList.contains('fa-bars') || 
            (target.parentElement && target.parentElement.classList.contains('fa-bars'))) {
            console.log('Click detectado en botón de menú o su icono');
            toggleSidebar(e);
        }
    }, true);
    
    // 3. Cerrar sidebar al hacer clic fuera (solo en móviles)
    document.addEventListener('click', function(e) {
        const sidebar = document.querySelector('.main-sidebar');
        
        if (window.innerWidth < 992 && 
            document.body.classList.contains('sidebar-open') && 
            sidebar && 
            !sidebar.contains(e.target) && 
            !e.target.closest('[data-widget="pushmenu"]')) {
            
            document.body.classList.remove('sidebar-open');
            document.body.classList.add('sidebar-collapse');
            console.log('Sidebar cerrado por clic fuera');
        }
    });
    
    // Exponer función para uso global
    window.toggleSidebar = toggleSidebar;
    
    // Inicializar todo
    initSidebarState();
    highlightActiveMenu();
    
    console.log('Scripts del sidebar cargados correctamente');
});
