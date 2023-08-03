window.onload = function(){
   if ( document.querySelector('#video-consult') ){
      //Make the DIV element draggagle
      var startX, startY, startWidth, startHeight, startTop, startLeft;
      var cropBlock = document.querySelector('#video-consult');
      var border = document.getElementById('video-consult__drop');
      var cropBlockHeight = document.documentElement.clientHeight - cropBlock.offsetHeight - 20
      cropBlock.style.top = cropBlockHeight + 'px'      
      if ( document.documentElement.offsetWidth > 1199 ) {
         cropBlock.addEventListener('mousedown', initDrag, false);
         function initDrag(e) {
            console.log(cropBlock.offsetHeight)
            startX = e.clientX;
            startY = e.clientY;
            startTop = cropBlock.offsetTop + 190;
            startLeft = cropBlock.offsetLeft;
            document.documentElement.addEventListener('mousemove', doDrag, false);
            document.documentElement.addEventListener('mouseup', stopDrag, false);
         }
         function doDrag(e) {
            var left = startLeft + e.clientX - startX;
            left < 20 && (left=20);
            left + cropBlock.offsetWidth > border.offsetLeft + border.offsetWidth - 20  && (left = border.offsetLeft + border.offsetWidth - cropBlock.offsetWidth - 20);
            var top =  startTop + e.clientY - startY - 190;
            top < 20 && (top=20);
            top + cropBlock.offsetHeight > border.offsetTop + border.offsetHeight - 20  && (top = border.offsetTop + border.offsetHeight - cropBlock.offsetHeight - 20);
            cropBlock.style.top = top + 'px';
            cropBlock.style.left = left  + 'px';
         }
         function stopDrag(e) {
            document.documentElement.removeEventListener('mousemove', doDrag, false);
            document.documentElement.removeEventListener('mouseup', stopDrag, false);
         }
      }
   
      const videoModal = document.querySelector('#video-consult')
      const size = document.querySelector('.video-consult__size')
      const collapse = document.querySelector('.video-consult__collapse')
      const videoBtn = document.querySelector('.video-consult__btn')
      const valume = document.querySelector('.video-consult__volume')
      var valumeBool = false
   
      size.querySelector('.size-out').addEventListener('click', () => {
         videoModal.classList.add('_small')
         var left = cropBlock.offsetLeft;
         left < 20 && (left=20);
         left + cropBlock.offsetWidth > border.offsetLeft + border.offsetWidth - 20  && (left = border.offsetLeft + border.offsetWidth - cropBlock.offsetWidth - 20);
         var top =  cropBlock.offsetTop;
         top < 20 && (top=20);
         if ( top + cropBlock.offsetHeight > border.offsetTop + border.offsetHeight - 20 ){
            top = border.offsetTop + border.offsetHeight - cropBlock.offsetHeight - 20
         }
         cropBlock.style.top = top + 190 + 'px';
         cropBlock.style.left = left  + 'px';
      })
      size.querySelector('.size-in').addEventListener('click', () => {
         videoModal.classList.remove('_small')
         var left = cropBlock.offsetLeft;
         left < 20 && (left=20);
         left + cropBlock.offsetWidth > border.offsetLeft + border.offsetWidth - 20  && (left = border.offsetLeft + border.offsetWidth - cropBlock.offsetWidth - 20);
         var top =  cropBlock.offsetTop - 190;
         top < 20 && (top=20);
         if ( top + cropBlock.offsetHeight > border.offsetTop + border.offsetHeight - 20 ){
            top = border.offsetTop + border.offsetHeight - cropBlock.offsetHeight - 20
         }
         cropBlock.style.top = top + 'px';
         cropBlock.style.left = left  + 'px';
      })
      collapse.addEventListener('click', () => {
         videoModal.classList.add('_hide')
         videoBtn.classList.add('_show')
         document.querySelector('.video-consult__video video').pause()
         document.querySelector('.video-consult__video figure').classList.add('show-btn')
         document.querySelector('.video-consult__video').classList.add('play')
      })
      videoBtn.addEventListener('click', () => {
         videoModal.classList.remove('_hide')
         videoBtn.classList.remove('_show')
      })
      valume.addEventListener('click', () => {
         if ( valumeBool ){
            valumeBool = false
         } else {
            valumeBool = true
         }
         valume.classList.toggle('active')
         document.querySelector('.video-consult__video video').muted = valumeBool
      })
   
      document.querySelector('.video-consult__video video').addEventListener('ended', () => {
         document.querySelector('.video-consult__video').classList.add('play')
         document.querySelector('.video-consult__video figure').classList.add('show-btn')
      })
   
      let click = false;
      document.addEventListener("click", () => {
         if (!click) {
            document.querySelector(".video-consult__video video").play();
            document.querySelector(".video-consult__video").classList.remove('play');
            click = true;
         }
      });
   
      if ( document.documentElement.offsetWidth < 992 ) {
         videoModal.classList.add('_small')
      }
   }

   if ( document.querySelector('.needs-validation') ){
      'use strict'
      var forms = document.querySelectorAll('.needs-validation')
      Array.prototype.slice.call(forms).forEach(function (form) {
         form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
               event.preventDefault()
               event.stopPropagation()
            }
   
            form.classList.add('was-validated')
         }, false)
      })
   }

   if ( document.querySelector('.swiper') ){
      const swiper = new Swiper('.swiper', {
         slidesPerView: 1,
         loop: false,
         autoHeight: true,
         allowTouchMove: false,
         navigation: {
           nextEl: '#next-step'
         },
      });
   }

}