/**
 * Controlador para ocultar completamente el sidebar en el panel de administración
 * Este script complementa el comportamiento estándar de AdminLTE para
 * ocultar completamente el sidebar en lugar de colapsarlo a iconos
 */

(function() {
    // Ejecutar cuando el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
        // Elementos principales
        const body = document.body;
        const sidebarToggle = document.querySelector('.nav-link[data-widget="pushmenu"]');
        const mainSidebar = document.querySelector('.main-sidebar');
        const contentWrapper = document.querySelector('.content-wrapper');
        const mainHeader = document.querySelector('.main-header');
        const mainFooter = document.querySelector('.main-footer');
        
        // Clase personalizada para ocultar completamente el sidebar
        const SIDEBAR_HIDDEN_CLASS = 'sidebar-completely-hidden';
        
        // Verificar si se debe mantener el estado guardado
        let sidebarHidden = localStorage.getItem('sidebar-hidden') === 'true';
        
        // Añadir estilos personalizados para ocultar completamente el sidebar
        function addCustomStyles() {
            if (!document.getElementById('sidebar-controller-styles')) {
                const style = document.createElement('style');
                style.id = 'sidebar-controller-styles';
                style.textContent = `
                    .sidebar-completely-hidden .main-sidebar {
                        margin-right: -280px !important;
                        margin-left: -280px !important;
                    }
                    
                    [dir="rtl"] .sidebar-completely-hidden .content-wrapper,
                    [dir="rtl"] .sidebar-completely-hidden .main-header,
                    [dir="rtl"] .sidebar-completely-hidden .main-footer {
                        margin-right: 0 !important;
                    }
                    
                    [dir="ltr"] .sidebar-completely-hidden .content-wrapper,
                    [dir="ltr"] .sidebar-completely-hidden .main-header,
                    [dir="ltr"] .sidebar-completely-hidden .main-footer {
                        margin-left: 0 !important;
                    }
                    
                    .sidebar-completely-hidden .content-wrapper,
                    .sidebar-completely-hidden .main-header,
                    .sidebar-completely-hidden .main-footer {
                        margin-left: 0 !important;
                        margin-right: 0 !important;
                    }
                    
                    /* Transición suave para mejor UX */
                    .main-sidebar,
                    .content-wrapper,
                    .main-header,
                    .main-footer {
                        transition: all 0.3s ease-in-out;
                    }
                    
                    /* Oscurecer fondo en móviles cuando se abre el menú */
                    @media (max-width: 991.98px) {
                        .sidebar-open::before {
                            content: '';
                            position: fixed;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background: rgba(0, 0, 0, 0.5);
                            z-index: 1031;
                        }
                        
                        .main-sidebar {
                            z-index: 1032 !important;
                        }
                    }
                `;
                document.head.appendChild(style);
            }
        }
        
        // Aplicar estado del sidebar (visible u oculto)
        function applySidebarState() {
            if (sidebarHidden) {
                body.classList.add(SIDEBAR_HIDDEN_CLASS);
                body.classList.add('sidebar-collapse');
            } else {
                body.classList.remove(SIDEBAR_HIDDEN_CLASS);
                body.classList.remove('sidebar-collapse');
            }
            
            // Guardar estado en localStorage
            localStorage.setItem('sidebar-hidden', sidebarHidden);
        }
        
        // Toggle personalizado para el sidebar
        function toggleSidebar() {
            sidebarHidden = !sidebarHidden;
            applySidebarState();
        }
        
        // Anular el comportamiento predeterminado de AdminLTE
        function overrideAdminLTEBehavior() {
            if (window.$ && window.$.fn && window.$.fn.pushMenu) {
                // Guardar la función original
                const originalPushMenu = window.$.fn.pushMenu;
                
                // Reemplazar con nuestra implementación
                window.$.fn.pushMenu = function(options) {
                    // Llamar a la función original primero
                    const result = originalPushMenu.apply(this, arguments);
                    
                    // Aplicar nuestro comportamiento personalizado
                    toggleSidebar();
                    
                    return result;
                };
            }
        }
        
        // Inicializar
        function init() {
            addCustomStyles();
            applySidebarState();
            
            // Añadir listener directo por si no se carga jQuery
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    toggleSidebar();
                });
            }
            
            // Sobrescribir comportamiento AdminLTE
            if (window.$ && window.$.fn) {
                overrideAdminLTEBehavior();
            } else {
                // Si jQuery no está cargado todavía, esperar
                window.addEventListener('load', function() {
                    if (window.$ && window.$.fn) {
                        overrideAdminLTEBehavior();
                    }
                });
            }
        }
        
        // Ejecutar inicialización
        init();
    });
})();
