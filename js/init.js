var isiPhone = navigator.platform.toLowerCase().indexOf("iphone");
var isiPad = navigator.platform.toLowerCase().indexOf("ipad");
var isiPod = navigator.platform.toLowerCase().indexOf("ipod");
var isAndroidPhone = navigator.platform.toLowerCase().indexOf("linux");

// To keep our code clean and modular, all custom functionality will be contained inside a single object literal called "checkboxFilter".

var checkboxFilter = {
  
  // Declare any variables we will need as properties of the object
  
  $filters: null,
  $reset: null,
  groups: [],
  outputArray: [],
  outputString: '',
  
  // The "init" method will run on document ready and cache any jQuery objects we will need.
  
  init: function(){
    var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "checkboxFilter" object so that we can share methods and properties between all parts of the object.
    
    self.$filters = $('#Filters');
    self.$reset = $('.close-btn');
    self.$container = $('.grid');
    
    self.$filters.find('fieldset').each(function(){
      self.groups.push({
        $inputs: $(this).find('input'),
        active: [],
            tracker: false
      });
    });
    
    self.bindHandlers();
  },
  
  // The "bindHandlers" method will listen for whenever a form value changes. 
  
  bindHandlers: function(){
    var self = this;
    
    self.$filters.on('change', function(){
      self.parseFilters();
    });
    
    self.$reset.on('click', function(e){
    //e.preventDefault();
      self.$filters[0].reset();
      self.parseFilters();
    });
  },
  
  // The parseFilters method checks which filters are active in each group:
  
  parseFilters: function(){
    var self = this;
 
    // loop through each filter group and add active filters to arrays
    
    for(var i = 0, group; group = self.groups[i]; i++){
      group.active = []; // reset arrays
      group.$inputs.each(function(){ 
        $(this).is(':checked') && group.active.push(this.value);
      });
        group.active.length && (group.tracker = 0);
    }
    
    self.concatenate();
  },
  
  // The "concatenate" method will crawl through each group, concatenating filters as desired:
  
  concatenate: function(){
    var self = this,
          cache = '',
          crawled = false,
          checkTrackers = function(){
        var done = 0;
        
        for(var i = 0, group; group = self.groups[i]; i++){
          (group.tracker === false) && done++;
        }

        return (done < self.groups.length);
      },
      crawl = function(){
        for(var i = 0, group; group = self.groups[i]; i++){
          group.active[group.tracker] && (cache += group.active[group.tracker]);

          if(i === self.groups.length - 1){
            self.outputArray.push(cache);
            cache = '';
            updateTrackers();
          }
        }
      },
      updateTrackers = function(){
        for(var i = self.groups.length - 1; i > -1; i--){
          var group = self.groups[i];

          if(group.active[group.tracker + 1]){
            group.tracker++; 
            break;
          } else if(i > 0){
            group.tracker && (group.tracker = 0);
          } else {
            crawled = true;
          }
        }
      };
    
    self.outputArray = []; // reset output array

      do{
          crawl();
      }
      while(!crawled && checkTrackers());

    self.outputString = self.outputArray.join();
    
    // If the output string is empty, show all rather than none:
    
    !self.outputString.length && (self.outputString = 'all'); 
    
    //console.log(self.outputString); 
    
    // ^ we can check the console here to take a look at the filter string that is produced
    
    // Send the output string to MixItUp via the 'filter' method:
    
      if(self.$container.mixItUp('isLoaded')){
        self.$container.mixItUp('filter', self.outputString);
      }
  }
};

var titleCase = function(str, glue){
    glue = (glue) ? glue : ['of', 'for', 'and', 'a'];
    return str.replace(/(\w)(\w*)/g, function(_, i, r){
        var j = i.toUpperCase() + (r != null ? r : "");
        return (glue.indexOf(j.toLowerCase())<0)?j:j.toLowerCase();
    });
};
  
