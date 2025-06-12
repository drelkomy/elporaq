/**
 * Script optimizado para mantener el estado del menú al navegar
 * - Mantiene los submenús desplegados
 * - Preserva el elemento activo con color azul
 * - Versión ligera para mejor rendimiento
 */

(function() {
    // Variable para controlar si el script ya se está ejecutando
    let isRunning = false;
    
    // Ejecutar cuando el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
        // Evitar inicializaciones múltiples
        if (isRunning) return;
        isRunning = true;
        
        console.log('[MENU] Inicializando menú optimizado...');
        
        // Funciones principales con ejecución limitada
        function setupMenuPersistence() {
            // 1. Guardar los menús abiertos en localStorage
            const saveMenuState = function() {
                // Usar un Set para evitar duplicados
                const openMenusSet = new Set();
                
                document.querySelectorAll('.nav-item.menu-open').forEach(function(item) {
                    // Obtener identificador del menú
                    const link = item.querySelector('.nav-link');
                    if (link) {
                        const menuId = link.dataset.path || link.innerText.trim();
                        if (menuId) {
                            openMenusSet.add(menuId);
                        }
                    }
                });
                
                const openMenus = Array.from(openMenusSet);
                localStorage.setItem('openMenus', JSON.stringify(openMenus));
            };
            
            // 2. Restaurar menús abiertos desde localStorage (simplificado)
            const restoreMenuState = function() {
                try {
                    const openMenus = JSON.parse(localStorage.getItem('openMenus')) || [];
                    
                    // Solo procesar si hay menús para restaurar
                    if (openMenus.length) {
                        // Crear un mapa para buscar más rápido
                        const menuMap = new Map();
                        
                        // Recopilar todos los enlaces en un solo paso
                        document.querySelectorAll('.nav-sidebar .nav-link').forEach(function(link) {
                            const linkId = link.dataset.path || link.innerText.trim();
                            menuMap.set(linkId, link);
                        });
                        
                        // Aplicar cambios a los menús que necesitan abrirse
                        openMenus.forEach(function(menuId) {
                            const link = menuMap.get(menuId);
                            if (link) {
                                const menuItem = link.closest('.nav-item');
                                if (menuItem && !menuItem.classList.contains('menu-open')) {
                                    menuItem.classList.add('menu-open');
                                    const treeview = menuItem.querySelector('.nav-treeview');
                                    if (treeview) {
                                        treeview.style.display = 'block';
                                    }
                                }
                            }
                        });
                    }
                } catch (e) {
                    console.error('[MENU] Error restaurando estado:', e);
                    // Limpiar localStorage en caso de error para evitar problemas futuros
                    localStorage.removeItem('openMenus');
                }
            };
            
            // 3. Resaltar el menú activo basado en la URL actual (versión optimizada)            
            const highlightActiveMenu = function() {
                const currentPath = window.location.pathname;
                
                // Limpiar clases activas anteriores
                document.querySelectorAll('.nav-sidebar .nav-link.active, .nav-sidebar .nav-link.parent-active').forEach(link => {
                    link.classList.remove('active');
                    link.classList.remove('parent-active');
                });
                
                const allLinks = Array.from(document.querySelectorAll('.nav-sidebar .nav-link[href]'));
                const activeLinks = [];
                
                // Buscar coincidencia exacta primero
                const exactMatch = allLinks.find(link => {
                    const href = link.getAttribute('href');
                    return href && href !== '#' && currentPath === href;
                });
                
                if (exactMatch) {
                    activeLinks.push(exactMatch);
                } else {
                    // Si no hay coincidencia exacta, buscar coincidencias parciales
                    allLinks.forEach(link => {
                        const href = link.getAttribute('href');
                        if (href && href !== '#' && href.length > 1 && currentPath.includes(href)) {
                            activeLinks.push(link);
                        }
                    });
                    
                    // Si aún no hay coincidencias, intentar con segmentos de URL
                    if (activeLinks.length === 0) {
                        const adminSegments = currentPath.split('/').filter(Boolean);
                        if (adminSegments.length > 1) {
                            const baseSegment = '/' + adminSegments[0] + '/' + adminSegments[1];
                            allLinks.forEach(link => {
                                const href = link.getAttribute('href');
                                if (href && href.startsWith(baseSegment)) {
                                    activeLinks.push(link);
                                }
                            });
                        }
                    }
                }
                
                if (activeLinks.length > 0) {
                    // Ordenar enlaces por especificidad (más largo = más específico)
                    activeLinks.sort((a, b) => {
                        return b.getAttribute('href').length - a.getAttribute('href').length;
                    });
                    
                    // Marcar como activos TODOS los enlaces que coincidan
                    activeLinks.forEach(link => {
                        link.classList.add('active');
                    });
                    
                    // Marcar como activos los menús padres del enlace más específico
                    const mostSpecificLink = activeLinks[0];
                    let parent = mostSpecificLink.closest('.nav-treeview');
                    
                    while (parent) {
                        const parentItem = parent.closest('.nav-item');
                        if (parentItem) {
                            const parentLink = parentItem.querySelector('.nav-link');
                            if (parentLink && !parentLink.classList.contains('active')) {
                                parentLink.classList.add('parent-active');
                                parentItem.classList.add('menu-open');
                                parent.style.display = 'block';
                            }
                            parent = parentItem.closest('.nav-treeview');
                        } else {
                            break;
                        }
                    }
                    
                    // Asegurar que todos los elementos activos sean visibles
                    setTimeout(() => {
                        document.querySelectorAll('.nav-sidebar .nav-link.active').forEach(activeLink => {
                            let treeview = activeLink.closest('.nav-treeview');
                            if (treeview) {
                                treeview.style.display = 'block';
                                let parentItem = treeview.closest('.nav-item');
                                if (parentItem) {
                                    parentItem.classList.add('menu-open');
                                }
                            }
                        });
                    }, 100);
                }
            };
            
            // 4. Versión optimizada - Permitir abrir y cerrar menús con toggle
            const toggleMenus = function() {
                // Usar delegación de eventos en lugar de muchos event listeners
                document.querySelector('.nav-sidebar').addEventListener('click', function(e) {
                    // Solo procesar clics en enlaces
                    if (e.target.classList.contains('nav-link') || e.target.closest('.nav-link')) {
                        const link = e.target.classList.contains('nav-link') ? e.target : e.target.closest('.nav-link');
                        const navItem = link.closest('.nav-item');
                        
                        if (navItem) {
                            const treeview = navItem.querySelector('.nav-treeview');
                            
                            // Si tiene submenú
                            if (treeview) {
                                e.preventDefault();
                                e.stopPropagation();
                                
                                // Toggle: si está abierto, cerrar; si está cerrado, abrir
                                if (navItem.classList.contains('menu-open')) {
                                    navItem.classList.remove('menu-open');
                                    treeview.style.display = 'none';
                                } else {
                                    navItem.classList.add('menu-open');
                                    treeview.style.display = 'block';
                                }
                            }
                            
                            // Guardar estado
                            setTimeout(saveMenuState, 50);
                        }
                    }
                });
                
                // Forzar menús abiertos
                localStorage.setItem('forceOpenMenus', 'true');
                
                // Anular AdminLTE PushMenu (simplificado)
                window.addEventListener('load', function() {
                    if (window.$ && window.$.fn) {
                        // Anular función pushMenu si existe
                        if (window.$.fn.pushMenu) {
                            const originalPushMenu = window.$.fn.pushMenu;
                            window.$.fn.pushMenu = function(options) {
                                const result = originalPushMenu.apply(this, arguments);
                                // Mantener menús abiertos
                                document.querySelectorAll('.nav-item.menu-open').forEach(function(item) {
                                    const treeview = item.querySelector('.nav-treeview');
                                    if (treeview) {
                                        treeview.style.display = 'block';
                                    }
                                });
                                return result;
                            };
                        }
                        
                        // Anular TreeView si existe
                        if (window.$.fn.Treeview && window.$.fn.Treeview.Constructor) {
                            const TreeviewProto = window.$.fn.Treeview.Constructor.prototype;
                            if (TreeviewProto._toggle) {
                                TreeviewProto._toggle = function(link) {
                                    // Solo abrir, nunca cerrar
                                    $(link.next(this._config.treeviewMenu)).show();
                                    $(link).parent().addClass('menu-open');
                                };
                            }
                        }
                    }
                });
                
                // Método simple para mantener menús abiertos periódicamente
                const keepMenusOpen = function() {
                    document.querySelectorAll('.nav-item.menu-open').forEach(function(item) {
                        const treeview = item.querySelector('.nav-treeview');
                        if (treeview && treeview.style.display !== 'block') {
                            treeview.style.display = 'block';
                        }
                    });
                };
                
                // Aplicar cada segundo para asegurar que los menús permanezcan abiertos
                setInterval(keepMenusOpen, 1000);
            };
            
            // 5. Aplicar estilo adicional al elemento activo (versión optimizada)
            const enhanceActiveStyle = function() {
                // Verificar si ya existe el estilo personalizado
                if (!document.getElementById('menu-persistence-styles')) {
                    const style = document.createElement('style');
                    style.id = 'menu-persistence-styles';
                    style.textContent = `
                        .nav-sidebar .nav-link.active {
                            background-color: #007bff !important;
                            color: white !important;
                            font-weight: bold !important;
                        }
                        .nav-sidebar .nav-link.parent-active {
                            background-color: rgba(0, 123, 255, 0.1) !important;
                            color: #007bff !important;
                            font-weight: bold !important;
                        }
                        .nav-sidebar .menu-open > .nav-treeview {
                            display: block !important;
                        }
                        .main-sidebar {
                            width: 280px !important;
                        }
                        .content-wrapper, .main-header, .main-footer {
                            margin-right: 280px !important;
                            margin-left: 0 !important;
                        }
                        [dir="ltr"] .content-wrapper, [dir="ltr"] .main-header, [dir="ltr"] .main-footer {
                            margin-left: 280px !important;
                            margin-right: 0 !important;
                        }
                        @media (max-width: 991.98px) {
                            .content-wrapper, .main-header, .main-footer {
                                margin-right: 0 !important;
                            }
                            [dir="ltr"] .content-wrapper, [dir="ltr"] .main-header, [dir="ltr"] .main-footer {
                                margin-left: 0 !important;
                            }
                        }
                    `;
                    document.head.appendChild(style);
                }
            };
            
            // Ejecutar todas las funciones en orden
            restoreMenuState();    // Restaurar estado guardado
            highlightActiveMenu(); // Resaltar menú activo según URL
            toggleMenus();         // Permitir abrir/cerrar menús con toggle
            enhanceActiveStyle();  // Aplicar estilos
            
            // Guardar estado al salir de la página
            window.addEventListener('beforeunload', saveMenuState);
        }
        
        // Iniciar con un retraso mínimo para evitar conflictos con otros scripts
        setTimeout(setupMenuPersistence, 100);
    });
})();
