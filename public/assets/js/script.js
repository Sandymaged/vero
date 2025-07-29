function getRequest(route, id, type) {
    $.get({
        url: route,
        dataType: 'json',
        success: function (data) {
            if (type == 'select') {
                $('#' + id).empty().append(data.select_tag);
            }
        },
    });
}

function isNumber(evt) { //alert(evt);
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

var notifyAlert = function (text, confirmText, icon = 'success', callback = Function(),
                            confirmClass = 'btn fw-bold btn-primary', cancelClass = 'btn fw-bold btn-active-light-primary') {
    Swal.fire({
        text: text,
        icon: icon,
        showCancelButton: !0,
        buttonsStyling: !1,
        cancelButtonText: no_cancel,
        confirmButtonText: confirmText,
        customClass: {
            confirmButton: confirmClass,
            cancelButton: cancelClass
        }
    })
        .then(callback());
}

document.addEventListener('DOMContentLoaded', function() {
    // Get all accordion menu items
    const accordionItems = document.querySelectorAll('.menu-item.menu-accordion');
    
    // Add click event to each accordion item
    accordionItems.forEach(item => {
        const menuLink = item.querySelector('.menu-link');
        const menuSub = item.querySelector('.menu-sub');
        
        if (menuLink && menuSub) {
            menuLink.addEventListener('click', function(e) {
                // Prevent default if it's a link with href="#"
                // if (this.getAttribute('href') === 'javascript:' || 
                //     this.getAttribute('href') === '#') {
                //     e.preventDefault();
                // }
                
                // Toggle the 'show' class on the submenu
                menuSub.classList.toggle('show');
                
                // Toggle arrow icon rotation
                const arrow = this.querySelector('.menu-arrow');
                if (arrow) {
                    arrow.classList.toggle('rotate-180');
                }
                
                // For Metronic theme specifically, you might need:
                // item.classList.toggle('hover');
                // item.classList.toggle('show');
            });
        }
    });
});