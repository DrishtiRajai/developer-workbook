/*
* JS For Slider 
*/

// JS For Category Slider section on home page 
jQuery(".category-row").slick(
  {  
    dots: true,     
    speed: 500,      
    arrows: false,      
    slidesToShow: 5,      
    slidesToScroll: 3, 
    dragToSlide: true, 
    pauseOnHover: true,  
    autoplay: true,      
    autoplaySpeed: 3000,      
    nextArrow: '<i class="fa fa-arrow-right"></i>',      
    prevArrow: '<i class="fa fa-arrow-left"></i>',      
    responsive: [{          
      breakpoint: 979,
      settings: {              
      slidesToShow: 4,              
      slidesToScroll: 2,              
      infinite: true          
      }      
    },
    {          
    breakpoint: 769,          
    settings: {              
    slidesToShow: 3,              
    slidesToScroll: 1,              
        
    }
  },
  {          
    breakpoint: 480,
    settings: {              
    slidesToShow: 1,              
    slidesToScroll: 1,              
            
    }      
  }]
});

// JS For Top 10 rated books slider on home page
jQuery(".top-rated-book-main").slick(
  {  
    dots: false,      
    speed: 500,      
    arrows: true,      
    slidesToShow: 6,      
    slidesToScroll: 3,      
    autoplay: true,      
    autoplaySpeed: 2000,      
    nextArrow: '<i class="fa fa-arrow-right"></i>',      
    prevArrow: '<i class="fa fa-arrow-left"></i>',      
    responsive: [{          
      breakpoint: 1201,
      settings: {              
      slidesToShow: 4,              
      slidesToScroll: 2,              
      infinite: true          
      }      
    },
    {          
    breakpoint: 769,          
    settings: {              
    slidesToShow: 3,              
    slidesToScroll: 1,              
    infinite: true     
    }
  },
  {          
    breakpoint: 481,
    settings: {              
    slidesToShow: 1,              
    slidesToScroll: 1,              
    infinite: true        
    }      
  }]
});

// JS For featured book slider on home page 

jQuery(".featured-book-main").slick(
  {  
    dots: false,     
    speed: 500,      
    arrows: true,      
    slidesToShow: 2,      
    slidesToScroll: 1, 
    dragToSlide: true, 
    pauseOnHover: true,  
    autoplay: true,      
    autoplaySpeed: 3000,      
    nextArrow: '<i class="fa fa-arrow-right"></i>',      
    prevArrow: '<i class="fa fa-arrow-left"></i>',      
    responsive: [{          
      breakpoint: 1201,
      settings: {              
      slidesToShow: 1,              
      slidesToScroll: 1,                        
      }      
    },
    {          
      breakpoint: 979,
      settings: {              
      slidesToShow: 1,              
      slidesToScroll: 1,                       
      }      
    },
    {          
    breakpoint: 769,          
    settings: {              
    slidesToShow: 1,              
    slidesToScroll: 1,              
        
    }
  },
  {          
    breakpoint: 480,
    settings: {              
    slidesToShow: 1,              
    slidesToScroll: 1,              
            
    }      
  }]
});


// JS For featured book slider on home page 

jQuery(".search-maybe-main").slick(
  {  
    dots: false,     
    speed: 500,      
    arrows: true,      
    slidesToShow: 3,      
    slidesToScroll: 1, 
    dragToSlide: true, 
    pauseOnHover: true,  
    autoplay: true,      
    autoplaySpeed: 2000,      
    nextArrow: '<i class="fa fa-arrow-right"></i>',      
    prevArrow: '<i class="fa fa-arrow-left"></i>',      
    responsive: [{          
      breakpoint: 1201,
      settings: {              
      slidesToShow: 2,              
      slidesToScroll: 1,                      
      }      
    },
    {          
      breakpoint: 1025,
      settings: {              
      slidesToShow: 2,              
      slidesToScroll: 2,                     
      }      
    },
    {          
    breakpoint: 769,          
    settings: {              
    slidesToShow: 1,              
    slidesToScroll: 1,              
        
    }
  },
  {          
    breakpoint: 480,
    settings: {              
    slidesToShow: 1,              
    slidesToScroll: 1,              
            
    }      
  }]
});


// JS For Testimonial slider on home page 

jQuery(".testimonial-main").slick(
  {  
    dots: false,     
    speed: 500,      
    arrows: true,      
    slidesToShow: 3,      
    slidesToScroll: 1, 
    dragToSlide: true, 
    pauseOnHover: true,  
    autoplay: true,      
    autoplaySpeed: 2000,      
    nextArrow: '<i class="fa fa-arrow-right"></i>',      
    prevArrow: '<i class="fa fa-arrow-left"></i>',      
    responsive: [{          
      breakpoint: 1201,
      settings: {              
      slidesToShow: 2,              
      slidesToScroll: 1,                      
      }      
    },
    {          
      breakpoint: 1025,
      settings: {              
      slidesToShow: 1,              
      slidesToScroll: 1,                       
      }      
    },
    {          
    breakpoint: 769,          
    settings: {              
    slidesToShow: 1,              
    slidesToScroll: 1,              
        
    }
  },
  {          
    breakpoint: 480,
    settings: {              
    slidesToShow: 1,              
    slidesToScroll: 1,              
            
    }      
  }]
});