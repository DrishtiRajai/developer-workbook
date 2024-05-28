const slider = document.querySelector('input[type="range"]');
const toggle = document.querySelector('input[type="checkbox"');
const priceEl = document.querySelector(".card__normal-price");
let priceTotal;

const viewsPrices = [
    {
        pageViews: 10,
        price: 8
    },
    {
        pageViews: 50, 
        price: 12
    },
    {
        pageViews: 100, 
        price: 16
    },
    {
        pageViews: 500, 
        price: 24
    },
    {
        pageViews: 1000, 
        price: 36
    },
];


slider.addEventListener("input", updateViewsPrice);
toggle.addEventListener("change", applyDiscount);
updateViewsPrice();

function updateViewsPrice(){
    const pageViewsEl = document.querySelector(".card__page-views");
    const { pageViews, price } = viewsPrices[slider.value];

    pageViewsEl.textContent = pageViews < 1000 ? `${pageViews}K PAGEVIEWS` : `${pageViews / 1000}M PAGEVIEWS`;

    priceEl.textContent = `$${price}.00`;
    priceTotal = price;

    slider.className = `slider-fill-${25 * slider.value}`;

    if(toggle.checked)
        applyDiscount();
}

function applyDiscount(){
    const discountPrice = document.querySelector(".card__discount-price");
    discountPrice.textContent = `$${Number(priceTotal) * 0.75}.00`;

    if(toggle.checked){
        priceEl.classList.add("card__price--line-through");
        discountPrice.classList.add("card__discount-price--show");
    }
    else{
        priceEl.classList.remove("card__price--line-through");
        discountPrice.classList.remove("card__discount-price--show");
    }
}


