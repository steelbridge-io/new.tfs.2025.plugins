/**
 * ScrollerItems class represents individual items in a scroller.
 * The class has properties for the item's image URL, title, subtitle, description, link, and ID.
 * It also provides a method to generate the HTML representation of the item.
 * For verticle scroller.
 */
class ScrollerItems {
    constructor(imageUrl, title, subtitle, description, link, id) {
        this.imageUrl = imageUrl;
        this.title = title;
        this.subtitle = subtitle;
        this.description = description;
        this.link = link;
        this.id = id;
    }

    // Generate HTML for individual item
    getHTML() {

        // If imageUrl is null, do not generate this item
        if(this.imageUrl === null) {
            return '';
        }

        return `
            <div class="mfcp-carousel-item">
                <div class="mfcp-carousel-item-row">
                    <div id="mfcp-item-image-${this.id}" class="mfcp-carousel-item-img-container">
                        <a href="${this.link}" title="${this.title} - ${this.subtitle}"><img src="${this.imageUrl}" alt="${this.title}"></a>
                    </div>
                    <div id="mfcp-item-text-${this.id}" class="mfcp-carousel-item-description-container">
                        <h3>${this.title}</h3>
                        <h4>${this.subtitle}</h4>
                        <p>${this.description}</p>
                        <a href="${this.link}">Read More...</a>
                    </div>
                </div>
            </div>
        `;
    }
}

/**
 * Represents a class for generating HTML for individual items in a horizontal scroller layout.
 *
 * @extends ScrollerItems
 */
