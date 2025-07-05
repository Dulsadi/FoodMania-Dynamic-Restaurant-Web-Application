
// Make accordions function properly - I
$(document).ready(function () {
    $('.accordion-btn').on('click', function () {
        var $content = $(this).next('.accordion-content');
        
        if ($(this).hasClass('active')) {
            $content.slideUp();
            $(this).removeClass('active');
        } else {
            $('.accordion-content').slideUp();
            $('.accordion-btn').removeClass('active');
            $content.slideDown();
            $(this).addClass('active');
        }
    });
});



// Make accordions function properly - II
$(document).ready(function () {
    // Toggle details when clicking the item for Bookings and Emails sections
    $('.booking-item, .email-item').on('click', function () {
        var $details = $(this).find('.booking-details, .email-details');
        var $otherDetails = $('.booking-details, .email-details').not($details);
        
        if ($(this).hasClass('open')) {
            $details.slideUp();
            $(this).removeClass('open');
        } else {
            $otherDetails.slideUp();
            $('.booking-item, .email-item').removeClass('open');
            $details.slideDown();
            $(this).addClass('open');
        }
    });
});



// Sidebar controls
function handleAnchorLinks() {
    const sidebarLinks = $('#sidebar a[href^="#"]');
    const offset = -40; // Adjusting the position

    // Function to toggle active state on sidebar links based on scroll position
    function toggleActiveState() {
        const sections = $('.anchor');

        $(window).on('scroll', () => {
            let current = '';

            sections.each(function() {
                const sectionTop = $(this).offset().top;
                const sectionHeight = $(this).outerHeight();
                if ($(window).scrollTop() >= sectionTop - sectionHeight / 3) {
                    current = $(this).attr('name');
                }
            });

            sidebarLinks.removeClass('active').filter(`[href="#${current}"]`).addClass('active');
        });
    }

    // Function to handle smooth scrolling to anchor links
    function scrollToAnchor(anchor) {
        const target = $(`[name=${anchor}]`);
        if (target.length) {
            const targetPosition = target.offset().top - offset;
            $('html, body').scrollTop(targetPosition);
        }
    }

    // Invoke the toggleActiveState function
    toggleActiveState();

    // Smooth scroll on anchor link click
    sidebarLinks.on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        const anchor = href.substring(1);
        scrollToAnchor(anchor);
    });
}
// Invoke the function when the DOM is fully loaded
$(document).ready(function() {
    handleAnchorLinks();
});



// search and scroll 
$(document).ready(function () {
    // search on Enter key press
    $('#searchInput').keypress(function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            performSearch();
        }
    });

    // Defining the search
    function performSearch() {
        var searchText = $('#searchInput').val();
        searchText = searchText ? searchText.trim().toLowerCase() : '';
        
        if (searchText !== '') {
            var $matchingElements = $('#main-content').find('*').filter(function () {
                return $(this).text().toLowerCase().indexOf(searchText) !== -1;
            });

            if ($matchingElements.length > 0) {
                $('html, body').animate({
                    scrollTop: $matchingElements.first().offset().top + -100
                }, 1000);
            } else {
                alert("Couldn't find a match.");
            }
        } else {
            alert('Sorry, the search field is empty!');
        }
    }

    $('.search-btn').on('click', function(e) {
        e.preventDefault();
        performSearch(); // Calling to search
    });
});



