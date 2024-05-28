# Frontend Mentor - Interactive pricing component solution

This is a solution to the [Interactive pricing component challenge on Frontend Mentor](https://www.frontendmentor.io/challenges/interactive-pricing-component-t0m8PIyY8). Frontend Mentor challenges help you improve your coding skills by building realistic projects. 

## Table of contents

- [Overview](#overview)
  - [The challenge](#the-challenge)
  - [Screenshot](#screenshot)
  - [Links](#links)
- [My process](#my-process)
  - [Built with](#built-with)
  - [What I learned](#what-i-learned)
  - [Useful resources](#useful-resources)
- [Author](#author)

## Overview

### The challenge

Users should be able to:

- View the optimal layout for the app depending on their device's screen size
- See hover states for all interactive elements on the page
- Use the slider and toggle to see prices for different page view numbers

### Screenshot

![](./screenshot.png)

### Links

- Live Site URL: [Add live site URL here](https://kriosaber.github.io/interactive-pricing-component-main/)

## My process

### Built with

- Semantic HTML5 markup
- CSS custom properties
- Flexbox
- CSS Grid
- Mobile-first workflow
- JavaScript

### What I learned

I learned a little bit more about styling and customizing forms range/checkbox inputs, like the track and thumb parts of the range input using the -webkit and -moz selectors. I've tested on Chrome, Firefox, Edge and Chrome for Android, so far it looks nice   

```html
<input type="range" name="page-views" min="0" max="4" value="2">
```
```css for the range and checkbox inputs
input[name="page-views"]::-webkit-slider-thumb{
    appearance: none;
    position: relative;
    width: 50px;
    height: 50px;
    border: none;
    border-radius: 50%;
    box-shadow: 0px 10px 20px 2px var(--clr-primary-300);
    background-color: var(--clr-primary-300);
    background-image: url("images/icon-slider.svg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 40px;
}
input[name="page-views"]::-moz-range-thumb{
    appearance: none;
    position: relative;
    width: 50px;
    height: 50px;
    border: none;
    border-radius: 50%;
    box-shadow: 0px 10px 20px 2px var(--clr-primary-300);
    background-color: var(--clr-primary-300);
    background-image: url("images/icon-slider.svg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 40px;
}
```

### Useful resources

- [CSS Tricks](https://css-tricks.com/styling-cross-browser-compatible-range-inputs-css/) - This helped me for getting examples about cross-browser input styling. 

## Author

- Frontend Mentor - [@Kriosaber](https://www.frontendmentor.io/profile/Kriosaber)