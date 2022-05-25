'use strict';
(function () {

   const slider = document.querySelector('.opinions__list'),
      slides = Array.from(document.querySelectorAll('.opinions--mobile .opinions__item')),
      pages = Array.from(document.querySelectorAll('.opinions-pagination__item'));

   // set up our state
   let isDragging = false,
      startPos = 0,
      currentTranslate = 0,
      prevTranslate = 0,
      animationID,
      currentIndex = 0;

   const showSliderItemByPage = (index) => {
      
      switch (index) {
         case 0:
            currentTranslate = 0;
            break;
         case 1:
            currentTranslate = -window.innerWidth;
            break;
         case 2:
            currentTranslate = -window.innerWidth * 2;
            break;
      }
      setSliderPosition();  
   };

   const showActivePage = (page) => {
      pages.forEach((element) => {
         if (element.classList.contains('active')) {
            element.classList.remove('active');
         }
      });
      page.classList.add('active');
   };

   pages.forEach((page, index) => {
      page.addEventListener('click', function() {
         showActivePage(page);
         showSliderItemByPage(index);
      });
   });

   // add our event listeners
   slides.forEach((slide, index) => {
      const slideLink = slide.querySelector('.opinion-mini__link');
      // disable default image drag
      slideLink.addEventListener('dragstart', (e) => e.preventDefault());

      // touch events
      slide.addEventListener('touchstart', touchStart(index));
      slide.addEventListener('touchend', touchEnd);
      slide.addEventListener('touchmove', touchMove);
      // mouse events
      slide.addEventListener('mousedown', touchStart(index));
      slide.addEventListener('mouseup', touchEnd);
      slide.addEventListener('mouseleave', touchEnd);
      slide.addEventListener('mousemove', touchMove);
      
   });

   // prevent menu popup on long press
   window.oncontextmenu = function (event) {
      event.preventDefault();
      event.stopPropagation();
      return false;
   }

   function getPositionX(event) {
      return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
   };
    
   // use a HOF so we have index in a closure
   function touchStart(index) {
      return function (event) {
         currentIndex = index;
         isDragging = true; 
         startPos = getPositionX(event);
         
         animationID = requestAnimationFrame(animation);
         slider.classList.add('grabbing');
      }
   };
    
   function touchMove(event) {
      if (isDragging) {
        const currentPosition = getPositionX(event);
        currentTranslate = prevTranslate + currentPosition - startPos;
      }
   };
    
   function touchEnd() {
      isDragging = false;
      cancelAnimationFrame(animationID);
      
      const movedBy = currentTranslate - prevTranslate;
    
      // if moved enough negative then snap to next slide if there is one
      if (movedBy < -100 && currentIndex < slides.length - 1) currentIndex += 1;
    
      // if moved enough positive then snap to previous slide if there is one
      if (movedBy > 100 && currentIndex > 0) currentIndex -= 1;
    
      setPositionByIndex();

      showActivePage(pages[currentIndex]);
    
      slider.classList.remove('grabbing');
   };
    
   function animation() {
      setSliderPosition();
      if (isDragging) requestAnimationFrame(animation);
   };
    
   function setPositionByIndex() {
      currentTranslate = currentIndex * -window.innerWidth;
      prevTranslate = currentTranslate;
      setSliderPosition();
   }
    
   function setSliderPosition() {
      slider.style.transform = `translateX(${currentTranslate}px)`;
   }
    
})();
