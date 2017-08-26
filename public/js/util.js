function in_array (needle, haystack, argStrict) {
  //  discuss at: http://locutus.io/php/in_array/
  var key = ''
  var strict = !!argStrict
  if (strict) {
    for (key in haystack) {
      if (haystack[key] === needle) {
        return true
      }
    }
  } else {
    for (key in haystack) {
      if (haystack[key] === needle) {
        return true
      }
    }
  }
  return false
}

function resetForm (form, ignore) {
  form.find('input[name="_method"]').val('POST')
  var elements = form[0].elements
  var rows = elements.length
  if (rows > 0) {

    for (var i = 0; i < rows; i++) {
      var name = elements[i].name
      if (!in_array(name, ignore)) {
        elements[i].value = ''
        if (elements[i].tagName === 'select') {
          $(elements[i]).trigger('change')
        }
      }
    }
  }
}