// Handle image uploads
$(document).ready(function() {
    $('[id^="uploadImage"]').on('click', function() {
        // Get the section ID
        var sectionId = $(this).attr('id').replace('uploadImage', '');
        // Trigger the file input for this section
        $('#fileInput' + sectionId).trigger('click'); 
    });

    $('[id^="fileInput"]').on('change', function(event) {
        // Get table name
        var tableName = $(this).closest('[class*=grid-responsive]').attr('class').split(' ').pop();
        // Get the section ID
        var sectionId = $(this).attr('id').replace('fileInput', '');
        // Get item ID associated with the button
        var itemId = $(this).data('item-id');
        // Pass the variables
        var fieldName = $(this).data('field-name');
        // Pass the variables
        uploadImage(event, sectionId, tableName, fieldName, itemId);
    });
});
function uploadImage(event, sectionId, tableName, fieldName, itemId) {
    var file = event.target.files[0];

    // if Id is undefined, make it empty
    if (typeof itemId === 'undefined') {
        itemId = '';
    }
    // if fieldName is undefined, make it empty
    if (typeof fieldName === 'undefined') {
        fieldName = '';
    }

    // Creating formData object
    var formData = new FormData();
    formData.append('image', file);
    formData.append('itemId', itemId);
    formData.append('fieldName', fieldName);
    formData.append('tableName', tableName);

    // Send an AJAX request to update the database
    $.ajax({
        url: 'upload.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // Log the response from upload.php
            console.log(response);

            // Update the image src with the response for this section
            $('#imageUrlInput' + sectionId + ' img').attr('src', response);

            // if new-gallery-item, add it
            if (itemId === 'new-gallery-item') {
                // trigger the "add_item" function
                add_item(event);
            }
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
}





// DELETE button click actions for all sections
$('.deleteBtn').on('click', function() {
    var itemId = $(this).data('item-id');

    // Find the closest parent element with a specific class pattern
    var closestRow = $(this).closest('[class*=grid-responsive]').attr('class'); // Get classes of the closest row element
    var classNames = closestRow.split(' '); // Split the classes into an array
    var tableName = classNames[2]; // Find the last class name

    // Send an AJAX request to delete the item
    $.ajax({
        url: 'delete_item.php',
        method: 'POST',
        data: {
            item_id: itemId,
            table_name: tableName
        },
        success: function(response) {
            // Refreshes the page after delete
            location.reload();
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
});



// Crop image urls
function getCroppedUrl(imageUrl) {
    var startIndex = imageUrl.indexOf('/img/');
    if (startIndex !== -1) {
        var croppedUrl = imageUrl.substring(startIndex);
        return croppedUrl;
    }
    // Return something indicating that the pattern wasn't found.
    return "";
}



// ADD button click actions for all sections
$('body').on('click', '#addItem', add_item);
// add_item function 
// (we seperete this function from event handler. Because we have to call this function also on new-gallery-item uploads)
function add_item(event) {
    // Find $(this) / clickedElement
    var clickedElement = $(event.currentTarget);
    // Get table name
    var tableName = clickedElement.closest('[class*=grid-responsive]').attr('class').split(' ').pop();
    // Collect data based on the section
    var formData = {};
    // Get the closest element
    var closestRow = clickedElement.closest('[class*=grid-responsive]');

    // Logic to handle different sections
    if (tableName === 'menu') {
        // Collect details
        var name = closestRow.find('input[name="name"]:last').val();
        var type = closestRow.find('input[name="type"]:last').val();
        var ingredients = closestRow.find('textarea[name="ingredients"]:last').val();
        var price = closestRow.find('input[name="price"]:last').val();
        var image = closestRow.find('[id^="imageUrlInput"] img').attr('src');

        // Short the url of the image
        image = getCroppedUrl(image);

        // Creating formData object
        formData = {
            name: name,
            type: type,
            ingredients: ingredients,
            price: price,
            image: image,
            tableName: tableName
        };

    } else if (tableName === 'chefs') {
        var name = closestRow.find('input[name="name"]:last').val();
        var occupation = closestRow.find('input[name="occupation"]:last').val();
        var image = closestRow.find('[id^="imageUrlInput"] img').attr('src');
        var twitter = closestRow.find('input[name="twitter"]:last').val();
        var facebook = closestRow.find('input[name="facebook"]:last').val();
        var instagram = closestRow.find('input[name="instagram"]:last').val();
        var linkedin = closestRow.find('input[name="linkedin"]:last').val();
        
        // Short the url of the image
        image = getCroppedUrl(image);

        // Creating formData object
        formData = {
            name: name,
            occupation: occupation,
            image: image,
            twitter: twitter,
            facebook: facebook,
            instagram: instagram,
            linkedin: linkedin,
            tableName: tableName
        };

    } else if (tableName === 'whyus') {
        // Handle WHYUS section data
        var title = closestRow.find('input[name="title"]:last').val();
        var description = closestRow.find('textarea[name="description"]:last').val();

        // Creating formData object
        formData = {
            title: title,
            description: description,
            tableName: tableName
        };

    } else if (tableName === 'specials') {
        // Collect details for specials section
        var name = closestRow.find('input[name="name"]:last').val();
        var title = closestRow.find('input[name="title"]:last').val();
        var hint = closestRow.find('textarea[name="hint"]:last').val();
        var description = closestRow.find('textarea[name="description"]:last').val();
        var image = closestRow.find('[id^="imageUrlInput"] img').attr('src');

        // Short the url of the image
        image = getCroppedUrl(image);

        // Creating formData object
        formData = {
            name: name,
            title: title,
            hint: hint,
            description: description,
            image: image,
            tableName: tableName
        };

    } else if (tableName === 'events') {
        // Collect details for events
        var name = closestRow.find('input[name="name"]:last').val();
        var price = closestRow.find('input[name="price"]:last').val();
        var topDesc = closestRow.find('textarea[name="top_desc"]:last').val();
        var points = closestRow.find('textarea[name="points"]:last').val();
        var bottomDesc = closestRow.find('textarea[name="bottom_desc"]:last').val();
        var image = closestRow.find('[id^="imageUrlInput"]:last img').attr('src');

        // Short the url of the image
        image = getCroppedUrl(image);

        // Creating formData object
        formData = {
            name: name,
            price: price,
            topDesc: topDesc,
            points: points,
            bottomDesc: bottomDesc,
            image: image,
            tableName: tableName
        };
    
    } else if (tableName === 'testimonials') {
        // Collect details for Testimonials section
        var name = closestRow.find('input[name="name"]:last').val();
        var occupation = closestRow.find('input[name="occupation"]:last').val();
        var quote = closestRow.find('textarea[name="quote"]:last').val();
        var image = closestRow.find('[id^="imageUrlInput"] img').attr('src');

        // Short the url of the image
        image = getCroppedUrl(image);

        // Creating formData object
        formData = {
            name: name,
            occupation: occupation,
            quote: quote,
            image: image,
            tableName: tableName
        };

    } else if (tableName === 'gallery') {
        // Collect details for gallery section
        var image = closestRow.find('[id^="imageUrlInput"]:last img').attr('src');

        alert(image);

        // Short the url of the image
        image = getCroppedUrl(image);

        // Creating formData object
        formData = {
            image: image,
            tableName: tableName
        };
    
    }

    // Send an AJAX request to add a new item
    $.ajax({
        url: 'add_item.php',
        method: 'POST',
        data: formData,
        success: function(response) {
            // Refreshes the page after adding
            location.reload(); 
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
};



// UPDATE button click actions for all sections
$('body').on('click', '.updateBtn', function() {
    // Get table name
    var tableName = $(this).closest('[class*=grid-responsive]').attr('class').split(' ').pop();
    // Get item ID associated with the button
    var itemId = $(this).data('item-id');
    // Collect data based on the section
    var formData = {};
    // Get the closest element
    var closestRow = $(this).closest('tr');

    if (tableName === 'menu') {

        // Get image url
        var imageUrl = closestRow.find('td.row-image img').attr('src');
        // Short the url of the image
        image = getCroppedUrl(imageUrl);

        formData = {
            item_id: itemId,
            name: closestRow.find('input[name="name"]').val(),
            type: closestRow.find('select[name="type"]').val(),
            ingredients: closestRow.find('textarea[name="ingredients"]').val(),
            price: closestRow.find('input[name="price"]').val(),
            image: image,
            tableName: tableName
        };

    } else if (tableName === 'chefs') {

        // Update the closest element
        var closestRow = $(this).closest('.chef');
        // Get image url
        var imageUrl = closestRow.find('.chef-details .chef-image img').attr('src');
        // Short the url of the image
        image = getCroppedUrl(imageUrl);

        formData = {
            item_id: itemId,
            name: closestRow.find('input[name="name"]').val(),
            occupation: closestRow.find('input[name="occupation"]').val(),
            image: image,
            twitter: closestRow.find('input[name="twitter"]').val(),
            facebook: closestRow.find('input[name="facebook"]').val(),
            instagram: closestRow.find('input[name="instagram"]').val(),
            linkedin: closestRow.find('input[name="linkedin"]').val(),
            tableName: tableName
        };

    } else if (tableName === 'whyus') {

        formData = {
            item_id: itemId,
            title: closestRow.find('input[name="title"]').val(),
            description: closestRow.find('textarea[name="description"]').val(),
            tableName: tableName
        };

    } else if (tableName === 'specials') {

        // Get image url
        var imageUrl = closestRow.find('td.row-image img').attr('src');
        // Short the url of the image
        image = getCroppedUrl(imageUrl);

        formData = {
            item_id: itemId,
            name: closestRow.find('input[name="name"]').val(),
            title: closestRow.find('input[name="title"]').val(),
            hint: closestRow.find('textarea[name="hint"]').val(),
            description: closestRow.find('textarea[name="description"]').val(),
            image: image,
            tableName: tableName
        };

    } else if (tableName === 'events') {

        // Update the closest element
        var closestRow = $(this).closest('.event-form');
        // Get image url
        var imageUrl = closestRow.find('.gallery-card img').attr('src');
        // Short the url of the image
        image = getCroppedUrl(imageUrl);

        formData = {
            item_id: itemId,
            name: closestRow.find('input[name="name"]').val(),
            price: closestRow.find('input[name="price"]').val(),
            topDesc: closestRow.find('textarea[name="top_desc"]').val(),
            points: closestRow.find('textarea[name="points"]').val(),
            bottomDesc: closestRow.find('textarea[name="bottom_desc"]').val(),
            image: image,
            tableName: tableName
        };

    } else if (tableName === 'testimonials') {

        // Update the closest element
        var closestRow = $(this).closest('.testimonial');
        // Get image url
        var imageUrl = closestRow.find('.testimonial-image img').attr('src');
        // Short the url of the image
        image = getCroppedUrl(imageUrl);

        formData = {
            item_id: itemId,
            name: closestRow.find('input[name="name"]').val(),
            occupation: closestRow.find('input[name="occupation"]').val(),
            quote: closestRow.find('textarea[name="quote"]').val(),
            image: image,
            tableName: tableName
        };

    } else if (tableName === 'home') {

        // Update the closest element
        var closestRow = $(this).closest('.home');

        formData = {
            item_id: itemId,
            heroVideo: closestRow.find('input[name="heroVideo"]').val(),
            heroDesc: closestRow.find('textarea[name="heroDesc"]').val(),
            aboutTopDesc: closestRow.find('textarea[name="aboutTopDesc"]').val(),
            aboutPoints: closestRow.find('textarea[name="aboutPoints"]').val(),
            aboutBottomDesc: closestRow.find('textarea[name="aboutBottomDesc"]').val(),
            tableName: tableName
        };

    } else if (tableName === 'contact') {

        // Update the closest element
        var closestRow = $(this).closest('.contact');

        formData = {
            item_id: itemId,

            contactAddress: closestRow.find('textarea[name="contactAddress"]').val(),
            contactEmail: closestRow.find('input[name="contactEmail"]').val(),
            contactPhone: closestRow.find('input[name="contactPhone"]').val(),
            contactMapLocation: closestRow.find('input[name="contactMapLocation"]').val(),
            contactOpenHours: closestRow.find('textarea[name="contactOpenHours"]').val(),

            contactTwitter: closestRow.find('input[name="contactTwitter"]').val(),
            contactFacebook: closestRow.find('input[name="contactFacebook"]').val(),
            contactInstagram: closestRow.find('input[name="contactInstagram"]').val(),
            contactTiktok: closestRow.find('input[name="contactTiktok"]').val(),
            contactLinkedIn: closestRow.find('input[name="contactLinkedIn"]').val(),

            tableName: tableName
        };

    }



    // Send an AJAX request to update the item
    $.ajax({
        url: 'update_item.php',
        method: 'POST',
        data: formData,
        success: function(response) {
            // Handle success or refresh the page
            location.reload(); // Refreshes the page after update
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
});



// Remove hosting company stylings
$(document).ready(function() {
    $('div[style*="position: fixed"][style*="bottom: 0"][style*="right: 1%"]').remove();
});



// For LOGIN-REGISTRATION page

// Function to switch between tabs
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Set default tab on page load
document.addEventListener("DOMContentLoaded", function() {
    var element = document.getElementById("defaultOpen");
    if(element !== null) {
        element.click();
    }
});

// Hint popup 
$(document).ready(function() {
    $('.icon').click(function() {
        $('.popup').fadeIn();
    });

    $('.close').click(function() {
        $('.popup').fadeOut();
    });
});

// User image upload in registration
$(document).ready(function() {
    $('#registerForm').submit(function(event) {
        event.preventDefault();

        // Get the image src attribute
        const imageUrl = $('#uploadImage001').attr('src');

        // Create a new hidden input element
        const imageInput = $('<input>').attr({
            type: 'hidden',
            name: 'image',
            value: imageUrl
        });

        // Append the hidden input to the form
        $('#registerForm').append(imageInput);

        // Manually trigger form submission without entering the submit event
        this.submit();
    });
});