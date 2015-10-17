"user strict"

input = document.querySelector ".searchform__input"
search = document.querySelector "#searchform"
btn = document.querySelector "#searchsubmit"
close = document.querySelector "#close"
errorMsg = document.querySelector "#errorMsg"
hiddenNav = document.querySelector "#hiddenNav"

fRestoreSearchform = ( submited ) ->
  search.style.width = 'auto'
  search.style.height = 'auto'
  search.style.right = '2%'
  search.style.backgroundColor = 'transparent'
  search.style.padding = '0'

  input.style.fontSize = '1em'
  input.style.outline = 'initial'
  input.style.border = '1px solid #c2c2c2'
  input.style.padding = '.1em'
  input.value = '' if !submited

  btn.style.width = '30px'
  btn.style.height = '40px'
  btn.style.marginLeft = '5px'

  close.style.display = 'none'

  errorMsg.innerHTML = ""

  fHideNav()

fShowSearchform = () ->
  search.style.width = '100%'
  search.style.height = '100%'
  search.style.right = '0'
  search.style.backgroundColor = 'white'
  search.style.padding = '15%'

  input.style.fontSize = '3em'
  input.style.outline = 'none'
  input.style.borderTop = 'none'
  input.style.borderLeft = 'none'
  input.style.borderRight = 'none'
  input.style.borderBottom = '3px solid #8D6442'
  input.style.padding = '.2em 0'

  btn.style.width = '50px'
  btn.style.height = '50px'
  btn.style.marginLeft = '50px'

  close.style.display = 'inline-block'

  fShowNav()

fShowNav = () ->
  hiddenNav.style.display = 'block'

fHideNav = () ->
  hiddenNav.style.display = 'none'

# Whene focus on search input
input.addEventListener(
  'focus',
  () ->
    fShowSearchform()

  , false)

# When closing search form
close.addEventListener(
  'click',
  ( e ) ->
    e.preventDefault()

    fRestoreSearchform()

  , false)

# Search submit
search.addEventListener(
  'submit',
  ( e ) ->
    val = input.value.trim()
    fShowSearchform()
    if val == ""
      e.preventDefault()
      errorMsg.innerHTML = "Veuillez saisir une recherche !"
      input.style.borderColor = "#ef5143"
    else
      fRestoreSearchform( true )
      this.submit()

  , false)
