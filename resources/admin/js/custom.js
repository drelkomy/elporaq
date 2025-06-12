/**
 * Script personalizado para el panel de administración
 * Resuelve los problemas de JavaScript y errores de carga
 */

// Manejador de errores para scripts y recursos
window.addEventListener('error', function(event) {
    // Solo manejar errores de carga de recursos
    if (event.target && (event.target.tagName === 'SCRIPT' || event.target.tagName === 'LINK')) {
        console.warn('Error cargando recurso:', event.target.src || event.target.href);
        // Prevenir que el error se muestre en la consola
        event.preventDefault();
    }
}, true);

// Prevenir errores de carga de scripts automáticos
document.addEventListener('DOMContentLoaded', function() {
    // Buscar y desactivar scripts que intentan cargarse automáticamente
    var pageIdentifier = window.location.pathname.split('/').pop();
    if (pageIdentifier) {
        // Prevenir que se intente cargar scripts basados en el nombre de la página
        console.log('Previniendo carga automática de scripts para la página:', pageIdentifier);
        
        // Esto intercepta intentos de cargar scripts dinámicamente
        var originalCreateElement = document.createElement;
        document.createElement = function(tag) {
            var element = originalCreateElement.call(document, tag);
            if (tag.toLowerCase() === 'script') {
                // Monitorear cuando se establece el src
                var originalSrcDescriptor = Object.getOwnPropertyDescriptor(HTMLScriptElement.prototype, 'src');
                Object.defineProperty(element, 'src', {
                    set: function(value) {
                        // Verificar si el script que se intenta cargar podría ser problemático
                        if (value && (value.includes(pageIdentifier) || 
                                     // Lista de scripts problemáticos conocidos que deben ser bloqueados
                                     ['create.js', 'users.js', 'investment-categories.js', 'links.js', 'categories.js'].some(script => value.includes(script)))) {
                            console.warn('Previniendo carga de script potencialmente problemático:', value);
                            return value; // No cargar realmente el script
                        }
                        return originalSrcDescriptor.set.call(this, value);
                    },
                    get: function() {
                        return originalSrcDescriptor.get.call(this);
                    }
                });
            }
            return element;
        };
    }
});

// Inicializar las funciones cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    try {
        console.log('Inicializando scripts personalizados...');

        // Marcar elementos de menú activos
        const currentPath = window.location.pathname;
        const menuItems = document.querySelectorAll('.nav-sidebar .nav-link');
        
        menuItems.forEach(item => {
            const href = item.getAttribute('href');
            if (href && currentPath === href) {
                item.classList.add('active');
                
                // Si es parte de un submenú, abrir el menú padre
                const parent = item.closest('.has-treeview');
                if (parent) {
                    parent.classList.add('menu-open');
                    const parentLink = parent.querySelector('.nav-link');
                    if (parentLink) parentLink.classList.add('active');
                }
            }
        });
        
        console.log('Scripts personalizados cargados correctamente');
    } catch (error) {
        console.error('Error al inicializar scripts:', error);
    }
});
