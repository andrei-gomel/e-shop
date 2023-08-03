$(document).ready(function(){

   // Bars
   $(document).on('click', '.bars', function(){
      $(document).find('.header-nav').toggleClass('show')
   })
   
   // Select
   $(document).on("click", function(e) {
      if (!$(e.target).is(".select *")) {
         $('.select__list').slideUp(300);
         $('.select__btn').removeClass('active');
      };
   });
   $('.select__btn').click(function(e){
      e.preventDefault();
      $(this).toggleClass('active');
      $(this).next().slideToggle(300);
   });
   $('.select__item').click(function(e){
      e.preventDefault();
      let title = $(this).text();
      $(this).closest('.select').find('.select__item').not($(this)).removeClass('active');
      $(this).addClass('active');
      $(this).closest('.select').find('.select__btn span').text(title);
      $(this).closest('.select').find('.select__btn').removeClass('active');
      $(this).closest('.select').find('.select__btn').next().slideUp(300);
      $(this).closest('.select').find('.select__input').val($(this).data('value'))
   });
   
   // Textarea autoheight
   if ( document.querySelector('.textarea') ){
      let textarea = document.querySelector('.textarea')
      let lastHeight = textarea.offsetHeight
      textarea.addEventListener('input', function (e) {
         e.preventDefault()
         e.target.style.height = lastHeight + 'px'
         e.target.style.height = e.target.scrollHeight + "px"
      })
   }

   // Lang header list
   $(document).on('click', '.page-header__lang', function(e){
      e.preventDefault()
      $(this).toggleClass('active')
      $(this).find('.page-header__lang-list').slideToggle(300)
   })
   $(document).on('click', function(e){
      if (!$(e.target).is(".page-header__lang *") && !$(e.target).is(".page-header__lang")) {
         $('.page-header__lang').find('.page-header__lang-list').slideUp(300)
         $('.page-header__lang').removeClass('active')
      };
   })

   document.querySelectorAll(".drop-zone").forEach((dropZoneElement) => {
      const inputElement = dropZoneElement.querySelector('.drop-zone__input')
   
      inputElement.addEventListener("change", (e) => {
         if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
         }
      });
   
      dropZoneElement.addEventListener("dragover", (e) => {
         e.preventDefault();
         dropZoneElement.classList.add("_over");
      });
      dropZoneElement.addEventListener("dragleave", (e) => {
         e.preventDefault();
         dropZoneElement.classList.remove("_over");
      });
   
      dropZoneElement.addEventListener("drop", (e) => {
         e.preventDefault();
   
         if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
         }
   
         dropZoneElement.classList.remove("_over");
      });
   });
   window.URL = window.URL || window.webkitURL;
   function updateThumbnail(dropZoneElement, file) {
      let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
   
      // Show thumbnail for image files
      if (file.type.startsWith("video/")) {
         const reader = new FileReader();
   
         reader.readAsDataURL(file);
         console.log(reader)
         reader.onload = () => {
            thumbnailElement.querySelector('.drop-zone__zoom').href = reader.result;
            thumbnailElement.querySelector('video').src = reader.result;
            dropZoneElement.querySelector('.add-new__drop-zone').classList.add('hide')
            thumbnailElement.classList.add('show')
            $(document).find('#modal-video video').attr('src', reader.result)
         }
      } else if (file.type.startsWith("image/")) {
         const reader = new FileReader();
   
         reader.readAsDataURL(file);
         reader.onload = () => {
            thumbnailElement.style.backgroundImage = 'url(' + reader.result + ')';
            dropZoneElement.querySelector('.add-new__drop-zone').classList.add('hide')
            thumbnailElement.classList.add('show')
            if ( document.querySelector('.add-new__result') && dropZoneElement.querySelector('#file-logo') ){
               document.querySelector('.chat-dialog-mess img').src = reader.result
            } else if ( document.querySelector('.add-new__result') && dropZoneElement.querySelector('#file-icon') ){
               document.querySelector('.chat-dialog-btn img').src = reader.result
            }
         }
      }
   }

   // Удаление загруженного файла
   $(document).on('click', '.drop-zone__remove', function(){
      $(this).closest('.drop-zone').find('input').val('')
      $(this).closest('.drop-zone').find('.add-new__drop-zone').removeClass('hide')
      $(this).closest('.drop-zone').find('.drop-zone__thumb').css('background-image', 'none')
      $(this).closest('.drop-zone').find('.drop-zone__thumb').removeClass('show')
      if (document.querySelector('.add-new__result') && $(this).hasClass('logo-btn')){
         document.querySelector('.chat-dialog-mess img').src = ''
      } else if (document.querySelector('.add-new__result') && $(this).hasClass('icon-btn')){
         document.querySelector('.chat-dialog-btn img').src = ''
      }
   })

   let icons = [] // Создаем массив для сбора и проверок наличия/отсутствия иконок
   // Добавление кнопки
   $(document).on('click', '.social-item', function(e){
      let icon = $(this)
      if ( icons.indexOf(icon.data('input')) === -1 && !$(e.target).hasClass('social-item-remove') ){ // Проверяем, не выбрана ли иконка ранее
         $('[data-mess="' + icon.data('input') + '"]').show()
         icon.addClass('active') // Добавляем активное состояние иконке сверху
         icons.push(icon.data('input')) // добавляем выбранную иконку с список используемых

         let listResult = document.querySelector('.chat-dialog-social') // Находим оболочку, куда засунем иконки
         let outputResult = `<li data-result-icon="${icon.data('input')}"><a href="#"><img src="./img/social/${icon.data('input')}.png" alt=""></a></li>`
         $(outputResult).appendTo(listResult)
      }
   })
   // Удаление кнопки. Клик на кнопку крестика в списке сверху
   $(document).on('click', '.social-item-remove', function(){
      let icon = $(this).closest('.social-item')
      if ( icons.indexOf(icon.data('input')) !== -1 ){
         $(document).find('[data-mess="' + icon.data('input') + '"]').hide()
         $(document).find('[data-result-icon="' + icon.data('input') + '"]').remove()
         icons.splice(icons.indexOf(icon.data('input')), 1)
         icon.removeClass('active')
      }
   })
   // Удаление по клику на крестик в списке добавленных иконок
   $(document).on('click', '.social-active-remove', function(){
      let icon = $(this).closest('.social-active')
      if ( icons.indexOf(icon.data('mess')) !== -1 ){
         $(this).closest('.social-active').hide()
         $(document).find('[data-result-icon="' + icon.data('mess') + '"]').remove()
         icons.splice(icons.indexOf(icon.data('mess')), 1)
         $(document).find('.social-item[data-input=' + icon.data('mess') + ']').removeClass('active')
      }
   })

   // Изменяем текст приветственного сообщения
   $(document).on('input', '#text-mess', function(){
      $(document).find('.chat-dialog-mess p').text($(this).val())
   })

   // Меняем цвет кнопки
   $(document).find('.chat-dialog-btn .btn').css('background-image', $(document).find('.select-color .select__item.active').data('value'))
   $(document).on('click', '.select-color .select__item', function(){
      $(document).find('.chat-dialog-btn .btn').css('background-image', $(this).data('value'))
   })

   // Меняем размер кнопки
   $(document).find('.chat-dialog-btn .btn').removeClass('big middle small').addClass($(document).find('.select-size .select__item.active').data('value'))
   $(document).on('click', '.select-size .select__item', function(){
      $(document).find('.chat-dialog-btn .btn').removeClass('big middle small').addClass($(this).data('value'))
   })


   $(document).on('click', '.tarifs-list label', function(){
      $('.tarifs-list label').removeClass('active')
      $(this).addClass('active')
   })

   $(document).on('click', '.tarifs-period-item', function(){
      let line = $('.tarifs-period-range'),
         index = $(this).data('index')

      $('.tarifs-period-item').each(function(){
         if ( $(this).data('index') < index ){
            $(this).addClass('active').removeClass('current')
         } else if ( $(this).data('index') == index ) {
            $(this).addClass('active current')
         } else {
            $(this).removeClass('active current')
         }
      })

      line.css('width', $(this).css('left'))
   })

   $(document).on('click', '.tarif-item', function(){
      $('.tarif-item').removeClass('active')
      $(this).addClass('active')
   })

   

})

