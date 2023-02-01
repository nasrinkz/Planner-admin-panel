/* ------------------------------------------------------------------------------
 *
 *  # Template JS core
 *
 *  Includes minimum required JS code for proper template functioning
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var App = function () {


    //
    // Setup module components
    //

    // Transitions
    // -------------------------

    // Disable all transitions
    var _transitionsDisabled = function() {
        $('body').addClass('no-transitions');
    };

    // Enable all transitions
    var _transitionsEnabled = function() {
        $('body').removeClass('no-transitions');
    };


    // Sidebars
    // -------------------------

    //
    // On desktop
    //

    // Resize main sidebar
    var _sidebarMainResize = function() {

        // Flip 2nd level if menu overflows
        // bottom edge of browser window
        var revertBottomMenus = function() {
            $('.sidebar-main').find('.nav-sidebar').children('.nav-item-submenu').hover(function() {
                var totalHeight = 0,
                    $this = $(this),
                    navSubmenuClass = 'nav-group-sub',
                    navSubmenuReversedClass = 'nav-item-submenu-reversed';

                totalHeight += $this.find('.' + navSubmenuClass).filter(':visible').outerHeight();
                if($this.children('.' + navSubmenuClass).length) {
                    if(($this.children('.' + navSubmenuClass).offset().top + $this.find('.' + navSubmenuClass).filter(':visible').outerHeight()) > document.body.clientHeight) {
                        $this.addClass(navSubmenuReversedClass);
                    }
                    else {
                        $this.removeClass(navSubmenuReversedClass);
                    }
                }
            });
        };

        // If sidebar is resized by default
        if($('body').hasClass('sidebar-xs')) {
            revertBottomMenus();
        }

        // Toggle min sidebar class
        $('.sidebar-main-toggle').on('click', function (e) {
            e.preventDefault();

            $('body').toggleClass('sidebar-xs').removeClass('sidebar-mobile-main');
            revertBottomMenus();
        });
    };

    // Toggle main sidebar
    var _sidebarMainToggle = function() {
        $(document).on('click', '.sidebar-main-hide', function (e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-main-hidden');
        });
    };

    // Toggle secondary sidebar
    var _sidebarSecondaryToggle = function() {
        $(document).on('click', '.sidebar-secondary-toggle', function (e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-secondary-hidden');
        });
    };


    // Show right, resize main
    var _sidebarRightMainToggle = function() {
        $(document).on('click', '.sidebar-right-main-toggle', function (e) {
            e.preventDefault();

            // Right sidebar visibility
            $('body').toggleClass('sidebar-right-visible');

            // If visible
            if ($('body').hasClass('sidebar-right-visible')) {

                // Make main sidebar mini
                $('body').addClass('sidebar-xs');

                // Hide children lists if they are opened, since sliding animation adds inline CSS
                $('.sidebar-main .nav-sidebar').children('.nav-item').children('.nav-group-sub').css('display', '');
            }
            else {
                $('body').removeClass('sidebar-xs');
            }
        });
    };

    // Show right, hide main
    var _sidebarRightMainHide = function() {
        $(document).on('click', '.sidebar-right-main-hide', function (e) {
            e.preventDefault();

            // Opposite sidebar visibility
            $('body').toggleClass('sidebar-right-visible');

            // If visible
            if ($('body').hasClass('sidebar-right-visible')) {
                $('body').addClass('sidebar-main-hidden');
            }
            else {
                $('body').removeClass('sidebar-main-hidden');
            }
        });
    };

    // Toggle right sidebar
    var _sidebarRightToggle = function() {
        $(document).on('click', '.sidebar-right-toggle', function (e) {
            e.preventDefault();

            $('body').toggleClass('sidebar-right-visible');
        });
    };

    // Show right, hide secondary
    var _sidebarRightSecondaryToggle = function() {
        $(document).on('click', '.sidebar-right-secondary-toggle', function (e) {
            e.preventDefault();

            // Opposite sidebar visibility
            $('body').toggleClass('sidebar-right-visible');

            // If visible
            if ($('body').hasClass('sidebar-right-visible')) {
                $('body').addClass('sidebar-secondary-hidden');
            }
            else {
                $('body').removeClass('sidebar-secondary-hidden');
            }
        });
    };


    // Toggle content sidebar
    var _sidebarComponentToggle = function() {
        $(document).on('click', '.sidebar-component-toggle', function (e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-component-hidden');
        });
    };


    //
    // On mobile
    //

    // Expand sidebar to full screen on mobile
    var _sidebarMobileFullscreen = function() {
        $('.sidebar-mobile-expand').on('click', function (e) {
            e.preventDefault();
            var $sidebar = $(this).parents('.sidebar'),
                sidebarFullscreenClass = 'sidebar-fullscreen';

            if(!$sidebar.hasClass(sidebarFullscreenClass)) {
                $sidebar.addClass(sidebarFullscreenClass);
            }
            else {
                $sidebar.removeClass(sidebarFullscreenClass);
            }
        });
    };

    // Toggle main sidebar on mobile
    var _sidebarMobileMainToggle = function() {
        $('.sidebar-mobile-main-toggle').on('click', function(e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-mobile-main').removeClass('sidebar-mobile-secondary sidebar-mobile-right');

            if($('.sidebar-main').hasClass('sidebar-fullscreen')) {
                $('.sidebar-main').removeClass('sidebar-fullscreen');
            }
        });
    };

    // Toggle secondary sidebar on mobile
    var _sidebarMobileSecondaryToggle = function() {
        $('.sidebar-mobile-secondary-toggle').on('click', function (e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-mobile-secondary').removeClass('sidebar-mobile-main sidebar-mobile-right');

            // Fullscreen mode
            if($('.sidebar-secondary').hasClass('sidebar-fullscreen')) {
                $('.sidebar-secondary').removeClass('sidebar-fullscreen');
            }
        });
    };

    // Toggle right sidebar on mobile
    var _sidebarMobileRightToggle = function() {
        $('.sidebar-mobile-right-toggle').on('click', function (e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-mobile-right').removeClass('sidebar-mobile-main sidebar-mobile-secondary');

            // Hide sidebar if in fullscreen mode on mobile
            if($('.sidebar-right').hasClass('sidebar-fullscreen')) {
                $('.sidebar-right').removeClass('sidebar-fullscreen');
            }
        });
    };

    // Toggle component sidebar on mobile
    var _sidebarMobileComponentToggle = function() {
        $('.sidebar-mobile-component-toggle').on('click', function (e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-mobile-component');
        });
    };


    // Navigations
    // -------------------------

    // Sidebar navigation
    var _navigationSidebar = function() {

        // Define default class names and options
        var navClass = 'nav-sidebar',
            navItemClass = 'nav-item',
            navItemOpenClass = 'nav-item-open',
            navLinkClass = 'nav-link',
            navSubmenuClass = 'nav-group-sub',
            navSlidingSpeed = 250;

        // Configure collapsible functionality
        $('.' + navClass).each(function() {
            $(this).find('.' + navItemClass).has('.' + navSubmenuClass).children('.' + navItemClass + ' > ' + '.' + navLinkClass).not('.disabled').on('click', function (e) {
                e.preventDefault();

                // Simplify stuff
                var $target = $(this),
                    $navSidebarMini = $('.sidebar-xs').not('.sidebar-mobile-main').find('.sidebar-main .' + navClass).children('.' + navItemClass);

                // Collapsible
                if($target.parent('.' + navItemClass).hasClass(navItemOpenClass)) {
                    $target.parent('.' + navItemClass).not($navSidebarMini).removeClass(navItemOpenClass).children('.' + navSubmenuClass).slideUp(navSlidingSpeed);
                }
                else {
                    $target.parent('.' + navItemClass).not($navSidebarMini).addClass(navItemOpenClass).children('.' + navSubmenuClass).slideDown(navSlidingSpeed);
                }

                // Accordion
                if ($target.parents('.' + navClass).data('nav-type') == 'accordion') {
                    $target.parent('.' + navItemClass).not($navSidebarMini).siblings(':has(.' + navSubmenuClass + ')').removeClass(navItemOpenClass).children('.' + navSubmenuClass).slideUp(navSlidingSpeed);
                }
            });
        });

        // Disable click in disabled navigation items
        $(document).on('click', '.' + navClass + ' .disabled', function(e) {
            e.preventDefault();
        });

        // Scrollspy navigation
        $('.nav-scrollspy').find('.' + navItemClass).has('.' + navSubmenuClass).children('.' + navItemClass + ' > ' + '.' + navLinkClass).off('click');
    };

    // Navbar navigation
    var _navigationNavbar = function() {

        // Prevent dropdown from closing on click
        $(document).on('click', '.dropdown-content', function(e) {
            e.stopPropagation();
        });

        // Disabled links
        $('.navbar-nav .disabled a, .nav-item-levels .disabled').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
        });

        // Show tabs inside dropdowns
        $('.dropdown-content a[data-toggle="tab"]').on('click', function(e) {
            $(this).tab('show');
        });
    };


    // Components
    // -------------------------

    // Tooltip
    var _componentTooltip = function() {

        // Initialize
        $('[data-popup="tooltip"]').tooltip();

        // Demo tooltips, remove in production
        var demoTooltipSelector = '[data-popup="tooltip-demo"]';
        if($(demoTooltipSelector).is(':visible')) {
            $(demoTooltipSelector).tooltip('show');
            setTimeout(function() {
                $(demoTooltipSelector).tooltip('hide');
            }, 2000);
        }
    };

    // Popover
    var _componentPopover = function() {
        $('[data-popup="popover"]').popover();
    };


    // Card actions
    // -------------------------

    // Reload card (uses BlockUI extension)
    var _cardActionReload = function() {
        $('.card [data-action=reload]:not(.disabled)').on('click', function (e) {
            e.preventDefault();
            var $target = $(this),
                block = $target.closest('.card');

            // Block card
            $(block).block({
                message: '<i class="icon-spinner2 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait',
                    'box-shadow': '0 0 0 1px #ddd'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });

            // For demo purposes
            window.setTimeout(function () {
               $(block).unblock();
            }, 2000);
        });
    };

    // Collapse card
    var _cardActionCollapse = function() {
        var $cardCollapsedClass = $('.card-collapsed');

        // Hide if collapsed by default
        $cardCollapsedClass.children('.card-header').nextAll().hide();

        // Rotate icon if collapsed by default
        $cardCollapsedClass.find('[data-action=collapse]').addClass('rotate-180');

        // Collapse on click
        $('.card [data-action=collapse]:not(.disabled)').on('click', function (e) {
            var $target = $(this),
                slidingSpeed = 150;

            e.preventDefault();
            $target.parents('.card').toggleClass('card-collapsed');
            $target.toggleClass('rotate-180');
            $target.closest('.card').children('.card-header').nextAll().slideToggle(slidingSpeed);
        });
    };

    // Remove card
    var _cardActionRemove = function() {
        $('.card [data-action=remove]').on('click', function (e) {
            e.preventDefault();
            var $target = $(this),
                slidingSpeed = 150;

            // If not disabled
            if(!$target.hasClass('disabled')) {
                $target.closest('.card').slideUp({
                    duration: slidingSpeed,
                    start: function() {
                        $target.addClass('d-block');
                    },
                    complete: function() {
                        $target.remove();
                    }
                });
            }
        });
    };

    // Card fullscreen mode
    var _cardActionFullscreen = function() {
        $('.card [data-action=fullscreen]').on('click', function (e) {
            e.preventDefault();

            // Define vars
            var $target = $(this),
                cardFullscreen = $target.closest('.card'),
                overflowHiddenClass = 'overflow-hidden',
                collapsedClass = 'collapsed-in-fullscreen',
                fullscreenAttr = 'data-fullscreen';

            // Toggle classes on card
            cardFullscreen.toggleClass('fixed-top h-100 rounded-0');

            // Configure
            if (!cardFullscreen.hasClass('fixed-top')) {
                $target.removeAttr(fullscreenAttr);
                cardFullscreen.children('.' + collapsedClass).removeClass('show');
                $('body').removeClass(overflowHiddenClass);
                $target.siblings('[data-action=move], [data-action=remove], [data-action=collapse]').removeClass('d-none');
            }
            else {
                $target.attr(fullscreenAttr, 'active');
                cardFullscreen.removeAttr('style').children('.collapse:not(.show)').addClass('show ' + collapsedClass);
                $('body').addClass(overflowHiddenClass);
                $target.siblings('[data-action=move], [data-action=remove], [data-action=collapse]').addClass('d-none');
            }
        });
    };


    // Misc
    // -------------------------

    // Dropdown submenus. Trigger on click
    var _dropdownSubmenu = function() {

        // All parent levels require .dropdown-toggle class
        $('.dropdown-menu').find('.dropdown-submenu').not('.disabled').find('.dropdown-toggle').on('click', function(e) {
            e.stopPropagation();
            e.preventDefault();

            // Remove "show" class in all siblings
            $(this).parent().siblings().removeClass('show').find('.show').removeClass('show');

            // Toggle submenu
            $(this).parent().toggleClass('show').children('.dropdown-menu').toggleClass('show');

            // Hide all levels when parent dropdown is closed
            $(this).parents('.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show, .dropdown-submenu.show').removeClass('show');
            });
        });
    };

    // Header elements toggler
    var _headerElements = function() {

        // Toggle visible state of header elements
        $('.header-elements-toggle').on('click', function(e) {
            e.preventDefault();
            $(this).parents('[class*=header-elements-]').find('.header-elements').toggleClass('d-none');
        });

        // Toggle visible state of footer elements
        $('.footer-elements-toggle').on('click', function(e) {
            e.preventDefault();
            $(this).parents('.card-footer').find('.footer-elements').toggleClass('d-none');
        });
    };


    //
    // Return objects assigned to module
    //

    return {

        // Disable transitions before page is fully loaded
        initBeforeLoad: function() {
            _transitionsDisabled();
        },

        // Enable transitions when page is fully loaded
        initAfterLoad: function() {
            _transitionsEnabled();
        },

        // Initialize all sidebars
        initSidebars: function() {

            // On desktop
            _sidebarMainResize();
            _sidebarMainToggle();
            _sidebarSecondaryToggle();
            _sidebarRightMainToggle();
            _sidebarRightMainHide();
            _sidebarRightToggle();
            _sidebarRightSecondaryToggle();
            _sidebarComponentToggle();

            // On mobile
            _sidebarMobileFullscreen();
            _sidebarMobileMainToggle();
            _sidebarMobileSecondaryToggle();
            _sidebarMobileRightToggle();
            _sidebarMobileComponentToggle();
        },

        // Initialize all navigations
        initNavigations: function() {
            _navigationSidebar();
            _navigationNavbar();
        },

        // Initialize all components
        initComponents: function() {
            _componentTooltip();
            _componentPopover();
        },

        // Initialize all card actions
        initCardActions: function() {
            _cardActionReload();
            _cardActionCollapse();
            _cardActionRemove();
            _cardActionFullscreen();
        },

        // Dropdown submenu
        initDropdownSubmenu: function() {
            _dropdownSubmenu();
        },

        initHeaderElementsToggle: function() {
            _headerElements();
        },

        // Initialize core
        initCore: function() {
            App.initSidebars();
            App.initNavigations();
            App.initComponents();
            App.initCardActions();
            App.initDropdownSubmenu();
            App.initHeaderElementsToggle();
        }
    };
}();


// Initialize module
// ------------------------------

// When content is loaded
document.addEventListener('DOMContentLoaded', function() {
    App.initBeforeLoad();
    App.initCore();
});

// When page is fully loaded
window.addEventListener('load', function() {
    App.initAfterLoad();
});
//kz add these
function toEnglishDigits(str) {
    const persianNumbers = ["۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", "۰"]
    const arabicNumbers = ["١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩", "٠"]
    const englishNumbers = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"]

    return str.split("").map(c => englishNumbers[persianNumbers.indexOf(c)] ||
        englishNumbers[arabicNumbers.indexOf(c)] || c).join("")
}
function nameValidation() {
    var name=document.getElementById('title').value;
    if(name.length<3){
        document.getElementById('nameValid').style.display='block';
        document.getElementById('nameValid').style.padding='.3125rem .375rem';
        document.getElementById('nameValid').innerText='عنوان نباید کمتر از 3 کاراکتر داشته باشد.';
    }else{
        document.getElementById('nameValid').style.padding=0;
        document.getElementById('nameValid').innerText='';
    }
}
function timeValidation() {
    var time=document.getElementById('time').value;
    if(time==""){
        document.getElementById('timeValid').style.display='block';
        document.getElementById('timeValid').style.padding='.3125rem .375rem';
        document.getElementById('timeValid').innerText='فیلد مدت زمان الزامی است.';
    }else{
        document.getElementById('timeValid').style.padding=0;
        document.getElementById('timeValid').innerText='';
    }
}
function dateValidation() {
    var date=document.getElementById('date').value;
    if(date==""){
        document.getElementById('dateValid').style.display='block';
        document.getElementById('dateValid').style.padding='.3125rem .375rem';
        document.getElementById('dateValid').innerText='فیلد سال انتشار الزامی است.';
    }else{
        document.getElementById('dateValid').style.padding=0;
        document.getElementById('dateValid').innerText='';
    }
}
function abstractValidation() {
    var abstract=document.getElementById('abstract').value;
    if(abstract.length<10){
        document.getElementById('abstractValid').style.display='block';
        document.getElementById('abstractValid').style.padding='.3125rem .375rem';
        document.getElementById('abstractValid').innerText='خلاصه فیلم نباید کمتر از 10 کاراکتر داشته باشد.';
    }else{
        document.getElementById('abstractValid').style.padding=0;
        document.getElementById('abstractValid').innerText='';
    }
}
function descValidation() {
    var description=document.getElementById('description').value;
    if(description.length<10){
        document.getElementById('descValid').style.display='block';
        document.getElementById('descValid').style.padding='.3125rem .375rem';
        document.getElementById('descValid').innerText='توضیحات نباید کمتر از 10 کاراکتر داشته باشد.';
    }else{
        document.getElementById('descValid').style.padding=0;
        document.getElementById('descValid').innerText='';
    }
}
function reloadPic(input) {
    var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        document.getElementById('filePlaceholder').innerText='فایل جدید انتخاب شده است';
        document.getElementById('newImage').value=2;
        document.getElementById('showPrevious').style.display='block';
    } else {
        $('#img').attr('src', '/assets/no_preview.png');
    }
}
function showPrevious() {
    var previousSrc=document.getElementById('previousImg').value;
    $('#img').attr('src', previousSrc);
    document.getElementById('filePlaceholder').innerText='فایل عکسی انتخاب نشده است';
    document.getElementById('newImage').value=1;
    document.getElementById('showPrevious').style.display='none';
}
function genreValidation() {
    var genre=document.getElementById('selectedGenres').value;
    if(genre==""){
        document.getElementById('genreValid').style.display='block';
        document.getElementById('genreValid').style.padding='.3125rem .375rem';
        document.getElementById('genreValid').innerText='ژانر را انتخاب کنید.';
    }else{
        document.getElementById('genreValid').style.padding=0;
        document.getElementById('genreValid').innerText='';
    }
}
function categoryValidation() {
    var category=document.getElementById('selectedCategory').value;
    if(category==""){
        document.getElementById('categoryValid').style.display='block';
        document.getElementById('categoryValid').style.padding='.3125rem .375rem';
        document.getElementById('categoryValid').innerText='دسته بندی را انتخاب کنید.';
    }else{
        document.getElementById('categoryValid').style.padding=0;
        document.getElementById('categoryValid').innerText='';
    }
}
function directorValidation() {
    var director=document.getElementById('selectedDirectors').value;
    if(director==""){
        document.getElementById('directorValid').style.display='block';
        document.getElementById('directorValid').style.padding='.3125rem .375rem';
        document.getElementById('directorValid').innerText='کارگردان را انتخاب کنید.';
    }else{
        document.getElementById('directorValid').style.padding=0;
        document.getElementById('directorValid').innerText='';
    }
}
function authorValidation() {
    var author=document.getElementById('selectedAuthors').value;
    if(author==""){
        document.getElementById('authorValid').style.display='block';
        document.getElementById('authorValid').style.padding='.3125rem .375rem';
        document.getElementById('authorValid').innerText='نویسنده را انتخاب کنید.';
    }else{
        document.getElementById('authorValid').style.padding=0;
        document.getElementById('authorValid').innerText='';
    }
}
function producerValidation() {
    var producer=document.getElementById('selectedProducers').value;
    if(producer==""){
        document.getElementById('producerValid').style.display='block';
        document.getElementById('producerValid').style.padding='.3125rem .375rem';
        document.getElementById('producerValid').innerText='تهیه کننده را انتخاب کنید.';
    }else{
        document.getElementById('producerValid').style.padding=0;
        document.getElementById('producerValid').innerText='';
    }
}
function actorValidation() {
    var actor=document.getElementById('selectedActors').value;
    if(actor==""){
        document.getElementById('actorValid').style.display='block';
        document.getElementById('actorValid').style.padding='.3125rem .375rem';
        document.getElementById('actorValid').innerText='بازیگران را انتخاب کنید.';
    }else{
        document.getElementById('actorValid').style.padding=0;
        document.getElementById('actorValid').innerText='';
    }
}
function formValidation() {
    var name=document.getElementById('title').value;
    var time=document.getElementById('time').value;
    var date=document.getElementById('date').value;
    var abstract=document.getElementById('abstract').value;
    var description=document.getElementById('description').value;

    var selectedDirectors=document.getElementById('selectedDirectors').value;
    var selectedActors=document.getElementById('selectedActors').value;
    var selectedAuthors=document.getElementById('selectedAuthors').value;
    var selectedProducers=document.getElementById('selectedProducers').value;
    var selectedGenres=document.getElementById('selectedGenres').value;
    var selectedCategories=document.getElementById('selectedCategory').value;

    if(name.length<3){
        document.getElementById('nameValid').style.display='block';
        document.getElementById('nameValid').style.padding='.3125rem .375rem';
        document.getElementById('nameValid').innerText='عنوان نباید کمتر از 3 کاراکتر داشته باشد.';
        event.preventDefault();
    }else if(time==""){
        document.getElementById('timeValid').style.display='block';
        document.getElementById('timeValid').style.padding='.3125rem .375rem';
        document.getElementById('timeValid').innerText='فیلد مدت زمان الزامی است.';
        event.preventDefault();
    }else if(date==""){
        document.getElementById('dateValid').style.display='block';
        document.getElementById('dateValid').style.padding='.3125rem .375rem';
        document.getElementById('dateValid').innerText='فیلد سال انتشار الزامی است.';
        event.preventDefault();
    }else if(selectedDirectors==""){
        document.getElementById('directorValid').style.display='block';
        document.getElementById('directorValid').style.padding='.3125rem .375rem';
        document.getElementById('directorValid').innerText='کارگردان را انتخاب کنید.';
        event.preventDefault();
    }else if(selectedActors==""){
        document.getElementById('actorValid').style.display='block';
        document.getElementById('actorValid').style.padding='.3125rem .375rem';
        document.getElementById('actorValid').innerText='بازیگران را انتخاب کنید.';
        event.preventDefault();
    }else if(selectedAuthors==""){
        document.getElementById('authorValid').style.display='block';
        document.getElementById('authorValid').style.padding='.3125rem .375rem';
        document.getElementById('authorValid').innerText='نویسنده را انتخاب کنید.';
        event.preventDefault();
    }else if(selectedProducers==""){
        document.getElementById('producerValid').style.display='block';
        document.getElementById('producerValid').style.padding='.3125rem .375rem';
        document.getElementById('producerValid').innerText='تهیه کننده را انتخاب کنید.';
        event.preventDefault();
    }else if(selectedGenres==""){
        document.getElementById('genreValid').style.display='block';
        document.getElementById('genreValid').style.padding='.3125rem .375rem';
        document.getElementById('genreValid').innerText='ژانر را انتخاب کنید.';
        event.preventDefault();
    }else if(selectedCategories==""){
        document.getElementById('categoryValid').style.display='block';
        document.getElementById('categoryValid').style.padding='.3125rem .375rem';
        document.getElementById('categoryValid').innerText='دسته بندی را انتخاب کنید.';
        event.preventDefault();
    }else if(abstract.length<10){
        document.getElementById('abstractValid').style.display='block';
        document.getElementById('abstractValid').style.padding='.3125rem .375rem';
        document.getElementById('abstractValid').innerText='خلاصه فیلم نباید کمتر از 10 کاراکتر داشته باشد.';
        event.preventDefault();
    }else if(description.length<10){
        document.getElementById('descValid').style.display='block';
        document.getElementById('descValid').style.padding='.3125rem .375rem';
        document.getElementById('descValid').innerText='توضیحات نباید کمتر از 10 کاراکتر داشته باشد.';
        event.preventDefault();
    }
}
