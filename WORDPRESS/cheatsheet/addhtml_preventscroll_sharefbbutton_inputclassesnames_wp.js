window.onload = function() {
  // select the form div container
  const form = document.querySelector('.agent_contact_form')
  // let divinput = document.createElement("div");
  // divinput.innerHTML = "<input etc.... />"
  // while(divinput.firstChild) {
  // element.appendChild(divinput.firstChild);
  // }

  // create an input
  const input = document.createElement('input')

  // add id
  // let id = document.createAttribute("id");
  // id.value = "contact_subject";
  // input.setAttributeNode(id);
  input.setAttribute('id', 'agent_contact_subject')
  // add classname
  input.className = 'form-control'
  // input.className += " myfucking form-control";
  // input.classList.add("form-control");
  // input.classList.remove("myfuckinginput");
  // other input attributs
  input.type = 'text'
  input.name = 'contact_subject'
  input.placeholder = 'Subject'
  // asign aria-required attribute to true
  input.setAttribute('aria-required', 'true')
  // append it to the div
  // form.appendChild(input);
  form.insertAdjacentElement('beforeend', input)
  // form.insertAdjacentHTML('afterend', input.outerHTML);
  // form.insertAdjacentHTML('afterend', '<input name="contact_subject" type="text" placeholder="Subject" aria-required="true" id="agent_contact_subject" class="form-control"/>');

  const cityDiv = document.querySelector('#sidebar-advanced_city')

  cityDiv.insertAdjacentHTML(
    'beforebegin',
    '<div class="dropdown form-control open"><div data-toggle="dropdown" id="sidebar-advanced_wilaya" class="sidebar_filter_menu" data-value="all" aria-expanded="true"> Wilaya <span class="caret  caret_sidebar"></span></div> <input type="hidden" name="advanced_wilaya" value=""> <ul id="sidebar-adv-search-wilaya" class="dropdown-menu filter_menu" role="menu" aria-labelledby="sidebar-advanced_wilaya"> <li role="presentation" data-value="all" data-value2="all"> All Cities </li> <li role="presentation" data-value="Blida" data-value2="Blida">Blida</li><li role="presentation" data-value="Alger" data-value2="Alger" data-parentcounty="">Alger</li><li role="presentation" data-value="Batna" data-value2="Batna" data-parentcounty="">Batna</li></ul></div>'
  )
}

let prevScrollpos = window.pageYOffset
window.onscroll = function() {
  const currentScrollPos = window.pageYOffset
  if (prevScrollpos <= currentScrollPos) {
    document.querySelector('.master_header').style.display = 'none'
  } else {
    document.querySelector('.master_header').style.display = ''
  }
  prevScrollpos = currentScrollPos
}
// jquery code
$('#grid_view').on('click', function() {
  const classType = $(
    '#listing_ajax_container .listing_wrapper:first-of-type'
  ).attr('data-org')
  $('#listing_ajax_container').removeClass('ajax12')
  $('#listing_ajax_container .listing_wrapper ')
    .hide()
    .removeClass('col-md-12')
    .addClass(`col-md-${classType}`)
})
// same code in js
document.querySelector('#grid_view').addEventListener('click', function() {
  // let classType = document.querySelector("#listing_ajax_container .listing_wrapper:first-of-type").getAttribute("data-org"); //4
  document.querySelector('#listing_ajax_container').classList.remove('ajax12')
  const listing1 = document.querySelector(
    '#listing_ajax_container .listing_wrapper '
  )
  listing1.classList.remove('col-md-12')
  listing1.classList.add(`col-md-${classType}`)
})
/* add list view to only the home page */
const listing = document.querySelectorAll(
  '.home #listing_ajax_container .listing_wrapper '
)
for (i = 0; i < listing.length; i++) {
  if (listing[i].classList.contains('#wrapper_div')) {
    listing[i].classList.remove('col-md-12')
    listing[i].classList.add('col-md-4')
  }
}

function fbpopup(event) {
  event.preventDefault()
  const facebookWindow = window.open(
    `https://web.facebook.com/sharer/sharer.php?u=${document.URL}`
  )
  if (facebookWindow.focus) {
    facebookWindow.focus()
  }
  return false
}

if (document.querySelector('.property_reviews_wrapper')) {
  const review = document.querySelector('.property_reviews_wrapper')
  review.insertAdjacentHTML(
    'afterend',
    "<p><a href='#' class='share_social'>Share with <span class='fa fa-facebook' data-js='facebook-share'></span></a></p>"
  )
  const amentP = document.querySelectorAll('.featurescol')
  amentP[2].insertAdjacentHTML('afterend', '<hr /> <p> 2nd categorie: </p>')

  if (
    document.querySelector('[data-js="facebook-share"]') ||
    document.querySelector('.share_social')
  ) {
    const facebookShareP = document.querySelector('.share_social')
    const facebookShareAtt = document.querySelector(
      '[data-js="facebook-share"]'
    )
    facebookShareP.addEventListener('click', fbpopup)
    facebookShareAtt.addEventListener('click', fbpopup)
  }
}
// <script type="text/javascript"> </script>
