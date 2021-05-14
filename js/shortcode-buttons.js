(function() {
   tinymce.create('tinymce.plugins.shortcodebuttons', {
      init : function(ed, url) {

         ed.addButton('topic-article', {
            title : 'Статья по теме',
            image : url+'/img/article.svg',
            onclick : function() {
               var post_url = prompt("URL статьи", "#");
               
               if (post_url != null && post_url != '') {
                  ed.execCommand('mceInsertContent', false, '[topic-article post_url="'+post_url+'"]');
               }
                  
               else {
                     ed.execCommand('mceInsertContent', false, '[topic-article]');
               }
            }
         });

         ed.addButton('tel-link', {
            title : 'Ссылка на телеграм канал',
            image : url+'/img/telegram.svg',
            onclick : function() {
               var link_url = prompt("URL ссылки", "https://t.me/investmagpro");
               var link_text = prompt("Текст ссылки", "Telegram-канале");
               var text = prompt("Текст", "Читайте еще больше интересных новостей по теме в нашем");
               
               ed.execCommand('mceInsertContent', false, '[tel-link link_url="'+link_url+'" link_text="'+link_text+'"]'
                        +text+'[/tel-link]');
            }
         });

         ed.addButton('facebook-link', {
            title : 'Ссылка на страницу в Facebook',
            image : url+'/img/facebook.svg',
            onclick : function() {
               var link_url = prompt("URL ссылки", "https://www.facebook.com/investmag.pro");
               var link_text = prompt("Текст ссылки", "Facebook");
               var text = prompt("Текст", "Больше мнений можно найти на нашей странице в ");
               
               ed.execCommand('mceInsertContent', false, '[facebook-link link_url="'+link_url+'" link_text="'+link_text+'"]'
                  +text+'[/facebook-link]');
            }
         });

         ed.addButton('info-inset', {
            title : 'Информационная вставка',
            image : url+'/img/info.svg',
            onclick : function() {
               var link_text = prompt("Текст ссылки", "Telegram-канале");
               var text = prompt("Текст", "Investmag.pro - это сайт про инвестиции в акции. Больше новостей можно найти на нашем");

               if (text != null && text != ''){
                  if (link_text != null && link_text != '')
                     ed.execCommand('mceInsertContent', false, '[info-inset link_text="'+link_text+'"]'+text+'[/info-inset]');
                  else
                     ed.execCommand('mceInsertContent', false, '[info-inset]' +text+ '[/info-inset]');

               } else{
                  if (link_text != null && link_text != '')
                     ed.execCommand('mceInsertContent', false, '[info-inset link_text="'+link_text+'"]');
                  else
                     ed.execCommand('mceInsertContent', false, '[info-inset]');
               }
            }
         });

         ed.addButton('inset', {
            title : 'Врезка',
            image : url+'/img/insert.svg',
            onclick : function() {
               var selected = tinyMCE.activeEditor.selection.getContent();

               if (selected) {
                  var content = '[inset]'+selected+'[/inset]';
               } else {
                  content = '[inset]';
               }

               ed.execCommand('mceInsertContent', false, content);
            }
         });
         
         ed.addButton('tag-link', {
            title : 'Tag-ссылка',
            text: '[tag]',
            icon : false,
            onclick : function() {
               var selected = tinyMCE.activeEditor.selection.getContent();

                  if (selected) {
                      var content = '[tag-link]'+selected+'[/tag-link]';
                  } else {
                     content = '[tag-link]';
                  }

               ed.execCommand('mceInsertContent', false, content);
            }
         });

         ed.addButton('rubrics-link', {
            title : 'Ссылка на тему',
            text: '[тема]',
            icon : false,
            onclick : function() {
               var selected = tinyMCE.activeEditor.selection.getContent();

                  if (selected) {
                      var content = '[rubrics-link]'+selected+'[/rubrics-link]';
                  } else {
                     content = '[rubrics-link]';
                  }
               

               ed.execCommand('mceInsertContent', false, content);
            }
         });

         ed.addButton('themes-block', {
            title : 'Блок ссылок',
            text: '[блок тем]',
            icon : false,
            onclick : function() {
               var selected = tinyMCE.activeEditor.selection.getContent();

                  if (selected) {
                      var content = '[themes-block]'+selected+'[/themes-block]';
                  } else {
                     content = '[themes-block]';
                  }
               

               ed.execCommand('mceInsertContent', false, content);
            }
         });

         ed.addButton('columnist', {
            title : 'Колумнист',
            image : url+'/img/manager.svg',
            onclick : function() {
               ed.execCommand('mceInsertContent', false, '[columnist]');
            }
         });

         ed.addButton('highlight-text', {
            title : 'Выделить текст',
            image : url+'/img/marker.svg',
            onclick : function() {
               var selected = tinyMCE.activeEditor.selection.getContent();

               if (selected) {
                   var content = '[highlight-text]'+selected+'[/highlight-text]';
               }   

               ed.execCommand('mceInsertContent', false, content);
            }
         });

         ed.addButton('card-article-link', {
            title : 'Подзаголовок для "Карточка"',
            image : url+'/img/card-header.svg',
            onclick : function() {
               var selected = tinyMCE.activeEditor.selection.getContent();
               var link_id = prompt("Порядковый номер пункта", "1");

               if (link_id != null && link_id != '') {

                  if (selected) 
                      var content = '[card-article-link link_id="'+link_id+'"]'+selected+'[/card-article-link]';
                  else 
                     content = '[card-article-link link_id="'+link_id+'"]';
               } else {

                  if (selected)
                     content = '[card-article-link link_id="1"]'+selected+'[/card-article-link]';
                  else
                     content = '[card-article-link link_id="1"]';
               }

               ed.execCommand('mceInsertContent', false, content);
            }
         });

      },
      createControl : function(n, cm) {
         return null;
      },
   });

   tinymce.PluginManager.add('shortcodebuttons', tinymce.plugins.shortcodebuttons);

})();