var headspaceTags = {
  $commonTags: null,
  $commonTagClicked: '',
  $checkboxTarget: null,
  init: function() {
    var self = this;
    self.$commonTags = $('#CommonTags').find('input');
    $tagContainer = $('.selected-headspaces');
    self.bindHandlers();
  },
  bindHandlers: function(){
    var self = this;
    
    self.$commonTags.on('change', function(){
      $this = $(this),
      tag = $this.val(),
      tag = $.trim(tag);
      tagTarget = $('.tag[value="' + tag + '"]').parent('span');
      if($this.is(':checked')) {
        self.addCommonTag(tag);
      } else {
        
        self.removeTag(tag, tagTarget);
      }
   
    });
    self.checkEmpty();

  },
  checkTags: function(){
    var self = this,
    tag = $this.val(),
    tag = $.trim(tag);
    tag = titleCase(tag);

    //Check to see if it's a common tag

    if ($('input[type=checkbox][value="' + tag + '"]').length) {
        $checkboxTarget = $('input[type=checkbox][value="' + tag + '"]');
        
        if ($checkboxTarget.is(':checked')){
          
          
        } else {
          $checkboxTarget.prop('checked', true);
          self.addCommonTag(tag);
          
        }


      } // If it's not a common tag... 
      else {

        if ($('.tag[value="' + tag + '"]').length) { 
         
          //It already exists, so do nothing!
          
          } else {
            
            self.addCustomTag(tag);
            
          }

       
      }
     
self.checkEmpty();
    
  },
  addCommonTag: function(tag){
      var self = this;
      newTag = '<span class="headspace-item"><a href="#" class="remove">x</a><input type="text" name="customheadspace[]" class="tag" value="' + tag + '" size="' + 
      tag.length + ' readonly"></span>';
      $tagContainer.append(newTag);
      self.checkEmpty();

  },
  addCustomTag: function(tag){
    var self = this;
      newTag = '<span class="headspace-item"><a href="#" class="remove">x</a><input type="text" name="customheadspace[]" class="tag" value="' + tag + '" size="' + 
      tag.length + ' readonly"></span>';
      $tagContainer.append(newTag);
      self.checkEmpty();
  },
  removeTag: function(tag, target){
    var self = this;
    console.log('initiate remove');
    if ($('input[type=checkbox][value="' + tag + '"]').length) {
        $checkboxTarget = $('input[type=checkbox][value="' + tag + '"]');
        console.log('common tag!');
        if ($checkboxTarget.is(':checked')){
          $checkboxTarget.prop('checked', false);
          
        }
        

      } 
    target.remove();
    self.checkEmpty();

  },
  checkEmpty: function() {
    var self = this;
    if ($('.tag').length) {
      $('.empty').hide();
    } else {
      $('.empty').show();
    }
  }
}


$( document ).ready(function() {
  headspaceTags.init();
  $('#in').on('keypress keydown keyup', function(e) {
    
    if (e.which == 13) {
      e.preventDefault();
        
      $this = $(this);
      if ($this.val().length > 0) {
      headspaceTags.checkTags();
    }
      
    
    $this.val('');
    return false;
    }
  });

  $('.add-headspace').on('click', function(e){
    e.preventDefault();
    $this = $(this).parents('tr').find('input');
    if ($this.val().length > 0) {
      headspaceTags.checkTags();
    }
      
    
    $this.val('');
  });

  $('body').on('click', '.remove', function(e){
    e.preventDefault();
    $this = $(this).parent('span');
    tag = $this.find('input').val();
    headspaceTags.removeTag(tag, $this);
  });

  // Instantiate MixItUp

  checkboxFilter.init();
      
  $('.grid').mixItUp({
    controls: {
      enable: false // we won't be needing these
    },
    animation: {
      easing: 'cubic-bezier(0.86, 0, 0.07, 1)',
      duration: 600
    }
  });    

  $('body').on('click', '.cell-btn', function(e) {
  	e.preventDefault();

      var jqEl = $(e.currentTarget);
      var tag = jqEl.closest('tr');
      switch (jqEl.attr("data-action")) {
      case "add":
          tag.after(tag.clone().find("input").val("").end());
          break;
      case "delete":
          tag.remove();
          break;
      }
      var n = $( ".step-counter" ).length;
      $('.step-counter').each( function(i){
      	n = i + 1;
      	$(this).html('Step ' + n + ':')
      });
      return false;
    }
  );


// Headspace Tags

$('#Rexipe').submit(function (e) {
  e.preventDefault();
  $.ajax({
    type: 'post',
    url: '/send_form_email.php',
    data: $(this).serialize(),
    success: function () {
      $(':submit').attr('disabled', 'disabled');
      $(':submit').val('Rexipe Submitted!');
      $(':submit').addClass('success');
    }
  });
})

  

});