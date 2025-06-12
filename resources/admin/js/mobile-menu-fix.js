/**
 * Solución dedicada para el botón de menú en móviles
 * Para asegurar que el sidebar funciona en todas las páginas y dispositivos
 */
(function() {
  // Ejecutar inmediatamente y al cargar el DOM
  fixMobileMenu();
  document.addEventListener('DOMContentLoaded', fixMobileMenu);
  
  function fixMobileMenu() {
    console.log('[MOBILE FIX] Inicializando solución para botón móvil...');
    
    // Encontrar el botón de menú
    const menuBtn = document.querySelector('[data-widget="pushmenu"]') || 
                   document.querySelector('#sidebarToggleBtn') || 
                   document.querySelector('.navbar-toggler');
    
    if (!menuBtn) {
      console.error('[MOBILE FIX] No se encontró el botón de menú');
      return;
    }
    
    console.log('[MOBILE FIX] Botón de menú encontrado:', menuBtn);
    
    // Asegurarse de que el botón sea visible y tenga estilo
    menuBtn.style.display = 'flex';
    menuBtn.style.alignItems = 'center';
    menuBtn.style.justifyContent = 'center';
    menuBtn.style.fontSize = '1.25rem';
    menuBtn.style.padding = '0.5rem 0.75rem';
    menuBtn.style.background = '#007bff';
    menuBtn.style.color = 'white';
    menuBtn.style.borderRadius = '5px';
    menuBtn.style.margin = '0 10px';
    menuBtn.style.cursor = 'pointer';
    menuBtn.style.zIndex = '1050';
    
    // Reemplazar los manejadores de eventos existentes
    menuBtn.onclick = null;
    menuBtn.removeEventListener('click', menuBtn.toggleSidebar);
    
    // Agregar nuevo manejador de eventos
    function toggleSidebarMobile(e) {
      e.preventDefault();
      e.stopPropagation();
      
      const body = document.body;
      
      if (window.innerWidth < 992) {
        // Asegurarse de que el método toggle funcione correctamente
        if (body.classList.contains('sidebar-open')) {
          body.classList.remove('sidebar-open');
          body.classList.add('sidebar-collapse');
          console.log('[MOBILE FIX] Sidebar cerrado');
        } else {
          body.classList.add('sidebar-open');
          body.classList.remove('sidebar-collapse');
          console.log('[MOBILE FIX] Sidebar abierto');
        }
      } else {
        body.classList.toggle('sidebar-collapse');
      }
    }
    
    // Asignar el nuevo manejador con varios métodos
    menuBtn.onclick = toggleSidebarMobile;
    menuBtn.addEventListener('click', toggleSidebarMobile);
    menuBtn.addEventListener('touchend', toggleSidebarMobile);
    
    console.log('[MOBILE FIX] Solución aplicada correctamente');
  }
})();