class ScrollerItemsHorizontal extends ScrollerItems {
    // Generate HTML for individual item in the horizontal layout
    getHTML() {
        // If imageUrl is null, do not generate this item
        if (this.imageUrl === null) {
            return '';
        }

        return `
            <div class="hs-mfcp-carousel-item">
                <h3 class="widget-title">${this.title}</h3>
                <div class="hs-mfcp-carousel-item-row">
                    <div id="hs-mfcp-item-image-${this.id}" class="hs-mfcp-carousel-item-img-container">
                        <a href="${this.link}" title="${this.title} - ${this.subtitle}"><img src="${this.imageUrl}" alt="${this.title}"></a>
                    </div>
                    <div id="hs-mfcp-item-text-${this.id}" class="hs-mfcp-carousel-item-description-container">
                        <h4 class="widget-title">${this.subtitle}</h4>
                        <p class="text-justify">${this.description}</p>
                        <div class="hs-link-cont">
                        <a href="${this.link}">Read More...</a>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
}

// Generate carousel
function generateScroller(carouselItems, myScroller, maxNumItems = 8) {
    const targetDiv = document.getElementById(myScroller);
    if (!targetDiv) {
        return;
    }
    let scrollerHTML = '';
    for (let i = 0; i < Math.min(maxNumItems, carouselItems.length); i++) {

        scrollerHTML += carouselItems[i].getHTML();
    }
    targetDiv.innerHTML = scrollerHTML;
}

function generateHorizontalSlider(carouselItems, myHorizontalScroller, maxNumItems = 8) {
    const targetDiv = document.getElementById(myHorizontalScroller);
    if (!targetDiv) {
        return;
    }
    let scrollerHTML = '';
    for (let i = 0; i < Math.min(maxNumItems, carouselItems.length); i++) {
        scrollerHTML += carouselItems[i].getHTML();
    }
    targetDiv.innerHTML = scrollerHTML;
}

/**
 * Array of carousel items.
 * The provided block of code is an instantiation of a new object from a class ScrollerItems. It can be referred to as an "Object Instantiation Statement".
 * Here's the breakdown:
 * new ScrollerItems() is a constructor call. This is essentially initializing (creating) a new ScrollerItems object.
 * The code inside parentheses ( ...) is the arguments that you are passing to the constructor. In this case, you are passing four arguments:
 * 1st argument: An expression using a ternary operator to determine the value. This is a conditional expression that assigns the value of localizedObject.image if it exists, otherwise it assigns 'https://via.placeholder.com/150'.
 * 2nd argument: Similar to the first, another expression using a ternary operator. This assigns the value of localizedObject.title if it exists, otherwise an empty string.
 * 3rd argument: A string 'Description 1'.
 * 4th argument: A string '#'.
 * So, as a whole, the given block of code statements is more specifically a constructor call or an object instantiation statement, where a new ScrollerItems object is being created with distinct property values.
 * @type {ScrollerItems[]}
 */
let carouselItems = [

    /**
     * Footer Verticle Carousel
     */

    new ScrollerItems(
        typeof localizedObject !== 'undefined' && localizedObject.image1 ? localizedObject.image1 : null,
        typeof localizedObject !== 'undefined' && localizedObject.title1 ? localizedObject.title1 : '',
        typeof localizedObject !== 'undefined' && localizedObject.subtitle1 ? localizedObject.subtitle1 : '',
        typeof localizedObject !== 'undefined' && localizedObject.description1 ? localizedObject.description1 : '',
        typeof localizedObject !== 'undefined' && localizedObject.link1 ? localizedObject.link1 : '',
        16789

    ),

    new ScrollerItems(
        typeof localizedObject !== 'undefined' && localizedObject.image2 ? localizedObject.image2 : null,
        typeof localizedObject !== 'undefined' && localizedObject.title2 ? localizedObject.title2 : '',
        typeof localizedObject !== 'undefined' && localizedObject.subtitle2 ? localizedObject.subtitle2 : '',
        typeof localizedObject !== 'undefined' && localizedObject.description2 ? localizedObject.description2 : '',
        typeof localizedObject !== 'undefined' && localizedObject.link2 ? localizedObject.link2 : '',
        26789
    ),

    new ScrollerItems(
        typeof localizedObject !== 'undefined' && localizedObject.image3 ? localizedObject.image3 : null,
        typeof localizedObject !== 'undefined' && localizedObject.title3 ? localizedObject.title3 : '',
        typeof localizedObject !== 'undefined' && localizedObject.subtitle3 ? localizedObject.subtitle3 : '',
        typeof localizedObject !== 'undefined' && localizedObject.description3 ? localizedObject.description3 : '',
        typeof localizedObject !== 'undefined' && localizedObject.link3 ? localizedObject.link3 : '',
        36789
    ),

    new ScrollerItems(
        typeof localizedObject !== 'undefined' && localizedObject.image4 ? localizedObject.image4 : null,
        typeof localizedObject !== 'undefined' && localizedObject.title4 ? localizedObject.title4 : '',
        typeof localizedObject !== 'undefined' && localizedObject.subtitle4 ? localizedObject.subtitle4 : '',
        typeof localizedObject !== 'undefined' && localizedObject.description4 ? localizedObject.description4 : '',
        typeof localizedObject !== 'undefined' && localizedObject.link4 ? localizedObject.link4 : '',
        46789
    ),

    new ScrollerItems(
        typeof localizedObject !== 'undefined' && localizedObject.image5 ? localizedObject.image5 : null,
        typeof localizedObject !== 'undefined' && localizedObject.title5 ? localizedObject.title5 : '',
        typeof localizedObject !== 'undefined' && localizedObject.subtitle5 ? localizedObject.subtitle5 : '',
        typeof localizedObject !== 'undefined' && localizedObject.description5 ? localizedObject.description5 : '',
        typeof localizedObject !== 'undefined' && localizedObject.link5 ? localizedObject.link5 : '',
        56789
    ),

    new ScrollerItems(
        typeof localizedObject !== 'undefined' && localizedObject.image6 ? localizedObject.image6 : null,
        typeof localizedObject !== 'undefined' && localizedObject.title6 ? localizedObject.title6 : '',
        typeof localizedObject !== 'undefined' && localizedObject.subtitle6 ? localizedObject.subtitle6 : '',
        typeof localizedObject !== 'undefined' && localizedObject.description6 ? localizedObject.description6 : '',
        typeof localizedObject !== 'undefined' && localizedObject.link6 ? localizedObject.link6 : '',
        66789
    ),

    new ScrollerItems(
        typeof localizedObject !== 'undefined' && localizedObject.image7 ? localizedObject.image7 : null,
        typeof localizedObject !== 'undefined' && localizedObject.title7 ? localizedObject.title7 : '',
        typeof localizedObject !== 'undefined' && localizedObject.subtitle7 ? localizedObject.subtitle7 : '',
        typeof localizedObject !== 'undefined' && localizedObject.description7 ? localizedObject.description7 : '',
        typeof localizedObject !== 'undefined' && localizedObject.link7 ? localizedObject.link7 : '',
        76789
    ),

    new ScrollerItems(
        typeof localizedObject !== 'undefined' && localizedObject.image8 ? localizedObject.image8 : null,
        typeof localizedObject !== 'undefined' && localizedObject.title8 ? localizedObject.title8 : '',
        typeof localizedObject !== 'undefined' && localizedObject.subtitle8 ? localizedObject.subtitle8 : '',
        typeof localizedObject !== 'undefined' && localizedObject.description8 ? localizedObject.description8 : '',
        typeof localizedObject !== 'undefined' && localizedObject.link8 ? localizedObject.link8 : '',
        86789
    ),
];

generateScroller(carouselItems, 'myScroller', 8);

/**
 * Represents a horizontal carousel with scroller items.
 * @typedef {Object} HorizontalCarouselItem
 * @property {string|null} image - The image url of the carousel item.
 * @property {string} title - The title of the carousel item.
 * @property {string} subtitle - The subtitle of the carousel item.
 * @property {string} description - The description of the carousel item.
 * @property {string} link - The link of the carousel item.
 * @property {number} id - The id of the carousel item.
 */

let horizontalCarouselItems = [

    /**
     * Horizontal Carousel
     */

    new ScrollerItemsHorizontal(
        typeof localizedObject !== 'undefined' && localizedObject.hs_image1 ? localizedObject.hs_image1 : null,
        typeof localizedObject !== 'undefined' && localizedObject.hs_title1 ? localizedObject.hs_title1 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_subtitle1 ? localizedObject.hs_subtitle1 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_description1 ? localizedObject.hs_description1 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_link1 ? localizedObject.hs_link1 : '',
        116789

    ),

    new ScrollerItemsHorizontal(
        typeof localizedObject !== 'undefined' && localizedObject.hs_image2 ? localizedObject.hs_image2 : null,
        typeof localizedObject !== 'undefined' && localizedObject.hs_title2 ? localizedObject.hs_title2 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_subtitle2 ? localizedObject.hs_subtitle2 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_description2 ? localizedObject.hs_description2 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_link2 ? localizedObject.hs_link2 : '',
        216789

    ),

    new ScrollerItemsHorizontal(
        typeof localizedObject !== 'undefined' && localizedObject.hs_image3 ? localizedObject.hs_image3 : null,
        typeof localizedObject !== 'undefined' && localizedObject.hs_title3 ? localizedObject.hs_title3 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_subtitle3 ? localizedObject.hs_subtitle3 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_description3 ? localizedObject.hs_description3 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_link3 ? localizedObject.hs_link3 : '',
        316789

    ),

    new ScrollerItemsHorizontal(
        typeof localizedObject !== 'undefined' && localizedObject.hs_image4 ? localizedObject.hs_image4 : null,
        typeof localizedObject !== 'undefined' && localizedObject.hs_title4 ? localizedObject.hs_title4 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_subtitle4 ? localizedObject.hs_subtitle4 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_description4 ? localizedObject.hs_description4 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_link4 ? localizedObject.hs_link4 : '',
        416789

    ),

    new ScrollerItemsHorizontal(
        typeof localizedObject !== 'undefined' && localizedObject.hs_image5 ? localizedObject.hs_image5 : null,
        typeof localizedObject !== 'undefined' && localizedObject.hs_title5 ? localizedObject.hs_title5 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_subtitle5 ? localizedObject.hs_subtitle5 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_description5 ? localizedObject.hs_description5 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_link5 ? localizedObject.hs_link5 : '',
        516789

    ),

    new ScrollerItemsHorizontal(
        typeof localizedObject !== 'undefined' && localizedObject.hs_image6 ? localizedObject.hs_image6 : null,
        typeof localizedObject !== 'undefined' && localizedObject.hs_title6 ? localizedObject.hs_title6 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_subtitle6 ? localizedObject.hs_subtitle6 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_description6 ? localizedObject.hs_description6 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_link6 ? localizedObject.hs_link6 : '',
        616789

    ),

    new ScrollerItemsHorizontal(
        typeof localizedObject !== 'undefined' && localizedObject.hs_image7 ? localizedObject.hs_image7 : null,
        typeof localizedObject !== 'undefined' && localizedObject.hs_title7 ? localizedObject.hs_title7 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_subtitle7 ? localizedObject.hs_subtitle7 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_description7 ? localizedObject.hs_description7 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_link7 ? localizedObject.hs_link7 : '',
        716789

    ),

    new ScrollerItemsHorizontal(
        typeof localizedObject !== 'undefined' && localizedObject.hs_image8 ? localizedObject.hs_image8 : null,
        typeof localizedObject !== 'undefined' && localizedObject.hs_title8 ? localizedObject.hs_title8 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_subtitle8 ? localizedObject.hs_subtitle8 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_description8 ? localizedObject.hs_description8 : '',
        typeof localizedObject !== 'undefined' && localizedObject.hs_link8 ? localizedObject.hs_link8 : '',
        816789

    ),
];

generateHorizontalSlider(horizontalCarouselItems, 'myHorizontalScroller', 8);

jQuery(document).ready(function ($) {
    $('#myScroller').slick({
        infinite: true,
        vertical: true,
        verticalSwiping: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev'><i class=\"mfpc-publication fa fa-chevron-up\" aria-hidden=\"true\"></i></button>",
        nextArrow: "<button type='button' class='slick-next'><i class=\"mfpc-publication fa fa-chevron-down\" aria-hidden=\"true\"></i></button>",
    });

    $('#myHorizontalScroller').slick({
        infinite: true,
        vertical: false,
        verticalSwiping: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ],
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev'><i class=\"hs-mfpc-publication fa fa-4x fa-chevron-left\" aria-hidden=\"true\"></i></button>",
        nextArrow: "<button type='button' class='slick-next'><i class=\"hs-mfpc-publication fa fa-4x fa-chevron-right\" aria-hidden=\"true\"></i></button>",
    });
});
