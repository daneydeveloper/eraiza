angular.module('app.factorie',[])
.factory('base_url', function(){
	return {
		get: 'http://localhost/working/eraisa.com.br/imob'
	}
})
.directive('realTimeCurrency', function ($filter, $locale) {
      var decimalSep = $locale.NUMBER_FORMATS.DECIMAL_SEP;
      var toNumberRegex = new RegExp('[^0-9\\' + decimalSep + ']', 'g');
      var trailingZerosRegex = new RegExp('\\' + decimalSep + '0');
      var filterFunc = function (value) {
          return $filter('currency')(value);
      };
      function getCaretPosition(input){
          if (!input) return 0;
          if (input.selectionStart !== undefined) {
              return input.selectionStart;
          } else if (document.selection) {
              // Curse you IE
              input.focus();
              var selection = document.selection.createRange();
              selection.moveStart('character', input.value ? -input.value.length : 0);
              return selection.text.length;
          }
          return 0;
      }


      function setCaretPosition(input, pos){
          if (!input) return 0;
          if (input.offsetWidth === 0 || input.offsetHeight === 0) {
              return; // Input's hidden
          }
          if (input.setSelectionRange) {
              input.focus();
              input.setSelectionRange(pos, pos);
          }
          else if (input.createTextRange) {
              // Curse you IE
              var range = input.createTextRange();
              range.collapse(true);
              range.moveEnd('character', pos);
              range.moveStart('character', pos);
              range.select();
          }
      }

      function toNumber(currencyStr) {
          return parseFloat(currencyStr.replace(toNumberRegex, ''), 10);
      }


      return {
          restrict: 'A',
          require: 'ngModel',
          link: function postLink(scope, elem, attrs, modelCtrl) {    
              modelCtrl.$formatters.push(filterFunc);
              modelCtrl.$parsers.push(function (newViewValue) {
                  var oldModelValue = modelCtrl.$modelValue;
                  var newModelValue = toNumber(newViewValue);
                  modelCtrl.$viewValue = filterFunc(newModelValue);
                  var pos = getCaretPosition(elem[0]);
                  elem.val(modelCtrl.$viewValue);
                  var newPos = pos + modelCtrl.$viewValue.length -
                                     newViewValue.length;
                  if ((oldModelValue === undefined) || isNaN(oldModelValue)) {
                      newPos -= 3;
                  }
                  setCaretPosition(elem[0], newPos);
                  return newModelValue;
              });
          }
      };
})

.directive('ngThumb', ['$window', function($window) {
  var helper = {
      support: !!($window.FileReader && $window.CanvasRenderingContext2D),
      isFile: function(item) {
          return angular.isObject(item) && item instanceof $window.File;
      },
      isImage: function(file) {
          var type =  '|' + file.type.slice(file.type.lastIndexOf('/') + 1) + '|';
          return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
      }
  };

  return {
    restrict: 'A',
    template: '<canvas/>',
    link: function(scope, element, attributes) {
        if (!helper.support) return;

        var params = scope.$eval(attributes.ngThumb);

        if (!helper.isFile(params.file)) return;
        if (!helper.isImage(params.file)) return;

        var canvas = element.find('canvas');
        var reader = new FileReader();

        reader.onload = onLoadFile;
        reader.readAsDataURL(params.file);

        function onLoadFile(event) {
            var img = new Image();
            img.onload = onLoadImage;
            img.src = event.target.result;
        }

        function onLoadImage() {
            var width = params.width || this.width / this.height * params.height;
            var height = params.height || this.height / this.width * params.width;
            canvas.attr({ width: width, height: height });
            canvas[0].getContext('2d').drawImage(this, 0, 0, width, height);
        }
      }
    };
}])

